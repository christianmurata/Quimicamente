<?php

$conex = pg_connect("host = localhost port = 5432 dbname = quimicamente user = postgres password = sqladmin");
$contador = $_GET['parametro2'];

if($_GET['parametro1'] == 1){
	$contador++;
	$sql = "SELECT assunto
			WHERE id = ".$contador"";
	$resultado = pg_query($conex, $sql)
	return $resultado;
}

if($_GET['parametro1'] == 2){
	$contador--;
	$sql = "SELECT assunto
			WHERE id = ".$contador"";
	$resultado = pg_query($conex, $sql)
	return $resultado;
} 

?>