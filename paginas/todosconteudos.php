<?php 
    
	include_once("../models/tc_model.php");

	session_start();
	if(!isset($_SESSION['login'])){
		header('location: index.php');
	}

		
	$usuario = $_SESSION['login'];
	$nivel = $usuario->getUsuarios_nivel();	
	if($nivel <= 2){
		$result=Tc_model::buscaConteudos();
		
		include "templates/header.php";

		include('templates/navbar.php');

		include ('conteudosprof/contprof.php');

		include ('templates/footer.php');

	}else if($nivel == 3){

		$id = $usuario->getUsuarios_id();
		$aluno = $_SESSION['login']->getAlunos();
		$idaluno=$aluno->getAlunos_id();
		$ultimoconteudo=$aluno->getConteudos_ordem();
		$result=Tc_model::buscaConteudos();
		$totalconteudo=count($result);
		$patual=$ultimoconteudo;

		if($patual == 1) $patual--;
		if($patual == $totalconteudo) $patual++;

		$porcentagem=($patual * 100)/$totalconteudo;

		include ("templates/header.php");

		include('templates/navbar.php');

		include ('conteudos/telaconteudos.php');

		include ('templates/footer.php');

	}


?> 