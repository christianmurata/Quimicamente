<!DOCTYPE html>
<html lang ="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css"/>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap2.css">
	<link rel="stylesheet" href="../css/css_login.css"/>
	<link rel="stylesheet" href="../css/css_recuperacao.css"/>
	<link rel="stylesheet" href="../css/elements.css"/>
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="../css/animate.css">
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
	<title> Recuperar senha | Quimicamente </title>
</head>
<body style="overflow-x: hidden;">
    <?php include 'templates/nav.php'; ?>
    
    <main>
        <section id="banner">
            <div class="email">
                <div class="jumbotron text-center animated fadeInDown">
                    <h2 class="pad">Esqueci minha senha</h2>
                    <p> Insira o email cadastrado para recuperar a senha</p>
                </div>
                <div class="text-center">
                    <div class="text">
                        <form method="POST" onsubmit="return gerarHash();">
                            <input type="text" class="form-control animated fadeInRight" id="txtEmail" placeholder="Email cadastrado">
                            <div class="row animated fadeInLeft">
                                <div class="col-md-12">
                                    <input type="submit" class="special big total" Value="Enviar"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="animated fadeInUp">*Será enviado um email para redefinição de senha</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

	<?php include 'templates/footer.php'; ?>
</body>
</html>