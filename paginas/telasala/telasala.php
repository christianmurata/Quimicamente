<!--TELA DO SISTEMA QUARKZ: SALA ALUNO.
	PRODUZIDA POR ANDREI CORREA :D 
-->
<link href="../assets/css/telasala.css" rel="stylesheet" media="screen">
<link href="../sweet_alert/sweetalert2.css" rel="stylesheet" media="screen">
<script src="../sweet_alert/sweetalert2.js"></script>
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
			<?php if($turmas != null){echo	$turmas->getTurmas_nome();}else{echo "Sala de aula";} ?>
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
					<div class="col-lg-12">
						<div class="panel panel-quimicamente">
							<div class="panel-heading quarkz"></div>
							<div class="panel-body">
								<h3>Conteúdos Disponíveis</h3>
							</div>
							<div class="panel-body">
								<div class="flex flex-4">
								<?php if($conteudos != false){
										for($i = 0; $i < count($conteudos); $i++){
								?>		<div class="box person">
											<div class="image round">
												<img src="../imagens/hist.jpg"/>
												<center>
													<p><a href="paginaCurso/paginacurso.php?conteudos_id=<?php echo $conteudos[$i]->getConteudos_id(); ?>" class="link"><?php echo $conteudos[$i]->getConteudos_nome() ?></a></p>
												</center>	
											</div>	
										</div>
								<?php 	}
									  }else{echo "Não há conteudos conteúdos disponíveis :(";} ?>
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
								?>			<tr>		
												<td>
													<p><?php echo $aluno->getUsuarios_nome(); ?></p>
												</td>	
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
						<?php		if($provas != false){
										foreach($provas as $prova){ ?>
											<tr>
												<td><?php echo $prova->getProvas_data(); ?></td>
											</tr>
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