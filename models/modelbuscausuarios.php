<?php
require_once "servico.php";

//usuários
class USUARIOS{
    public static function buscausuarios(){
        $sql = "SELECT usuarios_id, usuarios_nome, usuarios_del FROM usuarios WHERE usuarios_nivel = '2' OR usuarios_nivel = '3'";
        $array = array();
        return $recebeusuarios = Database::selecionarParam($sql,$array);
    }
}
?>