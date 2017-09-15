<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<script src="../../assets/bootstrap/js/jquery-3.2.1.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/bootstrap/js/main.js"></script>
	<script src="../../assets/sweetalert/dist/sweetalert.min.js"></script>
	<link href="../../assets/sweetalert/dist/sweetalert.css"  rel="stylesheet">
	<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../../assets/bootstrap/css/estilo.css" rel="stylesheet" media="screen">
	<link href="../../css/style.css" rel="stylesheet" media="screen">
	<link href="../../css/font-awesome.min.css" rel="stylesheet" media="screen">
	<link href="../../imagens/logo.ico" rel="shortcut icon">
	<link href="competicao.css" rel="stylesheet" media="screen">

	<title>Competição | Quimicamente </title>
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
					<a href="#"><img id="img" src="images/logoQuim.png"/></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse navbar-right">
					<ul class="nav navbar-nav navbar-text">
						<li><a href="index.html" class="menu">Home</a></li>
						<li><a href="sobre.html" class="menu">Sobre</a></li>
						<li class="hidden-xs"><a href="cadastro.html" class="menu">Cadastro</a></li>
						<li><a href="login.php" class="menu">Login </a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
	</nav>
    <!--Corpo da Página-->
	
    <section id="inicio">
	    <div class="row">
			<div class="container-fluid">
				<div id="div" class="boasvindas" style="background-color:white">
					<div class="col-lg-12" style="text-align:center">
						<center><img src="../../imagens/competicaoLogo.png"/></center>
					</div>
					<div class="col-lg-12">
						<br><br><p>Bem vindo ao Modo Competição! Aqui você deve ser capaz de responder o número definido de questões em apenas 30 minutos. Selecione o nível de dificuldade</p>
					</div>
					<div class="col-lg-4">
						<div class="dificuldade">
							<h1>Fácil</h2>
							<p>O nível mais fácil de todos, feito para os iniciantes</p>
							<a href="telacompeticao.php">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="dificuldade">
							<h1>Médio</h1>
							<p>Para aqueles que já estão mais mais avançados</p>
							<a href="telacompeticao.php">
						</div>	
					</div>			
					<div class="col-lg-4">
						<div class="dificuldade">
							<h1>Difícil</h1>
							<p>Se quer desafio, essa é a escolha certa pra você!</p>
							<a href="telacompeticao.php">
						</div>
					</div>
				</div>							
			</div>
		</div>
	</section>
    <!--/Corpo da Página-->
	<footer id="footer" class="hidden-xs">
		<ul class="icons">
			<li><a href="https://www.facebook.com/cti.unesp.bauru/?fref=ts" target="_blank">Facebook</a><br></li>
			<li><a href="http://quarkztech.blogspot.com.br" target="_blank">Blog dos Desenvolvedores</a></li>
			<li><a href="http://www.cti.feb.unesp.br/" target="_blank">Site do CTI</a></li>
			<br><br>
			<li><a href="https://www.facebook.com/quarkzQuimicamente" target="_blank"><img src="../../imagens/ico_face.png" width="50" /></a></li>
			<li><img src="../../imagens/ico_twitter.png" width="50" /></li>
			<li><img src="../../imagens/ico_blog.png" width="50"/></li>
			<li><img src="../../imagens/ico_link.png" width="50" /></li>
		</ul>
		<div class="container">
			<ul class="copyright">
				<li>&copy; 2017 Quimicamente </li>
				<li>Desenvolvido por: Quarkz Technology </li> 
			</ul>
		</div>
	</footer>
	<footer id="footer" class="visible-xs">
		<ul class="copyright">
			<li>Desenvolvido por: Quarkz Technology </li> 
		</ul>
	</footer>
</body>
</html>