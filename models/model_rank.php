<?php
	include_once("suporte.php");
	
	$Model_rank = new Model_rank();
	
	class Model_rank
	{
		static function desempenhos($dificuldade)
		{	
			
			$sql="SELECT desempenhos.desempenhos_notafinal, usuarios.usuarios_nome FROM desempenhos inner join alunos on desempenhos.alunos_id = alunos.alunos_id inner join usuarios on alunos.usuarios_id = usuarios.usuarios_id where desempenhos.desempenhos_dificuldade = ? and desempenhos.desempenhos_del = 'N' order by desempenhos.desempenhos_notafinal desc";
			try{			
					$query = Database::selecionaObjeto($sql,$dificuldade);										
					$erro = array();
					$t = array();
					$tt = array();
					if($query){
					    if(count($query) > 20){
					        $lin = 20;
                        }

                        else{
					        $lin = count($query);
                        }
						for($i = 0; $i<$lin; $i++){
							$t[$i]  = $query[$i]['desempenhos_notafinal'];
							$tt[$i] = $query[$i]['usuarios_nome'];

						}
						return array($t, $tt);

					}
					else{
						return;
					}
			}
			catch(Exception $e){
				die($e);
			}
		}
	}
