<?php
    include_once('../models/suporte.php');
    include_once('../models/servico.php');
    include_once('../models/entidades.php');
    include_once('../models/model_cadastro.php');

    if(strlen($_POST["nome"]) < 4)
        die("Insira um nome válido!");
                
    if(strlen($_POST["email"]) < 7)
        die("Insira um email válido!");
                
    if(strlen($_POST["senha"]) < 6)
        die("Senha muito curta!");

    $sql = "SELECT * FROM usuarios WHERE usuarios_email = ?";
    $param = array($_POST["email"]);
        try{
            $testeEmail = Database::selecionarParam($sql, $param);
        }
        catch(Exception $e){
            die("Erro: ". $e->getMessage);
        }
    if($testeEmail)
        die("Email já cadastrado!");
    
    else{
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
    }

?>
