<?php
    include "../models/model_convite_turma.php";
    session_start();
    if(isset($_GET["action"]) == false){
        die("waiting_for_argument");
    }

    $action = $_GET["action"];
    switch ($action){
        case 'verificar':
            if(isset($_POST["turmas_id"])){
                echo json_encode(modelConviteTurma::validar($_POST["turmas_id"]));
            }
            break;
        case 'confirma':
            if(isset($_POST["turmas_id"])){
                echo json_encode(modelConviteTurma::confirmar($_POST["turmas_id"]));
            }
            break;
    }