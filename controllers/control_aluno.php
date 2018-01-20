<?php 

	//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL); 

		include "../models/model_aluno.php";
		
		session_start();

		$usuario = $_SESSION["login"];
		$aluno =$usuario->getUsuarios_id();
		
		//$_SESSION['login']=model_aluno::competicao($usuarios_id);
		//$competicao = model_aluno::competicao($usuarios_id);
		// $turmas_nome = model_aluno::turma_nome();
		//$desempenhosDificil =      model_aluno::rank("dificil");
		
		$id_aluno = model_aluno::alunos($aluno);
		
		$rank = array();
		$rank = model_aluno::rank($aluno);
		$turmas = model_aluno::turmas($aluno);
		$conteudos =  model_aluno::conteudos();
		
		$porcen_cont = model_aluno :: porcen($aluno);
		$porcen_aluno = model_aluno :: porcen_aluno($aluno);
		
