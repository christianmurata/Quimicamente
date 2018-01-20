<?php
	include "../controllers/control_aluno.php";
	session_start();
    if(!isset($_SESSION['login'])){
			header('location: index.php');
	}
		
		$user = $_SESSION['login'];
		$nivel = $user->getUsuarios_nivel();

		if($nivel < 2){
			header('location: index.php');
		}

    include "templates/header.php";
?>
<!--adicionando o bootstrap-->
		<link href="aluno/bst/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<!--css personalizado-->
		<link href="aluno/bst/css/estilo.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="aluno/bst/css/style.css"/>
		<link rel="stylesheet" href="aluno/bst/css/css_menu.css"/>
		<link rel="stylesheet" href="aluno/bst/css/css_aluno.css"/>
		<link rel="stylesheet" href="aluno/bst/css/elements.css"/>
		<link rel="stylesheet" href="aluno/bst/css/metisMenu.min.css"/>
<body>
<?php
	include "templates/navbar.php";
	include "aluno/conteudo.php";
?>

<?php include "templates/footer.php"; ?>
</body>
	<?php //include "templates/footer.php"; ?>