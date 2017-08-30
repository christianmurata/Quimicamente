<?php
    include_once("../models/suporte.php");
    include_once('../models/servico.php');
    include_once('../models/entidades.php');
    include_once('../models/model_cadastro.php');
    
    if(strlen($_POST["nome"]) < 4)
        die("Insira um nome válido!");

    if(validaCPF($_POST["cpf"]) != true){
         die("CPF Inválido");
    }
    if(strlen($_POST["email"]) < 7)
        die("Insira um email válido!");
                
    if(strlen($_POST["senha"]) < 8)
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
                "usuarios_nivel" => 2,
                "usuarios_datanasc" => $_POST["datanasc"],
                "usuarios_foto" => NULL,
                "usuarios_del" => "N"
                ),
                array(
                    "professores_id" => 0,
                    "usuarios_id" => 0,
                    "professores_cpf" => $_POST["cpf"],
                    "professores_del" => "N"
                )
        );

        Model_cadastro::cadastro($array);
    }

    function validaCPF($cpf) {

                // Verifica se um número foi informado
                if(empty($cpf)) {
                    return false;
                }

                // Elimina possivel mascara
                $cpf = preg_replace('[^0-9]', '', $cpf);
                $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

                // Verifica se o numero de digitos informados é igual a 11 
                if (strlen($cpf) != 11) {
                    return false;
                }
                // Verifica se nenhuma das sequências invalidas abaixo 
                // foi digitada. Caso afirmativo, retorna falso
                else if ($cpf == '00000000000' || 
                    $cpf == '11111111111' || 
                    $cpf == '22222222222' || 
                    $cpf == '33333333333' || 
                    $cpf == '44444444444' || 
                    $cpf == '55555555555' || 
                    $cpf == '66666666666' || 
                    $cpf == '77777777777' || 
                    $cpf == '88888888888' || 
                    $cpf == '99999999999') {
                    return false;
                 // Calcula os digitos verificadores para verificar se o
                 // CPF é válido
                 } else {   

                    for ($t = 9; $t < 11; $t++) {

                        for ($d = 0, $c = 0; $c < $t; $c++) {
                            $d += $cpf{$c} * (($t + 1) - $c);
                        }
                        $d = ((10 * $d) % 11) % 10;
                        if ($cpf{$c} != $d) {
                            return false;
                        }
                    }

                    return true;
                }
    }


?>
