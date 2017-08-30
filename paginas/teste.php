<?php 
    include_once("../models/entidades.php");
    
    session_start();
    $usuario = $_SESSION["login"];
    echo $usuario->getUsuarios_nome();

    //$professor = $usuario->getProfessores();
    echo $usuario->getProfessores()->getProfessores_id();
?>