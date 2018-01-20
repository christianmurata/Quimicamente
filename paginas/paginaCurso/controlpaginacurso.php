<?php
session_start();
//conteudo
include "modelpaginacurso.php";
//perguntas
include "modelbuscarperguntas.php";

$idusuario = $_SESSION['login'];
$idconteudo = $_GET['conteudos_id'];

//perguntas
$perguntas = PERGUNTAS_CONTEUDO::PerguntasConteudo($idconteudo);

//conteudo
$tituloconteudo = TITULO::TituloConteudo($idconteudo);
$conteudo = CONTEUDO::Consulta($idconteudo);
?>