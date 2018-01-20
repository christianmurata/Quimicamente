<!DOCTYPE html>
    <?php //ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL); 
    ?>
    <html>
            <!--CONTEÚDO DA PÁGINA-->

            <section id="inicio">

                <div class="col-xs-offset-2">					
                        <!-- CURSO - CONTEUDO -->
                    <div class="row"> 
                        <div class= "col-md-9">
                                
            <!--  CONTEUDO -->  <div class="col-lg-12">
                                    <div class="panel panel-quimicamente">
                                        <div class="panel-heading"> Conteúdo do curso </div>
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
											
                                        </div> <!-- /.col-lg-12 -->
                                        <div class="panel-footer">
                                            <a href="http://200.145.153.172/quarkz/Quimicamente/paginas/aluno/conteudo.php">
                                            <input type="button" value="Ver conteúdos" class="special"/> </a>											
                                        </div>
									
                                    </div>
									<!--<div class="progress">
									<?php// $porcentagem = ($porcen_cont * $porcen_aluno / 100); ?>
											<div class="progress-bar progress-bar-success activ progress-bar-striped" role="progressbar" color="#4FFFBC" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $porcentagem;?>%">
													<?php //echo $porcentagem;?>
											</div>
										</div> -->
            <!-- CONTEUDO -->	</div> 
								
                            <!-- /col-md-9 --> <!--ROW-->

							<div class= "row"> <!-- row1 (ranking /turma / competicao) -->
								<div class= "col-lg-12">
									<!-- TURMA -->
									<div class="col-lg-6">
						   <!-- ranking --> <div class="panel panel-quimicamente"> 
												<div class="panel-heading">   Ranking   </div>                        
												<div class="panel-body">
													<div class="col-ld-4">
														<thead>
															<?php 
															if($rank != false){  ?>
																<div class="panel-heading">   FACIL   </div>
																<div class="panel-body">
																			<?php 
																			if(!isset($usuariosFacil)){
																				echo("Não há nenhum registro!");
																			}
																			else
																			{
																				if(isset($usuariosFacil)){
																					foreach($usuariosFacil as $usuario)
																						{echo $usuario;//->getDesempenhos_notafinal();
																						//echo"<br>";
																						//echo $usuario->getDesempenhos_tempo();
																						echo"<br>";}
																				}
																			}?>
																			</span> <span class="pull-right">
																			<?php 
																				if(isset($pontuacaoesFacil)){
																				foreach($pontuacaoesFacil as $pontuacao)
																				{echo $pontuacao."<br>";}}
																			?>
																</div>
																<div class="panel-heading">Nivel medio</div>
																<div class="panel-body">
																			<?php 
																			if(!isset($usuariosMedio)){
																				echo("Não há nenhum registro!");
																			}
																			else
																			{
																				if(isset($usuariosMedio))
																				{
																					foreach($usuariosMedio as $usuario)
																					{echo $usuario."<br>";}
																				}
																			}?>
																			</span> <span class="pull-right"> 
																			<?php 
																			if(isset($pontuacaoesMedio))
																			{
																				foreach($pontuacaoesMedio as $pontuacao)
																				{echo $pontuacao."<br>";}
																			}?>
																</div>
																<div class="panel-heading">   dificil   </div>	
																<div class="panel-body">
																			<?php 
																			if(!isset($usuariosDificil)){
																				echo("Não há nenhum registro!");
																			}
																			else
																			{
																				if(isset($usuariosDificil)){
																					foreach($usuariosDificil as $usuario)
																						{echo $usuario."<br>";}	
																				}
																			}?>
																			</span> <span class="pull-right">
																			<?php 
																			if(isset($pontuacaoesDificil)){
																				foreach($pontuacaoesDificil as $pontuacao)
																				{echo $pontuacao."<br>";}
																			}?>
																</div>
															<?php }//if
																else{ 
																	echo "Sem desempenho!";
																} ?>
														</thead>
																			   
													</div>
												</div>
													<div class="panel-footer">
														<a href="http://200.145.153.172/quarkz/Quimicamente/paginas/rank.php">
															<input type="button" value="Ver Rank" class="special" /> 
														</a> 
														<a href= "http://200.145.153.172/quarkz/Quimicamente/paginas/difficulty.php">
																		<input type="button" value="Competir" class="special"/> 
														</a>
													</div>
												
						   <!-- ranking --> </div>
									</div>


										<div class = "row"> <!-- row 2 contém turma e modo competição-->
											<div class="col-lg-6">
												
								<!-- turma -->	<div class="col-lg-12">
													<div class="panel panel-quimicamente"> <!-- turma -->
														<div class="panel-heading">   TURMA   </div>

														<div class="panel-body">
															<?php if($turmas != false)
																	{ 
																		echo "Nome: ".$turmas-> getTurmas_nome();
																		//echo "Professor: ".$turmasprof->getUsuarios_nome(); ?>
															<div class="panel-footer">
																<a href= "http://200.145.153.172/quarkz/Quimicamente/paginas/sala.php">
																	<input type="button" value="Ver Sala" class="special"/> 
																</a>
															</div>
															<?php }//if 
																else{ echo " Você não tem uma turma! Que pena, né?? Deseja entrar em alguma??"; ?>
																	
																<div class="panel panel-quimicamente">
																	<input type="text" name="Nome_turma" class="form-control" placeholder="Insira o link da Turma" />
																</div>
																<div class="panel-footer">
																	<input type="button" value="Entrar" class="special"/>
																</div> 
															<?php }//else ?>
														</div>
													</div>
								<!-- turma -->  </div>
												
											</div>
										</div>		
								</div>	
							</div> <!-- row (turma / competicao) -->
                        </div><!-- col-md-9 -->
                    </div>
                </div>
            </section>
            <!--/Corpo da Página-->
    </html>