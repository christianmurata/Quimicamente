<?php
	include_once("servico.php");

	class Model_provas{

		public static function selecionaProva($provas_id, $turmas_id, $professores_id){
			$sql = "SELECT * FROM provas WHERE provas_id = ? 
					AND upper(provas_del) = 'N'
					AND turmas_id = ?
					AND professores_id = ?
					AND provas_del = 'N' ";
			try{

				$param = array($provas_id, $turmas_id, $professores_id);
				$query = Database::selecionarParam($sql, $param);
				if($query){
					return Servico::objProvas($query[0]);
				}
			}catch(Exception $e){
				return false;
			}
			return false;
		}

		public static function selecionarPerguntas($provas_id){
			$sql = "SELECT PC.* 
					FROM perguntas_comunidade PC
					INNER JOIN questoes_provas QP ON QP.perguntas_comunidade_id = PC.perguntas_comunidade_id 
					WHERE QP.provas_id = ? 
					AND upper(questoes_provas_del) = 'N'";
			try{
				$parametro = array($provas_id);
				$query = Database::selecionarParam($sql, $parametro);

				if($query){
					for($i=0;$i<count($query);$i++){
						$perguntas[$i] = Servico::objPerguntas_comunidade($query[$i]);
					}
					return $perguntas;
				}
			}catch(Exception $e){
				return false;
			}
			return false;
		}

		public static function salvarMedia($alunos_id, $provas_id, $respostas_prova_media){
			$sql = "INSERT INTO respostas_prova
					(alunos_id, provas_id, respostas_prova_media, respostas_prova_del) 
					VALUES (?, ?, ?, ?)";
			try{
				$parametros = array($alunos_id, $provas_id, $respostas_prova_media, "N");
				return $query = Database::executarParam($sql, $parametros);
			}catch(Exception $e){
				die($e);
			}
			return false;
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
					return true;
				}
			}catch(Exception $e){
				die($e);
			}
			return false;
		}
	}

?>