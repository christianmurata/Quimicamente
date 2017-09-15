<?php
require_once "../../models/servico.php";

//perguntas sobre o assunto
class PERGUNTAS_CONTEUDO{
    public static function PerguntasConteudo($idconteudo){
        $sql = "SELECT perguntas.perguntas_descricao as perguntas, perguntas.perguntas_id as idperguntas, respostas.respostas_desc as respostas, respostas.respostas_correta as correta, respostas.respostas_id as idrespostas
		FROM conteudos
		INNER JOIN perguntas ON perguntas.conteudos_id = conteudos.conteudos_id
		INNER JOIN respostas ON respostas.perguntas_id = perguntas.perguntas_id
		WHERE conteudos.conteudos_id = ? ORDER BY idperguntas";
        $array = array($idconteudo);
        return $recebepergunta = Database::selecionarParam($sql,$array);
    }
}
?>