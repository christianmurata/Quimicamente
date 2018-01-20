<link rel="stylesheet" href="../css/animate.css">
<link rel="stylesheet" href="../css/hover.css">
<link rel="stylesheet" href="../css/css_final.css">
<body style="overflow-x: hidden;">
    <div class="container-fluid content">
        <section class="section-final">
            <div class="row">
                    <div class="col-md-12">
                        <center>            
<?php
                            if($passou != "false"){
?>
                                <h1 class="pad animated fadeInDown">Muito Bem!!!</h1>
                                <h3 class="animated fadeIn">Você finalizou o conteúdo</h3>
                                <img class="animated fadeInUp img-responsive" src="../imagens/frasco.gif" style="margin-left: 3.5%"/>
<?php
                            }else{
?>
                                <h1 class="pad animated fadeInDown">Tente novamente!</h1>
                                <img class="animated fadeInUp img-responsive" src="../imagens/final-lose.gif">
                                <a href="javascript: window.history.back()" class="btn-next"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar </a>
<?php
                            }
?>
                        </center>
                    </div>
<?php               
                    if($passou != "false"){
?>
                        <div class="col-xs-4 text-left">
                            <p class="animated fadeInRight">
                                <a href="todosconteudos.php" class="btn-next"><i class="fa fa-arrow-left" aria-hidden="true"></i> Conteúdos </a>
                            </p>
                        </div>
                        <div class="col-xs-4 text-center"></div>
                        <div class="col-xs-4 text-right">
                            <p class="animated fadeInLeft">
                                <a href="curso.php?conteudos_ordem=<?php echo $next?>&action=CO" class="btn-next">Próximo conteúdo <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                            </p>
                        </div>
<?php
                    }
?>
            </div>
        </section>
    </div>
</body>