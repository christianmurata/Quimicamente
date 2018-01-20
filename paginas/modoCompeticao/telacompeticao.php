<?php
	/*include "../../controllers/control_competicao.php";
	
	session_start();

    if(!isset($_SESSION['login'])){
			header('location: index.php');
		}
		
		$user = $_SESSION['login'];
		$nivel = $user->getUsuarios_nivel();

		if($nivel < 3){
			header('location: index.php');
		}
*/
    include "../templates/header.php";
?>

<body style="overflow-x: hidden">
<?php
	include "../templates/navbar.php";
	include "tela_competicao.php";
		
?>
</body>
	<?php include "../templates/footer.php";
?>

