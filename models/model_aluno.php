<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL); 

    include 'servico.php';
	$model_aluno = new model_aluno();

class model_aluno{
	
	static function alunos($id_user){
		$porcen_aluno = array();
			$sql = "SELECT alunos_id FROM alunos where usuarios_id = ? and alunos_del = 'N'";
			try{
                    $query = Database::selecionaObjeto($sql, $id_user);
                    $total = count($query);
					return $id_user;
                }
				
                catch(Exception $error){
                    die($error);
				}
	}
//------------------------------------------------------//
        static function turmas($turmas){
                $sql = "SELECT * FROM alunos_turma WHERE alunos_id = ? AND alunos_turma_del != 'S'";
                try{
                    $query = Database::selecionaObjeto($sql, $turmas);

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
                catch(Exception $error){
                    die ($error);
                }
        }
//------------------------------------------------------// 
		static function conteudos(){
            $sql = "SELECT * FROM conteudos WHERE conteudos_del = 'N' AND (SELECT COUNT(*) FROM slides WHERE slides.conteudos_id = conteudos.conteudos_id AND slides_del = 'N') > 0 LIMIT 4";
            try{
                $query = Database::selecionar($sql);
                if($query){
                    for($i = 0; $i<count($query); $i++){
                        $sql_conteudos = "SELECT * FROM conteudos WHERE conteudos_ordem = ? AND conteudos_del != 'S' ORDER BY conteudos_ordem";
                		$param = $query[$i]['conteudos_ordem'];
                        $result = Database::selecionaObjeto($sql_conteudos, $param);
                        if($result[0]){
                            $conteudos[$i] = Servico::objConteudos($result[0]);
                        }
                    }
                }

            }
            catch(Exception $error){
                die($error);
            }

            return $conteudos;
        }
//------------------------------------------------------//

//------------------------------------------------------//
		static function rank($id_user){
			$d = array();
			
			$sql =" select * from desempenhos a inner join alunos b on a.alunos_id = b.alunos_id where b.usuarios_id = ?
			and a.desempenhos_del='N' AND b.alunos_del='N'";
			try{
                $query = Database::selecionaObjeto($sql, $id_user);
                if($query){
                    for($i = 0; $i<count($query); $i++){
                        $sql_rank = "SELECT * FROM desempenhos WHERE desempenhos_del = 'N' and alunos_id = ?";
                		$param = $query[$i]['desempenhos_id'];
                        $result = Database::selecionaObjeto($sql_rank, $param);
                        if($result[0]){
                            $conteudos[$i] = Servico::objDesempenhos($result[0]);
                        }
                    }
                }

            }
            catch(Exception $error){
                die($error);
            }
		}//rank
//------------------------------------------------------// 		
		static function porcen($id_user){
			
			$sql_conteudos = "SELECT COUNT(*) FROM conteudos where conteudos_del = 'N'";
			try{
                    $query = Database::selecionar($sql_conteudos);
                    $total = $query[0];
					return $total;
                }
				
                catch(Exception $error){
                    die($error);
                }
		}//porcentagem
		
		static function porcen_aluno($id_user){
			$porcen_aluno = array();
			$sql = "SELECT conteudos_ordem FROM alunos where usuarios_id = ? and alunos_del = 'N'";
			try{
                    $query = Database::selecionaObjeto($sql, $id_user);
                    $total = count($query);
					return $total;
                }
				
                catch(Exception $error){
                    die($error);
                }
		}//porcentagem						
	}//class aluno




