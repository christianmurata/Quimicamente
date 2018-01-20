<?php
    include_once("suporte.php");
    include_once("servico.php");
    
    session_start();

    class Model_login{
        static function login($loginParam){
            if(isset($_SESSION["login"]) == true){
                die (json_encode(array("error","errAlreadyLogged")));
            }
            else{
                try{
                    $sql = "SELECT * FROM usuarios WHERE usuarios_email = ? AND usuarios_senha = ? AND usuarios_del = 'N'";
                    $param = array($loginParam[0],md5($loginParam[1]));
                    $query = Database::selecionarParam($sql , $param);

                    if($query){
                        $query[0]["senha"] = "protectedCredential";
                        $usuario = Servico::objUsuarios($query[0]);
                        $_SESSION["login"] = $usuario;
                        die (json_encode(array("success",$usuario->getUsuarios_nivel())));
                    }

                    else{
                        //session_destroy();
                        die(json_encode(array("error","errInvalidCredentials")));
                    }
                }
                catch(Exception $e){
                    //session_destroy();
                    die($e);
                }
            }
        }
        
        static function logout(){
            if(isset($_SESSION["login"]) == true){
                unset($_SESSION["login"]);
            }
        }

    }
?>