<!DOCTYPE html>
<?php ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL); 

?>
  
		<!--CONTEÚDO DA PÁGINA-->
		
		<section id="inicio">

			<div class="col-xs-offset-2">					
					<!-- CURSO - CONTEUDO -->
			<div class="row"> 
				<div class= "col-md-9">
						<!-- CURSO - CONTEUDO -->
						<div class="col-lg-12">
							<div class="panel panel-quimicamente">
								<div class="panel-heading">
									Conteúdo do curso
								</div>
								
								<div class="panel-body">
									<div class="flex flex-4">
									<div class="box person">
											<div class="image round">
												<img src="../imagens/hist.jpg"/>
												<center>
													<p><a href="paginaCurso/paginacurso.php?conteudos_id=<?php// echo $conteudo->getConteudos_id(); ?>" class="link"><?php //echo $conteudo->getConteudos_nome() ?></a></p>
												</center>	
											</div>	
										</div>
									</div>
								</div> <!-- /.col-lg-12 -->
								<div class="panel-footer">
									<a href="http://200.145.153.172/quarkz/Quimicamente/paginas/aluno/conteudo.php">
									<input type="button" value="Ver conteúdos" class="special"/> </a>
								</div>
							</div>
						</div> <!-- CURSO - CONTEUDO -->
					<!-- /col-md-9 --> <!--ROW-->
						
						
						
			<div class= "row"> <!-- row1 (ranking /turma / competicao) -->
				<div class= "col-lg-12">
					<!-- TURMA -->
					<div class="col-lg-6">
							
							<div class="panel panel-quimicamente"> <!-- ranking -->
								<div class="panel-heading">   Ranking   </div>                        
                                
								<div class="col-ld-4">
									<div class="box person">
										
						<?php  ?>
										<p> Em construção </p>
										
									</div>                        
								</div>
								<div class="panel-footer">
									<a href="http://200.145.153.172/quarkz/Quimicamente/paginas/rank.php">
										<input type="button" value="Ver Mais" class="special" /> 
									</a> 
								</div>
							</div>
					</div>
					
					
						<div class = "row"> <!-- row 2 contém turma e modo competição-->
							<div class="col-lg-6">
								<div class="col-lg-12">
									<div class="panel panel-quimicamente"> <!-- turma -->
										<div class="panel-heading">   TURMA   </div>
												
										<div class="panel-body">
											<h3> Nome turma: 
											<?php
												//echo $turma->getTurmas_nome(); ?>  </h3>
											
											<h3> Professor: 
											<?php
												//include('..paginas/aluno/aluno_control.php');
												//echo $turmas_id['turmas_id']; ?>  </h3>
										</div>
										
										<div class="panel-footer">
											<a href="http://200.145.153.172/quarkz/Quimicamente/paginas/sala.php">
												<input type="button" value="Ver Mais" class="special" /> 
											</a> 
										</div>
									</div>
								</div>
												<!-- competiçao -->  
								<div class="col-lg-12">
									<div class="panel panel-quimicamente"> <!-- competicao -->
										<div class="panel-heading">   Competição   </div>
											<div class="panel-body2">
												<p>modo competição indisponivel </p>
											</div>
											<div class="panel-footer">
												<a href= "http://200.145.153.172/quarkz/Quimicamente/paginas/modoCompeticao.php">
													<input type="button" value="Ver Mais" class="special"/> 
												</a>
											</div>									
									</div><!-- competiçao -->
								</div>
							</div>
						</div>		
				</div>	
			</div> <!-- row (turma / competicao) -->
					

				</div><!-- col-md-9 -->
			</div>
			</div>
		</section>
		<!--/Corpo da Página-->
	