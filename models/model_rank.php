<?php
    include_once("suporte.php");
    include_once("entidades.php");
    include_once("servico.php");

    $Model_rank = new Model_rank();

    class Model_rank{
        static function desempenhos($dificuldade){
            $sql="SELECT * FROM desempenhos WHERE desempenhos_dificuldade = ? ORDER BY desempenhos_notafinal";
            try{
                $query = Database::selecionaObjeto($sql, $dificuldade);
                if($query){
                    for($i=0; $i<count($query); $i++){
                        $sql_rank = "SELECT * FROM desempenhos WHERE desempenhos_id = ?";
                        $param = $query[$i]['desempenhos_id'];
                        $result = Database::selecionaObjeto($sql_rank, $param);
                        if($result[0]){
                            $desempenhos[$i] = Servico::objDesempenhos($result[0]);
                        }

                    }
                    
                    return $desempenhos;
                }
            }	
            catch(Exception $e){
                die($e);
            }
        }
        static function usuarios($dificuldade){
            $sql="SELECT * FROM desempenhos WHERE desempenhos_dificuldade = ? ORDER BY desempenhos_notafinal";
            try{
                $query = Database::selecionaObjeto($sql, $dificuldade);
                if($query){
                    for($i = 0; $i<count($query); $i++){
                        $sql_usuarios = "SELECT * FROM usuarios WHERE usuarios_id = ?";
                        $param = $query[$i]['usuarios_id'];
                        $result = Database::selecionaObjeto($sql_usuarios, $param);
                        if($result[0]){
                            $usuarios[$i] = Servico::objUsuarios($result[0]);
                        } 
                    }

                    return $usuarios;
                }
            }
            catch(Exception $error){
                die($error);
            }
        }
    }
	
?>