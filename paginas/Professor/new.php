<div class="row">
					<div class="col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								
								<?php if($turmas != false) {?>
									<div class="row">
										<div class="col-xs-3">
											<i class="fa fa-users fa-5x"></i>
										</div>
										<div class="col-xs-9 text-right">
											<div class="huge"><?php $qtd = count($turmas); if($qtd < 10) { echo "0".$qtd ;} else { echo $qtd;}  ?></div>
											<div>Turmas Criadas</div>
										</div>
									</div>
							</div>
							<div class="panel-body">
							<table class="table">
									<!-- Tabela -->
									<thead>
										<tr>
											<!--<th>Número</th>-->
											<th>Turma</th>
											<th>Detalhes</th>
											<th> &nbsp; </th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($turmas as $turma){ $id=$turma->getTurmas_id();?>
											<tr>
												<td>
													<p><?php echo $turma->getTurmas_nome(); ?></p>
												</td>
												<td>
													<a href="gerenciar_turma.php?id=<?php echo $id; ?>" class="b">Exibir</a></div>
												</td>
												<td>
													<a href="#" class="b" data-toggle="modal" data-target="#<?php echo $turma->getTurmas_id(); ?>">Excluir</a>
													<!-- Modal -->
													<div class="modal fade" id="<?php echo $turma->getTurmas_id(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																	<h4 class="modal-title" id="myModalLabel">Exclusão</h4>
																</div>
																<div class="modal-body">
																	<center>
																		<p> Deseja realmente excluir essa turma? </p>
																		<button type="button" class="btn btn-success" onclick="excluir_turmas(<?php echo $id; ?>)">Confirmar</button>
																		<button type="button" class="btn btn-danger" class="close" data-dismiss="modal">Cancelar</button>
																	</center>
																</div>
																<!--<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	<button type="button" class="btn btn-primary">Save changes</button>
																</div>-->
															</div>
															<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
													</div><!-- /.modal -->
												</td>
											</tr>
									<?php } }else{ echo "Esse professor não possui nenhuma turma!"; } ?>
								</tbody>
							</table>
								<?php
									echo"Páginas:";
										for($i = 1; $i < $tot_paginas + 1; $i++) {
										echo "<a href='professor.php?pagina=$i'> ".$i."</a> ";
									}
								?>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-tasks fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">12</div>
										<div>New Tasks!</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
				</div>
<!-- Tela Professor - Conteudos Oficiais -->
<div class="row"> 
					<div class="col-lg-12">
						<div class="panel panel-quimicamente">
							<div class="panel-heading">
								Conteúdo do curso
							</div>
							<div class="panel-body">
								<div class="flex flex-4">
									<?php if($conteudos != false) { foreach($conteudos as $conteudo){ ?>
											<div class="box person">
												<div class="image round">
													<img src="../imagens/hist.jpg"/>
												</div>
												<center>
													<p><?php echo $conteudo->getConteudos_nome(); ?></p>
												</center>
											</div>
										<?php } } else{ echo "Não há nenhum conteúdo cadastrado!"; } ?>
								</div>
							</div>
							<div class="panel-footer">
								<input type="button" value="Todos os conteúdos" class="special"/>
							</div>
						</div>
					</div><!-- /.col-lg-12 -->
				</div><!--row-->