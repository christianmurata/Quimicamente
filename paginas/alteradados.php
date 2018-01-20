<?php
	include_once('../models/servico.php');

    $fotopadrao = "http://200.145.153.172/quarkz/Quimicamente/imagens/default_profile_pic.png";
	session_start();
	if(!isset($_SESSION['login'])){
			header('location: index.php');
	}
	
	
	$usuario=$_SESSION['login'];
	$id=$usuario->getUsuarios_id();

	$nome=$usuario->getUsuarios_nome();
	$email=$usuario->getUsuarios_email();
	$data=$usuario->getUsuarios_datanasc();
	$foto=$usuario->getUsuarios_foto();
	if($foto==""){
		$foto=$fotopadrao;
	}else{
		$foto=$usuario->getUsuarios_foto();
	}
	
	include_once("templates/header.php");
	
?>
<body style="overflow-x: hidden;">
	<?php include_once("templates/navbar.php"); 
		  include_once("altera_dados/telaalteradados.php"); 
		  include_once("templates/footer.php"); ?>
</body>