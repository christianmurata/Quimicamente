<?php 

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL); 
echo"poioio";

	include_once('../models/model_aluno.php');
    include_once('../models/servico.php');
    include_once('../models/entidades.php');
	
	session_start();
	
	$usuario=$_SESSION["login"];
	$usuarios_id=$usuario->getUsuarios_id();
    
    //$_SESSION['login']=model_aluno::competicao($usuarios_id);
    
    
//	$competicao =              model_aluno::competicao($usuarios_id);
//	$turma =                   model_aluno::turma($usuarios_id);

	$conteudo =   model_aluno::conteudo();
	
    //$desempenhosDificil =      model_aluno::rank("dificil");
	
?>