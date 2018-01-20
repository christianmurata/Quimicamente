<?php
	include_once("../models/servico.php");
	include_once("../models/model_curso.php");
	class perguntasView{
// ----------------------------------- VIEW PERGUNTAS ----------------------------------------------------------
		function carregaPerguntas($perguntas){
?>		
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
								<h1 class="titulo-perguntas">Preparado?</h1>
								<button id="btn-prova" onclick="carregarPergunta(0)" class="btn-lg btn-success"><span class="glyphicon glyphicon-pencil"></span> Vamos nessa!</button>
							</center>
						</div>
<?php 					for($i=0;$i<count($perguntas);$i++){
							$respostas = Model_curso::selecionarRespostas($perguntas[$i]->getPerguntas_id());
							if(!$respostas){
?> 
							<script type="text/javascript">msg("erro");</script>
<?php
								return;
							}
?>
							<div class="p-div" style="display: none;" id="pergunta_<?php echo $i ?>">
								<h1 class="titulo-perguntas"><?php echo $perguntas[$i]->getPerguntas_descricao(); ?></h1>

<?php							for($a=0;$a<count($respostas);$a++){
?>
									<button onclick="checkRespostas(this,<?php echo $respostas[$a]->getRespostas_id()?>, <?php echo $perguntas[$i]->getPerguntas_id()?>)" name="btn_resp_<?php echo $perguntas[$i]->getPerguntas_id();?>" class="btn-block btn btn-lg btn-primary" id="btn_resp_<?php echo $respostas[$a]->getRespostas_id()?>">
										<?php echo $respostas[$a]->getRespostas_desc(); ?>
									</button>
<?php 							}
?>
								<br>
								<center>
<?php
								if(array_key_exists($i+1, $perguntas)){
?>
									<button class="btn-lg btn btn-info" id="btn_next_<?php echo $perguntas[$i]->getPerguntas_id(); ?>" style="display: none;" onclick="proximaPergunta(<?php echo $i ?>, <?php echo $i + 1; ?>)">Próxima</button>
<?php
								}else{
?>
									<button class="btn-lg btn btn-info" id="btn_next_<?php echo $perguntas[$i]->getPerguntas_id(); ?>" style="display: none;" onclick="finalizar()">Finalizar</button>
<?php
								}
?>
								</center>
							</div>
<?php 					} 
?>
					</div>
				</div>
			</div>
		</div>
<?php		
		}
// ----------------------------------- VIEW PERGUNTAS COMUNIDADE -----------------------------------------------
		function carregaPerguntasComunidade($perguntas){
?>		
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
								<h1 class="titulo-perguntas">Preparado?</h1>
								<button id="btn-prova" onclick="carregarPergunta(0)" class="btn-lg btn-success"><span class="glyphicon glyphicon-pencil"></span> Vamos nessa!</button>
							</center>
						</div>
<?php 					for($i=0;$i<count($perguntas);$i++){
							$respostas = Model_curso::selecionarRespostasComunidade($perguntas[$i]->getPerguntas_comunidade_id());
?>
							<div class="p-div" style="display: none;" id="pergunta_<?php echo $i ?>">
								<h1 class="titulo-perguntas"><?php echo $perguntas[$i]->getPerguntas_comunidade_descricao(); ?></h1>

<?php							for($a=0;$a<count($respostas);$a++){
?>
									<button onclick="checkRespostas(this,<?php echo $respostas[$a]->getRespostas_comunidade_id()?>, <?php echo $perguntas[$i]->getPerguntas_comunidade_id()?>)" name="btn_resp_<?php echo $perguntas[$i]->getPerguntas_comunidade_id();?>" class="btn-block btn btn-lg btn-primary" id="btn_resp_<?php echo $respostas[$a]->getRespostas_comunidade_id()?>">
										<?php echo $respostas[$a]->getRespostas_comunidade_desc(); ?>
									</button>
<?php 							}
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
<?php 					} 
?>
					</div>
				</div>
			</div>
		</div>
<?php		
		}
	}
?>