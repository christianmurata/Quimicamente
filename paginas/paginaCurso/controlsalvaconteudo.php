<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

session_start();
include "modelsalvaconteudo.php";

$idusuario = $_SESSION['login'];



$idconteudo = $_GET['parametro1'];
$salvo = SALVARAVANCO::salvar($idconteudo,$idusuario);
echo $salvo;
?>