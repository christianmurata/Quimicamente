<!--TELA DO SISTEMA QUARKZ: SALA ALUNO.
	PRODUZIDA POR ANDREI CORREA :D 
-->
<link href="../assets/css/telasala.css" rel="stylesheet" media="screen">
<div class="container-fluid">
	<div class="row">
		<div class="jumbotron jumbotron-fluid banner1">
			<center>
				<h1 class="display-3">Sala de aula</h1>
				<p class="lead">Conecte-se à sua turma, onde você está!</p> 
			</center>
		</div>
	</div>
</div>
<div class="container text-center">
	<div class="row content">
		<div class="col-md-12 text-left">
			<h1><?php if($turmas != false){
						echo $turmas->getTurmas_nome();
					  }else{
					  	echo "Sala de Aula";
					  } ?></h1>
			<hr>
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
										foreach($conteudos as $conteudo){
								?>		<div class="box person">
											<div class="image round">
												<img src="../imagens/hist.jpg"/>
												<center>
													<p><?php echo $conteudo->getConteudos_nome() ?></p>
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
											<tr>
												<td>Historia da Quimica</td>
											</tr>
											<tr>
												<td>Quimica Orgânica I</td>
											</tr>
											<tr>
												<td>Kondo bixa</td>
											</tr>
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