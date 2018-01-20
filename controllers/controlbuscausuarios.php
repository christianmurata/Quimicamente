<?php
include "../models/modelbuscausuarios.php";
$usuario = USUARIOS::buscausuarios();
echo $usuario;
?>