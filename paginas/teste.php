<?php 
    include_once("../models/entidades.php");
    
    session_start();
    $usuario = $_SESSION["login"];
    echo $usuario->getAlunos()->getTurmas_id();

    //$professor = $usuario->getProfessores();
    //echo $usuario->getProfessores()->getProfessores_id();
?>