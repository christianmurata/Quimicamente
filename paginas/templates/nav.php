<?php
	include_once('../models/servico.php');

	session_start();

	if(isset($_SESSION["login"])){
		$usuario = $_SESSION["login"];
		if($usuario->getUsuarios_nivel() == 2){
			header("location:professor.php");
		}else if($usuario->getUsuarios_nivel() == 3){
			header("location:aluno.php");
		}else{
            header("location:adicionar_conteudos.php");
        }
	}
?>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.php"><img id="img" src="../imagens/Quim.png"/></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse navbar-right">
					<ul class="nav navbar-nav navbar-text">
						<li><a href="index.php" class="menu">Home</a></li>
						<li><a href="sobre.php" class="menu">Sobre</a></li>
						<li><a href="cadastro.php" class="menu">Cadastro</a></li>
						<li><a href="login.php" class="menu">Login </a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
	</header>