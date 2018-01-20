<?php
	include_once ("../models/servico.php");
	include_once ("../models/entidades.php");
	session_start();
	if(!isset($_SESSION['login'])){
		header('location: index.php');
	}
?>