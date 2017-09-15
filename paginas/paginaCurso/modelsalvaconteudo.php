<?php
include "../../models/servico.php";

//salvar conteudo
class SALVARAVANCO{
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
}
?>