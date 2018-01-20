<?php 
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);
	
	include("../models/servico.php");
	$model_aluno = new model_aluno();
	
	class model_aluno{
		static function alunos($id_user){
			$sql = "SELECT alunos_id FROM alunos WHERE usuarios_id = ? and alunos_del='N'";
			try{
				$query=Database::selecionaObjeto($sql, $id_user);
				$total = count($query);
				return $total;
			} catch(Exception $error){ die($error); }
		}//alunos
		//------------------------------------------------------//
        static function turmas($turmas){
                $sql = "SELECT * FROM alunos_turma WHERE alunos_id = ? AND alunos_turma_del = 'N'";
                try{
                    $query = Database::selecionaObjeto($sql, $turmas);
                    if($query){
                        for($i = 0; $i<count($query); $i++){
                            $sql_turmas = "SELECT * FROM turmas WHERE turmas_id = ?";
                            $param = $query[$i]['turmas_id'];
                            $result = Database::selecionaObjeto($sql_turmas, $param);
                            if($result[0]){
                                $turmas = Servico::objTurmas($result[0]);
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
	//-------------------------------------------------------------------//	
		
		static function turmas_prof($id_prof){
                $sql = "SELECT * FROM usuarios where usuarios_nivel = '2' and usuarios_del = 'N'";
				try{
                $query = Database::selecionar($sql);
                if($query){
                    for($i = 0; $i<count($query); $i++){
                        $sql_prof = "SELECT * FROM usuarios WHERE usuarios_id = ? and usuarios_nivel = '2' AND usuarios_del = 'N'";
                		$param = $query[$i]['usuarios_id'];
                        $result = Database::selecionaObjeto($sql_prof, $param);
                        if($result[0]){
                            $professor = Servico::objUsuarios($result[0]);
                        }
                    }
					return $professor;
                }
				else{
					return false;
				}
            }
            catch(Exception $error){
                die($error);
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
		
			//$sql ="SELECT * FROM desempenhos WHERE alunos_id = ? and desempenhos_del = 'N'";
			$sql ="SELECT desempenhos.desempenhos_notafinal, desempenhos_dificuldade 
			       FROM desempenhos inner join alunos on desempenhos.alunos_id = alunos.alunos_id 
			       WHERE alunos.alunos_id = ? and desempenhos.desempenhos_del = 'N' and alunos.alunos_del = 'N'";
			try{
				    $query = Database::selecionaObjeto($sql, $id_user);										
					$erro = array();
					$t = array();
					$tt = array();
					if($query){
						for($i = 0; $i<1; $i++){
							$t[$i]  = $query[$i]['desempenhos_notafinal'];
							//$tt[$i] = $query[$i]['alunos_id'];
						}
						//return array($t, $tt); 
						return array($t);
						
					}
					else{
						return false;
					}
            }
            catch(Exception $error){
                die($error);
            }
			
		}//rank
//------------------------------------------------------// 		
		static function porcen($id_user){
			
			$sql_conteudos = "SELECT COUNT(conteudos_id) FROM conteudos where conteudos_del = 'N'";
			try{
                    $query = Database::selecionar($sql_conteudos);
                    $total = count($query);
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
	
	}//class model_aluno
?>