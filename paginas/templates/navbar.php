<?php
	ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);
    if(session_id() == '') {
        include_once("../models/servico.php");
        session_start();
    }
    register_shutdown_function('session_write_close');
?>

<link href="../sweet_alert/sweetalert2.css" rel="stylesheet" media="screen">
<link href="../css/navbar.css" rel="stylesheet" media="screen">
<div class="navbar-wrapper">
    <div class="container-fluid">
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php"><img src="../imagens/logoQuim.png" width="200px"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav pull left">
                        <li><a href="index.php" class="">Página Inicial</a></li>
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Curso <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class=" dropdown" id="dropdown-redirs">
                                <li id="liSala"><a id="redirSala" href="sala.php" class="">Sala</a></li>
                                <li><a href="rank.php" class="">Ranking</a></li>
                                <li><a href="todosconteudos.php" class="">Conteúdos</a></li>
                                <li id="liCompeticao"><a href="difficulty.php" class="">Modo Competição</a></li>
                                <li id="liUsuarios"><a href="controle_usuario.php" class="">Usuários</a></li>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class="active"><a href="alteradados.php"><img src="<?php echo $_SESSION['login']->getUsuarios_foto(); ?>" class="img-responsive img-navbar center-block" alt="Logo" width="30px" heigth="100%">Conta</a></li>
                        <li class="active"><a href="#" onclick="logout()">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        redirecionamentos();
    })
</script>

<script src="../js/navbar.js"></script>
<script src="../js/ajax.js"></script>
<script src="../sweet_alert/sweetalert2.js"></script>
<script src="../js/mensagens.js"></script>