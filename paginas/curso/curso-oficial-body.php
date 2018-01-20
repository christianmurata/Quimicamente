<link rel="stylesheet" href="../css/css_curso.css">
<link rel="stylesheet" href="../css/animate.css">
<link rel="stylesheet" href="../css/hover.css">
<link href="../sweet_alert/sweetalert2.css" rel="stylesheet" media="screen">
<script src="../sweet_alert/sweetalert2.js"></script>
<script src="../js/curso.js"></script>
<body style="overflow-x: hidden;">
    <input type="hidden" id="tipo" value="<?php echo $tipo ?>">
    <input type="hidden" id="conteudo_ordem" value="<?php echo $conteudo->getConteudos_ordem()?>">
    <section class="curso">
        <div class="jumbotron text-center">
            <img src="<?php echo $conteudo->getConteudos_imagem(); ?>" class="img-responsive img-circle" style="margin:0 auto" width="250px">
            <h1 class="animated fadeInDown"><?php echo $conteudo->getConteudos_nome(); ?></h1>
            <button type="button" class="btn-info btn-lg" onclick="RealizarCurso(<?php echo $conteudo->getConteudos_id(); ?>)"><span class="glyphicon glyphicon-book"></span> FAZER PROVA</button>
            <h1 class="seta animated fadeInUp" style="padding-top: 100px;"><a href="#" class="click-scroll hvr-icon-hang"></a></h1>
        </div>
    </section>
    <div id="title"></div>
    <main>
        <div id="text-carousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="row slides">
                <div class="col-xs-offset-1 col-xs-10">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="carousel-content">
<?php                           if($slides){
                                    echo $slides[0]->getSlides_conteudo(); 
                                }else{
                                    echo "Sem informações";
                                }
?>
                            </div>
                        </div>
<?php
                        if($slides){
                            for($i=1;$i < count($slides);$i++){
?>
                                <div class="item">
                                    <div class="carousel-content">
<?php                                   echo $slides[$i]->getSlides_conteudo(); ?>
                                    </div>
                                </div>
<?php                       }
                        }
?>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#text-carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#text-carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
            <div id="title"></div>
        </div>
    </main>
</body>
</html>