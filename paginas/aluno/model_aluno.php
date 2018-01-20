<?php

//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL); 

    include 'servico.php';
	$model_aluno = new model_aluno();

class model_aluno{
//------------------------------------------------------//
        static function turmas($turmas){
                $sql = "SELECT * FROM alunos_turma WHERE alunos_id = ? AND alunos_turma_del != 'S'";
                try{
                    $query = Database::selecionaObjeto($sql, $turmas);

                    if($query){
                        for($i = 0; $i<count($query); $i++){
                            $sql_turmas = "SELECT * FROM turmas WHERE turmas_id = ?";
                            $param = $query[$i]['turmas_id'];
                            $result = Database::selecionaObjeto($sql_turmas, $param);
                            if($result[0]){
                                $turmas[$i] = Servico::objTurmas($result[0]);
                            }
                        }

                        return $turmas; 

                    }
                    else{
                        return false;
                    }
                }
                catch(Exception $error){
                    die ($error);
                }
        }
//------------------------------------------------------// 
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
//------------------------------------------------------//

//------------------------------------------------------//
		static function rank($id_user){
			
			$d = array();
			$sql = "select * from alunos where usuarios_id = ? and alunos_del != 'S'";			
            try{										 //usuarios_id
				$query = Database::selecionaObjeto($sql, $id_user);
                //$query = Database::selecionar($sql);
                if($query){
                    for($i = 0; $i<count($query); $i++){
                        $sql_desempenhos = "SELECT * FROM desempenhos WHERE alunos_id = ? AND desempenhos_del = 'N'";
                		$param = $query[$i]['alunos_id']['Desempenhos_id'];
                        $result = Database::selecionaObjeto($sql_desempenhos, $param);
                        if($result[0]){
							$d[$i] = Servico::objDesempenhos($result[0]);
                        }	
                    }
					//echo $d;
                }
				//echo $d;
				return $d;
            }
            catch(Exception $error){
                die($error);
				return false;
            }
		}//rank
//------------------------------------------------------// 		
		static function porcen($id_user){
			
			$sql = "select * from alunos where usuarios_id = ? and alunos_del = 'N'";
			try{
                $query = Database::selecionaObjeto($sql, $id_user);
                if($query){
                    for($i = 0; $i<count($query); $i++){
                        $sql_conteudos = "SELECT COUNT(conteudos_id) FROM conteudos where conteudos_del = 'N'";
                		//$param = $query[$i]['conteudos_id'];
                        //$result = Database::selecionaObjeto($sql_conteudos, $param); 
						$result = Database::selecionar($sql_conteudos);
                        if($result[0]){
                            $conteudos[$i] = Servico::objConteudos($result[0]);
                        }
                    }
                }

            }
            catch(Exception $error){
                die($error);
            }
			
			$result_cont = (($conteudos * $query)/100);
            return $result_cont;
			
			
		/*	//$sql = "SELECT conteudos_id FROM alunos WHERE AND alunos_del = 'N'";
			$sql_conte = "SELECT conteudos_id FROM conteudos WHERE conteudos_del = 'N'";
			 $resultado= pg_query($sql_conte);
			 $qtde=pg_num_rows($resultado);
			 if ($qtde > 0)
			 {
				 echo "Produtos Encontrados<br><br>";
				 for ($cont=0; $cont < $qtde; $cont++)
				 {
					 $linha=pg_fetch_array($resultado);
					 echo "Conteudos...: ".$linha['conteudos_id']."<br>";
				 }
			 }
			 else
			 return false;
		 
			try{
                $query = Database::selecionar($sql_conte);
                if($query){
                    for($i = 0; $i<count($query); $i++){
                        $sql = "SELECT * FROM alunos WHERE conteudos_id = ? AND alunos_del != 'S'";
                		$param = $query[$i]['alunos_id'];
                        $result = Database::selecionaObjeto($sql, $param);
                        if($result[0]){
                            $alu[$i] = Servico::objAlunos($result[0]);
                        }
                    }
                }

            }
            catch(Exception $error){
                die($error);
            }

			//$sql_conte = "SELECT conteudos_id FROM conteudos WHERE conteudos_del = 'N'";
			
			//$a = $alu;
			//$b = $sql_conte;
		
			//echo "-".$a."--".$b."gg";
			//$result = ( ($a * $b)/100 );
			//$result = $b;
			return $alu;    */
			
			
		}//porcentagem			
	}//class aluno
?>




