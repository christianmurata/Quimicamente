<?php 
	include_once("suporte.php");
    include_once("servico.php");
    include_once("entidades.php");
	$Homemd=new Homemd();
	
	
	class Homemd{

	    static function buscaAlunoTurma(){
	        $sql = "SELECT * FROM alunos_turma INNER JOIN alunos ON (alunos_turma.alunos_id = alunos.alunos_id) WHERE usuarios_id = ? and alunos_turma_del = 'N'";
	        $param = array($_SESSION["login"]->getUsuarios_id());

	        $stmt = Database::selecionarParam($sql, $param);

	        return $stmt;

        }
		
		static function buscaConteudos(){
			$sql="SELECT * FROM conteudos WHERE conteudos_del = 'N' ORDER BY conteudos_ordem;";
			try{
					$query = Database::selecionar($sql);
					if($query[0]){
						for($i=0;$i<count($query);$i++){
							$conteudo[$i]=Servico::objConteudos($query[$i]);
						}
					}
					
				}catch(Exception $e){
					echo $e;
				}
				
			return $conteudo;
		}
		
		static function notaFacil($param){
			$sql="SELECT desempenhos_notafinal FROM desempenhos WHERE desempenhos_dificuldade ='1' AND alunos_id = ?;";
			try{
				$query=Database::selecionaObjeto($sql,$param);
				$t = array();
				if($query){
					$t[0]  = $query[0]['desempenhos_notafinal'];
					return $t;
				}
			}catch(Exception $e){
				echo $e;
			}
		}

		static function notaMedia($param){
			$sql="SELECT desempenhos_notafinal FROM desempenhos WHERE desempenhos_dificuldade ='2' AND alunos_id = ?;";
			try{
				$query=Database::selecionaObjeto($sql,$param);
				$t = array();
				if($query){
					$t[0]  = $query[0]['desempenhos_notafinal'];
					return $t;
				}
			}catch(Exception $e){
				echo $e;
			}
		}

		static function notaDificil($param){
			$sql="SELECT desempenhos_notafinal FROM desempenhos WHERE desempenhos_dificuldade ='3' AND alunos_id = ?;";
			try{
				$query=Database::selecionaObjeto($sql,$param);
				$t = array();
				if($query){
					$t[0]  = $query[0]['desempenhos_notafinal'];
					return $t;
				}
			}catch(Exception $e){
				echo $e;
			}
		}

		static function contAtual($param){
			$sql="SELECT * FROM conteudos WHERE conteudos_ordem = ?;";
			try{
					$query = Database::selecionaObjeto($sql,$param);
					if($query){
						$conteudo=Servico::objConteudos($query[0]);				
						return $conteudo;
					}
					
				}catch(Exception $e){
					echo $e;
				}
		}
		/*static function alunoTurma($param){
			$sql="SELECT * FROM alunos_turma WHERE alunos_id = ?";
			try{
				$query=Database::selecionaObjeto($sql,$param);
				if($query[0]){
					$alunoturma=Servico::objAlunos_turma($query[0]);
				}
				else{
					
				}
			}catch(Exception $e){
				echo $e;
			}
			return $alunoturma;
		}
		
		static function buscaConteudosComunidade($param){
			$sql="SELECT * FROM conteudos_comunidade_liberados INNER JOIN conteudos_comunidade 
					ON (conteudos_comunidade_liberados.conteudos_comunidade_id = conteudos_comunidade.conteudos_comunidade_id) 
						WHERE conteudos_comunidade_liberados.turmas_id = ? ;";
			try{
					$query = Database::selecionaObjeto($sql,$param);
					if($query[0]){
						for($i=0; $i<count($query); $i++){
							$conteudo2[$i]=Servico::objConteudos_comunidade($query[$i]);
						}
					return $conteudo2;
					}
					
				}catch(Exception $e){
					echo $e;
				}
				return false;
		}*/
	}
?>