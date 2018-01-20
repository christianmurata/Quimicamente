<?php 
    include_once("../models/homemd.php");
    include("checkLogin.php");
    session_start();

    $usuario = $_SESSION['login'];
    $nivel = $usuario->getUsuarios_nivel();
    $aluno = $_SESSION['login']->getAlunos();
    if($nivel == 3){
        $ultimoconteudo=$aluno->getConteudos_ordem();
        $result=count(Homemd::buscaConteudos());
        $nomeusuario=$usuario->getUsuarios_nome();
        $alunoid=$aluno->getAlunos_id();
        $foto=$usuario->getUsuarios_foto();
        $nf=Homemd::notaFacil($alunoid);
        $notafacil=$nf[0];
        $nm=Homemd::notaMedia($alunoid);
        $notamedia=$nm[0];
        $nd=Homemd::notaDificil($alunoid);
        $notadificil=$nd[0];

        $numCont = $ultimoconteudo;

        if(count(Homemd::buscaAlunoTurma()) > 0)    $temTurma = true;
        else $temTurma = false;

        if($ultimoconteudo  == 1)       $numCont--;
        if($ultimoconteudo == $result)  $numCont++;

        $porcentagem=number_format(($numCont * 100)/$result);

        include ("templates/header.php");
        include ("templates/navbar.php");
        include ("home/homeview.php");
        include ("templates/footer.php");
    } 

 ?>