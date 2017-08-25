<?php 
    include_once("suporte.php");
    include_once("servico.php");
    include_once("entidades.php");

    $Model_professor = new Model_professor();

    class Model_professor{
        static function teste(){
            session_start();
            $usuario = $_SESSION["login"];

            $sql = "SELECT * FROM professores WHERE usuarios_id = ?";
            $param = array($usuario->getUsuarios_id());
            $query = Database::selecionarParam($sql, $param);
            if($query){
                $professor = Servico::objProfessores($query[0]);
                echo $professor->getProfessores_cpf();
            }
            else{
                echo "Não é professor";
            }
        }
    }
?>