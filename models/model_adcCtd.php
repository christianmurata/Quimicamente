<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
    include "servico.php";

    class ModelAdcCtd
    {
        static function carregarModulosInsercao()
        {
            $nvl = $_SESSION["login"]->getUsuarios_nivel();
            if ($nvl == 1) {
                try {
                    $sql = "SELECT * FROM conteudos WHERE conteudos_del = 'N' ORDER BY conteudos_ordem";
                    $stmt = Database::selecionar($sql);
                    $sql = "SELECT conteudos_comunidade_nome, conteudos_comunidade_id, conteudos_comunidade_ordem, usuarios.usuarios_nome FROM conteudos_comunidade INNER JOIN professores ON (conteudos_comunidade.professores_id = professores.professores_id) INNER JOIN usuarios ON (professores.usuarios_id = usuarios.usuarios_id) WHERE conteudos_comunidade_del = 'N' ORDER BY usuarios_nome,conteudos_comunidade_id  ";
                    return array($stmt, Database::selecionar($sql));

                } catch (Exception $e) {
                    throw new Exception($e);
                }
            } else {
                $sql = "SELECT * FROM conteudos_comunidade WHERE conteudos_comunidade_del = 'N' AND professores_id = ? ORDER BY conteudos_comunidade_ordem";
                $param = array($_SESSION["login"]->getProfessores()->getProfessores_id());/**/
                return array(null, Database::selecionarParam($sql, $param));
            }
        }

        static function novoModulo($novo)
        {
            $nvl = $_SESSION["login"]->getUsuarios_nivel();
            $novo["conteudos_ordem"];
            try {

                if ($nvl == 2) {
                    $sql = "UPDATE conteudos_comunidade SET conteudos_comunidade_ordem = conteudos_comunidade_ordem+1 WHERE conteudos_comunidade_ordem >= ? AND professores_id = ?";
                    $param = array($novo["conteudos_ordem"],$_SESSION["login"]->getProfessores()->getProfessores_id());
                    Database::executarParam($sql, $param);

                    $sql = "INSERT INTO conteudos_comunidade (conteudos_comunidade_nome,professores_id,conteudos_comunidade_descricao,conteudos_comunidade_ordem, conteudos_comunidade_imagem, conteudos_comunidade_del)VALUES(?,?,?,?,?,'N') RETURNING conteudos_comunidade_id";
                    $param2 = array($novo["conteudos_nome"], $_SESSION["login"]->getProfessores()->getProfessores_id(), $novo["conteudos_desc"], $novo["conteudos_ordem"],"http://200.145.153.172/quarkz/Quimicamente/imagens/hist.jpg");
                    /**/
                    $id = Database::selecionarParam($sql, $param2);

                    //print_r($id);

                    return "com-".$id[0]["conteudos_comunidade_id"];
                } else {
                    $sql = "UPDATE conteudos SET conteudos_ordem = conteudos_ordem+1 WHERE conteudos_ordem >= ?";
                    $param = array($novo["conteudos_ordem"]);
                    Database::executarParam($sql, $param);

                    $sql = "INSERT INTO conteudos (conteudos_nome,conteudos_descricao,conteudos_ordem, conteudos_imagem,conteudos_del)VALUES(?,?,?,?,'N') RETURNING conteudos_id";
                    $param2 = array($novo["conteudos_nome"], $novo["conteudos_desc"], $novo["conteudos_ordem"],"http://200.145.153.172/quarkz/Quimicamente/imagens/hist.jpg");
                    $id = Database::selecionarParam($sql, $param2);
                    return "ofc-".$id[0]["conteudos_id"];
                }
            } catch (Exception $e) {
                throw new Exception($e);
            }
        }

        /**
         * @param $id
         * @return array
         * @throws Exception
         */
        static function excluiModulo($id)
        {
            $nvl = $_SESSION["login"]->getUsuarios_nivel();
            $dados = explode("-", $id);
            $param2 = array($dados[1]);
            try {
                if ($nvl == 2) {
                    $sql = "SELECT * FROM conteudos_comunidade WHERE conteudos_comunidade_id = ? AND professores_id = ?";
                    $param = array($dados[1], $_SESSION["login"]->getProfessores()->getProfessores_id());/**/
                    $stmt = Database::selecionarParam($sql, $param);
                    if (count($stmt) < 1)
                        throw new Exception("community_content_not_found.");
                }

                if ($dados[0] == 'ofc' && $nvl == 2) throw new Exception("denied.");

                if ($dados[0] == 'com'){ $tipo = '_comunidade'; $where_prof = " AND professores_id = ?";}

                else {$tipo = ""; $where_prof = "";}

                $sql  = "SELECT * FROM conteudos" . $tipo . " WHERE conteudos" . $tipo . "_id = ?";
                $ctd = Database::selecionarParam($sql, $param2);

                if(strpos($ctd[0]["conteudos".$tipo."_imagem"], "hist.jpg") === false){
                    unlink($ctd[0]["conteudos".$tipo."_imagem"]);
                }

                $sql = "UPDATE conteudos" . $tipo . " SET conteudos" . $tipo . "_del = 'S' WHERE conteudos" . $tipo . "_id = ?";
                $stmt = Database::ExecutarParam($sql, $param2);

                $sql = "UPDATE conteudos" . $tipo . "_liberados SET conteudos" . $tipo . "_liberados_del = 'S' WHERE conteudos" . $tipo . "_liberados_id = ?";
                $stmt = Database::ExecutarParam($sql, $param2);

                $sql = "UPDATE conteudos" . $tipo . " SET conteudos" . $tipo . "_ordem = conteudos" . $tipo . "_ordem-1 WHERE conteudos" . $tipo . "_ordem > ?". $where_prof;
                $param3 = array($ctd[0]["conteudos" . $tipo . "_ordem"]);

                if($dados[0] == 'com')  array_push($param3, $_SESSION["login"]->getProfessores()->getProfessores_id());

                $stmt = Database::ExecutarParam($sql, $param3);

                $sql = "UPDATE slides" . $tipo . " SET slides" . $tipo . "_del = 'S' WHERE conteudos" . $tipo . "_id = ?";
                $stmt = Database::ExecutarParam($sql, $param2);

                $sql = "UPDATE perguntas" . $tipo . " SET perguntas" . $tipo . "_del = 'S' WHERE conteudos" . $tipo . "_id = ? RETURNING perguntas" . $tipo . "_id";
                $stmt = Database::SelecionarParam($sql, $param2);

                if (count($stmt) > 0) {
                    $sql = "UPDATE respostas" . $tipo . " SET respostas" . $tipo . "_del = 'S' WHERE ";
                    $param = array();

                    foreach ($stmt as $value) {
                        $sql = $sql . "perguntas" . $tipo . "_id = ?";
                        if ($stmt[count($stmt) - 1] != $value) $sql = $sql . " OR ";
                        array_push($param, $value["perguntas" . $tipo . "_id"]);
                    }
                    $stmt = Database::executarParam($sql, $param);
                }
                return array('success' => 'successfully deleted.');
            } catch (Exception $e) {
                throw new Exception($e);
            }
        }

        static function carregarSlides($id)
        {
            $nvl = $_SESSION["login"]->getUsuarios_nivel();
            if ($nvl != 1) throw new Exception("erro de autenticação");

            $sql = "SELECT * FROM slides WHERE slides_del = 'N' AND conteudos_id = ? ORDER BY slides_ordem";
            $param = array($id);
            $slides = Database::selecionarParam($sql, $param);

            $sql = "SELECT * FROM perguntas INNER JOIN respostas ON (perguntas.perguntas_id = respostas.perguntas_id) WHERE perguntas_del = 'N' AND conteudos_id = ? ORDER BY perguntas.perguntas_id";
            $questoes = Database::selecionarParam($sql, $param);

            $perguntas = array();
            $temp = array();

            for ($i = 1; $i <= count($questoes); $i++) {

                array_push($temp, $questoes[$i - 1]);

                if ($i % 5 == 0) {
                    array_push($perguntas, $temp);
                    $temp = array();
                }
            }
           // print_r($questoes);
            return array($slides, $perguntas);
        }

        static function carregarSlidesComunidade($id)
        {
            $nvl = $_SESSION["login"]->getUsuarios_nivel();
            if ($nvl > 2) throw new Exception("erro de autenticação");

            $sql = "SELECT * FROM slides_comunidade WHERE slides_comunidade_del = 'N' AND conteudos_comunidade_id = ? ORDER BY slides_comunidade_ordem";
            $param = array($id);
            $slides = Database::selecionarParam($sql, $param);

            $sql = "SELECT * FROM perguntas_comunidade INNER JOIN respostas_comunidade ON (perguntas_comunidade.perguntas_comunidade_id = respostas_comunidade.perguntas_comunidade_id) WHERE perguntas_comunidade_del = 'N' AND conteudos_comunidade_id = ? ORDER BY perguntas_comunidade.perguntas_comunidade_id";

            $questoes = Database::selecionarParam($sql, $param);

            $perguntas = array();
            $temp = array();

            for ($i = 1; $i <= count($questoes); $i++) {

                array_push($temp, $questoes[$i - 1]);

                if ($i % 5 == 0) {
                    array_push($perguntas, $temp);
                    $temp = array();
                }
            }
            //print_r($perguntas[0]);
            return array($slides, $perguntas);
        }

        static function salvarSlides($id, $slides, $perguntas)
        {
            $nvl = $_SESSION["login"]->getUsuarios_nivel();
            $dados = explode("-", $id);
            if (count($slides) < 1 || count($perguntas) < 1)
                throw new Exception("faltam parametros");
            $id = $dados[1];
            if ($nvl > 2) throw new Exception("erro de autenticação");

            if ($nvl == 2) {
                $sql = "SELECT * FROM conteudos_comunidade WHERE conteudos_comunidade_id = ? AND professores_id = ?";
                $param = array($dados[1], $_SESSION["login"]->getProfessores()->getProfessores_id());/**/
                $stmt = Database::selecionarParam($sql, $param);
                if (count($stmt) < 1)
                    throw new Exception("community_content_not_found.");
            }

            if ($dados[0] == 'ofc' && $nvl == 2) throw new Exception("denied.");

            if ($dados[0] == 'com') $tipo = '_comunidade';
            else $tipo = "";
            try {
                $sql = "SELECT * FROM slides" . $tipo . " WHERE conteudos" . $tipo . "_id = ? ORDER BY slides" . $tipo . "_ordem";
                $param = array($id);
                $antigos = Database::selecionarParam($sql, $param);

                $tmp = array();
                for ($i = 0; $i < count($slides); $i++) {
                    //VERIFICA SE É O INDICE DO CONTEUDO DO SLIDE E SE ESTÁ PREENCHIDO
                    if ($i % 2 != 0 && strlen(trim(strip_tags($slides[$i]))) > 10) {
                        array_push($tmp, $slides[$i]);
                    }
                }

                $slides = $tmp;
                $qtde_antiga = count($antigos);
                $qtde_nova = count($slides);
                //print_r($slides);

                for ($i = 1; $i <= $qtde_nova; $i++) {
                    if ($i <= $qtde_antiga) {
                        $linha = $antigos[$i - 1];
                        $sql = "UPDATE slides" . $tipo . " SET slides" . $tipo . "_conteudo = ?, slides" . $tipo . "_ordem = ?, slides" . $tipo . "_del = 'N' WHERE slides" . $tipo . "_id = ?";
                        $param = array($slides[$i - 1], $i, $linha["slides" . $tipo . "_id"]);
                        Database::selecionarParam($sql, $param);
                    } else {
                        $sql = "INSERT INTO slides" . $tipo . " VALUES (DEFAULT, ?, ?, ?, 'N');";
                        $param = array($id, $i, $slides[$i - 1]);
                        Database::executarParam($sql, $param);
                    }
                }

                if ($qtde_antiga > $qtde_nova) {
                    $sql = "UPDATE slides" . $tipo . " SET slides" . $tipo . "_del = 'S' WHERE conteudos" . $tipo . "_id = ? AND slides" . $tipo . "_ordem > ?;";
                    $param = array($id, $qtde_nova);
                    Database::executarParam($sql, $param);
                }

                //------------------------ PERGUNTAS ----------------------------

                //SELECIONA TODAS AS PRGUNTAS
                $sql = "SELECT * FROM perguntas" . $tipo . " WHERE conteudos" . $tipo . "_id = ? ORDER BY perguntas" . $tipo . "_id";
                $param = array($id);
                $antigos = Database::selecionarParam($sql, $param);


                $qtde_antiga = count($antigos);
                $qtde_nova = count($perguntas);

                $qst = array();
                $tds = array();

                for ($i = 0; $i <= count($perguntas); $i++) {
                    if ($i % 7 != 0) {
                        array_push($qst, $perguntas[$i]);
                    } else {
                        if ($i != 0) {
                            array_push($tds, $qst);
                            $qst = array();
                        }
                    }
                }

                $perguntas = $tds;
                $qtde_nova = count($perguntas);

                //$i É USADO PARA O ARRAY, $j PARA O ARRAY DO DB, REPETE O NUMERO DE QUESTOES DO ARRAY
                for ($i = 0; $i < $qtde_nova; $i++) {
                    if ($i < $qtde_antiga) {
                        //PEGA UMA A UMA DO BANCO
                        $linha = $antigos[$i];
                        //ATUALIZA QUESTÃO
                        $sql = "UPDATE perguntas" . $tipo . " SET perguntas" . $tipo . "_descricao = ?, perguntas" . $tipo . "_del = 'N' WHERE perguntas" . $tipo . "_id = ?";
                        $param = array($perguntas[$i][0], $linha["perguntas" . $tipo . "_id"]);
                        Database::executarParam($sql, $param);

                        //PEGAR ID ALTERADA
                        $id_pergunta = $linha["perguntas" . $tipo . "_id"];

                        //BUSCAR AS 5 RESPOSTAS
                        $sql = "SELECT * FROM respostas" . $tipo . " WHERE perguntas" . $tipo . "_id = ? ORDER BY respostas" . $tipo . "_id";
                        $param = array($id_pergunta);
                        $resps = Database::selecionarParam($sql, $param);

                        //          ATUALIZAR AS 5 RESPOSTAS
                        for ($k = 1; $k <= 5; $k++) {
                            //PEGA CADA RESPOSTA
                            $linha2 = $resps[$k - 1];
                            $sql = "UPDATE respostas" . $tipo . " SET respostas" . $tipo . "_desc = ?, respostas" . $tipo . "_del = 'N' WHERE respostas" . $tipo . "_id = ? RETURNING respostas" . $tipo . "_id";
                            $param = array($perguntas[$i][$k], $linha2["respostas" . $tipo . "_id"]);
                            Database::selecionarParam($sql, $param);
                        }
                    }

                    if ($i >= $qtde_antiga) {
                        if ($dados[0] == 'ofc') {
                            $sql = "INSERT INTO perguntas" . $tipo . " VALUES (DEFAULT, ?, ?, 'N') RETURNING perguntas" . $tipo . "_id;";
                            $param = array($id, $perguntas[$i][0]);  /**/
                        } else {
                            if ($nvl == 1) $id_prof = $linha["professores_id"];
                            else            $id_prof = $_SESSION["login"]->getProfessores()->getProfessores_id();
                            $sql = "INSERT INTO perguntas" . $tipo . " VALUES (DEFAULT, ?, ?, ?, 'N') RETURNING perguntas" . $tipo . "_id;";
                            $param = array($id_prof, $id, $perguntas[$i][0]);
                        }

                        $stmt = Database::selecionarParam($sql, $param);
                        $id_pergunta = $stmt[0];
                        $id_pergunta = $id_pergunta["perguntas" . $tipo . "_id"];

                        $sql = "INSERT INTO respostas" . $tipo . " VALUES (DEFAULT, ?, ?, 'S', 'N'), (DEFAULT, ?, ?, 'N', 'N'), (DEFAULT, ?, ?, 'N', 'N'), (DEFAULT, ?, ?, 'N', 'N'), (DEFAULT, ?, ?, 'N', 'N')";
                        $param = array();
                        for ($m = 1; $m < 6; $m++) {
                            array_push($param, $id_pergunta);
                            array_push($param, $perguntas[$i][$m]);
                        }
                        Database::executarParam($sql, $param);
                    }
                }

                if ($qtde_antiga > $qtde_nova) {
                    $sql = "UPDATE perguntas" . $tipo . " SET perguntas" . $tipo . "_del = 'S' WHERE perguntas" . $tipo . "_id > ? AND conteudos" . $tipo . "_id = ? RETURNING perguntas" . $tipo . "_id;";
                    $param = array($id_pergunta, $id);

                    $perguntas_deletadas = Database::selecionarParam($sql, $param);

                    for ($rsp_del = 0; $rsp_del < count($perguntas_deletadas); $rsp_del++) {
                        $sql = "UPDATE respostas" . $tipo . " SET respostas" . $tipo . "_del = 'S' WHERE perguntas" . $tipo . "_id = ?";
                        $param = array($perguntas_deletadas[$rsp_del]["perguntas" . $tipo . "_id"]);
                        Database::executarParam($sql, $param);
                    }
                }

            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
        static function enviarImagem($dados, $conteudo_id)
        {
            $conteudo_id = explode("-",$conteudo_id["id_conteudo"]);

            if (!isset($dados['arquivo']['name']))
                throw new Exception("model_img_not_found");
            else {
                sleep(1);
                $fileName  = $_FILES['arquivo']['name'];
                $fileTMP   = $_FILES['arquivo']['tmp_name'];
                $fileType  = $_FILES['arquivo']['type'];
                $fileError = $_FILES['arquivo']['error'];
                $fileEXT   = explode('.', $fileName);
                $newName   = md5($fileName.time()) . '.jpg';
                $permitido = array('image/png','image/jpeg');
                define('OUTPUT', '../uploads/temp/' . $newName);

                if (in_array($fileType, $permitido) == false)
                    $response = array('error', "Por favor selecione um arquivo do tipo JPEG ou PNG... ");
                elseif ($fileError == 4)
                    $response = array('error','Desculpe, mas o arquivo não foi enviado, por favor, tente novamente,');
                elseif ($fileError == 3)
                    $response = array('error','Desculpe, o envio do arquivo não foi completado com sucesso, por favor, tente novamente.');
                elseif ($fileError == 2)
                    $response = array('error','Esta imagem é muito grande, por favor, selecione uma imagem de até 2MB de tamanho!');
                elseif ($fileError == 1)
                    $response = array('error','Esta imagem é muito grande, por favor, selecione uma imagem de até 2MB de tamanho!');
                else {
                    if ($fileType == 'image/png')
                        $img = imagecreatefrompng($fileTMP);
                    else
                        $img = imagecreatefromjpeg($fileTMP);
                    $imgWidth = imagesx($img);
                    $imgHeight = imagesy($img);

                    if($imgHeight < 160 || $imgWidth < 160){
                        return array('error','Selecione uma imagem de pelo menos 160x160!');
                    }
                    if ($imgWidth > 500) {
                        $x = 500;
                        $y = ceil(($imgHeight / $imgWidth) * $x);
                    } else {
                        $x = $imgWidth;
                        $y = $imgHeight;
                    }
                    if ($y > 500) {
                        $y2 = 500;
                        $x = ceil(($x / $y) * $y2);
                        $y = $y2;
                    }

                    $newImage = imagecreatetruecolor($x, $y);
                    imagecopyresampled($newImage, $img, 0, 0, 0, 0, $x, $y, $imgWidth, $imgHeight);

               //     if($fileType == 'image/png')
               //         $finalImage = imagepng($newImage, OUTPUT);
               //     else
                        $finalImage = imagejpeg($newImage, OUTPUT);


                    $b64 = OUTPUT;
                    if($conteudo_id[0] == 'com')       $tipo = "_comunidade";
                    else                            $tipo = "";

                    if ($finalImage) {
                        $response = array('success', '<img onload="getCoords();" id="toCrop" src="' . $b64 . '" /><input type="hidden" id="imgType" value="' . $fileType . '"/><input type="hidden" id="imgName" value="' . $newName . '"/><input type="hidden" id="imgWidth" value = "' . $x . '"/>');

                        $sql = 'UPDATE conteudos'.$tipo.' SET conteudos'.$tipo.'_imagem = ? WHERE conteudos'.$tipo.'_id = ?';
                        $param = array(OUTPUT,$conteudo_id[1]);

                        try{
                            Database::executarParam($sql,$param);
                        }
                        catch (Exception $e){
                            $response = array('error',$e->getMessage());
                        }

                    }
                        else
                       $response = array('error','Ocorreu um erro ao tentar criar a nova imagem =(');
                }
            }
            return $response;
        }

        static function salvarImagem($imgData){
            require("../assets/Wideimage/WideImage.php");
            sleep(1);
            $conteudo_id = explode("-",$imgData["id_conteudo"]);

            if($conteudo_id[0] == 'com')       $tipo = "_comunidade";
            else                            $tipo = "";

            //CARREGAR IMAGEM COMPLETA NO BANCO DE DADOS
            try{
                $fileType = $imgData['imgType'];
                $imgName  = $imgData['imgName'];
                define('OUTPUT', '../uploads/content_pics/' . $imgName);
                $img = imagecreatefromjpeg('../uploads/temp/' . $imgName);
            }
            catch (Exception $e){
                $response = array('error',$e->getMessage());
            }

            //CORTAR IMAGEM USANDO A CLASSE WideImage
            try{
                WideImage::load('../uploads/temp/' . $imgName)->crop($imgData['x'], $imgData['y'], $imgData['w'], $imgData['h'])->saveToFile(OUTPUT, 100);
            }catch(Exception $e){
                echo $e->getMessage();
            }

            if($conteudo_id[0] == 'com')       $tipo = "_comunidade";
            else                            $tipo = "";

            //SALVAR URL NO BANCO DE DADOS

            try{
                $sql  = "SELECT * FROM conteudos" . $tipo . " WHERE conteudos" . $tipo . "_id = ?";
                $ctd = Database::selecionarParam($sql, array($conteudo_id[1]));

                if(strpos($ctd[0]["conteudos".$tipo."_imagem"], "hist.jpg") === false){
                    unlink($ctd[0]["conteudos".$tipo."_imagem"]);
                }
                $sql = 'UPDATE conteudos'.$tipo.' SET conteudos'.$tipo.'_imagem = ? WHERE conteudos'.$tipo.'_id = ?';
                $param = array(OUTPUT, $conteudo_id[1]);
                Database::executarParam($sql,$param);
                unlink('../uploads/temp/' . $imgName);
                return $response = array('success','<img id="imgFinal" src="' . OUTPUT . '" />');
            }
            catch (Exception $e){
                return array('error',$e->getMessage());
            }
        }

        static function capaPadrao($conteudo_id){
            if($conteudo_id[0] == 'com')       $tipo = "_comunidade";
            else                            $tipo = "";

            //SALVAR URL NO BANCO DE DADOS
            $sql = 'UPDATE conteudos'.$tipo.' SET conteudos'.$tipo.'_imagem = ? WHERE conteudos'.$tipo.'_id = ?';
            $param = array("http://200.145.153.172/quarkz/Quimicamente/imagens/hist.jpg", $conteudo_id[1]);
            try{
                Database::executarParam($sql,$param);
            }
            catch (Exception $e){
                $response = array('error',$e->getMessage());
            }
        }
        static function excluiModuloVazio($id){
            if(!isset($_SESSION["login"])){
                die("denied");
            }
            $conteudo_id = explode("-",$id);
            $param = array($conteudo_id[1]);



            if($conteudo_id[0] == 'com')       $tipo = "_comunidade";
            else                            $tipo = "";



            if($conteudo_id[0] == 'com' && $_SESSION["login"]->getUsuarios_nivel() == 2){
                $sql = "SELECT * FROM conteudos_comunidade INNER JOIN slides_comunidade".
                    " ON (slides_comunidade.conteudos_comunidade_id = conteudos_comunidade.conteudos_comunidade_id)" .
                    " WHERE conteudos_comunidade.conteudos_comunidade_id = ? AND professores_id = ? AND conteudos_comunidade_del = 'N' AND slides_comunidade_del = 'N'";

                array_push($param,$_SESSION["login"]->getProfessores()->getProfessores_id());
            }

            else
                $sql = "SELECT * FROM conteudos".$tipo." INNER JOIN slides".$tipo.
                    " ON (slides".$tipo.".conteudos".$tipo."_id = conteudos".$tipo.".conteudos".$tipo."_id)" .
                    " WHERE conteudos".$tipo."_id = ? AND conteudos".$tipo."_del = 'N' AND slides".$tipo."_del = 'N'";

            $ctd = Database::selecionarParam($sql, $param);

            if(count($ctd) < 1){
                self::excluiModulo($id);
            }
        }
    }

