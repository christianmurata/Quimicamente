<?php
session_start();



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
    
		  
	<!--CONTEÚDO DA PÁGINA-->
	
	<div class="col-sm-8 col-sm-offset-2" style="padding-top: 70px" id="conteudo">			
		<div class="panel panel-primary">
			
			<div class="panel-heading">
						<center>Ranking 
						
						
						
						</center>
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
                            <span class="pull-left">usuarios </span>                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> <?php include_once("../controllers/control_rank.php");?></span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"></span>                            <span class="pull-right"> </span><br>
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
                            <span class="pull-left">usuarios </span>                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> <?php include_once("rank/control_rank_medio.php");?></span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"></span>                            <span class="pull-right"> </span><br>
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
                            <span class="pull-left">usuarios </span>                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> <?php include_once("rank/control_rank_dificil.php");?></span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"></span>                            <span class="pull-right"> </span><br>
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