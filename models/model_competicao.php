<?php
	include("servico.php");
	
	class PERGUNTA{
		public static function carregaPergunta($idconteudo){
			
			$sql1 = "select perguntas_id, perguntas_descricao from perguntas where conteudos_id = ? order by random() limit 1000";
			$sql2 = "select respostas_id, respostas_desc from respostas where perguntas_id = ? order by random() limit 1000";
			
			if($idconteudo == 1){
				$param = array(1);

				try{
					
					$tes = Database::selecionarParam($sql1, $param);				
				}
				catch(Exception $e){
					die($e);
				}
				print_r($recebePergunta);
			}

			else if($idconteudo == 2) {
				$param1 = array(2);
				$param2 = array(3);

				try{
					
					$recebePergunta1 = Database::selecionarParam($sql1, $param1);
					$recebePergunta2 = Database::selecionarParam($sql1, $param2);					
				}
				catch(Exception $e){
					die($e);
				}
				$tes = array_merge($recebePergunta1,$recebePergunta2);
				//print_r($tes);
				
			}
			else if($idconteudo == 3) {
				$param1 = array(4);
				$param2 = array(5);
				$param3 = array(6);

				try{
					
					$recebePergunta1 = Database::selecionarParam($sql1, $param1);
					$recebePergunta2 = Database::selecionarParam($sql1, $param2);
					$recebePergunta3 = Database::selecionarParam($sql1, $param3);					
				}
				catch(Exception $e){
					die($e);
				}
				$tes = array_merge($recebePergunta1,$recebePergunta2,$recebePergunta3);
				//print_r($tes);
				
			}
			
			for($i = 0;$i < count($tes);$i++){
				$idpergs[$i]= $tes[$i][perguntas_id];
			}
						
			
			try{
				for($i = 0;$i < count($tes);$i++){
					$recebeResposta[$i] = Database::selecionaObjeto($sql2,$idpergs[$i]);
				}
			}
			catch(Exception $e){
				die($e);
			}
			$comp = array($tes,$recebeResposta);

			return $comp;
			
			
			
		}
	}
?>