<?php
$idconteudo = 1;

include "modelbuscaperguntas.php";

$perguntas = PERGUNTAS::PerguntasConteudo($idconteudo);
$respostabanco = RESPOSTASBANCO::Consulta($idconteudo);
?>