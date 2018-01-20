<?php
	include_once('..paginas/aluno/aluno.php');
	include_once('..paginas/aluno/aluno_model.php');
	include_once('..paginas/aluno/servico.php');
	include_once('..paginas/aluno/suporte.php');
			
			
	
	echo"hello 1 ";
	
	class turmas2{	
	
		function mostraturmas($turmas){
			$verifica = "select turma_id from aluno";

			$turma = "select id_turma from turmas where ";
	
	
			if($turma == $verifica ){
			"select nome_turma, nome_professor from turmas where $verifica = $turma";
			echo ("oiii");
			}
			else 
				echo"helooo";
		}
	}//turmas
	
	echo"hello 2 ";
	
	class desempenho{	
	
		function mostradesempenho($turmas){
			$verifica = "select turma_id from aluno";

			$turma = "select id_turma from turmas where ";
			
			echo"hello class desempenhp ";
			
			$valida = null;
			if($valida != $desempenho_id ){
				$sql="select desempenhos_notafinal, desempenhos_tempo, desempenhos_dificuldade from desempenhos";
				$resultado= pg_query($conecta, $sql);
				$qtde=pg_num_rows($resultado);
				if ($qtde > 0)
				{
					for ($cont=0; $cont < $qtde; $cont++){
						$linha=pg_fetch_array($resultado);
						echo "Nota.........: ".$linha['desempenhos_notafinal']."<br>";
						echo "tempo........: ".$linha['desempenhos_tempo']."<br>";
						echo "Dificuldade..: ".$linha['desempenhos_dificuldade']."<br>";
					}//for
				}
			}
			else 
				echo"helooo";
		}
	}//turmas
	
	echo"hello 3 ";
	
	
	mostradesempenho(20);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		
	
	
?>