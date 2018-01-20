<?php
    include "entidades.php";
    session_start();
    if(isset($_SESSION['login'])){
        die($_SESSION['login']->getUsuarios_nivel());
    }
    die("session_not_started");
?>