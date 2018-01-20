<?php
    include_once("checkLogin.php");
   	include_once("../models/model_curso.php");
	include_once("../models/sala_model.php");

	if(isset($_SESSION['ja_fez'])){
        unset($_SESSION['ja_fez']);
    }
    
    ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);

    if((isset($_GET['conteudos_ordem']) &&  isset($_GET['action'])) && ($_GET['action'] != "" && $_GET['conteudos_ordem'] != "")){
    	try{ //variaveis utlizadas para carregar o conteudo e qual o tipo dele
			$conteudo_ordem 	= $_GET['conteudos_ordem'];
			$action 			= $_GET['action'];
			$user 				= $_SESSION['login'];
			$turma_aluno 		= Sala_model::selecionarTurmaAluno($user->getAlunos()->getAlunos_id());

			switch ($action) {
				case 'CL':
					$conteudo 	= Model_curso::ConteudoLiberado($conteudo_ordem);
					if($conteudo){
						if($turma_aluno){
							$conteudo_liberado 	= Model_curso::verificaConteudoLiberado($conteudo->getConteudos_id(), $turma_aluno->getTurmas_id());			
							if($conteudo_liberado){
								carregaCurso($conteudo, $action);
							}else{
								$mensagem = "Conteudo não liberado!";
								erro($mensagem);
							}
						}else{
							$mensagem = "Turma não encontrada!";
							erro($mensagem);
						}
					}else{
						$mensagem = "Conteudo não encontrado!";
						erro($mensagem);
					}
					break;

				case 'CO':
					$conteudo 	= Model_curso::Conteudo($conteudo_ordem);
					$conteudos_ordem = $user->getAlunos()->getConteudos_ordem();
					if($conteudo){
						if($conteudos_ordem >= $conteudo->getConteudos_ordem()){
							carregaCurso($conteudo, $action);
						}else{
							$mensagem = "Você ainda não liberou esse conteúdo!";
							erro($mensagem);
						}
					}else{
						$mensagem = "Conteudo não encontrado";
						erro($mensagem);
					}
					break;

				case 'CC':
					$conteudo = Model_curso::ConteudoComunidade($conteudo_ordem);
					if($conteudo){
						carregaCursoComunidade($conteudo, $action);
					}else{
						$mensagem = "Conteudo não encontrado";
						erro($mensagem);
					}
					break;

				case 'CCL':
					$conteudo 	= Model_curso::ConteudoComunidade($conteudo_ordem);
					if($conteudo){
						if($turma_aluno){
							$conteudo_liberado 	= Model_curso::verificaConteudoComunidadeLiberado($conteudo->getConteudos_comunidade_id(), $turma_aluno->getTurmas_id());
							if($conteudo_liberado){
								carregaCursoComunidade($conteudo, $action);
							}else{
								$mensagem = "Conteudo não liberado!";
								erro($mensagem);
							}
						}else{
							$mensagem = "Turma não encontrada!";
							erro($mensagem);
						}
					}else{
						$mensagem = "Conteudo não encontrado!";
						erro($mensagem);
					}
					break;

				default:
					include_once("404_Not_Found.php");
					break;
    		}
		}catch(Exception $e){
			include_once("404_Not_Found.php");
		}
    }else{
    	include_once("404_Not_Found.php");
    }

	function carregaCurso($conteudo, $tipo){
		include_once("templates/header.php");
		include_once("templates/navbar.php");
		$slides = Model_curso::selecionarSlidesConteudo($conteudo->getConteudos_id());
		include_once("curso/curso-oficial-body.php");
		include_once("templates/footer.php");
	}

	function erro($mensagem){
		include_once("404_Not_Found.php");
	}


	function carregaCursoComunidade($conteudo, $tipo){
		include_once("templates/header.php");
		include_once("templates/navbar.php");
		$slides = Model_curso::selecionarSlidesConteudoComunidade($conteudo->getConteudos_comunidade_id());
		include_once("curso/curso-comunidade-body.php");
		include_once("templates/footer.php");
	}
?>