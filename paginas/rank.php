<?php
session_start();

 include_once("../controllers/control_rank.php");
 

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
    <!--css -->
    <link href="../assets/bootstrap/css/estilo.css" rel="stylesheet" media="screen">
    
    
</head>
<body>
    
	<!---->	  
	<!--CONTEÚDO DA PÁGINA-->
	<?php include "templates/navbar.php" ;?>
	
	
	
	
	<div class="col-sm-8 col-sm-offset-2" style="padding-top: 100px" id="conteudo">			
		<div class="panel panel-primary">
			
			<div class="panel-heading"><center>Ranking </center></div>
			
			<div class="panel-body">
				<div class="col-md-4">
					<div class="panel panel-default"> 
						<div class="panel-heading">
							<!---->
								<i class="glyphicon glyphicon-signal"></i>
								<span class="pull-right"> Fácil</span><br>
						</div>	
						<div class="panel-footer">
                            <span class="pull-left">usuarios </span>                           							 <span class="pull-right"> Pontos</span><br>
							<span class="pull-left"><?php foreach($usuariosFacil as $usuario){echo $usuario."<br>";}?></span> <span class="pull-right"> <?php foreach($pontuacaoesFacil as $pontuacao){echo $pontuacao."<br>";}?></span><br>
							<!----><span class="pull-left"> </span>                            								 <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                           									 <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                          									 <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                            								 <span class="pull-right"> </span><br>
                        </div>						
					</div>
				</div>
				
				
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<!--<div class="col-xs-3">-->
								<i class="glyphicon glyphicon-calendar"></i>
								<span class="pull-right"> Médio</span><br>
						</div>	
						<div class="panel-footer">
                            <span class="pull-left">usuarios </span>                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left"> <?php foreach($usuariosMedio as $usuario){echo $usuario."<br>";}?></span>                            <span class="pull-right"><?php foreach($pontuacaoesMedio as $pontuacao){echo $pontuacao."<br>";}?></span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
                        </div>						
					</div>
				</div>
				
				
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<!--<div class="col-xs-3">-->
								<i class="glyphicon glyphicon-th-list"></i>
								<span class="pull-right"> Difcíil</span><br>
						</div>	
						<div class="panel-footer">
                            <span class="pull-left">usuarios </span>                            <span class="pull-right"> Pontos</span><br>
							<span class="pull-left"> <?php foreach($usuariosDificil as $usuario){echo $usuario."<br>";}?></span>                            <span class="pull-right"> <?php foreach($pontuacaoesDificil as $pontuacao){echo $pontuacao."<br>";}?></span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
							<span class="pull-left"> </span>                            <span class="pull-right"> </span><br>
                        </div>						
					</div>
				</div>
			</div>
				
					
		</div>
	</div>
	
	
	
	<!--CHAMADA DOS SCRIPTS-->
    <script src="../assets/bootstrap/js/jquery-3.2.1.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/js/main.js"></script>
    <script src="../assets/assets/js/jquery.backstretch.min.js"></script>
        <script src="../assets/js/retina-1.1.0.min.js"></script>
                <script src="../assets/js/scripts.js"></script>
                <script src="../js/metisMenu.min.js"></script>
                <script src="../js/elements.js"></script>
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