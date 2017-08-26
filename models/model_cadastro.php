<?php 
    include_once("suporte.php");
    include_once("servico.php");
    include_once("entidades.php");

    $Model_cadastro = new Model_cadastro();

    class Model_cadastro{
        static function cadastro($arrayUser){
            $newUser = Servico::objUsuarios($arrayUser[0]);
            $senhaMD5 = md5($newUser->getUsuarios_senha());
            $newUser->setUsuarios_senha($senhaMD5);
            
            if($newUser->getUsuarios_nivel() == 2){
                $prof = Servico::objProfessores($arrayUser[1]);
                $sql = "INSERT INTO usuarios (usuarios_nome, usuarios_email, usuarios_senha, usuarios_nivel, usuarios_datanasc, usuarios_foto, usuarios_del) VALUES (?, ?, ?, ?, ?, ?, 'N');";
                $param = array($newUser->getUsuarios_nome(), 
                               $newUser->getUsuarios_email(),
                               $newUser->getUsuarios_senha(),
                               $newUser->getUsuarios_nivel(),
                               $newUser->getUsuarios_datanasc(),
                               $newUser->getUsuarios_foto()
                               );
                try{
                    Database::executarParam($sql, $param);
                }

                catch(Exception $e){
                    die("Erro: ". $e->getMessage);
                }
                
                $sql = "INSERT INTO professores (usuarios_id, professores_cpf, professores_del) VALUES ((SELECT usuarios_id FROM usuarios ORDER BY usuarios_id DESC LIMIT 1), ?, 'N');";
                $param = array($prof->getProfessores_cpf());
                
                try{
                    Database::executarParam($sql, $param);
                }

                catch(Exception $e){
                    die("Erro: ". $e->getMessage);
                }
            }
            //preencher objeto aluno e montar SQL
            if($newUser->getUsuarios_nivel() == 3){
                $sql = "INSERT INTO usuarios (usuarios_nome, usuarios_email, usuarios_senha, usuarios_nivel, usuarios_datanasc, usuarios_foto, usuarios_del) VALUES (?, ?, ?, ?, ?, ?, 'N');";
                $param = array($newUser->getUsuarios_nome(), 
                               $newUser->getUsuarios_email(),
                               $newUser->getUsuarios_senha(),
                               $newUser->getUsuarios_nivel(),
                               $newUser->getUsuarios_datanasc(),
                               $newUser->getUsuarios_foto()
                               );
                try{
                    Database::executarParam($sql, $param);
                }
                catch(Exception $e){
                    die("Erro: ". $e->getMessage);
                }

                $sql = "INSERT INTO alunos(usuarios_id, turmas_id, conteudos_id, alunos_del) VALUES ((SELECT usuarios_id FROM usuarios ORDER BY usuarios_id DESC LIMIT 1), '1', '1', 'N');";
                
                try{
                    Database::executar($sql);
                }
                catch(Exception $e){
                    die($e);
                }
            }
        }
    }    
?>