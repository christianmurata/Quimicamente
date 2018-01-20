<?php

    include_once("checkLogin.php");
    include_once("../models/model_curso.php");
    include_once("../models/sala_model.php");

    if(isset($_SESSION['ja_fez'])){
        header('location: index.php');
    }

    if(isset($_POST['tipo']) && isset($_POST['passou']) && isset($_POST['respostas']) && isset($_POST['conteudo_ordem'])){
        $tipo               = $_POST['tipo'];
        $passou             = $_POST['passou'];
        $respostas_usuario  = $_POST['respostas'];
        $user               = $_SESSION['login'];
        $aluno              = $user->getAlunos();
        $conteudos_ordem    = $_POST['conteudo_ordem'];
        switch ($tipo) {
            case 'CO':
                if($passou != "false"){
                    if($aluno->getConteudos_ordem() <= $conteudos_ordem){
                        $liberar_proximo = Model_curso::LiberarProximoConteudo($aluno->getAlunos_id());
                        if(!$liberar_proximo){
                            $message = "Infelizmente não foi possível carregar a página!";
                            include("404_Not_Found.php");
                            return;
                        }else{
                            $_SESSION['login']->getAlunos()->setConteudos_ordem($conteudos_ordem + 1);
                        }
                    }
                }
                $_SESSION['ja_fez'] = true;
                carregaPaginaOficial($passou, $respostas_usuario, $conteudos_ordem);
                break;
            
            case 'CL':
                carregaPaginaOficial($passou, $respostas_usuario, $conteudos_ordem);
                break;

            case 'CC':
                carregaPaginaOficial($passou, $respostas_usuario, $conteudos_ordem);
                break;

            case 'CCL':
                carregaPaginaOficial($passou, $respostas_usuario, $conteudos_ordem);
                break;

            default:
                # code...
                break;
        }
    }else{
        include("404_Not_Found.php");
        return;
    }

    function carregaPaginaOficial($passou, $respostas_usuario, $conteudo_ordem){
        $next = (int)$conteudo_ordem + 1;
        include("templates/header.php");
        include("templates/navbar.php");
        include("curso/final-oficial-body.php");
        include("templates/footer.php");
    }

?>