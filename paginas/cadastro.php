<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css"/>
	<link rel="stylesheet" href="../css/css_form.css"/>
	<link rel="stylesheet" href="../css/hover.css">
	<link rel="stylesheet" href="../css/elements.css"/>
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap2.css">
    <link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../sweet_alert/sweetalert2.css">
    <script src="../sweet_alert/sweetalert2.js"></script>
	<script src="../js/mensagens.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/java.js"></script>
	<script type="text/javascript" src="../js/ajax.js"></script>
	<style>
		.navbar {
			background-color: transparent;
			border-color: transparent;
			position: absolute;
		}
	</style>
	<link rel="shortcut icon" href="../imagens/logo.ico">
	<title> Cadastro | Quimicamente </title>
</head>
<body style="overflow-x: hidden;">
	<header>
		<?php include 'templates/nav.php'; ?>
	</header>
	<main>
		<!--Corpo da página-->
		<section id="cadastro">
			<form role="form" name="cadastro" action="" method="POST" class="f1" onsubmit="return Cadastro();">
				<center>
					<div class="f1-steps">
							<div class="f1-progress">
								<div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
							</div>
							<div class="f1-step active">
								<div class="f1-step-icon"><i class="fa fa-user"></i></div>
								<h4>Dados Pessoais</h4>
							</div>
							<div class="f1-step">
								<div class="f1-step-icon"><i class="fa fa-key"></i></div>
								<h4>Conta</h4>
							</div>
							<div class="f1-step">
								<div class="f1-step-icon"><i class="fa fa-check-square-o"></i></div>
								<h4>termos e condições</h4>
							</div>
						</div><!--f1-steps--><br>
						<div class="panel panel-default">
								<!--<div class="panel-heading">
									<h1> Cadastro </h1>
								</div>-->
								<div class="panel-body">
									<br><br><br>
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-5">
												<div id="tipo" class="text-center">
													<h2> Crie uma conta gratuitamente</h2><br>
													<p> Ao se cadastrar você terá acesso a todos os conteúdos do site</p><br><br>
													<div id="centro" class="form-group" align="left">
															<input type="radio" id="priority" name="tipo" onclick="pagina(3)">
															<label for="priority"><p> Aluno &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p> </label>
													</div>
													<div id="centro" class="form-group" align="left">
															<input type="radio" id="priority2" name="tipo" onclick="pagina(2)">
															<label for="priority2"><p> Professor </p> </label><br>
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-7">
												<div id="form">
													
												</div><!--form-->
											</div>
										</div>
									</div><!--container-->
									<br><br><br><br>
									<p>*O cadastro é gratuito e da direito de acesso a todos os conteúdos do site. </p>
								</div><!--panel-body-->
							</div><!--panel-->
					<!-- Javascript -->
					<script src="../assets/js/jquery-1.11.1.min.js"></script>
					<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
					<script src="../assets/js/jquery.backstretch.min.js"></script>
					<script src="../assets/js/retina-1.1.0.min.js"></script>
					<script> 
						if(document.getElementById("priority").checked==false  && document.getElementById("priority2").checked==false){
							$("#form").load("usuario.php");
							document.getElementById("priority").checked = true;
						}
					</script>
				</center>
			</form>
		</section>
		<!---->
	</main>
	<footer>
		<?php include 'templates/footer.php'; ?>
	</footer>	
</body>
</html>