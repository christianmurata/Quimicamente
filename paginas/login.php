<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css"/>
	<link rel="stylesheet" href="../css/css_login.css"/>
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap2.css">
	<link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../sweet_alert/sweetalert2.css">
	<script src="../js/jquery.js"></script>
    <script src="../sweet_alert/sweetalert2.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="../js/mensagens.js"></script>
	<script src="../js/java.js"></script>
	<script src="../js/ajax.js"></script>
	<link rel="shortcut icon" href="../imagens/logo.ico">
	<title> Login | Quimicamente </title>
</head>
<body>
	<header>
		<?php include 'templates/nav.php'; ?>
	</header>
	<main>
		<section id="banner">
						<center>
							<h1 class="pad"> &nbsp; </h1><br>
							<!--<p> Faça o login para ter acesso a todo contéudo do site </p>-->
							<div id="login">
								<form name ="frmLogin" action="" method="POST" onsubmit="return login();">
									<input type="text" name="email" id="txtEmail" placeholder="Email" class="form-control animated fadeInLeft" required/><br>
									<input type="password" name="senha" id="txtSenha" placeholder="Senha" class="form-control animated fadeInRight" required/>
									<div class="animated fadeInLeft"><a href="recuperacao.php" class="b">Esqueci minha senha</a><br><br></div>
									<input type="submit" class="special big total animated fadeInUp" Value="Login"/>
								</form>
							</div>
						</center>
		</section>
	</main>
	<footer>
		<?php include 'templates/footer.php'; ?>
	</footer>
</body>
</html>