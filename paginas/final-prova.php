<?php
	
	include_once("checkLogin.php");
    include_once("../models/model_provas.php");
    //include_once("../models/sala_model.php");

    if(isset($_SESSION['ja_fez'])){
        header('location: index.php');
    }

    if(isset($_POST['passou']) && isset($_POST['respostas']) && isset($_POST['provas_id']) && isset($_POST['media'])){
    	$passou             = $_POST['passou'];
        $respostas_usuario  = $_POST['respostas'];
        $user               = $_SESSION['login'];
        $aluno              = $user->getAlunos();
        $provas_id    		= $_POST['provas_id'];
        $media 				= number_format($_POST['media'], 1, '.', '');

        if($media){
        	try{
        		$verifica = Model_provas::verificarProva($provas_id, $aluno->getAlunos_id());
        		if(!$verifica == "true"){
        			$salvar_media = Model_provas::salvarMedia($aluno->getAlunos_id(), $provas_id, $media);
        			if($salvar_media == '1'){
        				carregarPagina($media, $respostas_usuario, $passou);
        			}else{
                        $mensagem = "Ocorreu um erro inexperado!";
                        include("404_Not_Found.php");
                    }
        		}else{
        			$mensagem = "Prova já foi realizada!";
        			include("404_Not_Found.php");
        			return;
        		}
        	}catch(Exception $e){
        		include("404_Not_Found.php");
        		return;
        	}
        }

    }else{
        include("404_Not_Found.php");
        return;
    }
	

	function carregarPagina($media, $respostas, $passou){
		include_once("templates/header.php");
		include_once("templates/navbar.php");
		include_once("provas/final-provas-body.php");
		include_once("templates/footer.php");
	}
?>