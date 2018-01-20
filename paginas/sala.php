<?php
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);
	try{
		require_once("checkLogin.php");
		include_once("../models/model_provas.php");
		include_once("../models/sala_model.php");

		$user = $_SESSION['login'];
		$nivel = $user->getUsuarios_nivel();
		$aluno = $user->getAlunos();
		if($nivel != 3){
			header('location: index.php');
		}else{
			$turma = Sala_model::selecionarTurmaAluno($aluno->getAlunos_id());
			if($turma){
				$conteudos 				= Sala_model::selecionarConteudosLiberadosAluno($turma->getTurmas_id());
				$provas 				= Sala_model::selecionarProvas($turma->getTurmas_id());
				$alunos 				= Sala_model::selecionarAlunosTurma($turma->getTurmas_id());
				$conteudos_comunidade 	= Sala_model::selecionarConteudosComunidadeLiberadosAluno($turma->getTurmas_id());
			}else{
				unset($turma);
			}
		}
	}catch(Exception $e){
		echo $e;
	}

	include "templates/header.php";
?>

<body style="overflow-x: hidden">
<?php
	include "templates/navbar.php";
	if(isset($turma)){
	 	include "telasala/telasala.php";
	}else{
		include "telasala/saladeaula.php";
	}
?>
</body>
	<?php include "templates/footer.php";
?>


<?php
	function calculo_idade($data) {
		//Data atual
		$dia = date('d');
		$mes = date('m');
		$ano = date('Y');
		//Data do aniversário
		$nascimento = explode('-', $data);
		$dianasc = ($nascimento[2]);
		$mesnasc = ($nascimento[1]);
		$anonasc = ($nascimento[0]);

		$idade = $ano - $anonasc; // simples, ano- nascimento!
		if ($mes < $mesnasc) // se o mes é menor, só subtrair da idade
		{
			$idade--;
			return $idade;
		}
		elseif ($mes == $mesnasc && $dia <= $dianasc) // se esta no mes do aniversario mas não passou ou chegou a data, subtrai da idade
		{
			$idade--;
			return $idade;
		}
		else // ja fez aniversario no ano, tudo certo!
		{
			return $idade;
		}
	}
?>