<?php
include "../models/entidades.php";
session_start();

if(!isset($_SESSION['login'])){
    header('location: index.php');
}

$user = $_SESSION['login'];
$nivel = $user->getUsuarios_nivel();

if($nivel < 3){
    //header('location: index.php');
}

include "templates/header.php";
?>

    <body style="overflow-x: hidden">
    <?php
    include "templates/navbar.php";
    include "convite_turma/convite_turma.html";
    ?>
    </body>
<?php include "templates/footer.php";
?>