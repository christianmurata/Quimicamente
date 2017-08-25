<?php
    include_once("suporte.php");
    include_once("servico.php");
    include_once("entidades.php");

    $Model_login = new Model_login();
    
     session_start();

    class Model_login{
        static function login($loginParam){
            if(isset($_SESSION["login"]) == true){
                die ("errAlreadyLogged");
            }
            else{
                try{
                    $sql = "SELECT * FROM usuarios WHERE usuarios_email = ? AND usuarios_senha = ?";
                    $param = array($loginParam[0],md5($loginParam[1]));
                    $query = Database::selecionarParam($sql , $param);

                    if($query){
                        $query[0]["senha"] = "protectedCredential";
                        $_SESSION["login"] = Servico::objUsuarios($query[0]);
                        //die ("logged");
                    }

                    else{
                        session_destroy();
                        die("errInvalidCredentials");
                    }
                }
                catch(Exception $e){
                    session_destroy();
                    die("errExceptionThrow");
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