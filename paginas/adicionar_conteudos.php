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
<!--    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.css">-->
<!--    <link rel="stylesheet" href="../css/style.css"/>-->
<!--    <link rel="stylesheet" href="../css/css_form.css"/>-->

<body style="overflow-x: hidden">
<?php
	include "templates/navbar.php";
	include "adicionar_conteudo/adicionar_conteudo.html";	
?>
</body>
	<?php include "templates/footer.php";
?>