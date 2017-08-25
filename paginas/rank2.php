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
	<meta name="author" content="jose">
	<title>Rank</title>
    <!--adicionando o bootstrap-->
	<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!--css personalizado-->
    <link href="../assets/bootstrap/css/estilo.css" rel="stylesheet" media="screen">
    
    
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
		<div class="panel panel-primary">
			
			<div class="panel-heading">
						<center>Ranking</center>
			</div>
			
			<div class="panel-body">
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<!--<div class="col-xs-3">-->
								<i class="glyphicon glyphicon-signal"></i>
								<span class="pull-right"> Facil</span><br>
						</div>	
						<div class="panel-footer">
                            <span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
                        </div>						
					</div>
				</div>
				
				
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<!--<div class="col-xs-3">-->
								<i class="glyphicon glyphicon-calendar"></i>
								<span class="pull-right"> Medio</span><br>
						</div>	
						<div class="panel-footer">
                            <span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
                        </div>						
					</div>
				</div>
				
				
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<!--<div class="col-xs-3">-->
								<i class="glyphicon glyphicon-th-list"></i>
								<span class="pull-right"> Dificil</span><br>
						</div>	
						<div class="panel-footer">
                            <span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left">usuario 1 </span>
                            <span class="pull-right"> Pontos</span><br>
                        </div>						
					</div>
				</div>
			</div>
						
		
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