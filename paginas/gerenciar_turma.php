<?php
    include "../models/entidades.php";
    session_start();

    if(!isset($_SESSION['login'])){
			header('location: index.php');
		}
		
		$user = $_SESSION['login'];
		$nivel = $user->getUsuarios_nivel();

		if($nivel > 2){
			header('location: index.php');
		}

    include "templates/header.php";
?>

<body>
<?php
	include "templates/navbar.php";
	include "gerenciar_turma/gerenciar_turma.html";
?>
</body>
	<?php //include "templates/footer.php";
?>