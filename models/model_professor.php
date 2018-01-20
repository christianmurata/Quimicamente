<?php
    include_once("suporte.php");
    include_once("servico.php");

    class Model_professor{
            function __construct(){

            }

            static function turmas($prof){
                $sql = "SELECT * FROM turmas WHERE professores_id = ? AND turmas_del != 'S'";
                try{
                    $query = Database::selecionaObjeto($sql, $prof);

                    if(!$query)
                        return;

                    for($i = 0; $i<count($query); $i++){
                        $sql_turmas = "SELECT * FROM turmas WHERE turmas_id = ?";
                        $param = $query[$i]['turmas_id'];
                        $result = Database::selecionaObjeto($sql_turmas, $param);
                        if($result[0]){
                            $turmas[$i] = Servico::objTurmas($result[0]);
                        }
                    }

                }catch(Exception $error){
                    die ($error);
                }

                return $turmas;
        }

        static function paginacao($prof){
            $sql_contagem = "SELECT * FROM turmas WHERE professores_id = ? AND turmas_del != 'S'";
                try{
                    $query = Database::selecionaObjeto($sql_contagem, $prof);
                    $total = count($query);
                }
                catch(Exception $error){
                    die($error);
                }
        
            // Verifica se $pagina existe, senão deixa na primeira página como padrão
			$pagina = (isset($_GET["pagina"])) ? ($_GET["pagina"]) : 1;
							
			// Defina aqui a quantidade máxima de registros por página.
            $limite = 3;

            // Gera outra variável, desta vez com o número de páginas que será preciso.
			// O comando ceil() arredonda "para cima" o valor
			$tot_paginas = ceil($total / $limite);
							
			// O sistema calcula o início da seleção fazendo: 
			// (página atual * quantidade por página) - quantidade por página
            $inicio = ($pagina * $limite) - $limite;

			// seleciona os itens a serem apresentados por página. Uso de LIMIT e OFFSET
            $sql = "SELECT * FROM turmas WHERE professores_id = ? AND turmas_del != 'S' ORDER BY turmas_id LIMIT $limite OFFSET $inicio";
                try{
                    $query = Database::selecionaObjeto($sql, $prof);
                    $qtde = count($query);
                }
                catch(Exception $error){
                    die($error);
                }
            return $tot_paginas;
        }
        
        static function inserir_turmas($arrayTurmas){
            $novaTurma = Servico::objTurmas($arrayTurmas[0]);
            // Verifica se já existe uma turma com esse nome
            $sql_turma = "SELECT (case when exists(SELECT turmas_nome FROM turmas WHERE turmas_nome = ? AND turmas_del = 'N') then 1 else 0 end) ";
            try{
                $query = Database::selecionaObjeto($sql_turma, $novaTurma->getTurmas_nome());
                $name = implode("", $query[0]);
            }catch(Exception $error){
                die($error);
            }

            if($name != 1){
                $sql = "INSERT INTO turmas(professores_id, turmas_nome, turmas_del) VALUES(?, ?, 'N')";
                $param = array($novaTurma->getProfessores_id(),
                            $novaTurma->getTurmas_nome()
                            );
                try{
                    Database::executarParam($sql, $param);
                }
                catch(Exception $error){
                    die ($error);
                }
            }else{
                die('Já existe um turma com esse nome!');
            }
        }

        static function excluir_turmas($turmas_id){
            //Exclui a turma
            $sql = "UPDATE turmas SET turmas_del = ? WHERE turmas_id = ?";
            $param = array("S", $turmas_id);
            try{
                Database::executarParam($sql, $param);
            }catch(Exception $e){
                die ($e);
            }

            //Exclui os alunos que estavam nessa turma
            $sql_alunos = "UPDATE alunos_turma set alunos_turma_del = ? WHERE turmas_id = ?";
            $param_alunos = array("S",$turmas_id);
            try{
                Database::executarParam($sql_alunos, $param_alunos);
            }catch(Exception $e){
                die($e);
            }
        }

        static function conteudos(){
            $sql = "SELECT * FROM conteudos WHERE conteudos_del = 'N' LIMIT 4";
            try{
                $query = Database::selecionar($sql);
                if($query){
                    for($i = 0; $i<count($query); $i++){
                        $sql_conteudos = "SELECT * FROM conteudos WHERE conteudos_id = ? AND conteudos_del != 'S' ORDER BY conteudos_ordem";
                		$param = $query[$i]['conteudos_id'];
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

        static function conteudos_comunidade($prof){
            $sql = "SELECT * FROM conteudos_comunidade WHERE professores_id = ? AND conteudos_comunidade_del = 'N'";
            try{
                $query = Database::selecionaObjeto($sql, $prof);
                if($query){
                    for($i = 0; $i<count($query); $i++){
                        $sql_conteudos_comun = "SELECT * FROM conteudos_comunidade WHERE conteudos_comunidade_id = ? AND conteudos_comunidade_del = 'N' ORDER BY conteudos_comunidade_ordem";
                        $param = $query[$i]['conteudos_comunidade_id'];
                        $result = Database::selecionaObjeto($sql_conteudos_comun, $param);
                        if($result[0]){
                            $conteudos_comun[$i] = Servico::objConteudos_comunidade($result[0]);
                        }
                    }
                }
            }
            catch(Exception $error){
                die($error);
            }

            return $conteudos_comun;
        }
    }
?>