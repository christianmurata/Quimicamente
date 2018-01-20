<?php
    include "../models/model_adcCtd.php";
    session_start();
    if(isset($_GET["action"]) == false){
            die("waiting_for_argument");
        }

    $action = $_GET["action"];

    switch($action){
        case "carregarConteudo":
           if(!isset($_SESSION['login'])){
                die(json_encode(array('error' => "Erro de autenticação")));
           }

            try{
                echo json_encode(ModelAdcCtd::carregarModulosInsercao());
            }
            catch(Exception $e){
                die(json_encode(array('error' => $e->getMessage())));
            }
            break;
        case "carregarSlides":
            
            if(!isset($_SESSION["login"])){
                die(json_encode(array('error' => "Erro de autenticação")));
            }

            if($_SESSION['login']->getUsuarios_nivel() > 2){
                die(json_encode(array('error' => "Erro de autenticação")));
            }
            try{
                if(isset($_POST["conteudos_id"])){
                    $conteudos_id = explode("-",$_POST["conteudos_id"]);
                    if($conteudos_id[0] == 'ofc' && $_SESSION['login']->getUsuarios_nivel() == 1){
                        echo json_encode(ModelAdcCtd::carregarSlides($conteudos_id[1]));
                    }
                    
                    else{
                        echo json_encode(ModelAdcCtd::carregarSlidesComunidade($conteudos_id[1]));
                    }
                }
            }
            catch(Exception $e){
                die(json_encode(array('error' => $e->getMessage())));
            }
            break;
        case "salvarConteudo":
            if(!isset($_SESSION["login"])){
                die(json_encode(array('error' => "Erro de autenticação")));
            }
            
            if($_SESSION['login']->getUsuarios_nivel() > 2){
                die(json_encode(array('error' => "Erro de autenticação")));
            }
            try{
                echo json_encode(ModelAdcCtd::carregarModulosInsercao());
            }
            catch(Exception $e){
                die(json_encode(array('error' => $e->getMessage())));
            }
            break;
              case "salvarSlides":
                        if(!isset($_SESSION["login"])){
                die(json_encode(array('error' => "Erro de autenticação")));
            }
            
            if($_SESSION['login']->getUsuarios_nivel() > 2){
                die(json_encode(array('error' => "Erro de autenticação")));
            }
            try{
                if(!isset($_POST["conteudos_id"]))   die(json_encode(array('error' => "missing 'conteudos_id' argument")));
                if(!isset($_POST["slides"]))   die(json_encode(array('error' => "missing 'slides' argument")));
                if(!isset($_POST["perguntas"]))   die(json_encode(array('error' => "missing 'perguntas' argument")));
                
                return json_encode(ModelAdcCtd::salvarSlides($_POST["conteudos_id"], $_POST["slides"], $_POST["perguntas"]));
            }
            catch(Exception $e){
                die(json_encode(array('error' => $e->getMessage())));
            }
            break;
            
        case "novoModulo":
            if(!isset($_SESSION["login"])){
                die(json_encode(array('error' => "Erro de autenticação")));
            }
            
            if($_SESSION['login']->getUsuarios_nivel() > 2){
                die(json_encode(array('error' => "Erro de autenticação")));
            }
            
                if(!isset($_POST['conteudos_ordem']))   die(json_encode(array('error' => "faltam argumentos")));
                if(!isset($_POST['conteudos_nome']) || !trim($_POST['conteudos_nome']))         die(json_encode(array('error' => "faltam argumentos")));
                if(!isset($_POST['conteudos_desc']) || !trim($_POST['conteudos_desc']))         die(json_encode(array('error' => "faltam argumentos")));
                try{
                   $ordem =  explode("-",$_POST["conteudos_ordem"]);
                        echo json_encode(ModelAdcCtd::novoModulo(
                            array(
//
                                "conteudos_ordem" => $ordem[1]+1,
                                'conteudos_nome' => $_POST['conteudos_nome'],
                                'conteudos_desc' => $_POST['conteudos_desc']
                               )
                        ));
                }
                catch(Exception $e){
                    die(json_encode(array('error' => $e->getMessage())));
                }
            break;
            
        case "excluiModulo":
            if(!isset($_SESSION["login"])){
                die(json_encode(array('error' => "Erro de autenticação")));
            }
            
            if($_SESSION['login']->getUsuarios_nivel() > 2){
                die(json_encode(array('error' => "Erro de autenticação")));
            }
            if(!isset($_POST['conteudos_id'])){
                die(json_encode(array('error' => "Esperando por 1 argumento.")));
            }
            try{
                 die(json_encode(ModelAdcCtd::excluiModulo($_POST["conteudos_id"])));
            }
            catch(Exception $e){
                die(array('error' => $e->getMessage()));
            }
            break;

        case "cortarCapa":
            if(isset($_FILES["arquivo"]["name"]) == false){
                throw new Exception("img_not_found");
            }

            else{
                echo json_encode(ModelAdcCtd::enviarImagem($_FILES, $_POST));
            }
            break;

        case "salvarCapa":
            if(isset($_FILES["arquivo"]["name"]) == false){
                throw new Exception("img_not_found");
            }

            else{
                echo json_encode(ModelAdcCtd::salvarImagem($_POST));
            }
            break;

        case "capaPadrao":
            ModelAdcCtd::capaPadrao($_POST["id_conteudo"]);
            break;

        case "excluiModuloVazio":
            if(!isset($_POST["id"])){
                die("denied");
            }
            ModelAdcCtd::excluiModuloVazio($_POST["id"]);
            break;
    }
