<?php
	include_once("../models/model_rank.php");
	

	$desempenhosFacil = Model_rank::desempenhos(1);
	$pontuacaoesFacil = $desempenhosFacil[0];
	$usuariosFacil    = $desempenhosFacil[1];
	
	$desempenhosMedio = Model_rank::desempenhos(2);
	$pontuacaoesMedio = $desempenhosMedio[0];
	$usuariosMedio    = $desempenhosMedio[1];
	
	$desempenhosDificil = Model_rank::desempenhos(3);
	$pontuacaoesDificil = $desempenhosDificil[0];
	$usuariosDificil    = $desempenhosDificil[1];
		
	//return;
?>