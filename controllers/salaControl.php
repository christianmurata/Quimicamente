<?php
	include_once("../models/sala_model.php");
	include_once("../models/model_login.php");
	$acao = $_REQUEST["action"];

	switch($acao){
		case 'sair':
			$a = Sala_model::sairTurma($_POST['id_aluno']);
			$retorno = array("code"=>$a);
			if($a){
				Model_login::logout();
				$ret = json_encode($retorno);
				echo $ret;
			}
			break;
		default:
			break;
	}

?>