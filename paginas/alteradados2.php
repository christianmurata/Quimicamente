<?php
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);
	
	include_once('../models/servico.php');
	

	session_start();
	
	$usuario=$_SESSION['login'];
	$id=$usuario->getUsuarios_id();

	$nome=$usuario->getUsuarios_nome();
	$email=$usuario->getUsuarios_email();
	$data=$usuario->getUsuarios_datanasc();
	$foto=$usuario->getUsuarios_foto();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
	<meta name="description" content="Site do curso de química baseado em EaD">
	<meta name="keywords" content="química, quimicamente, quarkz, cti, tcc, 3º ano">
	<meta name="author" content="GABRIELLA">
	<!--CHAMADA DOS SCRIPTS-->
    <script src="../assets/bootstrap/js/jquery-3.2.1.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/js/main.js"></script>
	
    
    <link rel="shortcut icon" href="images/logo.ico">
	<title>Aluno | Quimicamente </title>
    
    <!--adicionando o bootstrap-->
	<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!--css personalizado-->
    <link href="../assets/bootstrap/css/estilo.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../assets/css/alterardados.css"/>
	<link rel="stylesheet" href="../assets/bootstrap/css/style.css"/>
    <link rel="stylesheet" href="../assets/bootstrap/css/css_menu.css"/>
    <link rel="stylesheet" href="../assets/bootstrap/css/css_aluno.css"/>
	<link rel="stylesheet" href="../assets/bootstrap/css/elements.css"/>
	<link rel="stylesheet" href="../assets/bootstrap/css/metisMenu.min.css"/>
	<script src="../js/alteradados.js"></script>
	<script src="../js/java.js"></script>
	<script src="../js/mensagens.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<link rel="stylesheet" href="../sweet_alert/sweetalert2.css">
    <script src="../sweet_alert/sweetalert2.js"></script>
    
    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- [if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #ccc">        
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="../imagens/logoQuim.png" width="200px"></a>
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
							<li onclick="logout();"><a href="#"><span class="glyphicon glyphicon-log-out"></span>     Sair</a></li>
						</ul>
					</li>
					<li><a href="#">Sobre</a></li>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-wrench"></span>     Editar perfil</a></li>
                            <li role="separator" class="divider"></li>
                            <li onclick="logout();"><a href="#"><span class="glyphicon glyphicon-log-out"></span>     Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
			<!--FINAL DA BARRA DE NAVEGAÇÃO SUPERIOR-->						
        </nav>		
	</div>		  
		  
	<!--CONTEÚDO DA PÁGINA-->
    
    <section id="inicio">
	    <div class="row">

				<div class="container-fluid">
				<!--<div class="col-md-8">-->
					<div class="col-md-2"></div>
					<div class="col-md-8">	
						<div class="panel panel-quimicamente">
							<div class="panel-heading">
								Alterar Dados
							</div><br><br>
							<div id="divmae">
		<center><div class="row">
			
			<div class="col-md-3">
			<div id="divfoto"> 
			<form id="form_foto" method="post" enctype="multipart/form-data">
				<img src="<?php echo $foto?>" width="200px" height="200px" >
				<div class="box-file">
					<!--<input type="hidden" name="MAX_FILE_SIZE" value="2388608" />-->
					<input type="file" name="Arquivo" id="Arquivo" size="30px">
				</div>
				<div class="panel panel-quimicamente">
					<button type="submit">Alterar Foto</button>
				</div>
			</form>
			</div>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<div id="divinput">
				<div id="divcaixatexto">
					<form>
								<br>
								<h3>EMAIL</h3><input type="email" class="f1-first-name form-control" id="email" name="email" size="30" value="<?php echo $email?>" readonly><br>
								<h3>NOME</h3><input type="text" class="f1-first-name form-control" name="nome" id="nome" value="<?php echo $nome?>" size="30" onkeypress="return teste(event);" data-toggle="tooltip" data-placement="bottom"><br>
								<h3>DATA DE NASCIMENTO</h3><input class="f1-last-name form-control" type="date" id="data" name="data" onkeypress="mascaraData(this,event);return numeros();" maxlength="10" value="<? echo $data?>" size="12" data-toggle="tooltip" data-placement="bottom"><br>
								<input type="button" value="ALTERAR DADOS" onclick="alteraDados(1);">  <input type="button" value="VOLTAR"><br><br>
					</form>
								<input type="button" value="Alterar Senha" class="special" data-toggle="modal" data-target="#em"/>		
								<div class="modal fade" id="em" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Alterar Senha</h4>
                                        </div>
                                        <div class="modal-body">
										<div id="alerta"></div>
										<form>
                                            <br><br><h3>SENHA ATUAL</h3> <input type="password" id="senha_atual_form" name="senha_atual_form" placeholder="Senha Atual" class="f1-repeat-password form-control" data-toggle="tooltip" data-placement="bottom" title="Senha Atual" minlength="6"/>											
											<h3>NOVA SENHA</h3><input type="password" id="nova_senha" name="nova_senha" placeholder="Senha (Min. 6 caracteres)" onkeydown="verifica_senha1()" class="f1-repeat-password form-control" data-toggle="tooltip" data-placement="bottom" title="Insira sua Senha" minlength="6"/>
											<div id="barra_forca"></div>
											<h3>CONFIRMAR NOVA SENHA</h3><input type="password" id="confirm_nova_senha" name="confirm_nova_senha" onchange="validarSenha();" placeholder="Digite a nova senha novamente" class="f1-repeat-password form-control" data-toggle="tooltip" data-placement="bottom" title="Digite a nova senha novamente" minlength="6" /><br>
											<input type="button"  onclick="alteraSenha(2);" class="special" id="btn-senha" value="CONFIRMAR ALTERAÇÃO DA SENHA" disabled/>
                                        </form>
										</div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                         <!-- /.modal -->
					
				</div>
			</div>
			</div>
		</div>
			</div> <!-- /col-md-9 -->
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
			<li><a href="https://www.facebook.com/quarkzQuimicamente" target="_blank"><img src="../imagens//ico_face.png" width="50" /></a></li>
			<li><img src="../imagens//ico_twitter.png" width="50" /></li>
			<li><img src="../imagens//ico_blog.png" width="50"/></li>
			<li><img src="../imagens//ico_link.png" width="50" /></li>
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