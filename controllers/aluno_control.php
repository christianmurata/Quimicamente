<?php
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL); 

    include_once("../models/aluno_model.php");	
	session_start();
	
	$usuario=$_SESSION["login"];
	$aluno = $usuario->getUsuarios_id();
	
	//$id_aluno = model_aluno::alunos($aluno);
	
	$turmas = model_aluno::turmas($id_aluno);
	if ($turmas != false)
	{
		$id_prof = $turmas->getProfessores_id();
		$turmas=model_aluno::turmas_prof($id_prof);
	}
	
	$conteudos=model_aluno::conteudos();
	
	$rank = array();
	$rank = model_aluno::rank($id_aluno);
	
	//$_SESSION['login']=model_aluno::rank($id_aluno);
	//$competicao=model_aluno::rank($id_aluno);
	//$turmas_nome=model_aluno::turma_nome();
	$desempenhosDificil=model_aluno::rank("dificil");
	
	$desempenhosFacil=model_aluno::rank(1);
	$pontuacaoesFacil=$desempenhosFacil[0];
	$usuariosFacil   =$desempenhosFacil[1];
	
	$desempenhosMedio=model_aluno::rank(2);
	$pontuacaoesMedio=$desempenhosMedio[0];
	$usuariosMedio   =$desempenhosMedio[1];
	
	$desempenhosDificil=model_aluno::rank(3);
	$pontuacaoesDificil=$desempenhosDificil[0];
	$usuariosDificil   =$desempenhosDificil[1];
?>