<?php
	try{
		include_once ("../models/servico.php");
		$conteudos = Servicos::selecionarConteudos();
	}catch(Exception $e){
		echo $e;
	}

	include "templates/header.php";
?>

<body style="overflow-x: hidden">
	<?php include "templates/navbar.php";?>
	<?php include "telasala/telasala.php"; ?>
</body>
	<?php include "templates/footer.php";
?>