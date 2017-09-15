<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL); 

 echo "batata";
 
    include_once('../models/servico.php');
    include_once('../models/entidades.php');
    include_once('../models/suporte.php');
    
    class model_aluno{
        
       static function competicao($cont){
            $sql = "select * from desempenhos where desempenhos_del = 'N'";
			try
			{
				$query = Database::selecionar($sql);
                if($query){
               		//$sql1 = "SELECT * FROM desempenhos WHERE desempenhos_id = ? AND desempenhos_del = 'N'";
                		$tempo = $query[0]['desempenhos_tempo'];
						$nota  = $query[0]['desempenhos_notafinal'];
						$difi  = $query[0]['desempenhos_dificuldade'];
                        return  $query;
                	}//if
                	
                else{
                    return 0;}//else  
            }//try 
            
            
            catch(Exception $e){
                echo"haha";
            }//catch
        
        
        
        }//competição
        
       // static function rank($dificuldade){
//            
			//FALTA O SELECT DO USUARIO
        //}//rank
        
        static function turma($turma){
			$sql = "SELECT * FROM aluno WHERE alunos_id = ?";
                try{                                          //usuarios_id
                    $query = Database::selecionaObjeto($sql, $turma);
                    
                    if($query){
                       // for($i = 0; $i<count($query); $i++){
                            $sql_turmas = "SELECT * FROM turmas WHERE turmas_id = ?";
                            $param = $query[0]['turmas_id'];
                            $result = Database::selecionaObjeto($sql_turmas, $param);
                            if($result[0]){
                                $turmas[0] = Servico::objTurmas($result[0]); 
                            }
                       // }

                        return $turmas;

                    }
                    else{
                        return false;
                    }
                }
                catch(Exception $error){
                    die ($error);
                }
		}//
        
		static function conteudo(/*$conteudo*/){
			
			$sql="select conteudos_nome from conteudos where conteudos_del		= 'N'";
			$query = Database::selecionar($sql);
			echo (" ".$query);
			return $query;
		}//rank
    }//class aluno
?>