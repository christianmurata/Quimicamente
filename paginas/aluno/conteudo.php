<!DOCTYPE html>
<?php	
	//ini_set('display_errors',1);
	//ini_set('display_startup_erros',1);
	//error_reporting(E_ALL); 

	include("controllers/control_aluno.php")?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">    
		<meta name="description" content="Site do curso de química baseado em EaD">
		<meta name="keywords" content="química, quimicamente, quarkz, cti, tcc, 3º ano">
		<meta name="author" content="GABRIELLA">
		
		
		<link rel="shortcut icon" href="images/logo.ico">
		<title> Conteúdo| Quimicamente </title>
		
		<!--adicionando o bootstrap-->
		<link href="bst/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<!--css personalizado-->
		<link href="bst/css/estilo.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="bst/css/style.css"/>
		<link rel="stylesheet" href="bst/css/css_menu.css"/>
		<link rel="stylesheet" href="bst/css/css_aluno.css"/>
		<link rel="stylesheet" href="bst/css/elements.css"/>
		<link rel="stylesheet" href="bst/css/metisMenu.min.css"/>
		
		<!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
		<!-- [if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->    
	</head>
	<body>
			  
			  
		<!--CONTEÚDO DA PÁGINA-->
		
	<section id="inicio">
		<!--<div class="row"> -->
			<div class="col-xs-offset-2">					
					<!-- CURSO - CONTEUDO -->
				<div class="row"> 
					<div class="col-lg-9">
						<div class="col-lg-12">
							<div class="panel panel-quimicamente">
								<div class="panel-heading">
									Conteúdo do curso
								</div>
									
							<div class="panel-body">
									
									<div class="panel-body">
								<div class="flex flex-4">
								<?php if($conteudos != false){
										foreach($conteudos as $conteudo){
								?>		<div class="box person">
											<div class="image round">
												<img src="../imagens/hist.jpg"/>
												<center>
													<p><a href="paginaCurso/paginacurso.php?conteudos_id=<?php echo $conteudo->getConteudos_id(); ?>" class="link"><?php echo $conteudo->getConteudos_nome() ?></a></p>
												</center>	
											</div>	
										</div>
								<?php 	}
									  }else{echo "Não há conteudos conteúdos disponíveis :(";} ?>
								</div>
							</div>
								<div class="panel-footer">
									<a href="http://200.145.153.172/quarkz/Quimicamente/paginas/aluno.php">
									<input type="button" value="Voltar ao perfil" class="special"/> </a>
								</div>
							</div> <!-- CURSO - CONTEUDO -->
						</div>
					</div> <!-- /col-md-9 --> <!--ROW-->
				</div>
			</div>
		</div>	
	</section>
		<!--/Corpo da Página-->
		
		<!--CHAMADA DOS SCRIPTS-->
		<script src="../bootstrap/js/jquery-3.2.1.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="../bootstrap/js/main.js"></script>
		
	</body>
</html>