<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css"/>
	<link rel="stylesheet" href="../css/css_form.css"/>
	<link rel="stylesheet" href="../css/css_index.css"/>
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap2.css">
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/hover.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/java.js"></script>
	<style>
		.navbar {
			background-color: transparent;
			border-color: transparent;
			position: absolute;
		}
	</style>
	<link rel="shortcut icon" href="../imagens/logo.ico">
	<title> Home | Quimicamente </title>
</head>
<body>
</style>
	<div id="loading">
		<center><img src="../imagens/logo.png" width="100px" height="100px"/><span>Carregando...</span></center>
	</div>
<div id="mae">
	<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.html"><img id="img" src="../imagens/Quim.png"/></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse navbar-right">
					<ul class="nav navbar-nav navbar-text">
						<li><a href="#" class="menu ativo">Home</a></li>
						<li><a href="sobre.php" class="menu">Sobre</a></li>
						<li><a href="cadastro.php" class="menu">Cadastro</a></li>
						<li><a href="login.php" class="menu">Login </a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>		<!-- Bootstrap core JavaScript
		================================================== -->
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<section id="banner" class="altmax">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="../js/java.js"></script>
		<center>
			<div id="backtopo" class="hidden-xs">
				<a href="#" title="Voltar ao topo"><div class="f1-step-icon"><i class="fa fa-chevron-up fa-3"></i></div></a>
			</div>
		</center>

		<div id="alerta"></div>

		<center>
			<a href="#" class="hvr-float-shadow"><img src="../imagens/logo.png" width="200px" height="200px" align="center" class="animated fadeInDown"/></a>
		</center>
		<h1 align="center" class="pad animated fadeInUp text"> Conhecimento <br> "De Astato à Zinco" </h1><br><br><br><br>
		<center>
				<input type="button" class="button special big animated fadeInLeft" onclick="location.href='login.php'" Value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aluno&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"/>
				<input type="button" class="button special big animated fadeInRight" onclick="location.href='login.php'" Value="Professor"/>
				<br><br><br><br>
				<h1><a href="#" class="click-scroll hvr-icon-hang"></a></h1>
		</center>
	</section>
	<div id="title" class="hidden-xs ">
		<center>
			<h1 class="pad animated fadeInUp" data-animation="fadeInUp">O Quimicamente é perfeito para o que você está procurando</h1>
		</center>
	</div>
	<div id="corpo" class="row hidden-xs">
		<div class="col-md-4"> 
			<center>
				<img src="../imagens/alunos.jpg" height="200px" class="animated fadeInLeft"/>
				<h1 class="pad animated fadeInUp">Ensino Médio</h1>
				<!-- Button trigger modal -->
				<input type="button" value="Saiba mais" class="special animated fadeInUp" data-toggle="modal" data-target="#em"/>
			</center>
                <!-- Modal -->
                            <div class="modal fade" id="em" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Ensino Médio</h4>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <!--<div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>-->
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                         <!-- /.modal -->
		</div>
		<div class="col-md-4">
			<center>
				<img src="../imagens/vestibular.jpg" height="200px" class="animated fadeInUp"/>
				<h1 class="pad animated fadeInUp">Vestibular</h1>
				<input type="button" value="Saiba mais" class="special animated fadeInUp" data-toggle="modal" data-target="#vestibular"/>
			</center>
                <!-- Modal -->
                            <div class="modal fade" id="vestibular" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Vestibular</h4>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <!--<div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>-->
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                         <!-- /.modal -->
		</div>
		<div class="col-md-4">
			<center>
				<img src="../imagens/diversao.jpg" height="200px" class="animated fadeInRight"/>
				<h1 class="pad animated fadeInUp">Diversão</h1>
				<input type="submit" value="Saiba mais" class="special animated fadeInRight" data-toggle="modal" data-target="#diver"/>
			</center>
                <!-- Modal -->
                            <div class="modal fade" id="diver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Diversão</h4>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <!--<div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>-->
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                         <!-- /.modal -->
		</div>
		
	</div>
	<section id="pfooter" class="hidden-xs">
		<center>
			<h1 class="pad animated fadeInLeft"> O melhor da Química você só encontra aqui </h1>
			<h3 class="animated fadeInRight">conteúdo completo para os químicos de plantão</h3><br><br>
			<input type="button" value="Cadastre-se" class="back big animated fadeInLeft" onclick="location.href='cadastro.php'"/>
		</center>
		<!-- Javascript -->
        <script src="../assets/js/jquery-1.11.1.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.backstretch.min.js"></script>
        <script src="../assets/js/retina-1.1.0.min.js"></script>
        <script src="../assets/js/scripts.js"></script>
	</section>
	<footer id="footer" class="hidden-xs">
	<ul class="icons">
						<li><a href="https://www.facebook.com/cti.unesp.bauru/?fref=ts" target="_blank">Facebook</a><br></li>
						<li><a href="http://quarkztech.blogspot.com.br" target="_blank">Blog dos Desenvolvedores</a></li>
						<li><a href="http://www.cti.feb.unesp.br/" target="_blank">Site do CTI</a></li>
					<br><br>
						<li><a href="https://www.facebook.com/quarkzQuimicamente" target="_blank"><img src="../imagens/ico_face.png" width="50" /></a></li>
						<li><img src="../imagens/ico_twitter.png" width="50" /></li>
						<li><img src="../imagens/ico_blog.png" width="50"/></li>
						<li><img src="../imagens/ico_link.png" width="50" /></li>
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
</div>	
</body>
</html>