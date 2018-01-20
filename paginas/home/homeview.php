<link href="../css/style.css" rel="stylesheet" media="screen">
<link href="../css/css_aluno.css" rel="stylesheet" media="screen">
<body>
    <header>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="teste col-md-8">
                    <div class="jumbotron">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="conteudo col-md-12">
                                    <p>Conteúdos</p>
                                    <div class="jumbotron" style="background-image:url(../imagens/contcurso2.jpg);" > 
                                        <a href="curso.php?conteudos_ordem=<?php echo $ultimoconteudo;?>&action=CO"> <input type="button" class="btn btn-primary" value="Fazer Curso"> </a>
                                    </div>
                                </div>
                                <div class="conteudo col-md-12">
                                    <p>Modo competição</p>
                                    <div class="jumbotron" style="background-image:url(../imagens/contcurso.jpg);">
                                        <a href="../paginas/difficulty.php"><input type="button" class="btn btn-primary" value="Competir"></a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="desempenho col-md-12">
                        <div class="jumbotron">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-10 col-sm-10 col-md-10">
                                        <p>Desempenho</p>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2"> 
                                        <p> <i class="fa fa-trophy"></i></p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4"><br>
                                        <?php 
                                            if($porcentagem < 9){?>
                                                <img id="imgb" src="../imagens/medalinvalid.png" width="150px" height="150px" >
                                                <p><?php echo $porcentagem; ?>%</p>
                                            <?php } 
                                            else if($porcentagem >= 10 && $porcentagem <= 21){?>
                                                <img id="imgb" src="../imagens/bronzemedal.png" width="150px" height="150px" >
                                                <p><?php echo $porcentagem; ?>%</p>
                                            <?php } 
                                            else if($porcentagem >=22 && $porcentagem <= 32){?>                                       
                                                <img id="imgb" src="../imagens/pratamedal.png" width="150px" height="150px" >
                                                <p><?php echo $porcentagem; ?>%</p>
                                            <?php } 
                                            else if($porcentagem >= 33 && $porcentagem <= 50){?>
                                                <img id="imgb" src="../imagens/ouromedal.png" width="150px" height="150px" >
                                                <p><?php echo $porcentagem; ?>%</p>
                                            <?php }
                                            else if($porcentagem >= 51 && $porcentagem <= 64){?>
                                                <img id="imgb" src="../imagens/platinamedal.png" width="150px" height="150px" >
                                                <p><?php echo $porcentagem; ?>%</p>
                                            <?php } 
                                            else if($porcentagem >= 65 && $porcentagem <= 85){?>
                                                <img id="imgb" src="../imagens/diamantemedal.png" width="150px" height="150px" >
                                                <p><?php echo $porcentagem; ?>%</p>
                                            <?php } 
                                            else if($porcentagem >= 86){?>
                                                <img id="imgb" src="../imagens/challengermedal.png" width="150px" height="150px" >
                                                <p><?php echo $porcentagem; ?>%</p>
                                        <?php } ?>
                                    </div>
                                    <div class="hidden-xs col-sm-1 col-md-3">
                                    </div>
                                    <div class="hidden-xs col-sm-5 col-md-5">
                                        <p class="titulo"> <?php echo $result ?> </p>
                                        <p> Total de conteúdos</p>
                                        <p class="titulo"><?php echo $ultimoconteudo ?></p>
                                        <p> Conteúdos <br> Liberados</p>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div>
                    <div class="ranking col-md-12">
                        <div class="jumbotron">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-10 col-sm-10 col-md-10">
                                        <p>Ranking</p>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2"> 
                                        <p> <i class="fa fa-list-ol"></i></p>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="dificuldade">
                                            <div class="line easy">
                                                Fácil
                                            </div>
                                            <div class="line medium">
                                                Médio
                                            </div>
                                            <div class="line hard">
                                                Difícil
                                            </div>
                                        </div>
                                        <div class="info">
                                            <tbody>
                                                <tr>
                                                    <td class="nome-aluno" >
                                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                                            <a href="http://200.145.153.172/quarkz/Quimicamente/paginas/rank.php">
                                                                <img src="<?php echo $foto=$usuario->getUsuarios_foto(); ?>" class="img-aluno img-responsive img-navbar">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-7 col-sm-7 col-md-7 name">
                                                            <a href="http://200.145.153.172/quarkz/Quimicamente/paginas/rank.php" class="b">
                                                                <?php echo $nomeusuario; ?>
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-3 col-sm-3 col-md-3 name">
                                                            <div class="facil">
                                                                <?php echo $notafacil; ?>
                                                            </div>
                                                            <div class="medio hide">
                                                                <?php echo $notamedia; ?>
                                                            </div>
                                                            <div class="dificil hide">
                                                            <?php echo $notadificil; ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </body>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div>
                    <div class="ranking col-md-12">
                        <div class="jumbotron">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-10 col-sm-10 col-md-10">
                                        <p>Turma</p>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2"> 
                                        <p><i class="fa fa-users"></i></p>
                                    </div>
                                    <br><br>
                                    <?php
                                        if($temTurma){
                                            ?>
                                            <div class="col-md-12">
                                                <center>
                                                    <a href="sala.php"><input type="button"class="special" value="Acessar"/></a>
                                                </center>
                                            </div>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <div class="col-md-8">
                                                <input type="text" name="Nome_turma" id="link_turma" class="form-control" placeholder="Insira o link da Turma" onkeyup="if(event.keyCode == 13 && $('#link_turma').val().length > 5)location.href = $('#link_turma').val();"/>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-info" onclick="if($('#link_turma').val().length > 5)location.href = $('#link_turma').val();">Entrar</button>
                                            </div>
                                            <?php
                                        }
                                    
                                    ?>
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
        </div>
    </main>
    <footer>
        <?php //include 'templates/footer.php'; ?>
        <script>
            // evento atribuido para mos
            $('body').on('click', '.line', function(){
                if($(this).hasClass('easy')){
                    $('.facil').removeClass('hide');
                    $('.medio').addClass('hide');
                    $('.dificil').addClass('hide');
                }else if($(this).hasClass('medium')){
                    $('.facil').addClass('hide');
                    $('.medio').removeClass('hide');
                    $('.dificil').addClass('hide');
                }else if($(this).hasClass('hard')){
                    $('.facil').addClass('hide');
                    $('.medio').addClass('hide');
                    $('.dificil').removeClass('hide');
                }else{
                    alert('Algo de errado não está certo!');
                }
            });
        </script>
    </footer>
</body>