<?php
	include("../../models/suporte.php");
	
	$Model_rank = new Model_rank();
	
	class Model_rank($dificuldade)
	{
		echo "teste";
		static function desempenhos($dificuldade)
		{
			try{
				$sql="SELECT * FROM desempenhos inner join alunos on desempenhos.alunos_id = alunos.alunos_id inner join usuarios on alunos.usuarios_id = usuarios.usuarios_id where desempenhos.desempenhos_dificuldade = ? order by desempenhos.desempenhos_notafinal desc";			
				$query = Database::selecionarObjeto($sql,$dificuldade);
				return $query;
				print_r ($query);
		}
		catch(Exception $e){
			die($e);
		}
	}
	
?>