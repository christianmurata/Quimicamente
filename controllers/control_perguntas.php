<?php
	//include_once("checkLogin.php");
	
    ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);
   	require_once("../models/model_curso.php");
	require_once("../models/sala_model.php");
	require_once("../views/perguntasView.php");

	$action = $_REQUEST['action'];

	switch ($action) {
		case 'SelecionarPerguntas':
			$conteudos_id 	= $_POST['id'];
			$perguntas 		= Model_curso::selecionarPerguntasConteudo($conteudos_id);

			if($perguntas){
				return perguntasView::carregaPerguntas($perguntas);
			}
			break;
		
		case 'checkRespostas':
			$perguntas_id 	= $_POST['pergunta_id'];
			$resposta_id	= $_POST['resposta_id'];
			$param = array((int)$perguntas_id, (int)$resposta_id);
			
			$resposta 		= Model_curso::checkRespostas($param);
			if($resposta){
				if($resposta->getRespostas_correta() == "S"){
					$json = array("resposta_correta" => "S");
					echo json_encode($json);
				}else{
					$resposta_certa = Model_curso::selecionarRespostaCerta($perguntas_id);
					$json = array("resposta_correta" => "N", "resposta_certa" => $resposta_certa->getRespostas_id());
					echo json_encode($json);
					//var_dump($resposta_certa);
				}
			}
			break;
		
		case 'SelecionarPerguntasComunidade':
			$conteudos_id 	= $_POST['id'];
			$perguntas 		= Model_curso::selecionarPerguntasConteudoComunidade($conteudos_id);

			if($perguntas){
				return perguntasView::carregaPerguntasComunidade($perguntas);
			}
			break;

		case 'checkRespostasComunidade':
			$perguntas_id 	= $_POST['pergunta_id'];
			$resposta_id	= $_POST['resposta_id'];
			$param = array((int)$perguntas_id, (int)$resposta_id);
			
			$resposta 		= Model_curso::checkRespostasComunidade($param);
			if($resposta){
				if($resposta->getRespostas_comunidade_correta() == "S"){
					$json = array("resposta_correta" => "S");
					echo json_encode($json);
				}else{
					$resposta_certa = Model_curso::selecionarRespostaComunidadeCerta($perguntas_id);
					$json = array("resposta_correta" => "N", "resposta_certa" => $resposta_certa->getRespostas_comunidade_id());
					echo json_encode($json);
				}
			}
			break;

		default:
			# code...
			break;
	}
?> 