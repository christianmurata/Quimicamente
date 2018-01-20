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

			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<div style="padding-top:6%" class="container-fluid">
					<h2>Progresso atual</h2>
		 			<div class="progress">
		    			<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0	" aria-valuemax="100" style="width:<?php echo $porcentagem;?>%">
		    				<?php echo number_format($porcentagem)."%";?>
		    			</div>
		  			</div>
					<center>
						<?php 
							if($porcentagem < 9){?>
								<img id="imgb" src="../imagens/medalinvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/medalinvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/medalinvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/platinainvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/diamanteinvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/challngerinvalid.png" width="70px" height="70px" >
							<?php } 
							else if($porcentagem >= 10 && $porcentagem <= 21){?>
								<img id="imgb" src="../imagens/bronzemedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/medalinvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/medalinvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/platinainvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/diamanteinvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/challngerinvalid.png" width="70px" height="70px" >
							<?php } 
							else if($porcentagem >=22 && $porcentagem <= 32){?>
								<img id="imgb" src="../imagens/bronzemedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/pratamedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/medalinvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/platinainvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/diamanteinvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/challngerinvalid.png" width="70px" height="70px" >
							<?php } 
							else if($porcentagem >= 33 && $porcentagem <= 50){?>
								<img id="imgb" src="../imagens/bronzemedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/pratamedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/ouromedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/platinainvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/diamanteinvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/challngerinvalid.png" width="70px" height="70px" >
							<?php }
							else if($porcentagem >= 51 && $porcentagem <= 64){?>
								<img id="imgb" src="../imagens/bronzemedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/pratamedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/ouromedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/platinamedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/diamanteinvalid.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/challngerinvalid.png" width="70px" height="70px" >
							<?php } 
							else if($porcentagem >= 65 && $porcentagem <= 85){?>
								<img id="imgb" src="../imagens/bronzemedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/pratamedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/ouromedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/platinamedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/diamantemedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/challngerinvalid.png" width="70px" height="70px" >
							<?php } 
							else if($porcentagem >= 86){?>
								<img id="imgb" src="../imagens/bronzemedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/pratamedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/ouromedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/platinamedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/diamantemedal.png" width="70px" height="70px" >
								<img id="imgb" src="../imagens/challengermedal.png" width="70px" height="70px" >
							<?php } ?>
					</center>
		  		</div>
		  	</div>	

			<div class="row"> 
					<div class="col-lg-12" style="padding-top:2%">
						<div class="panel panel-quimicamente">
								<div class="panel-heading">
									Todos Conteúdos
								</div>
							<div class="panel-body">
									<?php if($result != false) { 
										foreach($result as $conteudo){
											if($conteudo->getConteudos_ordem() <= $ultimoconteudo){

									?>	
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
															<div class="conteudo conteudoButton text-center">
																<a href="curso.php?conteudos_ordem=<?php echo $conteudo->getConteudos_ordem();?>&action=CO"><input type="button" value="Fazer conteúdo" class="special" >
															</div>
														</div>  	
													</div>
												</div>
											</div>
									<?php } 
											else{?>
												<div class="box person col-md-3">
													<div class="flip-container" ontouchstart="this.classList.toggle('hover');">  	
														<div class="flipper">
															<div class="front" style="background-image: url(../imagens/shadow.png), url(<?php echo $conteudo->getConteudos_imagem(); ?>); background-position: center top; background-size: cover;">
																<div class="conteudo conteudoDesc conteudoBlock text-center">
																	<i class="fa fa-flask" aria-hidden="true"></i>
																	<p><?php echo $conteudo->getConteudos_nome(); ?></p>
																</div>
															</div>  		
															<div class="back" style="background-image:url(../imagens/shadow.png), url(<?php echo $conteudo->getConteudos_imagem(); ?>); background-position: center top; background-size: cover;">
																<div class="conteudo conteudoButton text-center">
																	<input type="button" value="Bloqueado" disabled >
																</div>
															</div>  	
														</div>
													</div>
												</div>

											<?php }
									} } else{ echo "Não há nenhum conteúdo cadastrado!"; } ?>
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
				</div>
		</div>
</body>
</html>