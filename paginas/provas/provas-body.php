<link rel="stylesheet" href="../css/css_provas.css">
<link rel="stylesheet" href="../css/animate.css">
<link rel="stylesheet" href="../css/hover.css">
<link href="../sweet_alert/sweetalert2.css" rel="stylesheet" media="screen">
<script src="../sweet_alert/sweetalert2.js"></script>
<script src="../js/provas.js"></script>

<body style="overflow-x: hidden;">

	<input type="hidden" id="provas_id" value="<?php echo $prova->getProvas_id()?>">
	<section class="prova animated fadeInUp">
     	<div class="container-fluid perguntas">
			<div class="cont-p">
				<div class="row">
					<div class="col-md-12">
				    	<div class="progress">
				  			<div class="progress-bar" aria-valuenow="<?php echo count($perguntas) ?>"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="p-div" id="inicial">
							<center style="padding-top: 15%">
								<h1 class="titulo-perguntas"><?php echo $prova->getProvas_desc()?></h1>
								<button id="btn-prova" onclick="carregarPergunta(0)" class="btn-lg btn-success"><span class="glyphicon glyphicon-pencil"></span> Fazer prova!</button>
							</center>
						</div>
<?php 					for($i=0;$i<count($perguntas);$i++){
							$respostas = Model_curso::selecionarRespostasComunidade($perguntas[$i]->getPerguntas_comunidade_id());
							if($respostas){
?>
								<div class="p-div" style="display: none;" id="pergunta_<?php echo $i ?>">
									<h1 class="titulo-perguntas"><?php echo $perguntas[$i]->getPerguntas_comunidade_descricao(); ?></h1>
<?php									for($a=0;$a<count($respostas);$a++){
?>
										<button onclick="checkRespostas(this,<?php echo $respostas[$a]->getRespostas_comunidade_id()?>, <?php echo $perguntas[$i]->getPerguntas_comunidade_id()?>)" name="btn_resp_<?php echo $perguntas[$i]->getPerguntas_comunidade_id();?>" class="btn-block btn btn-lg btn-primary" id="btn_resp_<?php echo $respostas[$a]->getRespostas_comunidade_id()?>">
											<?php echo $respostas[$a]->getRespostas_comunidade_desc(); ?>
										</button>
<?php 									}
?>
									<br>
									<center>
<?php
									if(array_key_exists($i+1, $perguntas)){
?>
										<button class="btn-lg btn btn-info" id="btn_next_<?php echo $perguntas[$i]->getPerguntas_comunidade_id(); ?>" style="display: none;" onclick="proximaPergunta(<?php echo $i ?>, <?php echo $i + 1; ?>)">Próxima</button>
<?php
									}else{
?>
										<button class="btn-lg btn btn-info" id="btn_next_<?php echo $perguntas[$i]->getPerguntas_comunidade_id(); ?>" style="display: none;" onclick="finalizar()">Finalizar</button>
<?php
									}
?>
									</center>
								</div>
<?php									
							}else{
?>
								<script type="text/javascript">msg("erro");</script>
<?php
								return;
							}
						}
?> 
					</div>
				</div>
			</div>
		</div>
    </section>

</body>

<?php
	
?>