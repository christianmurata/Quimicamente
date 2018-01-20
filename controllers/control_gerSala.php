<?php
    include "../models/model_gerSala.php";
    session_start();
    $action = $_GET["action"];
    $nvl = $_SESSION["login"]->getUsuarios_nivel();
    if($nvl != 2){
        return json_encode(array('error' => "permission_denied"));
    }
    switch($action){
        case 'validarSala':
             if(isset($_POST["turmas_id"])){
                 try{
                     echo json_encode(ModelGerSala::carregarSala($_POST["turmas_id"]));
                 }

                 catch(Exception $e){
                     echo array("error", $e->getMessage());
                 }
             }
        break;

        case 'removerAlunos':
            if(!isset($_POST["idUsuarios"])){
                echo json_encode(array("error"=>"missing_argument"));
            }
            echo json_encode(ModelGerSala::removerAlunos($_POST));
            break;

        case 'carregarQuestoesElaborarProva':
            echo json_encode(ModelGerSala::carregarQuestoesProva($_POST["turma"]));
            break;

        case 'novaProva':
            echo json_encode(ModelGerSala::novaProva($_POST));
            break;

        case 'carregarModulosOficiais':
            echo json_encode(ModelGerSala::carregarModulosOficiais($_POST["turmas"]));
            break;

        case 'carregarModulosComunidade':
            echo json_encode(ModelGerSala::carregarModulosComunidade($_POST["turmas"]));
            break;

        case 'liberarOficiais':
            echo json_encode(ModelGerSala::liberarOficiais($_POST));
            break;

        case 'liberarComunidade':
            echo json_encode(ModelGerSala::liberarComunidade($_POST));
            break;
        case 'gerenciarProvas':
            echo json_encode(ModelGerSala::gerenciarProvas($_POST["turmas"]));
            break;
        case 'delProva':
            echo json_encode(ModelGerSala::delProva($_POST));
            break;

    }
