<!--TELA DO SISTEMA QUARKZ: SALA ALUNO.
	PRODUZIDA POR ANDREI CORREA :D 
-->
<link href="../assets/css/telasala.css" rel="stylesheet" media="screen">
<link href="../sweet_alert/sweetalert2.css" rel="stylesheet" media="screen">
<script src="../sweet_alert/sweetalert2.js"></script>
<style>
</style>
<script src="../js/sala.js"></script>
<div class="container-fluid">
	<div class="row">
	<div class="view overlay hm-green-slight">
	<div class="mask">
		<div class="jumbotron jumbotron-fluid banner1">

			<center>
			<h1>&nbsp;</h1>
				<h1 class="display-3" style="font-size: 72px;">Sala de aula</h1>
				<p class="lead">Conecte-se à sua turma, onde você está!</p>
				<h1>&nbsp;</h1>
			</center>
		</div>
	</div>
	</div>
	</div>
</div>
<div class="container text-center">
	<div class="row content">
		<div class="col-md-12 justify">
			<h1><kbd>
			<?php if($turma != null){echo	$turma->getTurmas_nome();}else{echo "Sala de aula";} ?>
			</kbd></h1>
		</div>
		<div class="col-md-12 justify">
			<form>
				<input type="hidden" id="alunos_id" value="<?php echo $user->getAlunos()->getAlunos_id();?>">
				<button style="float: justify; vertical-align: bottom;" type="button" onclick="javascript: msg('sairturma', 'Deseja realmente sair da sala? :(')" class="btn btn-danger">Sair da Turma</button>
			</form>
			</div>
	</div>
	<div class="row content">
		<div class="col-md-12 text-left">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-quimicamente">
							<div class="panel-heading header-tab">
								<div class="row">
									<div class="col-xs-6">
										<a href="#" class="active" id="cont-lib-link">Conteúdos Liberados</a>
									</div>
									<div class="col-xs-6">
										<a href="#" id="cont-lib-comu-link">Conteúdos Comunidade Liberados</a>
									</div>
								</div>
								<hr>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<div id="div-conteudo">
<?php 									
											if($conteudos){
												foreach($conteudos as $conteudo){
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
																		<a href="curso.php?conteudos_ordem=<?php echo $conteudo->getConteudos_id();?>&action=CL"><input type="button" value="Fazer conteúdo" class="btn btn-lg" style="background-color: #4fffbc;color:white"></a>
																	</div>
																</div>  	
															</div>
														</div>
													</div>
<?php
		 										}
		 									}else{
		 										echo "<center><span class=\"label-info\">Nenhum Conteúdo Liberado</span></center>";
		 									}
?>
										</div>
										<div id="div-conteudo-comunidade" style="display: none">
<?php
		 									if($conteudos_comunidade){
												foreach($conteudos_comunidade as $conteudo_comunidade){
?>	
													<div class="box person col-md-3">
														<div class="flip-container" ontouchstart="this.classList.toggle('hover');">  	
															<div class="flipper">
																<div class="front" style="background-image: url(../imagens/shadow.png), url(<?php echo $conteudo_comunidade->getConteudos_comunidade_imagem(); ?>); background-position: center top; background-size: cover;">
																	<div class="conteudo conteudoDesc conteudoActive text-center">
																		<i class="fa fa-flask" aria-hidden="true"></i>
																		<p><?php echo $conteudo_comunidade->getConteudos_comunidade_nome(); ?></p>
																	</div>
																</div>
																<div class="back" style="background-image:url(../imagens/shadow.png), url(<?php echo $conteudo_comunidade->getConteudos_comunidade_imagem(); ?>); background-position: center top; background-size: cover;">
																	<div class="conteudo conteudoButton text-center">
																		<a href="curso.php?conteudos_ordem=<?php echo $conteudo_comunidade->getConteudos_comunidade_id();?>&action=CCL"><input type="button" value="Fazer conteúdo" class="btn btn-lg" style="background-color: #4fffbc;color:white"></a>
																	</div>
																</div>  	
															</div>
														</div>
													</div>
<?php
		 										}
		 									}else{
		 											echo "<center><span class=\"label-info\">Nenhum Conteúdo Liberado</span></center>";
		 									}
?> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-quimicamente">
							<div class="panel-heading">
								
							</div>
							<div class="panel-body">
								<h1> Alunos </h1>
							</div>
							<div class="table-responsive">
								<table class="table table-hover">
									<tbody>
								<?php 	if($alunos != false){
										 	foreach($alunos as $aluno){
												 $id = $aluno->getUsuarios_id();
								?>			<tr>		
												<td class="nome-aluno">
													<a data-toggle="modal" data-target="#myModal<?php echo $id ?>" href="#">
													<img src="<?php echo $aluno->getUsuarios_foto(); ?>" class="img-aluno img-responsive img-navbar center-block">
													<span><?php echo $aluno->getUsuarios_nome(); ?></span>
													</a>
												</td>	
											</tr>
											<tr>
												<div class="modal fade" id="myModal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-body">
																<center>
																	<img src="<?php echo $aluno->getUsuarios_foto(); ?>" width="140" height="140" border="0" class="img-circle">
																	<h3 class="media-heading"><?php echo $aluno->getUsuarios_nome(); ?></h3>
																	<span class="label label-success"><?php echo $aluno->getUsuarios_email(); ?></span>
																	<span class="label label-warning">Idade:<?php echo calculo_idade($aluno->getUsuarios_datanasc()); ?></span>
																</center>
															</div>
														</div>
													</div>
												</div>
											</tr>
								<?php 		}
										}else{
											echo "<tr><td>Não há alunos cadastrados!</td></tr>";
											} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div> <!-- DIV ALUNOS -->
					<div class="col-md-6">
						<div class="panel panel-quimicamente">
							<div class="panel-heading">
								
							</div>
							<div class="panel-body">
								<h1> Provas </h1>
							</div>
							<div class="table-responsive">
								<table class="table table-hover">
									<tbody>
<?php
									if($provas != false){
										foreach($provas as $prova){ 
											$realizou = Sala_model::verificarProva($prova->getProvas_id() ,$user->getAlunos()->getAlunos_id());
											if($realizou){
												$provas_id = $prova->getProvas_id();
?>
												<tr>
													<td width="20%">
														<?php echo date("d/m/Y",strtotime($prova->getProvas_data()))?>
													</td>
													<td>
														<a data-toggle="modal" data-target="#ProvaModal<?php echo $provas_id ?>" href="#">
															<span><?php echo $prova->getProvas_desc(); ?></span>
														</a>
													</td>
												</tr>
												<tr>
													<div class="modal fade" id="ProvaModal<?php echo $provas_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-body">
																	<center>
																		<h3 class="media-heading"><?php echo $prova->getProvas_desc(); ?></h3>
																		<p>Sua média: <?php echo $realizou->getRespostas_prova_media() ?></p>
																	</center>
																</div>
															</div>
														</div>
													</div>
												</tr>
<?php
											}else{
?>
												<tr>
													<td width="25%">
														<?php echo date("d/m/Y",strtotime($prova->getProvas_data()))?>
													</td>
													<td width="75%">
														<a href="provas.php?action=prova&provas_id=<?php echo $prova->getProvas_id();?>"><?php echo $prova->getProvas_desc(); ?></a>
													</td>
												</tr>
<?php

											}
?>
											<!-- <tr>
												<td width="25%"><a href="javascript:void(0);" onclick="prova(<?php echo $prova->getProvas_id();?>)">
													<?php echo date("d/m/Y",strtotime($prova->getProvas_data()))?></a></td>
												<td width="75%">
													<a href="javascript:void(0);" onclick="prova(<?php echo $prova->getProvas_id();?>)"><?php echo $prova->getProvas_desc(); ?></a>
												</td>
											</tr> -->
							<?php 		}
									}else{ ?>
										<tr>
											<td>Sem provas! :) </td>
										</tr>
							<?php   }  ?>
									</tbody>
								</table>
							</div>
						</div>
					</div> <!-- DIV PROVAS -->
				</div>
			</div>
		</div>
	</div>
</div>