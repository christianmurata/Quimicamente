<?php
	include_once("servico.php");
	include_once("entidades.php");
	include_once("suporte.php");

	$Sala_model = new Sala_model();

	class Sala_model{
		static function selecionarConteudosLiberadosAluno($cont){
            $sql = "SELECT * FROM conteudos_liberados WHERE turmas_id = ? AND upper(conteudos_liberados_del) = 'N'";
            try{
                $query = Database::selecionaObjeto($sql,$cont);
                if($query){
                	for($i = 0; $i < count($query); $i++){
                		$sql1 = "SELECT * FROM conteudos WHERE conteudos_id = ? AND upper(conteudos_del) = 'N'";
                		$param = $query[$i]['conteudos_id'];
                		$result = Database::selecionaObjeto($sql1, $param);
                		if($result){
                			$conteudos[$i] = Servico::objConteudos($result[0]);
                		} 
                	}
                	return $conteudos;
                }else{
                    return false;
                }
            }catch(Exception $e){
                die("Erro: ". $e);
            }   
        }

        static function selecionarConteudosComunidadeLiberadosAluno($cont){
            $sql = "SELECT * FROM conteudos_comunidade_liberados WHERE turmas_id = ? AND upper(conteudos_comunidade_liberados_del) = 'N'";
            try{
                $query = Database::selecionaObjeto($sql,$cont);
                if($query){
                    for($i = 0; $i < count($query); $i++){
                        $sql1 = "SELECT * FROM conteudos_comunidade WHERE conteudos_comunidade_id = ? AND upper(conteudos_comunidade_del) = 'N'";
                        $param = $query[$i]['conteudos_comunidade_id'];
                        $result = Database::selecionaObjeto($sql1, $param);
                        if($result){
                            $conteudos[$i] = Servico::objConteudos_comunidade($result[0]);
                        } 
                    }
                    return $conteudos;
                }else{
                    return false;
                }
            }catch(Exception $e){
                die("Erro: ". $e);
            }   
        }

        static function selecionarTurmaAluno($id){
            $sql = "SELECT t.turmas_id, t.professores_id, t.turmas_nome, t.turmas_del 
                    FROM turmas AS t
                    INNER JOIN alunos_turma AS at ON at.turmas_id = t.turmas_id
                    WHERE at.alunos_id = ?
                    AND upper(at.alunos_turma_del) = 'N'";
            try{
                $query = Database::selecionarParam($sql,array($id));
                if($query){
                    return Servico::objTurmas($query[0]);
                }else{
                    return false;
                }
            }catch(Exception $e){
                die($e);
            }

        }

        static function selecionarAlunosTurma($cont){
        	$sql = "SELECT * FROM alunos AS a 
                    INNER JOIN alunos_turma AS at
                    ON a.alunos_id = at.alunos_id
                    WHERE at.turmas_id = ? AND upper(at.alunos_turma_del) = 'N'";
            
            try{
                $query = Database::selecionaObjeto($sql,$cont);
                if($query){
                    $sql1 = "SELECT * FROM usuarios WHERE usuarios_id = ? AND upper(usuarios_del) = 'N'";
                    for($i = 0; $i < count($query); $i++){
                		$param = $query[$i]["usuarios_id"];
                		$result = Database::selecionaObjeto($sql1, $param);
                        $usuarios[$i] = Servico::objUsuarios($result[0]);
                	}
                    if($usuarios){
                        return $usuarios;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }catch(Exception $e){
                die("Erro: ". $e);
            }
            
        }

        static function selecionarTurma($turma){
        	$sql = "SELECT * FROM turmas WHERE turmas_id = ? AND upper(turmas_del) = 'N'";
            try{
                $query = Database::selecionaObjeto($sql,$turma);
                if($query){
                	$turma = Servico::objTurmas($query[0]);
                	return $turma;
                }else{
                    return false;
                }
                
            }catch(Exception $e){
                die("Erro: ". $e);
            }	
        }

        static function selecionarProvas($id){
            $sql = "SELECT * FROM provas WHERE turmas_id = ? AND upper(provas_del) = 'N'";
            try{
                $query = Database::selecionaObjeto($sql,$id);
            
                if($query){
                    for($i = 0; $i < count($query); $i++){
                            $provas[$i] = Servico::objProvas($query[$i]);
                    }
                    return $provas;
                }else{
                    return false;
                }
            }catch(Exception $e){
                die("Erro: ". $e);
            }
        }

        static function sairTurma($id){
            $sql = "UPDATE alunos_turma SET alunos_turma_del = 'S' WHERE alunos_id = ?";
            try{
                $param = array($id);
                return $query = Database::executarParam($sql,$param);
            }catch(Exception $e){
                die("Erro: ". $e);
            }
        }

        public static function verificarProva($provas_id, $alunos_id){
            $sql = "SELECT * FROM respostas_prova 
                    WHERE provas_id = ? 
                    AND alunos_id = ? 
                    AND upper(respostas_prova_del) = 'N'";
            try{
                $parametros = array($provas_id, $alunos_id);
                $query = Database::selecionarParam($sql, $parametros);

                if($query){
                    return Servico::objRespostas_prova($query[0]);
                }
            }catch(Exception $e){
                die($e);
            }
            return false;
        }


	}