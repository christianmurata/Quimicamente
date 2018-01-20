<?php
	include_once("remekeModel_rank.php");
	
	$desempenhos = remekeModel_rank::desempenhos("facil");
	print_r (desempenhos);
	echo "teste";
?>