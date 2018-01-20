<?php
	include_once('../models/servico.php');
	
	
	class Model_Alteradados{
		static function alteraSenha($param){
				$sql="UPDATE usuarios SET usuarios_senha = ? WHERE usuarios_id = ?";
				try{
					
					$query = Database::executarParam($sql,$param);
					
					if($query){
						//echo "<meta HTTP-EQUIV='Refresh' CONTENT=0;URL='http://200.145.153.172/quarkz/Quimicamente'>";
						
					}
					else{
						
					}
					
					
				}catch(Exception $e){
					echo $e;
				}
		}
		
		
		static function alteraDados($param){
				$sql="UPDATE usuarios SET usuarios_nome = ? , usuarios_datanasc = ? WHERE usuarios_id = ?";
				try{
					$query = Database::executarParam($sql,$param);
					if($query){
						
					}
					else{
						echo "ERRO BANCO DE DADOS!";
					}
	
				}catch(Exception $e){
					echo $e;
				}
			
		}
		
		static function buscaDados($param){
			$sql="SELECT * FROM usuarios WHERE usuarios_id = ?";
			try{
				$query = Database::selecionaObjeto($sql,$param);
				if($query[0]){
					$usuario=Servico::objUsuarios($query[0]);
					return $usuario;
				}
				else{
					echo "ERRO BANCO DE DADOS!";
				}
				
			}catch(Exception $e){
				echo $e;
			}
			
		}
		
		static function alteraFoto($param){

		    $user = self::buscaDados($_SESSION["login"]->getUsuarios_id());

		    if(strpos($user->getUsuarios_foto(),"default_profile_pic") === false && strpos($user->getUsuarios_foto(), "data:image/image/jpeg;base64") === false){
		        unlink($user->getUsuarios_foto());
            }

			$sql="UPDATE usuarios SET usuarios_foto = ? WHERE usuarios_id= ?";
			try{
				$query = Database::executarParam($sql,$param);
					if($query){
						
					}
					else{
						echo "ERRO BANCO DE DADOS!";
					}
				
			}catch(Exception $e){
				echo $e;
			}
		}
		
	}


?>