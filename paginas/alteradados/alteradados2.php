<?php 
	
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
	
    
    <link rel="shortcut icon" href="images/logo.ico">
	<title>Aluno | Quimicamente </title>
    
    <!--adicionando o bootstrap-->
	<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!--css personalizado-->
    <link href="../assets/bootstrap/css/estilo.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../../assets/css/alterardados.css"/>
	<link rel="stylesheet" href="../../alteradados/assets/bootstrap/css/style.css"/>
    <link rel="stylesheet" href="../alteradados/assets/bootstrap/css/css_menu.css"/>
    <link rel="stylesheet" href="../alteradados/assets/bootstrap/css/css_aluno.css"/>
	<link rel="stylesheet" href="../alteradados/assets/bootstrap/css/elements.css"/>
	<link rel="stylesheet" href="../alteradados/assets/bootstrap/css/metisMenu.min.css"/>
    
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
							<li><a href="#"><span class="glyphicon glyphicon-log-out"></span>     Sair</a></li>
						</ul>
					</li>
					<li><a href="#">Sobre</a></li>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-wrench"></span>     Editar perfil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>     Sair</a></li>
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
		<center><div class="row hidden-xs">
			
			<div class="col-md-3">
			<div id="divfoto"> 
				<img src="https://st.depositphotos.com/2229436/2401/v/950/depositphotos_24010865-stock-illustration-stone-web-2-0-button.jpg" width="200px" height="200px" >
				<div class="box-file">
					<input type="file" name="Arquivo" id="Arquivo" size="30px">
				</div>
				<div class="panel panel-quimicamente">
					Escolha uma foto...
				</div>
			</div>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<div id="divinput">
				<div id="divcaixatexto">
					<form method="post" action="alterausuario2.php">
								<br>
								<h3>EMAIL</h3><input type="email" class="f1-first-name form-control" name="email" size="30" readonly><br>
								<h3>NOME</h3><input type="text" class="f1-first-name form-control" name="nome" size="30" onkeyup="javascript:letras()" data-toggle="tooltip" data-placement="bottom"><br>
								<h3>DATA DE NASCIMENTO</h3><input class="f1-last-name form-control" type="date" name="nome" size="12" data-toggle="tooltip" data-placement="bottom"><br>
								<input type="submit" value="ALTERAR DADOS">  <input type="button" value="VOLTAR"><br><br>
								<input type="button" value="Alterar Senha" class="special" data-toggle="modal" data-target="#em"/>
					</form>
								
								<div class="modal fade" id="em" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Alterar Senha</h4>
                                        </div>
                                        <div class="modal-body">
										<form method="post" action="alteradadoscontrol.php">
                                            <br><br><h3>SENHA ATUAL</h3> <input type="password" id="senha_atual" name="senha_atual" placeholder="Senha Atual" class="f1-repeat-password form-control" data-toggle="tooltip" data-placement="bottom" title="Senha Atual"/>
											<h3>NOVA SENHA</h3><input type="password" id="senha" name="senha" placeholder="Senha (Min. 6 caracteres)" onkeyup="javascript:verifica_senha()" class="f1-repeat-password form-control" data-toggle="tooltip" data-placement="bottom" title="Insira sua Senha"/>
											<div id="barra_forca"></div>
											<h3>CONFIRMAR NOVA SENHA</h3><input type="password" id="confirm_senha" name="confirm_senha" placeholder="Digite a nova senha novamente" class="f1-repeat-password form-control" data-toggle="tooltip" data-placement="bottom" title="Digite a nova senha novamente"/><br>
											<input type="submit" class="special" value="CONFIRMAR ALTERAÇÃO DA SENHA"/>
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
	
    <!--CHAMADA DOS SCRIPTS-->
    <script src="../alteradados/assets/bootstrap/js/jquery-3.2.1.js"></script>
    <script src="../alteradados/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../alteradados/assets/bootstrap/js/main.js"></script>
</body>
</html>
<script>
	function verifica_senha() {
		senha = document.getElementById("senha").value;
		barra_forca = document.getElementById("barra_forca");
		forca = 0;
		if(senha.length < 6){
			forca += 0;
		}else if((senha.length >= 6) && (senha.length < 8)){
			forca += 10;
		}else {
			forca += 25;
		}
		if(senha.length >= 6){ //sÃ³ vai avaliar a senha se jÃ¡ tiver 6+ caracteres
			if(senha.match(/[a-z]+/)){ //letras minÃºsculas (uma ou mais)
				forca += 10;
			}
			if(senha.match(/[A-Z]+/)){ //letras maiÃºsculas (uma ou mais)
				forca += 20;
			}
			if(senha.match(/[0-9]+/)){ //dÃ­gitos (um ou mais)
				forca += 20;
			}
			if(senha.match(/.[!@#$%^&*?_~]+/)){ //caracteres especiais (um ou mais)
				forca += 25;
			}
		}
		//mostra_forca.innerHTML = "forÃ§a: " + forca;
		if(forca == 0){
			barra_forca.style.backgroundColor = "#000";
		}else if((forca > 0) && (forca < 30)){
			barra_forca.style.backgroundColor = "#B20000";
		}else if((forca >= 30) && (forca < 60)){
			barra_forca.style.backgroundColor = "#FF9900";
		}else if((forca >= 60) && (forca < 85)){
			barra_forca.style.backgroundColor = "#99CC00";
		}else{
			barra_forca.style.backgroundColor = "#009900";
		}
		var w = forca*0.99; //daquele jeito
		if (w==0) w=3;
		barra_forca.style.width = w+"%";
	}
	
	function letras(){
	tecla = event.keyCode;
	if (tecla >= 48 && tecla <= 57){
	    return false;
	}else{
	   return true;
	}
}
</script>