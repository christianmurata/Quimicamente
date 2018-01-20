<?php 
	include_once('../models/model_alteradados.php');
	
	session_start();
	$usuario=$_SESSION['login'];

	$usuarios_id=$usuario->getUsuarios_id();
	
	
	
	$option=$_POST['option'];
	
	
	if($option==1){
		$nome=$_POST['nome'];
		$data=$_POST['data'];
		
		echo $nome."".$data."";
		
		
		
	}
	else if($option==2){
		$senhaform=md5($_POST['senha_atual_form']);
		$senhaatual=$usuario->getUsuarios_senha();
		echo $senhaform."<br>";
		echo $senhaatual."<br>";
		echo $usuarios_id;
		
		$novasenha=$_POST['nova_senha'];
		$confirmnovasenha=$_POST['confirm_nova_senha'];
		
		/*echo "senha session".$senhaatual."<br>"."senha atual do form".$senhaform."<br>nova senha".$novasenha."<br> confirm nova senha".$confirmnovasenha;*/
		
		if($senhaatual!=$senhaform){
			echo "senha atual";
		}
		else if($novasenha!=$confirmnovasenha){
			echo "nova senha";
		}
		else{
			$usuarios_senha = md5($novasenha);
			$param=array($usuarios_senha,
						 $usuarios_id);
			$a = Model_Alteradados::alteraSenha($param);
			echo $a;
		}
			
	}
	
?>