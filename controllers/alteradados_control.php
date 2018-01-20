<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
	include_once('../models/model_alteradados.php');
    require("../assets/Wideimage/WideImage.php");
	
	session_start();
	$usuario=$_SESSION['login'];
	$usuarios_id=$usuario->getUsuarios_id();
	
	//$action = $_REQUEST['action'];
	$option = $_POST['opcao'];
	
	
	if($option == 3){
		$foto = $_FILES['Arquivo'];
		$allowed = "(png|jpg|jpeg|gif)";
		if($foto['error'] == '4'){
			echo "1";
			return;
		}else if(!preg_match("/\.".$allowed."$/i", $foto['name'])){
			echo "2";
		}else if($foto['size'] >= 2097152 || $foto['size'] <= 0){
			echo "3";
		}else{

            $imgPath = "../uploads/profile_pics/".md5($foto["name"].time()).".jpg";

            WideImage::load($foto["tmp_name"])->resize(200,200, 'fill')->saveToFile($imgPath);

			$param=array($imgPath,
						 $usuarios_id);
			Model_Alteradados::alteraFoto($param);
			$_SESSION['login']=Model_Alteradados::buscaDados($usuarios_id);
		}
	}
	
	if($option==1){
		$usuarios_nome= ucwords(strtolower($_POST['nome']));
		$auxnome=$usuario->getUsuarios_nome();
		$auxdata=$usuario->getUsuarios_datanasc();
		$usuarios_datanasc=$_POST['data'];
		$lennome=strlen($usuarios_nome);
		
		if($usuarios_nome==""){
			echo "Digite um nome valido!";
			return;
		}else if($usuarios_datanasc==""){
			echo "Digite uma senha valida!";
			return;
		}else if($lennome<3){
			echo "Digite um nome valido!(3 caracters)";
			return;
		}else if($auxnome==$usuarios_nome && $usuarios_datanasc == $auxdata){
			echo "Dados iguais!";
			return;
		}else{
			$param=array($usuarios_nome,
						 $usuarios_datanasc,
						 $usuarios_id);
			Model_Alteradados::alteraDados($param);
			$_SESSION['login']=Model_Alteradados::buscaDados($usuarios_id);
		}
		
	}
	else if($option==2){
		$senhaform=md5($_POST['senha_atual_form']);
		$senhaatual=$usuario->getUsuarios_senha();
		
	
		$novasenha=$_POST['nova_senha'];
		$confirmnovasenha=$_POST['confirm_nova_senha'];
		
		$lensf=strlen($senhaform);
		$lenns=strlen($novasenha);
		$lencns=strlen($confirmnovasenha);
		
		if($senhaform==""){
			echo "Digite sua senha!(6 digitos)";
			return;
		}else if($novasenha==""){
			echo "Digite uma nova senha valida(6 digitos)!";
			return;
		}else if($confirmnovasenha==""){
			echo "Confirme a nova senha(6 Digitos)!";
			return;
		}else if($lensf<6){
			echo "Digite sua senha!(6 digitos)";
			return;
		}else if($lenns<6){
			echo "Digite uma nova senha valida(6 digitos)!";
			return;
		}else if($lencns<6){
			echo "Confirme a nova senha(6 Digitos)!";
			return;
		}else if($novasenha!=$confirmnovasenha){
			echo "Confirme a nova senha!";
		}else if($senhaatual!=$senhaform){
			echo "Senha atual não confere! ";
		}else{
			$usuarios_senha = md5($novasenha);
			$param=array($usuarios_senha,
						 $usuarios_id);
			Model_Alteradados::alteraSenha($param);
			$_SESSION['login']=Model_Alteradados::buscaDados($usuarios_id);
			
		}
			
	}
?>