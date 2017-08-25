<?php 
	include_once('alteradadosmodel.php');
	session_start();
	
	$option=$_POST['option'];
	
	if($option==1){
		$nome=$_POST['nome'];
		$email=$_POST['email'];
		
	}
	else if($option==2){
			
	}
	
?>