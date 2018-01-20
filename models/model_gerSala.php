<?php
    include "servico.php";

    class ModelGerSala{

        static function check_login($id){
            if(!isset($_SESSION["login"])){
                return array("error", "SESSION_EXPIRED");
            }

            if($_SESSION["login"]->getUsuarios_nivel() > 2){
                return array("error", "denied");
            }
            return self::verifyTurma($id);
        }

        static function verifyTurma($id){
            $sql = "SELECT * FROM turmas WHERE turmas_id = ? AND professores_id = ? AND turmas_del = 'N'";
            $param = array($id, $_SESSION["login"]->getProfessores()->getProfessores_id());

            $stmt = Database::selecionarParam($sql, $param);
            $salas = $stmt[0];

            if(count($stmt) < 1)   die(array("error", "turma not found"));
            return array("success" => $salas);
        }

        function make_bitly_url($url,$format = 'xml',$version = '2.0.1')
        {
            //Set up account info

            $bitly_login = 'quarkz';
            $bitly_api = 'R_e9791603b3284ff0971d1d5a40bf66a6';
            //create the URL
            $bitly = 'http://api.bit.ly/shorten?version='.$version.'&longUrl='.urlencode($url).'&login='.$bitly_login.'&apiKey='.$bitly_api.'&format='.$format;
            $xml = simplexml_load_file($bitly) -> results;
            foreach($xml -> nodeKeyVal as $nodeKeyVal) {
                return (string)$nodeKeyVal -> shortUrl;
            }
        }

        static function carregarSala($id){
            $check = self::check_login($id);
            if($check[0] == "error")
                return $check;

            $salas = $check["success"];

            try{
                $convite_sala = ModelGerSala::make_bitly_url("http://200.145.153.172/quarkz/Quimicamente/paginas/convite_turma.php?id=".md5($id));
                
                $sala = Servico::objTurmas($salas);
                $sql = "SELECT alunos.alunos_id, usuarios.usuarios_id, usuarios.usuarios_nome, alunos_turma.turmas_id, 
                                (SELECT COUNT(*) FROM provas WHERE turmas_id = ? AND provas_del = 'N') AS media_geral2,
                                (SELECT SUM(respostas_prova_media) FROM respostas_prova WHERE respostas_prova_del = 'N' AND respostas_prova.alunos_id = alunos.alunos_id) AS media_geral1

                                FROM alunos_turma INNER JOIN alunos ON (alunos_turma.alunos_id = alunos.alunos_id) 
                                INNER JOIN usuarios ON (alunos.usuarios_id = usuarios.usuarios_id) WHERE alunos_turma.turmas_id = ? 
                                AND alunos_turma.alunos_turma_del = 'N' ORDER BY usuarios_nome;";

                $param = array($sala->getTurmas_id(),$sala->getTurmas_id());
                $alunos = Database::selecionarParam($sql, $param);


                $sql = "SELECT * FROM provas WHERE professores_id = ? AND turmas_id = ? AND provas_del = 'N' ORDER BY provas_id;";
                $param = array($_SESSION["login"]->getProfessores()->getProfessores_id(),$id);/**/
                $provas = Database::selecionarParam($sql, $param);

                $sql = "SELECT usuarios.usuarios_id, alunos.alunos_id, usuarios_nome, respostas_prova_id, respostas_prova_media, provas.provas_id, provas_desc, provas.provas_data
                          FROM respostas_prova
                          INNER JOIN provas ON (respostas_prova.provas_id = provas.provas_id)
                          INNER JOIN alunos ON (respostas_prova.alunos_id = alunos.alunos_id)
                          INNER JOIN usuarios ON (alunos.usuarios_id = usuarios.usuarios_id)
                        
                        WHERE provas.turmas_id = ? AND provas.provas_del = 'N'
                        AND respostas_prova_del = 'N' 
                        ORDER BY provas.provas_id ,usuarios.usuarios_nome;";

                $param = array($id);

                $stmt = Database::selecionarParam($sql, $param);

                $respostas_prova = array();
                $tmp = array();

                if(count($stmt) > 0){
                    $pAnt = $stmt[0]["provas_id"];

                    foreach($stmt as $value){
                        if($value["provas_id"] != $pAnt){
                            array_push($respostas_prova, $tmp);
                            $pAnt = $value["provas_id"];
                            $tmp = array();
                        }
                        array_push($tmp,$value);
                    }
                    array_push($respostas_prova, $tmp);
                }

                return array($convite_sala, $salas, $alunos, $provas, $respostas_prova);       
            }
            
            catch(Exception $e){
                return array("error" => $e->getMessage());
            }  
        }

        static function removerAlunos($res){
            $check = self::check_login($res["turma"]);
            if($check[0] == "error")    return $check;

            $pre_param = array($check["success"]["turmas_id"]);
            try{
                $sql = "UPDATE alunos_turma SET alunos_turma_del = 'S' WHERE turmas_id = ? AND alunos_id = ? AND alunos_turma_del = 'N'";
                $sql2 = "UPDATE respostas_prova SET respostas_prova_del = 'S' WHERE alunos_id = ?";
                foreach($res["idUsuarios"] as $value){
                    $param = $pre_param;
                    array_push($param, $value);
                    Database::executarParam($sql, $param);
                    Database::executarParam($sql2, array($value));
                }
                return array("success"=> "operation completed");
            }catch(Exception $e){
                return array("error" => $e->getMessage());
            }
        }

        static function carregarQuestoesProva($id){
            $check = self::check_login($id);
            if($check[0] == "error")    return $check;

            $sql = "SELECT conteudos_comunidade.conteudos_comunidade_id,
            conteudos_comunidade_nome, perguntas_comunidade_id, 
            conteudos_comunidade_ordem,
            perguntas_comunidade_descricao
             FROM conteudos_comunidade 
             INNER JOIN perguntas_comunidade 
              ON (conteudos_comunidade.conteudos_comunidade_id = perguntas_comunidade.conteudos_comunidade_id) 
             WHERE (SELECT COUNT(*) FROM perguntas_comunidade 
                WHERE conteudos_comunidade_id = conteudos_comunidade.conteudos_comunidade_id 
             AND perguntas_comunidade_del = 'N') > 0 
             AND conteudos_comunidade_del = 'N' 
             AND conteudos_comunidade.professores_id = ?
             ORDER BY conteudos_comunidade_ordem";

            $stmt = Database::selecionarParam($sql, array($_SESSION["login"]->getProfessores()->getProfessores_id()));

            $modulos = array();

            $final = array();

            $ant = 1;       //ordem do módulo anterior

            foreach($stmt as $value){
                if($value["conteudos_comunidade_ordem"] != $ant){
                    $ant++;
                    array_push($final,$modulos);
                    $modulos = array();
                }

                array_push($modulos,$value);
            }
            array_push($final,$modulos);

            return $final;
        }

        static function novaProva($data){
            $check = self::check_login($data["turma"]);
            if($check[0] == "error")    return $check;

            $id = $data["turma"];
            $questoes = $data["questoes"];
            $desc = $data["descricao"];

            $sql = "INSERT INTO provas (professores_id, turmas_id, provas_data, provas_desc, provas_del) VALUES (?,?,?,?,'N') RETURNING provas_id";

            $param = array($_SESSION["login"]->getProfessores()->getProfessores_id(),$id, date("Y-m-d"), $desc);
            $prova_id = Database::selecionarParam($sql,$param);

            $prova_id = $prova_id[0]["provas_id"];

            try{
                $sql = "INSERT INTO questoes_provas VALUES (DEFAULT, ?,?,'N')";
                foreach($questoes as $value){
                    $param = array($prova_id, $value);
                    Database::executarParam($sql, $param);
                }
                return array("success"=> "operation completed");
            }catch(Exception $e){
                return array("error" => $e->getMessage());
            }
        }

        static function carregarModulosOficiais($id){
            $check = self::check_login($id);
            if($check[0] == "error")    return $check;

            $sql = "SELECT * FROM conteudos WHERE (SELECT COUNT(*) FROM slides WHERE slides.conteudos_id = conteudos.conteudos_id AND slides_del = 'N') > 0 AND conteudos.conteudos_del = 'N' ORDER BY conteudos_ordem";
            $sql2 = "SELECT conteudos.conteudos_id FROM conteudos_liberados INNER JOIN conteudos ON (conteudos.conteudos_id = conteudos_liberados.conteudos_id) WHERE turmas_id = ? AND conteudos_liberados.conteudos_liberados_del = 'N' ORDER BY conteudos_ordem";

            $param = array($id);

            try{
                $conts = Database::selecionar($sql);
                $libs = Database::selecionarParam($sql2, $param);

                return array($conts,$libs);
            }
            catch(Exception $e){
                return array("error",$e->getMessage());
            }

        }

        static function carregarModulosComunidade($id){
            $check = self::check_login($id);
            if($check[0] == "error")    return $check;

            $sql = "SELECT * FROM conteudos_comunidade WHERE (SELECT COUNT(*) FROM slides_comunidade 
                    WHERE slides_comunidade.conteudos_comunidade_id = conteudos_comunidade.conteudos_comunidade_id 
                    AND slides_comunidade_del = 'N') > 0 AND conteudos_comunidade.conteudos_comunidade_del = 'N'
                     AND conteudos_comunidade.professores_id = ?  ORDER BY conteudos_comunidade_ordem";

            $sql2 = "SELECT conteudos_comunidade.conteudos_comunidade_id FROM conteudos_comunidade_liberados 
                            INNER JOIN conteudos_comunidade ON (conteudos_comunidade.conteudos_comunidade_id = conteudos_comunidade_liberados.conteudos_comunidade_id)
                             WHERE turmas_id = ? 
                             AND conteudos_comunidade_liberados.conteudos_comunidade_liberados_del = 'N' 
                             AND conteudos_comunidade.professores_id = ? 
                             ORDER BY conteudos_comunidade_ordem";

            $param = array($id, $_SESSION["login"]->getProfessores()->getProfessores_id());

            try{
                $conts = Database::selecionarParam($sql, array($_SESSION["login"]->getProfessores()->getProfessores_id()));
                $libs = Database::selecionarParam($sql2, $param);

                return array($conts,$libs);
            }
            catch(Exception $e){
                return array("error",$e->getMessage());
            }
        }

        static function liberarOficiais($data)
        {
            $check = self::check_login($data["turmas"]);
            if ($check[0] == "error") return $check;

            $conteudos = $data["conteudos"];
            $linhas = count($conteudos);


            try {
                $sql = "UPDATE conteudos_liberados SET conteudos_liberados_del = 'S' WHERE turmas_id = ?";
                $param = array($data["turmas"]);
                Database::executarParam($sql, $param);

                if ($linhas < 1) return array("success","operation completed");     //SOMENTE BLOQUEAR TUDO

                if (count($conteudos) > 3)
                    $linhas = 3;

                $sql = "INSERT INTO conteudos_liberados VALUES (DEFAULT,?,?,?,'N')";

                for ($i = 0; $i < $linhas; $i++) {
                    $param = array($conteudos[$i], $data["turmas"], $_SESSION["login"]->getProfessores()->getProfessores_id());
                    Database::executarParam($sql, $param);
                }
                return array("success", "just deleted");
            } catch (Exception $e) {
                return array("error", $e->getMessage());
            }
        }

        static function liberarComunidade($data){
            $check = self::check_login($data["turmas"]);
            if ($check[0] == "error") return $check;

            $conteudos_comunidade = $data["conteudos"];
            $linhas = count($conteudos_comunidade);

            try{
                $sql = "UPDATE conteudos_comunidade_liberados SET conteudos_comunidade_liberados_del = 'S' WHERE turmas_id = ?";
                $param = array($data["turmas"]);
                Database::executarParam($sql,$param);

                if($linhas < 1)     return array("success","just deleted");     //SOMENTE BLOQUEAR TUDO

                if(count($conteudos_comunidade) > 3)
                    $linhas = 3;

                $sql = "INSERT INTO conteudos_comunidade_liberados VALUES (DEFAULT,?,?,?,'N')";

                for($i = 0; $i < $linhas;$i++){
                    $param = array($conteudos_comunidade[$i],$data["turmas"],$_SESSION["login"]->getProfessores()->getProfessores_id());
                 //   print_r($param);
                //    echo "<br>";
                    Database::executarParam($sql,$param);
                }
                return array("success","operation completed");
            }catch (Exception $e){
                return array("error", $e->getMessage());
            }
        }

        static function gerenciarProvas($id){
            $check = self::check_login($id);
            if($check[0] == "error")    return $check;

            try{
                $sql = "SELECT * FROM provas WHERE turmas_id = ? AND provas_del = 'N'";
                $param = array($id);

                return Database::selecionarParam($sql, $param);
            }catch (Exception $e){
                return array("error",$e->getMessage());
            }
        }

        static function delProva($data){
            $check = self::check_login($data["turmas"]);
            if ($check[0] == "error") return $check;

            $provas_id = $data["provas_id"];

            try{
                $sql = "UPDATE provas SET provas_del = 'S' WHERE provas_id = ? AND turmas_id = ?";
                $param = array($provas_id, $data["turmas"]);
                Database::executarParam($sql, $param);

                $sql = "UPDATE respostas_prova SET respostas_prova_del = 'S' WHERE provas_id = ?";
                $param = array($provas_id);
                Database::executarParam($sql, $param);

                return array("successs", "operation completed");
            }catch (Exception $e){
                return array("error",$e->getMessage());
            }
        }


    }
