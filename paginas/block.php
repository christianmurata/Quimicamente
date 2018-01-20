<?php
    if($_SERVER['HTTP_REFERER'] != $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]){
        //echo "Acesso direto";
    }