<section id="inicio">
            <div class="container-fluid">
			<!--Corpo da Página-->
				<div class="row">
					<div class="col-lg-9">
						<div class="panel panel-default turmas">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
											<p><i class="fa fa-users fa-5x"></i>Lista de Turmas<p>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php $qtd = count($turmas); if($qtd < 10) { echo "0".$qtd ;} else { echo $qtd;}  ?></div>
										<div><p>Turmas</p></div>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="tabela">
									<table class="table">
										<?php if($turmas != false) {?>
											<!-- Tabela -->
											<thead>
												<tr>
													<!--<th>Número</th>-->
													<th><p>Turmas</p></th>
													<th><p>Detalhes</p></th>
													<th> &nbsp; </th>
												</tr>
											</thead>
											<tbody id="turmas">
												<?php foreach($turmas as $turma){ $id=$turma->getTurmas_id();?>
													<tr>
														<td class="desc">
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
								</div>
								<div id="turmas-pagination" class="text-center" style="display: none">
									<a id="turmas-previous" href="#" class="b">&laquo; Previous</a> 
									<a id="turmas-next" href="#" class="b">Next &raquo;</a>
								</div>
							</div>
							<div class="panel-footer">
								<!--<a href="inserir_turma.php"><input type="button" value="Criar Turmas" class="special"/></a>-->
									<input type="submit" value="Nova Turma" class="special animated fadeInRight" data-toggle="modal" data-target="#inserir"/>
										<div class="modal fade" id="inserir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title" id="myModalLabel">Nova Turma</h4>
														</div>
														<div class="modal-body">
															<p>Nome da turma</p><input type="text" class="form-control" id="turmas_nome" name="turmas_nome" placeholder="Insira o nome da Turma">
														</div>
														<div class="modal-footer">
																<button type="button" class="btn btn-success" onclick="inserir_turmas()">Salvar</button>
																<button type="button" class="btn btn-danger" class="close" data-dismiss="modal">Cancelar</button>
														</div>
													</div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
										</div> <!-- /.modal -->
							</div>
						</div><!--panel panel-quimicamente-->
					</div> <!-- /.col-lg-8 -->
					<div class="col-lg-3">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-list-ol fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">Ranking</div>
										<div>New Comments!</div>
									</div>
								</div>
							</div>
							<a href="http://200.145.153.172/quarkz/Quimicamente/paginas/rank.php">
								<div class="panel-footer">
									<span class="pull-left">Ir ao Ranking</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-user fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">Dados</div>
										<div>Dados Pessoais!</div>
									</div>
								</div>
							</div>
							<a href="http://200.145.153.172/quarkz/Quimicamente/paginas/alteradados.php">
								<div class="panel-footer">
									<span class="pull-left">Alterar Dados</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-book fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">Conteúdos</div>
										<div>Conteúdos Oficiais!</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">Ver Conteúdos</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.col-lg-4 -->
				</div>
				<div class="row"> 
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
											<p><i class="fa fa-book fa-5x"></i>Conteúdos da comunidade<p>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php $qtd = count($conteudos_comun); if($qtd < 10) { echo "0".$qtd ;} else { echo $qtd;}  ?>&nbsp;</div>
										<div><p>Conteúdos</p></div>
									</div>
								</div>
							</div>
							<div class="panel-body">
							<?php if($conteudos_comun != false) { 
										foreach($conteudos_comun as $conteudo){ ?>	
											<div class="box person col-md-3">
												<div class="flip-container" ontouchstart="this.classList.toggle('hover');">  	
													<div class="flipper">
														<div class="front" style="background-image: url(../imagens/shadow.png), url(<?php echo $conteudo->getConteudos_comunidade_imagem(); ?>); background-position: center top; background-size: cover;">
															<div class="conteudo conteudoDesc conteudoActive text-center">
																<i class="fa fa-flask" aria-hidden="true"></i>
																<p><?php echo $conteudo->getConteudos_comunidade_nome(); ?></p>
															</div>
														</div>  		
														<div class="back" style="background-image:url(../imagens/shadow.png), url(<?php echo $conteudo->getConteudos_comunidade_imagem(); ?>); background-position: center top; background-size: cover;">
															<div class="conteudo conteudoButton text-center">
																<p><?php echo $conteudo->getConteudos_comunidade_descricao(); ?></p>
															</div>
														</div>  	
													</div>
												</div>
											</div>
									<?php } 		
									}else{ echo "Não há nenhum conteúdo da comunidade cadastrado!"; } ?>
							</div>
							<div class="panel-footer">
								<input type="button" value="Adicionar conteúdo" class="special" onclick="window.location='adicionar_conteudos.php'"/>
							</div>
						</div>
					</div> <!-- /.col-lg-12 -->
				</div><!--row-->
				
				
                <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
                <script src="../assets/js/retina-1.1.0.min.js"></script>
                <script src="../js/metisMenu.min.js"></script>
                <script src="../js/elements.js"></script>
				<script>
					/*$('#turmas').paginate({
						limit: 4, // 10 elements per page 
						initialPage: 1, // Start on second page 
						previous: true, // Show previous button 
						previousText: 'Previous page', // Change previous button text 
						next: true, // Show previous button 
						nextText: 'Next page', // Change next button text 
						first: true, // Show first button 
						firstText: 'First', // Change first button text 
						last: true, // Show last button 
						lastText: 'Last', // Change last button text 
						optional: false, // Always show the navigation menu 
						onCreate: function(obj) { console.log('Pagination done!'); }, // `onCreate` callback 
						onSelect: function(obj, i) { console.log('Page ' + i + ' selected!'); }, // `onSelect` callback 
						childrenSelector: 'tbody > tr.ugly', // Paginate the rows with the `ugly` class 
						navigationWrapper: $('div#myNavWrapper'), // Append the navigation menu to the `#myNavWrapper` div 
						navigationClass: 'my-page-navigation', // New css class added to the navigation menu 
						pageToText: function(i) { return (i + 1).toString(16); } // Page numbers will be shown on hexadecimal notation 
					});*/
					$('#turmas').paginate({
						itemsPerPage: 4,
						onCreate: function(obj) { console.log('Pagination done!'); }, // `onCreate` callback 
						onSelect: function(obj, i) { console.log('Page ' + i + ' selected!'); }
					});
				</script>
		</div><!--container-fluid-->
	</section><!--/Corpo da Página-->