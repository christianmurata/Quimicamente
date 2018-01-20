<?php	
	include_once("../models/model_competicao.php");
	include_once("../models/entidades.php");
	include_once("../models/servico.php");
	
	
	
	$idconteudo = $_COOKIE['dificul'];

	
	$recebePergunta = PERGUNTA::carregaPergunta($idconteudo);
	//print_r($recebePergunta);
	//die();
	//print_r($recebePergunta);
	//die();
	
	
	
?>