<?php
	include "../controllers/control_competicao.php";
	
	session_start();
	
	$tempo_atual = @mktime(date("Y/m/d H:i:s"));
	$tempo_permitido = 30; // tempo em segundos até redirecionar
	$fim = "";
	
	if(@$_SESSION['Cookie_countdown']=="") {
		$tempo_entrada = @mktime(date("Y/m/d H:i:s"));
		$tempo_cookie = '3600'; // em segundos
		$_SESSION['Cookie_countdown'] = $tempo_entrada;
	} 
	else {
		$tempo_gravado = $_SESSION['Cookie_countdown'];
		$tempo_gerado = $tempo_atual - $tempo_gravado;
		$fim.= $tempo_permitido - $tempo_gerado;
		if($fim <= 0) {
			$_SESSION['Cookie_countdown'] = "";
		}
		else {
		}
	}
?>

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
	<script language="JavaScript">
		var contador = '<?php if($fim=="") { echo $tempo_permitido+1; } else { echo "$fim"; } ?>';
		
		function Conta() {
			if(contador <= 0) {
				sweetAlert("Tempo esgotado!");
				return false;
			}
			contador = contador - 1;
			
			var min = parseInt(contador/60);
			var seg = contador % 60;
			
			if(min < 10){
					min = "0" + min;
					min = min.substr(0, 2);
				}
			
			if(seg <= 9){
				seg = "0" + seg;
			}
			
			tempo = "TEMPO	"+ min + ':' + seg;
			
			setTimeout("Conta()", 1000);
			
			document.getElementById("time").innerHTML = tempo;
		}
		
		window.onload = function() {
			Conta();
		}
	</script>
</head>

<body>
	<nav class="navbar navbar-default" style="background-color: #ccc">        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="../../imagens/logoQuim.png" width="200px"></a>
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
    </nav>	
	
    <!--Corpo da Página-->
	
    <section id="inicio">
	    <div class="row">
			<div class="container-fluid">
				<div class="col-xs-12 col-lg-8">
					<div class="panel panel-quimicamente">
						<div class="panel-body">
							<div class="pergunta">
								<?php echo $pergunta[0]['perguntas']; ?>
							</div>
						</div>
					</div>		
				</div>
				<div class="col-xs-12 col-lg-4">
					<div class="panel panel-quimicamente">	
						<div class="panel-body">
							<div id="time"></div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-lg-4">
					<div class="panel panel-quimicamente">	
						<div class="panel-body">
							<div class="alternativa">
								<a href="#" class="fill-div"></a>
							</div>
							<div class="alternativa">
								<a href="#" class="fill-div"></a>
							</div>
							<div class="alternativa">
								<a href="#" class="fill-div"></a>
							</div>
							<div class="alternativa">
								<a href="#" class="fill-div"></a>
							</div>
							<div class="alternativa">
								<a href="#" class="fill-div"></a>
							</div>
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