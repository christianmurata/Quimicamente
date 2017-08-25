<?php
session_start();
$_SESSION['NOME'];
$_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
	<meta name="description" content="Site do curso de química baseado em EaD">
	<meta name="keywords" content="química, quimicamente, quarkz, cti, tcc, 3º ano">
	<meta name="author" content="WILLIAN">
	<title>ESTUDO</title>
    <!--adicionando o bootstrap-->
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!--css personalizado-->
    <link href="../bootstrap/css/estilo.css" rel="stylesheet" media="screen">
    
    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- [if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #ccc">        
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="../imagens/logoQuim.png" width="200px"></a>
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
	<div class="col-sm-8 col-sm-offset-2" style="padding-top: 70px" id="conteudo">			
		<p><h2>SEPARAÇÃO DE MISTURAS</h2><br>
		<img class="displayed" src="../imagens/filtracao.jpg" width="16%"><br>
			As misturas também são chamadas de substâncias compostas, uma mistura pode ser homogênea ou heterogênea. <br>								
			Se uma mistura apresenta pelo menos duas fases ela é chamada de mistura heterogênea e pode ser separada por um método físico. <br>Quando uma mistura apresenta uma única fase ela é chamada de mistura homogênea e sua separação requer métodos químicos.
		</p>			
	</div>
	<div class="col-xs-8 col-xs-offset-2">
		<div class="col-xs-2">
			<button id="voltar">Voltar</button>
		</div>
		<div class="col-xs-2 col-xs-offset-8">
			<button id="avancar">Avançar</button>
		</div>
	</div>

	<!--CHAMADA DOS SCRIPTS-->
    <script src="../bootstrap/js/jquery-3.2.1.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/main.js"></script>
	<script src="trocapagina.js"></script>
	<script>	
		var id = '<%=request.getSession().getAttribute("ID")%>';
		window.onload = function(){
			$.ajax({
				'url' : 'avancarpagina.php',
				'type' : 'GET',
				'data' :{
							'parametro1' : 1,
							'parametro2': id 
						},
				'success' : function(retorno){               
								if (retorno != null) {
									document.getElementById('conteudo').innerHTML = retorno;
								}else{
									alert('não deu certo');
								}
							}
			});
		}
	</script>
</body>
</html>