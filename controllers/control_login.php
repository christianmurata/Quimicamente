<?php
    include_once("../models/servico.php");
    include_once("../models/entidades.php");
    include_once("../models/model_login.php");
    
    if($_POST["action"] == "login"){
        $loginParam = array($_POST["email"], $_POST["senha"]);
        Model_login::login($loginParam);
    }
    if($_POST["action"] == "logout"){
        Model_login::logout();
    }
    if($_POST["action"] == "checkNivel"){
        echo json_encode(array("nivel" => $_SESSION["login"]->getusuarios_nivel()));
    }