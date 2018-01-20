<?php
	include_once("servico.php");

	class Model_curso{
		public static function Conteudo($idconteudo){
        	$sql = "SELECT * FROM conteudos WHERE conteudos_ordem = ?";
        	$id = array($idconteudo);
			try{
				$query = Database::selecionarParam($sql,$id);
				if($query){
					return Servico::objConteudos($query[0]);
				}else{
					return false;
				}
			}catch(Exception $e){
				die($e);
			}
    	}

    	public static function ConteudoLiberado($idconteudo){
        	$sql = "SELECT * FROM conteudos WHERE conteudos_id = ?";
        	$id = array($idconteudo);
			try{
				$query = Database::selecionarParam($sql,$id);
				if($query){
					return Servico::objConteudos($query[0]);
				}else{
					return false;
				}
			}catch(Exception $e){
				die($e);
			}
    	}

    	public static function LiberarProximoConteudo($id){
    		$sql = "UPDATE alunos SET conteudos_ordem = conteudos_ordem + 1 WHERE alunos_id = ?";
    		try{
    			$parametros = array($id);
    			return $query = Database::executarParam($sql,$parametros);
    		}catch(Exception $e){
    			die($e);
    		}
    	}

		public static function verificaConteudoLiberado($conteudos_id, $turmas_id){
			try{
				$sql = "SELECT * FROM conteudos_liberados 
						WHERE conteudos_id = ? 
						AND turmas_id = ?
						AND upper(conteudos_liberados_del) = 'N'";
				$parametros = array($conteudos_id, $turmas_id);
				$query = Database::selecionarParam($sql, $parametros);
				if($query){
					return true;
				}else{
					return false;
				}
			}catch(Exception $e){
				die($e);
			}
		}

		public static function verificaConteudoComunidadeLiberado($conteudos_id, $turmas_id){
			try{
				$sql = "SELECT * FROM conteudos_comunidade_liberados 
						WHERE conteudos_comunidade_id = ? 
						AND turmas_id = ?
						AND upper(conteudos_comunidade_liberados_del) = 'N'";
				$parametros = array($conteudos_id, $turmas_id);
				$query = Database::selecionarParam($sql, $parametros);
				if($query){
					return true;
				}else{
					return false;
				}
			}catch(Exception $e){
				die($e);
			}
		}

    	public static function selecionarSlidesConteudo($idconteudo){
			$sql = "SELECT * FROM slides WHERE conteudos_id = ? AND upper(slides_del) = 'N' ORDER BY slides_ordem ASC";
			$parametros = array($idconteudo);
			try{
				$query = Database::selecionarParam($sql,$parametros);
				if($query){
					for($i=0;$i<count($query);$i++){
						$slides[$i] = Servico::objSlides($query[$i]);
					}
					return $slides;
				}else{
					return false;
				}
			}catch(Exception $e){
				die($e);
			}		
		}

		public static function selecionarPerguntasConteudo($id){
			$sql = "SELECT * FROM perguntas WHERE conteudos_id = ? AND upper(perguntas_del) = 'N'";
			$sql2 = "SELECT * FROM respostas WHERE perguntas_id = ? AND upper(respostas_del) = 'N'";
			try{
				$parametro = array($id);
				$query = Database::selecionarParam($sql,$parametro);
				if($query){
					for($i=0;$i<count($query);$i++){
						$perguntas[$i] = Servico::objPerguntas($query[$i]);
					}
					return $perguntas;
				}else{
					return false;
				}
			}catch(Exception $e){
				die($e);
			}
		}

		public static function selecionarRespostas($id){
			$sql = "SELECT * FROM respostas WHERE perguntas_id = ? AND upper(respostas_del) = 'N' ORDER BY RANDOM() LIMIT 1000";
			$parametros = array($id);
			try{
				$query = Database::selecionarParam($sql, $parametros);
				if($query){
					for($i=0;$i<count($query);$i++){
						$respostas[$i] = Servico::objRespostas($query[$i]);
					}
					return $respostas;
				}
			}catch(Exception $e){
				die($e);
			}
		}

		public static function selecionarRespostasComunidade($id){
			$sql = "SELECT * FROM respostas_comunidade WHERE perguntas_comunidade_id = ? AND upper(respostas_comunidade_del) = 'N' ORDER BY RANDOM() LIMIT 1000";
			$parametros = array($id);
			try{
				$query = Database::selecionarParam($sql, $parametros);
				if($query){
					for($i=0;$i<count($query);$i++){
						$respostas[$i] = Servico::objRespostas_comunidade($query[$i]);
					}
					return $respostas;
				}
			}catch(Exception $e){
				die($e);
			}
		}

		public static function selecionarRespostaCerta($id){
			$sql = "SELECT * FROM respostas WHERE perguntas_id = ? AND respostas_correta = 'S'";
			$param = array($id);
			try{
				$query = Database::selecionarParam($sql, $param);
				if($query){
					return Servico::objRespostas($query[0]);
				}
			}catch(Exception $e){
				die($e);
			}
		}

		public static function selecionarRespostaComunidadeCerta($id){
			$sql = "SELECT * FROM respostas_comunidade WHERE perguntas_comunidade_id = ? AND respostas_comunidade_correta = 'S'";
			$param = array($id);
			try{
				$query = Database::selecionarParam($sql, $param);
				if($query){
					return Servico::objRespostas_comunidade($query[0]);
				}
			}catch(Exception $e){
				die($e);
			}
		}

		public static function checkRespostas($param){
			$sql = "SELECT * FROM respostas WHERE perguntas_id = ? AND respostas_id = ?";
			try{
				$query = Database::selecionarParam($sql, $param);
				if($query){
					return Servico::objRespostas($query[0]);
				}
			}catch(Exception $e){
				die($e);
			}
		}

		public static function checkRespostasComunidade($param){
			$sql = "SELECT * FROM respostas_comunidade WHERE perguntas_comunidade_id = ? AND respostas_comunidade_id = ?";
			try{
				$query = Database::selecionarParam($sql, $param);
				if($query){
					return Servico::objRespostas_comunidade($query[0]);
				}
			}catch(Exception $e){
				die($e);
			}
		}

		public static function PerguntasConteudo($idconteudo){
	        $sql = "SELECT perguntas.perguntas_descricao as perguntas, perguntas.perguntas_id as idperguntas, respostas.respostas_desc as respostas,			respostas.respostas_correta as correta, respostas.respostas_id as idrespostas
					FROM conteudos
					INNER JOIN perguntas ON perguntas.conteudos_id = conteudos.conteudos_id
					INNER JOIN respostas ON respostas.perguntas_id = perguntas.perguntas_id
					WHERE conteudos.conteudos_id = ? ORDER BY idperguntas";
	        
	        $array = array($idconteudo);
	        
	        return $recebepergunta = Database::selecionarParam($sql,$array);
    	}

    	public static function salvar($idconteudo,$idusuario){
	        $sql = "UPDATE alunos
					SET conteudos_id = ?
					WHERE usuarios_id = ?";
	        $param = array($idconteudo,$idusuario);        
			try{
				Database::executarParam($sql,$param);
			}
			catch(Exception $e){
				die("Erro: ". $e->getMessage);
			}
			return "1";
    	}

    	public static function ConteudoComunidade($idconteudo){
    		$sql = "SELECT * FROM conteudos_comunidade WHERE conteudos_comunidade_id = ?";
        	$id = array($idconteudo);
			try{
				$query = Database::selecionarParam($sql,$id);
				if($query){
					return Servico::objConteudos_comunidade($query[0]);
				}else{
					return false;
				}
			}catch(Exception $e){
				die($e);
			}
    	}

    	public static function selecionarSlidesConteudoComunidade($idconteudo){
    		$sql = "SELECT * FROM slides_comunidade WHERE conteudos_comunidade_id = ? AND upper(slides_comunidade_del) = 'N' ORDER BY slides_comunidade_ordem ASC";
			$parametros = array($idconteudo);
			try{
				$query = Database::selecionarParam($sql,$parametros);
				if($query){
					for($i=0;$i<count($query);$i++){
						$slides[$i] = Servico::objSlides_comunidade($query[$i]);
					}
					return $slides;
				}else{
					return false;
				}
			}catch(Exception $e){
				die($e);
			}
    	}

    	public static function selecionarPerguntasConteudoComunidade($id){
    		$sql = "SELECT * FROM perguntas_comunidade WHERE conteudos_comunidade_id = ? 
    				AND upper(perguntas_comunidade_del) = 'N'";
			try{
				$parametro = array($id);
				$query = Database::selecionarParam($sql,$parametro);
				if($query){
					for($i=0;$i<count($query);$i++){
						$perguntas[$i] = Servico::objPerguntas_comunidade($query[$i]);
					}
					return $perguntas;
				}else{
					return false;
				}
			}catch(Exception $e){
				die($e);
			}
    	}
	}
?>