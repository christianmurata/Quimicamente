<?php 
    include_once("../models/servico.php");
    include_once("../models/entidades.php");
    include_once("../models/model_professor.php");

    session_start();

    // verifica se o usuario não é professor
    if($_SESSION["login"]->getUsuarios_nivel() > 2){
        header('location: index.php');
    }

    $usuario = $_SESSION["login"];
    $param = $usuario->getProfessores()->getProfessores_id();
    $turmas = Model_professor::turmas($param);
    $tot_paginas = Model_professor::paginacao($param);
    $conteudos_comun = Model_professor::conteudos_comunidade($param);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css"/>
    <link rel="stylesheet" href="../css/css_menu.css"/>
    <link rel="stylesheet" href="../css/css_form.css"/>
    <link rel="stylesheet" href="../css/css_professor.css"/>
	<link rel="stylesheet" href="../css/elements.css"/>
	<link rel="stylesheet" href="../css/metisMenu.min.css"/>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../sweet_alert/sweetalert2.css">
    <script src="../sweet_alert/sweetalert2.js"></script>
    <script src="../js/jquery.js"></script>
	<script src="../js/jquery.paginate.min.js"></script>
	<script src="../js/java.js"></script>
	<script src="../js/ajax.js"></script>
	<script src="../js/mensagens.js"></script>

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
	<link rel="shortcut icon" href="../imagens/logo.ico">
	<title> Tela Inicial | Quimicamente </title>
</head>
<body style="overflow-x: hidden;">
    <header>
	    <?php include 'templates/navbar.php'; ?>
    </header>
    <main>
        <?php include 'professor/professor.php'; ?>
    </main>
    <footer>
        <?php include 'templates/footer.php'; ?>
    </footer>
</body>
</html>