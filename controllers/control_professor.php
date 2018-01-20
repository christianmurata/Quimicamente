<?php 
    include_once("../models/servico.php");
    include_once("../models/entidades.php");
    include_once("../models/model_professor.php");

    session_start();

    $usuario = $_SESSION["login"];
    $param = $usuario->getProfessores()->getProfessores_id();

    if (isset($_POST["action"])){
        if($_POST["action"] == "inserir"){
            $arrayTurma = array(
                array("turmas_id" => 0,
                    "professores_id" => $param,
                    "turmas_nome" => $_POST["turmas_nome"],
                    "turmas_del" => "N"
                )
            );
            Model_professor::inserir_turmas($arrayTurma);
        }
        if($_POST["action"] == "excluir"){
            Model_professor::excluir_turmas($_POST["turmas_id"]);
        }
    }
?>