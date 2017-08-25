<?php
    include_once('../models/servico.php');
    include_once('../models/entidades.php');
    include_once('../models/model_cadastro.php');
    
    $array = array(
                array(
                "usuarios_id" => 0,
                "usuarios_nome" => $_POST["nome"],
                "usuarios_email" => $_POST["email"],
                "usuarios_senha" => $_POST["senha"],
                "usuarios_nivel" => 3,
                "usuarios_datanasc" => $_POST["datanasc"],
                "usuarios_foto" => NULL,
                "usuarios_del" => "N"
                )
    );

    Model_cadastro::cadastro($array);

?>
