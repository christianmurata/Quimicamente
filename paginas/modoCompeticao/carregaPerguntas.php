<?php
	include_once ".../Quimicamente/models/suporte.php";
	include_once "../Quimicamente/models/entidades.php";
	
	$resultado = "SELECT perguntas_descricao FROM perguntas;";

	while($fetch = pg_fetch_array($resultado)){
		$perguntas[] = $fetch['mostraPergunta'];
	} 
	
	print_r($perguntas);
	
?>