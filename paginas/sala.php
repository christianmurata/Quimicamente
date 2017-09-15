<?php
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);
	try{
		include_once ("../models/servico.php");
		include_once ("../models/sala_model.php");
		include_once ("../models/entidades.php");
		
		session_start();
		if(!isset($_SESSION['login'])){
			header('location: index.php');
		}
		
		$user = $_SESSION['login'];
		$nivel = $user->getUsuarios_nivel();

		if($nivel != 3){
			header('location: index.php');
		}else{
			$turma = $user->getAlunos()->getTurmas_id();
			if($turma){
				$alunos = Sala_model::selecionarAlunosTurma($turma);
				$conteudos = Sala_model::selecionarConteudosLiberadosAluno($turma);
				$turmas = Sala_model::selecionarTurma($turma);
				$provas = Sala_model::selecionarProvas($turma);
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
	if(isset($turma) && $turma != 1){
	 	include "telasala/telasala.php";
	}else{
		include "telasala/saladeaula.php";
	}
?>
</body>
	<?php include "templates/footer.php";
?>