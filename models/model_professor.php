<?php 
    include_once("suporte.php");
    include_once("servico.php");
    include_once("entidades.php");

    $Model_professor = new Model_professor();

    class Model_professor{
        static function teste(){
            session_start();
            $usuario = $_SESSION["login"];

            
        }
    }
?>