<?php 
	include_once("../../models/servico.php");
	
	session_start();
		
	$usuario = $_SESSION["login"];
	$aluno = $usuario->getAlunos()->getAlunos_id();
	//$tempo = 10; 
	$tes = array();
	$erro = 0;
	$acertos = 0;
	$VerificaExistencia = 0;
	$resposta = $_POST['re'];
	$tempo = $_POST['tempo'];
	
	$respostaSt = explode(',', $resposta);
	$dificuldade = $_POST['dificuldade'];	
	$pontucao = 0 ;
	$param1;
	$param2;
	$contador = 0;

	if($dificuldade == 1){
		$peso = 100;
	}
	
	else if($dificuldade == 2){
		$peso = 50;
	}
	else{
		$peso = 33.33;
	}
	
	
	$sql = "SELECT * FROM respostas WHERE respostas_id = ?";
	
	try{
		for($i = 0; $i<30 ;$i++){
			$query = Database::selecionaObjeto($sql,$respostaSt[$i]);
			
			$tes[$i] = $query[0]['respostas_correta'];
			if($tes[$i] == 'S')
			{
				$acertos += 1;				
			}
		}		
	}
	catch(Exception $e){
		die($e);
	}
	
	
	$pon = (($acertos * $peso)*0.75)+(((($tempo/600)*100)*0.25)*10);
	$pontucao = number_format($pon, 0, '.', ',');
	$paramm = array($aluno, $pontucao, $tempo, $dificuldade, 'N', $aluno, $dificuldade);
	$param2 = array($aluno, $pontucao, $tempo, $dificuldade, 'N');
	

	$sql1="select (case when exists(select * from desempenhos where alunos_id = ? and desempenhos_del = 'N' and desempenhos_dificuldade = ?) then 1 else 0 end) ";
	$aux = array($aluno,$dificuldade);
	
	try{
		$query = Database::selecionarParam($sql1,$aux);
		
		$VerificaExistencia = implode("",$query[0]);
		
		//echo $VerificaExistencia;
		if($VerificaExistencia == 1)
		{
			$sql2 = "UPDATE desempenhos SET alunos_id=?, desempenhos_notafinal=?, desempenhos_tempo=?, desempenhos_dificuldade=?, desempenhos_del=? where alunos_id = ? and desempenhos_dificuldade=?";
			
			
			try{
				Database::executarParam($sql2, $paramm);
			}
			catch(Exception $e){
				die ($e);
			}
		}
		else{
			$sql3 = "INSERT INTO desempenhos(alunos_id, desempenhos_notafinal, desempenhos_tempo, desempenhos_dificuldade, desempenhos_del) VALUES ( ?, ?, ?, ?, ?)";
			try{
				Database::executarParam($sql3,$param2);
			}
			catch(Exception $e){
				die ($e);
			}
		}
	}
	catch(Exception $e){
		die($e);
	}

	//echo $tempo;
	echo $pontucao;
?>