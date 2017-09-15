<?php
require_once "../../models/servico.php";

//título do assunto
class TITULO{
    public static function TituloConteudo($idconteudo){
        $sql = "SELECT conteudos_nome FROM conteudos WHERE conteudos_id = ?";
        $array = array($idconteudo);
        return $recebetitulo = Database::selecionarParam($sql,$array);
    }
}



//seleção do conteúdo dos slides
class CONTEUDO{	
	public static function Consulta($idconteudo){
		$sql = "SELECT slides_conteudo FROM slides WHERE conteudos_id = ?";
		$array = array($idconteudo);
		return $recebevalor = Database::selecionarParam($sql,$array);		
	}
}


?>