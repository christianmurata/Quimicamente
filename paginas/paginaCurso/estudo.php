<?php

//$_SESSION['NOME'];
//$_SESSION['ID'];
include "controlpaginacurso.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
	<meta name="description" content="Site do curso de química baseado em EaD">
	<meta name="keywords" content="química, quimicamente, quarkz, cti, tcc, 3º ano">
	<meta name="author" content="alunocti" >
	<title>ESTUDO</title>
    <!--adicionando o bootstrap-->
	<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!--css personalizado-->
    <link href="../../assets/bootstrap/css/estilo.css" rel="stylesheet" media="screen">
    <<link rel="stylesheet" type="text/css" href="../../assets/sweetalert/dist/sweetalert.css">
	
    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- [if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="stylesheet" type="text/css" href="testewizard.css">
</head>
<body id="corpo">
	 <div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #ccc">        
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="../../imagens/logoQuim.png" width="200px"></a>
            </div>
			
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="padding-right:10px;">
                    <li class="active"><a href="#">Curso</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#"><span class="glyphicon glyphicon-blackboard"></span>     Sala</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-user"></span>     Perfil</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-edit"></span>     Curso</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-time"></span>     Competir</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-cog"></span>     Sobre</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-log-out"></span>     Sair</a></li>
						</ul>
					</li>
					<li><a href="#">Sobre</a></li>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-wrench"></span>     Editar perfil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>     Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
			<!--FINAL DA BARRA DE NAVEGAÇÃO SUPERIOR-->						
        </nav>		
	</div>		  
		  
	<!--CONTEÚDO DA PÁGINA-->	
	<div class="col-sm-6 col-sm-offset-3" style="padding-top: 70px" id="conteudo">
		<div class="container col-sm-12">
            <div>
                <div class="col-sm-8">
                    <p class="text-warning">Clique nas abas para visualizar o conte&uacute;do!</p>
                </div>
                <div class="col-sm-4">
                    <a href="perguntasassunto.php" class="btn btn-sm btn-primary">Fazer prova</a>
                </div>
            </div>
            <div>
                <h3>Assunto: <?php echo $tituloconteudo[0]['conteudos_nome']; ?></h3>
            </div>
			<ul class="nav nav-tabs">	  
				<?php for($x=0; $x<count($conteudo); $x++) {?>
					<li><a class="" data-toggle="tab" href="#<?php echo $x; ?>">Slide <?php echo $x+1; ?></a></li>
				<?php }?>
			</ul>	  					
			<div class="tab-content">
				<br>
				<?php for($x=0; $x<count($conteudo); $x++) {?>
					<div id="<?php echo $x; ?>" class="tab-pane fade">
						<?php echo $conteudo[$x]['slides_conteudo']?>
					</div>		  		
				<?php }?>
			</div>	  
		</div>
	</div>
	<!--FIM DO CONTEÚDO-->
	
	<!--TESTE DE POPUP-->
	<div class="col-sm-6 col-sm-offset-3"><input type="button" id="btn-teste" value="TESTE"></div>
	
	
	
	<!--CHAMADA DOS SCRIPTS-->
    <script src="../../assets/bootstrap/js/jquery-3.2.1.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/bootstrap/js/main.js"></script>
	<script src="../../assets/sweetalert/dist/sweetalert.min.js"></script>
	<script src="teste.js"></script>
	<script src="testewizard.js"></script>
	
</body>
</html>