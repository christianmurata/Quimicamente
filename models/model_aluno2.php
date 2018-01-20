<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL); 

    include 'servico.php';
class model_aluno{

    static function dadosAluno(){
        $sql = "SELECT * FROM usuários INNER JOIN alunos on usuarios.usuarios_id = alunos.usuarios_id WHERE usuarios.usuarios_id = ?";
        $aluno = Database::selecionarParam($sql, array($_SESSION["login"]->getUsuarios_id()));
        $aluno = $aluno[0];

        $sql = "SELECT * FROM conteudos WHERE conteudos_del = 'N' ORDER BY conteudos_ordem";
        $conteudos = Database::selecionar($sql);
        $numConteudos = count($conteudos);

        $conteudoAtual = $conteudos[$aluno["conteudos_ordem"]-1];

        $link_continuar = "http://200.145.153.172/quarkz/Quimicamente/paginas/curso.php?conteudos_ordem=".$aluno["conteudos_ordem"]."&action=CO";

        if($aluno["conteudos_ordem"] < 2)   $aluno["conteudos_ordem"]--;
        if($aluno["conteudos_ordem"] == $numConteudos)   $aluno["conteudos_ordem"]++;

        $porcentagem_curso = ($numConteudos/100)*$aluno["conteudos_ordem"];

        $sql = "SELECT desempenhos_notafinal, usuarios_nome FROM desempenhos INNER JOIN alunos ON desempenhos.alunos_id = alunos.alunos_id 
                  INNER JOIN usuarios ON alunos.usuarios_id = usuarios.usuarios_id 
                  WHERE desempenhos_del = 'N' AND desempenhos_dificuldade = ? ORDER BY desempenhos_notafinal DESC LIMIT 5";

        $facil = Database::selecionarParam($sql, array(1));
        $medio = Database::selecionarParam($sql, array(2));
        $dificil = Database::selecionarParam($sql, array(3));

        return array($aluno, $conteudoAtual, $link_continuar, $porcentagem_curso, $facil, $medio, $dificil);
    }

}//class aluno




