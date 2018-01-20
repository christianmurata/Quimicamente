<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css"/>
    <link rel="stylesheet" href="../css/css_conteudos.css"/>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../css/css_menu.css"/>
    <link rel="stylesheet" href="../css/css_form.css"/>
	<link rel="stylesheet" href="../css/elements.css"/>
	<link rel="stylesheet" href="../css/metisMenu.min.css"/>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../sweet_alert/sweetalert2.css">
    <script src="../sweet_alert/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.min.js" /></script>
	<script src="../js/java.js"></script>
	<script src="../js/ajax.js"></script>
	<script src="../js/mensagens.js"></script>

	<link rel="shortcut icon" href="../imagens/logo.ico">
	<title> Tela Inicial | Quimicamente </title>
</head>
<body style="overflow-x: hidden;">

			<div class="row"> 
					<div class="col-lg-12" style="padding-top:3%">
						<div class="panel panel-quimicamente">
								<div class="panel-heading">
									Todos Conteúdos
								</div>
							<div class="panel-body">
									<?php if($result != false) { 
										foreach($result as $conteudo){ ?>	
											<div class="box person col-md-3">
												<div class="flip-container" ontouchstart="this.classList.toggle('hover');">  	
													<div class="flipper">
														<div class="front" style="background-image: url(../imagens/shadow.png), url(<?php echo $conteudo->getConteudos_imagem(); ?>); background-position: center top; background-size: cover;">
															<div class="conteudo conteudoDesc conteudoActive text-center">
																<i class="fa fa-flask" aria-hidden="true"></i>
																<p><?php echo $conteudo->getConteudos_nome(); ?></p>
															</div>
														</div>  		
														<div class="back" style="background-image:url(../imagens/shadow.png), url(<?php echo $conteudo->getConteudos_imagem(); ?>); background-position: center top; background-size: cover;">
															<div class="conteudo conteudoButton text-center" style="padding-top:5em;color:#4fffbc;">
																<p><?php echo $conteudo->getConteudos_descricao(); ?></p>
															</div>
														</div>  	
													</div>
												</div>
											</div>
									<?php } 
								}else{ echo "Não há nenhum conteúdo cadastrado!"; } ?>
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
				</div>
</body>
</html>