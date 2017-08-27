<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css"/>
    <link rel="stylesheet" href="../css/css_menu.css"/>
    <link rel="stylesheet" href="../css/css_professor.css"/>
    <link rel="stylesheet" href="../css/css_form.css"/>
	<link rel="stylesheet" href="../css/elements.css"/>
	<link rel="stylesheet" href="../css/metisMenu.min.css"/>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/style.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.min.js" /></script>
	<script src="../js/java.js"></script>
	<script src="../js/ajax.js"></script>

	<style>
        .btn-qmt{
            background: #4FFFBC;
            color: white;
        }
        
        .panel-quimicamente{
            border-color: #4FFFBC;
        }
        
        .panel-quimicamente > .panel-heading {
            border-color: #4FFFBC;
            color: white;
            background-color: #4FFFBC;
        }
        
        [id*=questao]{
            cursor: pointer;
        }
        [id*=selModulo]{
            cursor: pointer;
        }
        [id*=modulo]{
            cursor: pointer;   
        }
        .btn-right{
            float: right;
        }
    </style>
	
	<script src="js/jquery-1.8.3.min.js"></script>
	<link rel="shortcut icon" href="imagens/logo.ico">
	<title> Nova Turma | Quimicamente </title>
</head>
<body>      
            <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #ccc">        
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img  src="../imagens/logoQuim.png" width="200px"></a>
            </div>
			
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="padding-right:10px;">
                    <li class="active"><a href="#">Curso</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#"><span class="glyphicon glyphicon-blackboard"></span>     Sala</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-user"></span>     Perfil</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-edit"></span>     Curso</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-time"></span>     Competir</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-cog"></span>     Sobre</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-log-out"></span>     Sair</a></li>
						</ul>
					</li>
					<li><a href="#">Sobre</a></li>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-wrench"></span>     Editar perfil</a></li>
                            <li role="separator" class="divider"></li>
                            <li onclick = "return logout();"><a href="#"><span class="glyphicon glyphicon-log-out"></span>     Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
			<!--FINAL DA BARRA DE NAVEGAÇÃO SUPERIOR-->
		</nav>
    <!--Corpo da Página-->
    <section id="inicio">
        <div id="alerta"></div>
        <div id="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-quimicamente" id="box">
							<div class="panel-heading">
								Adicionar turmas
							</div>
							<div class="panel-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="hidden-xs hiddden-sm col-md-12 col-lg-12">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="hidden-xs hiddden-sm col-md-12 col-lg-12">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="hidden-xs hiddden-sm col-md-12 col-lg-12">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="hidden-xs hiddden-sm col-md-12 col-lg-12">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="hidden-xs hiddden-sm col-md-12 col-lg-12">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="hidden-xs hiddden-sm col-md-12 col-lg-12">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="hidden-xs hiddden-sm col-md-12 col-lg-12">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="hidden-xs hiddden-sm col-md-12 col-lg-12">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <p>Nome da turma</p><input type="text" class="form-control" id="turmas_nome" name="turmas_nome" placeholder="Insira o nome da Turma">
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            &nbsp;<input type="button" class="special total" value="Criar turma" align="right" onclick="inserir_turmas()"/>
                                        </div>
                                    </div>
                                </div> 
                            </div>
						</div><!--panel panel-quimicamente-->
                </div>
            </div>

				<script src="../assets/js/jquery-1.11.1.min.js"></script>
                <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
                <script src="../assets/js/jquery.backstretch.min.js"></script>
                <script src="../assets/js/retina-1.1.0.min.js"></script>
                <script src="../assets/js/scripts.js"></script>
                <script src="../js/metisMenu.min.js"></script>
                <script src="../js/elements.js"></script>
		</div><!--container-fluid-->
	</section><!--/Corpo da Página-->
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
	
</body>
</html>