<?php 
    include_once("../models/entidades.php");
    session_start();
    $usuario = $_SESSION["login"];
    echo $usuario->getUsuarios_id()."<br>";

    $professor = $usuario->getProfessores();
    echo $usuario->getProfessores()->getProfessores_id();
?>