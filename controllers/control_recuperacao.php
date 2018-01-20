<?php
    include_once("../models/model_recuperacao.php");

    if(isset($_POST["action"])){
        if($_POST["action"] == "alterarSenha"){
            Model_recuperacao::alterarSenha($_POST["newPass"], $_POST["hash"]);
        }
    }else{
        header("location: ../paginas/index.php");
    }
?>