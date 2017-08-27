<?php 
    include_once("suporte.php");
    include_once("servico.php");
    include_once("entidades.php");


    $Model_professor = new Model_professor();

    class Model_professor{
            function __construct(){
            }

            static function turmas($prof){
                $sql = "SELECT * FROM turmas WHERE professores_id = ? AND turma_del != 'S'";
                try{
                    $query = Database::selecionaObjeto($sql, $prof);

                    if($query){
                        for($i = 0; $i<count($query); $i++){
                            $sql_turmas = "SELECT * FROM turmas WHERE turmas_id = ?";
                            $param = $query[$i]['turmas_id'];
                            $result = Database::selecionaObjeto($sql_turmas, $param);
                            if($result[0]){
                                $turmas[$i] = Servico::objTurmas($result[0]);
                            }
                        }

                        return $turmas;

                    }
                    else{
                        return false;
                    }
                }
                catch(Exception $e){
                    echo $e;
                }
        }

        static function inserir_turmas($arrayTurmas){
            $novaTurma = Servico::objTurmas($arrayTurmas[0]);
            $sql = "INSERT INTO turmas(professores_id, turmas_nome, turma_del) VALUES(?, ?, 'N')";
            $param = array($novaTurma->getProfessores_id(),
                           $novaTurma->getTurmas_nome()
                           );
            try{
                Database::executarParam($sql, $param);
            }
            catch(Exception $e){
                die($e);
            }
        }

        static function excluir_turmas($turmas_id){
            $sql = "UPDATE turmas SET turma_del = ? WHERE turmas_id = ?";
            $param = array("S", $turmas_id);
            try{
                Database::executarParam($sql, $param);
            }
            catch(Exception $e){
                die ($e);
            }
        }
    }
?>