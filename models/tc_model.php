<?php 
	include_once("suporte.php");
    include_once("servico.php");
    include_once("entidades.php");
	$Tc_model=new Tc_model();
	
	
	class Tc_model{
		
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
		
		
		static function alunoTurma($param){
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
		}
	}
?>