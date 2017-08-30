<?php
	include_once("servico.php");
	include_once("entidades.php");
	include_once("suporte.php");

	$Sala_model = new Sala_model();

	class Sala_model{
		static function selecionarConteudosLiberadosAluno($cont){
            //$newCont = Servico::objConteudos_liberados($cont);
            $sql = "SELECT * FROM conteudos_liberados WHERE turmas_id = ? AND conteudos_liberados_del = 'N'";
            try{
                $query = Database::selecionaObjeto($sql,$cont);
                if($query){
                	for($i = 0; $i < count($query); $i++){
                		$sql1 = "SELECT * FROM conteudos WHERE conteudos_id = ? AND conteudos_del = 'N'";
                		$param = $query[$i]['conteudos_id'];
                		$result = Database::selecionaObjeto($sql1, $param);                		
                		if($result[0]){
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

        static function selecionarAlunosTurma($cont){
        	$sql = "SELECT * FROM alunos WHERE turmas_id = ? AND alunos_del = 'N'";
            try{
                $query = Database::selecionaObjeto($sql,$cont);

                if($query){

                	for($i = 0; $i < count($query); $i++){
                		$sql1 = "SELECT * FROM usuarios WHERE usuarios_id = ? AND usuarios_del = 'N'";
                		
                		$param = $query[$i]['usuarios_id'];
                		
                		$result = Database::selecionaObjeto($sql1, $param);
                		
                		if($result[0]){
                			$usuarios[$i] = Servico::objUsuarios($result[0]);
                		}
                	}
                	//print_r($usuarios->getUsuarios_id());
                	return $usuarios;
                }else{
                    return false;
                }
                
            }catch(Exception $e){
                die("Erro: ". $e);
            }	
        }

        static function selecionarTurma($turma){
        	$sql = "SELECT * FROM turmas WHERE turmas_id = ? AND turmas_del = 'N'";
            try{
                $query = Database::selecionaObjeto($sql,$turma);

                if($query){
                	$turma = Servico::objTurmas($query[0]);
                	//print_r($usuarios->getUsuarios_id());
                	return $turma;
                }
                
            }catch(Exception $e){
                die("Erro: ". $e);
            }	
        }


	}