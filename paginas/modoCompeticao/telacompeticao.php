<?php
	include ".../Quimicamente/models/suporte.php";
	include_once ("../Quimicamente/models/entidades.php");
	
	session_start();
	$tempo_atual = @mktime(date("Y/m/d H:i:s"));
	$tempo_permitido = 90; // tempo em segundos até redirecionar
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
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/css_menu.css"/>
    <link rel="stylesheet" href="css/css_aluno.css"/>
	<link rel="stylesheet" href="css_competicao.css"/>
	<link rel="stylesheet" href="css/elements.css"/>
	<link rel="stylesheet" href="css/metisMenu.min.css"/>
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
	<script src="js/java.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link rel="shortcut icon" href="images/logo.ico">
	<title>Competição | Quimicamente </title>
	<script language="JavaScript">
		var contador = '<?php if($fim=="") { echo $tempo_permitido+1; } else { echo "$fim"; } ?>';
		
		function Conta() {
			if(contador <= 0) {
				alert("Tempo esgotado!");
				return false;
			}
			contador = contador-1;
			
			var min = parseInt(contador/60);
			var seg = contador%60;
			
			if(min < 10){
					min = "0"+min;
					min = min.substr(0, 2);
				}
			
			if(seg <= 9){
				seg = "0"+seg;
			}
			
			tempo = "TEMPO	"+ min + ':' + seg;
			
			setTimeout("Conta()", 1000);
			
			document.getElementById("time").innerHTML = tempo;
		}
		
		window.onload = function() {
			Conta();
		}
	</script>
	
	<script language="JavaScript">
		function buscar(palavra)
            {
                var page = "busca.php";
                $.ajax
                        ({
                            type: 'POST',
                            dataType: 'html',
                            url: page,
                            beforeSend: function () {
                                $("#dados").html("Carregando...");
                            },
                            data: {palavra: palavra},
                            success: function (msg)
                            {
                                $("#dados").html(msg);
                            }
                        });
            }
            
            
            $('#buscar').click(function () {
                buscar($("#palavra").val())
            });
	</script>
	
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
				<div class="col-xs-12 col-lg-8">
					<div class="panel panel-quimicamente">
						<div class="panel-body">
							<div class="slide">
								
							</div>
						</div>
					</div>		
				</div>
				<div class="col-xs-12 col-lg-4">
					<div class="panel panel-quimicamente">	
						<div id="time"></div>
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
			<li><a href="https://www.facebook.com/quarkzQuimicamente" target="_blank"><img src="images/ico_face.png" width="50" /></a></li>
			<li><img src="images/ico_twitter.png" width="50" /></li>
			<li><img src="images/ico_blog.png" width="50"/></li>
			<li><img src="images/ico_link.png" width="50" /></li>
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