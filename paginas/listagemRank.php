<?php
	$usr = 1;
	include("../models/suporte.php");	
	$sql="SELECT * FROM desempenhos where usuarios_id = ? ORDER BY desempenhos_notafinal desc;";
	$param = array($usr);
	$n = Database::selecionarParam($sql, $param);	
		
		try{
			 
			$queryyt = Database::selecionar($sql);
                if($query)
				{
                	for($i = 0; $i < count($query); $i++){
                		$desempenhos[$i] = objDesempenho($query[$i]);
						echo $desempenhos[$i];
						
					}
						//if isset($_GET['id'])) echo $_GET['id'];
					return $desempenhos;
                
				}
                
            }catch(Exception $e){
                echo("Erro: ".$e);
            }
	
	
	

?>