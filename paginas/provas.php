<?php
    include_once("checkLogin.php");
	include_once("../models/model_provas.php");
	include_once("../models/sala_model.php");
	include_once("../models/model_curso.php");
    
    ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);

	if((isset($_GET['provas_id']) && isset($_GET['action'])) && ($_GET['provas_id'] != "" && $_GET['action'] != "")){
		try{
			$action = $_GET['action'];
			$user = $_SESSION['login'];
			$aluno = $user->getAlunos();
			$prova_id 		= $_GET['provas_id'];
			switch ($action) {
				case 'prova':
					$verifica = Model_provas::verificarProva($prova_id, $aluno->getAlunos_id());
					if(!$verifica == "true"){
						$turma_aluno 	= Sala_model::selecionarTurmaAluno($user->getAlunos()->getAlunos_id());
						$prova 			= Model_provas::selecionaProva($prova_id, $turma_aluno->getTurmas_id(), $turma_aluno->getProfessores_id());
						
						if($prova){
							carregarProva($prova,$turma_aluno);
							return;
						}else{
							$mensagem = "Prova não encontrada!";
							include_once("404_Not_Found.php");
						}
					}else{
							$mensagem = "Parece que você já fez essa prova!";
							include_once("404_Not_Found.php");
					}
					break;
				
				default:
					include_once("404_Not_Found.php");
					break;
			}
		}catch(Exception $e){
			$mensagem = "Serviço indisponível no momento!";
			include_once("404_Not_Found.php");
			return;
		}
	}else{
		$mensagem = "Tem certeza do que está fazendo?";
		include_once("404_Not_Found.php");
		return;
	}


	function carregarProva($prova, $turma_id){
		$perguntas = Model_provas::selecionarPerguntas($prova->getProvas_id());
		if($perguntas){
			include_once("templates/header.php");
			include_once("templates/navbar.php");
			include_once("provas/provas-body.php");
			include_once("templates/footer.php");
		}else{
			$mensagem = "Prova não disponível no momento!";
			include_once("404_Not_Found.php");
			return;
		}
	}

?>