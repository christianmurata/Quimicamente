<!DOCTYPE html>
<html lang ="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css"/>
	<link rel="stylesheet" href="../css/css_login.css"/>
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap2.css">
	<link rel="stylesheet" href="../css/elements.css"/>
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../sweet_alert/sweetalert2.css">
    <script src="../sweet_alert/sweetalert2.js"></script>
	<script src="../js/mensagens.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script type="text/javascript" src="../js/ajax.js"></script>
	<script type="text/javascript" src="../js/java.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<style>
		.navbar {
			background-color: transparent;
			border-color: transparent;
			position: absolute;
		}
	</style>
	<link rel="shortcut icon" href="../imagens/logo.ico">
	<title> Login | Quimicamente </title>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#"><img id="img" src="../imagens/Quim.png"/></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse navbar-right">
					<ul class="nav navbar-nav navbar-text">
						<li><a href="index.php" class="menu">Home</a></li>
						<li><a href="sobre.php" class="menu">Sobre</a></li>
						<li><a href="cadastro.php" class="menu">Cadastro</a></li>
						<li><a href="#" class="menu ativo">Login </a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
		<div id="alerta"></div>
	<section id="banner">
			<center>
				<h1 class="pad"> &nbsp; </h1><br>
				<!--<p> Faça o login para ter acesso a todo contéudo do site </p>-->
			<div id="login">
				<form name ="frmLogin" action="" method="POST" onsubmit="return login();">
					<input type="text" name="email" id="txtEmail" placeholder="Email" class="form-control animated fadeInLeft" required/><br>
					<input type="password" name="senha" id="txtSenha" placeholder="Senha" class="form-control animated fadeInRight" required/>
					<div class="animated fadeInLeft"><a href="" class="b">Esqueci minha senha</a><br><br></div>
					<input type="submit" class="special big total animated fadeInUp" Value="Login"/>
				</form>
			</div>
		</center>
	</section>
	<?php include 'templates/footer.php'; ?>
</body>
</html>