<?php
include "servico.php";
class modelControleUsuario
{
    static function auth(){
        if(isset($_SESSION["login"])){
            try{
                if($_SESSION["login"]->getUsuarios_nivel() > 1){
                    return false;
                }
                return true;
            }catch(Exception $e){
                return false;
            }
        }else{
            return false;
        }
    }
    static function buscar_usuarios(){
        if(!auth){
            return array("error", "auth_failed");
        }
        $sql = "SELECT * FROM usuarios WHERE cast(usuarios_nivel as integer) > 1 ORDER BY usuarios_del";
        return Database::selecionar($sql);
    }

    static function ativa_user($usuarios_id){
        try{
            $sql = "SELECT * FROM usuarios WHERE usuarios_id = ? AND usuarios_del = 'S'";
            $param = array($usuarios_id);

            $stmt = Database::selecionarParam($sql, $param);

            if(count($stmt) < 1){
                return array("error", "user not found");
            }

            $user = Servico::objUsuarios($stmt[0]);

            $sql = "UPDATE usuarios SET usuarios_del = 'N' WHERE usuarios_id = ?";
            Database::executarParam($sql, $param);

            if($user->getUsuarios_nivel() == 3){
                $sql = "UPDATE alunos SET alunos_del = 'N' WHERE usuarios_id = ?";
                Database::executarParam($sql, $param);

            }else if ($user->getUsuarios_nivel() == 2){
                $sql = "UPDATE professores SET professores_del = 'N' WHERE usuarios_id = ?";
                Database::executarParam($sql, $param);

                //CONTEUDOS
                $sql = "UPDATE conteudos_comunidade SET conteudos_comunidade_del = 'N' WHERE professores_id = ? AND conteudos_comunidade_del = 'D' RETURNING *";
                $param = array($user->getProfessores()->getProfessores_id());

                $cont_del = Database::selecionarParam($sql, $param);

                $sql = "UPDATE slides_comunidade SET slides_comunidade_del = 'N' WHERE conteudos_comunidade_id = ? AND slides_comunidade_del = 'D'";
                $sql2 = "UPDATE perguntas_comunidade SET perguntas_comunidade_del = 'N' WHERE conteudos_comunidade_id = ? AND perguntas_comunidade_del = 'D' RETURNING *";
                $sql3 = "UPDATE respostas_comunidade SET respostas_comunidade_del = 'N' WHERE perguntas_comunidade_id = ? AND respostas_comunidade_del = 'D'";

                foreach ($cont_del as $value){
                    $param = array($value["conteudos_comunidade_id"]);
                    Database::executarParam($sql, $param);

                    $pergs_del = Database::selecionarParam($sql2, $param);

                    foreach ($pergs_del as $value2){
                        $param = array($value2["perguntas_comunidade_id"]);
                        Database::executarParam($sql3, $param);
                    }
                }
                //TURMAS
                $sql = "UPDATE turmas SET turmas_del = 'N' WHERE professores_id = ? RETURNING * AND turmas_del = 'D'";
                $param = array($user->getProfessores()->getProfessores_id);

                $turmas = Database::selecionarParam($sql, $param);

                //CONTEUDOS
                $sql2 = "UPDATE conteudos_comunidade_liberados SET conteudos_comunidade_liberados_del = 'N' WHERE turmas_id = ? AND conteudos_comunidade_liberados_del = 'D'";
                $sql3 = "UPDATE conteudos_liberados SET conteudos_liberados_del = 'N' WHERE turmas_id = ? AND conteudos_liberados_del = 'D'";

                $sql4 = "UPDATE provas SET provas_del = 'N' WHERE turmas_id = ? AND provas_del = 'D' RETURNING *";
                $sql5 = "UPDATE respostas_prova SET respostas_prova_del = 'N' WHERE provas_id = ? AND respostas_prova_del = 'D'";
                $sql6 = "UPDATE questoes_provas SET questoes_provas_del = 'N' WHERE provas_id = ? AND questoes_provas_del = 'D'";

                foreach ($turmas as $value){
                    Database::executarParam($sql2, $param);
                    Database::executarParam($sql3, $param);

                    $provas = Database::selecionarParam($sql4, $param);

                    foreach ($provas as $value2){
                        $param2 = array($value2["provas_id"]);

                        Database::executarParam($sql5, $param2);
                        Database::executarParam($sql6, $param2);
                    }

                }
            }
            return array("success", "operation completed");
        }catch (Exception $e){
            return array("error", $e);
        }
    }

    static function desativa_user($usuarios_id){
        try{
            $sql = "SELECT * FROM usuarios WHERE usuarios_id = ? AND usuarios_del = 'N'";
            $param = array($usuarios_id);

            $stmt = Database::selecionarParam($sql, $param);

            if(count($stmt) < 1){
                return array("error", "user not found");
            }

            $user = Servico::objUsuarios($stmt[0]);

            $sql = "UPDATE usuarios SET usuarios_del = 'S' WHERE usuarios_id = ?";
            Database::executarParam($sql, $param);

            if($user->getUsuarios_nivel() == 3){
                $sql = "UPDATE alunos SET alunos_del = 'S' WHERE usuarios_id = ?";
                Database::executarParam($sql, $param);

                $sql = "UPDATE alunos_turma SET alunos_turma_del = 'D' WHERE alunos_id = ? AND alunos_turma_del = 'N'";
                $param = array($user->getAlunos()->getAlunos_id());
                Database::executarParam($sql, $param);

                $sql = "UPDATE desempenhos SET desempenhos_del = 'D' WHERE alunos_id = ?";
                Database::executarParam($sql, $param);

                $sql = "UPDATE questoes_provas SET questoes_provas_del = 'S' WHERE alunos_id = ? AND questoes_provas_del = 'N'";
                Database::executarParam($sql, $param);
            }else if ($user->getUsuarios_nivel() == 2){
                $sql = "UPDATE professores SET professores_del = 'S' WHERE usuarios_id = ?";
                Database::executarParam($sql, $param);

                //CONTEUDOS
                $sql = "UPDATE conteudos_comunidade SET conteudos_comunidade_del = 'D' WHERE professores_id = ? AND conteudos_comunidade_del = 'N' RETURNING *";
                $param = array($user->getProfessores()->getProfessores_id());

                $cont_del = Database::selecionarParam($sql, $param);

                $sql = "UPDATE slides_comunidade SET slides_comunidade_del = 'D' WHERE conteudos_comunidade_id = ? AND slides_comunidade_del = 'N'";
                $sql2 = "UPDATE perguntas_comunidade SET perguntas_comunidade_del = 'D' WHERE conteudos_comunidade_id = ? AND perguntas_comunidade_del = 'N' RETURNING *";
                $sql3 = "UPDATE respostas_comunidade SET respostas_comunidade_del = 'D' WHERE perguntas_comunidade_id = ? AND respostas_comunidade_del = 'N'";

                foreach ($cont_del as $value){
                    $param = array($value["conteudos_comunidade_id"]);
                    Database::executarParam($sql, $param);

                    $pergs_del = Database::selecionarParam($sql2, $param);

                    foreach ($pergs_del as $value2){
                        $param = array($value2["perguntas_comunidade_id"]);
                        Database::executarParam($sql3, $param);
                    }
                }
                //TURMAS
                $sql = "UPDATE turmas SET turmas_del = 'D' WHERE professores_id = ? RETURNING *";
                $param = array($user->getProfessores()->getProfessores_id);

                $turmas = Database::selecionarParam($sql, $param);

                //CONTEUDOS
                $sql1  ="UPDATE alunos_turma SET alunos_turma_del = 'D' WHERE turmas_id = ? AND alunos_turma_del = 'N'";
                $sql2 = "UPDATE conteudos_comunidade_liberados SET conteudos_comunidade_liberados_del = 'D' WHERE turmas_id = ? AND conteudos_comunidade_liberados_del = 'N'";
                $sql3 = "UPDATE conteudos_liberados SET conteudos_liberados_del = 'D' WHERE turmas_id = ? AND conteudos_liberados_del = 'N'";

                $sql4 = "UPDATE provas SET provas_del = 'S' WHERE turmas_id = ? AND provas_del = 'N' RETURNING *";
                $sql5 = "UPDATE respostas_prova SET respostas_prova_del = 'D' WHERE provas_id = ? AND respostas_prova_del = 'N'";
                $sql6 = "UPDATE questoes_provas SET questoes_provas_del = 'D' WHERE provas_id = ? AND questoes_provas_del = 'N'";

                foreach ($turmas as $value){
                    Database::executarParam($sql1, $param);
                    Database::executarParam($sql2, $param);
                    Database::executarParam($sql3, $param);

                    $provas = Database::selecionarParam($sql4, $param);

                    foreach ($provas as $value2){
                        $param2 = array($value2["provas_id"]);

                        Database::executarParam($sql5, $param2);
                        Database::executarParam($sql6, $param2);
                    }

                }
            }
            return array("success", "operation completed");
        }catch (Exception $e){
            return array("error", $e);
        }
    }
}
