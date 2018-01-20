<?php
    include_once('../models/model_recuperacao.php');

    // Verifica se a hash está ativada, caso ela esteja o usuario pode recuperar senha
    $hash = Model_recuperacao::verificaHash($_GET['hash']);

    if($hash != "hashActive"){
        header("location: index.php");
    }
?>
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
<body style="overflow-x: hidden;">
    <?php include 'templates/navabr.php'; ?>

    <main>
        <section id="banner">
            <div class="senha">
                <div class="jumbotron text-center animated fadeInDown">
                    <h2 class="pad">Esqueci minha senha</h2>
                    <p> Insira sua nova senha para voltar a se divertir </p>
                    <div class="password">
                        <form method="POST" onsubmit="return alteraSenha('<?php echo $_GET['hash'] ?>');">
                            <input type="password" class="form-control animated fadeInLeft" id="newPass" placeholder="Nova Senha"><br>
                            <input type="password" class="form-control animated fadeInRight" id="confirm_newPass" placeholder="Confirme a nova senha"><br><br>
                            <input type="submit" class="special big total animated fadeInUp" Value="Redefinir"/>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'templates/footer.php'; ?>
</body>