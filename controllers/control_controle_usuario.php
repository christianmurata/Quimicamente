<?php
    include "../models/model_controle_usuario.php";
    session_start();
    if(isset($_GET["action"]) == false){
        die("waiting_for_argument");
    }

$action = $_GET["action"];
switch ($action){
    case 'buscar_usuarios':
        echo json_encode(modelControleUsuario::buscar_usuarios());
        break;
    case 'desativa_user':
        if(isset($_POST["usuarios_id"])){
            echo json_encode(modelControleUsuario::desativa_user($_POST["usuarios_id"]));
        }else{
            echo json_encode("error");
        }
        break;
    case 'ativa_user':
        if(isset($_POST["usuarios_id"])){
            echo json_encode(modelControleUsuario::ativa_user($_POST["usuarios_id"]));
        }else{
            echo json_encode("error");
        }
        break;
}