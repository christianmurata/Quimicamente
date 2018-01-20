	<?php 
    include_once("../../models/entidades.php");
    include_once("../../models/model_rank.php");

    //Dificil
    $desempenhos = Model_rank::desempenhos('dificil');
	print_r ($desempenhos);
    /*if($desempenhos){
        foreach($desempenhos as $desempenho){
            echo $desempenho->getDesempenhos_notafinal()."<br>";
        }
    }

    $usuarios = Model_rank::usuarios('dificil');

    if($usuarios){
        foreach($usuarios as $usuario){
            echo $usuario->getUsuarios_nome()."<br>";
        }
    }*/

    
?>