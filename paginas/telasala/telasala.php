<!--TELA DO SISTEMA QUARKZ: SALA ALUNO.
	PRODUZIDA POR ANDREI CORREA :D 
-->
<link rel="stylesheet" type="text/css" href="../assets/slick/slick.css"/>
// Add the new slick-theme.css if you want the default styling
<link rel="stylesheet" type="text/css" href="../assets/slick/slick-theme.css"/>
<link href="../assets/css/telasala.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../assets/slick/slick.min.js"></script>
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
			<h1>TITULO DA SALA A QUAL O ALUNO ESTÁ MATRÍCULADO</h1>
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
									<div class="box person">
										<div class="image round">
											<img src="../imagens/hist.jpg"/>
											<center>
											<p>História da Química</p>
										</center>	
										</div>	
									</div>
									<div class="box person">
										<div class="image round">
											<img src="../imagens/hist.jpg"/>
											<center>
											<p>História da Química</p>
										</center>	
										</div>	
									</div>
									<div class="box person">
										<div class="image round">
											<img src="../imagens/hist.jpg"/>
											<center>
											<p>História da Química</p>
										</center>	
										</div>	
									</div>
									<div class="box person">
										<div class="image round">
											<img src="../imagens/hist.jpg"/>
											<center>
											<p>História da Química</p>
										</center>	
										</div>	
									</div>
									<div class="box person">
										<div class="image round">
											<img src="../imagens/hist.jpg"/>
											<center>
											<p>História da Química</p>
										</center>	
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
										<tr>
											<td>ALUNO</td>
										</tr>
										<tr>
											<td>ALUNO</td>
										</tr>
										<tr>
											<td>ALUNO</td>
										</tr>
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
<script>
	$(document).ready(function(){
  		$('.flex-4').slick({
    		infinite: true,
  			slidesToShow: 5,
  			slidesToScroll: 1
  		});
	});
</script>