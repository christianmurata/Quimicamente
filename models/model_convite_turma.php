<?php
    include "servico.php";
    session_start();
    class modelConviteTurma{
        static function validar($id){
            $sql = "SELECT * FROM turmas WHERE md5(CAST(turmas_id AS VARCHAR)) = ? AND turmas_del = 'N'";
            $param = array($id);
            $turma = Database::selecionarParam($sql,$param);

            if(!$turma){
                return array('error' => 'notFound');
            }
            $sql = "SELECT alunos_turma.turmas_id, alunos_turma.alunos_id FROM alunos_turma INNER JOIN alunos ON (alunos_turma.alunos_id = alunos.alunos_id) WHERE usuarios_id = ? AND alunos_turma_del = 'N'";
            $param = array($_SESSION["login"]->getUsuarios_id());

            $stmt = Database::selecionarParam($sql, $param);
            
            //print_r($turma);
            
            if($stmt){
                return array('error' => 'alreadyInClass');
            }
            
            else{
                return array('error' => 'none', 'turmas_nome' => $turma[0]["turmas_nome"]);
            }
        }

        static function confirmar($id){
            $sql = "SELECT turmas_nome,turmas_id FROM turmas WHERE md5(CAST(turmas_id AS VARCHAR)) = ? AND turmas_del = 'N'";
            $param = array($id);

            $turma = Database::selecionarParam($sql,$param);

            if(!$turma){
                return array('error' => 'notFound');
            }

            $sql = "SELECT alunos_turma.turmas_id, alunos_turma.alunos_id FROM alunos_turma INNER JOIN alunos ON (alunos_turma.alunos_id = alunos.alunos_id) WHERE usuarios_id = ? AND alunos_turma_del = 'N'";
            $param = array($_SESSION["login"]->getUsuarios_id());

            $stmt = Database::selecionarParam($sql, $param);
            if($stmt){
                if($stmt[0]["alunos_del"] == 'N')
                    return array('error' => 'alreadyInClass');
                else{

                    $sql = "UPDATE alunos_turma SET turmas_id = ?, alunos_turma_del = 'N' WHERE alunos_id = ? RETURNING alunos_id";
                    $param = array($turma[0]["turmas_id"], $stmt[0]["alunos_id"]);

                    $updt = Database::selecionarParam($sql, $param);

                    if($updt){
                        return "success";
                    }
                }
            }
            else {
                $sql = "INSERT INTO alunos_turma VALUES (DEFAULT, ?, ?, 'N')";
                $param = array($_SESSION["login"]->getAlunos()->getAlunos_id(), $turma[0]["turmas_id"]);

                if(Database::selecionarParam($sql, $param)){
                    return "success";
                }
            }
        }
    }
?>