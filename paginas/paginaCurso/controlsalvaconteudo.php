<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

//include_once("../../models/servico.php");
//include_once("../../models/entidades.php");
include ("modelsalvaconteudo.php");

session_start();


$usu=$_SESSION['login'];

$idusuario=$usu->getUsuarios_id();
$idconteudo = $_GET['parametro1'];
$salvo = SALVARAVANCO::salvar($idconteudo,$idusuario);
echo $salvo;
?>