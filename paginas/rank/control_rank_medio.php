	<?php 
    include_once("../models/entidades.php");
    include_once("../models/model_rank.php");

    //Dificil
    $desempenhos = Model_rank::desempenhos('medio');

    if($desempenhos){
        foreach($desempenhos as $desempenho){
            echo $desempenho->getDesempenhos_notafinal()."<br>";
        }
    }

    $usuarios = Model_rank::usuarios('medio');

    if($usuarios){
        foreach($usuarios as $usuario){
            echo $usuario->getUsuarios_nome()."<br>";
        }
    }

    //Medio

    //Fácil

?>