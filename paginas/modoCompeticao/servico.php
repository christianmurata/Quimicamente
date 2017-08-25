<?php
	require ".../Quimicamente/models/suporte.php";
	include_once ("entidades.php");
	
	$servico= new Servico();
	class Servico{
		static function objPerguntas($perg){
            $pergunta = new Perguntas();
            $pergunta->setPerguntas_id($perg["perguntas_id"]);
            $pergunta->setConteudos_id($perg["conteudos_id"]);
            $pergunta->setPerguntas_descricao($perg["perguntas_descricao"]);
            $pergunta->setExcluido($perg["perguntas_del"]);
            
            return $pergunta;
        }
        
        static function objRespostas($desc){
            $descont = new Respostas();
            $descont->setRespostas_id($desc["respostas_id"]);
            $descont->setPerguntas_id($desc["perguntas_id"]);
            $descont->setRespostas_desc($desc["respotas_desc"]);
            $descont->setRespostas_correta($desc["respostas_correta"]);
            $descont->setRespostas_del($desc["respostas_del"]);
            
            return $descont;
        }
	}
?>