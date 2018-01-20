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
	<script type="text/javascript" src="../js/ajax.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
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
<body>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    </button>
                    <a href="index.php"><img id="img" src="../imagens/logoQuim.png"/></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse navbar-right">
                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </header>
    <main>
        <section id="banner">
            <div class="senha">
                <div class="jumbotron text-center animated fadeInDown">
                    <h2 class="pad">Esqueci minha senha</h2>
                    <p> Insira sua nova senha para voltar a se divertir </p>
                    <div class="password">
                        <input type="text" class="form-control animated fadeInLeft" placeholder="Nova Senha"><br>
                        <input type="text" class="form-control animated fadeInRight" placeholder="Confirme a nova senha"><br><br>
                        <input type="submit" class="special big total animated fadeInUp" Value="Redefinir"/>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'templates/footer.php'; ?>
</body>