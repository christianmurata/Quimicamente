<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php
	include "../controllers/control_competicao.php";
	
	session_start();

    if(!isset($_SESSION['login'])){
			header('location: index.php');
		}
		
		$user = $_SESSION['login'];
		$nivel = $user->getUsuarios_nivel();

		if($nivel < 3){
			header('location: index.php');
		}

    include "templates/header.php";
?>
</head>
<body style="overflow-x: hidden">
<?php
	include "templates/navbar.php";
	include "modoCompeticao/difficulty.php";
?>
</body>
	<?php include "templates/footer.php";
?>
