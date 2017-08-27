<?php
	try{
		session_start();
		include_once ("../models/servico.php");
		include_once ("../models/sala_model.php");
		include_once ("../models/entidades.php");
		$turmas = $_GET["turma"];
		$alunos = Sala_model::selecionarAlunosTurma($turmas);
		$conteudos = Sala_model::selecionarConteudosLiberadosAluno($turmas);
		$turmas = Sala_model::selecionarTurma($turmas);
	}catch(Exception $e){
		echo $e;
	}

	include "templates/header.php";
?>

<body style="overflow-x: hidden">
	<?php include "templates/navbar.php";?>
	<?php include "telasala/telasala.php"; ?>
</body>
	<?php include "templates/footer.php";
?>