<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include_once("../controllers/control_rank.php");?>
	<link href="../assets/bootstrap/css/bootstrap.min.css">
	<?php include 'templates/header.php'; ?>
	<link href="../assets/bootstrap/css/estilo.css">
	<style>
        .btn-qmt{
            background: #4FFFBC;
            color: white;
        }
        
        .panel-quimicamente{
            border-color: #4FFFBC;
        }
        
        .panel-quimicamente > .panel-heading {
            border-color: #4FFFBC;
            color: white;
            background-color: #4FFFBC;
        }
        body {
  
  			font-size: 17px;
  
		}


    </style>

</head>
<body style="overflow-x: hidden;">
	<?php 
		include 'templates/navbar.php';
	?>
		
		<div class="container-fluid">	
			<div class="row" style="padding-top: 50px">			
				<div class="col-md-12">	
					<div class="panel panel-quimicamente">
						<div class="panel-heading"><center>Rank</center></div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-4">
										<div class="panel panel-quimicamente"> 
											<div class="panel-heading">
												<i class="glyphicon glyphicon-signal"></i>
															<span class="pull-right"> Fácil</span><br>
													</div>	
													<div class="panel-body" style="height: 510px">
														<span class="pull-left"><?php
															if(isset($usuariosFacil)){foreach($usuariosFacil as $usuario){echo substr($usuario,0,17)."<br>";}}
															else{echo"Sem desempenhos";}
														?></span> 
														<span class="pull-right"><?php												 
														if(isset($pontuacaoesFacil)){foreach($pontuacaoesFacil as $pontuacao){echo number_format(floatval($pontuacao),2, ',','')."<br>";}}?></span><br>
													    <script>
                                                            var ptcFc = <?php echo json_encode($pontuacaoesFacil);?>
                                                        </script>
                                                    </div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="panel panel-quimicamente"> 
													<div class="panel-heading">
														<!---->
														<i class="glyphicon glyphicon-calendar"></i>
														<span class="pull-right"> Médio</span><br>
													</div>	
													<div class="panel-body" style="height: 510px">
														<span class="pull-left"><?php
															if(isset($usuariosMedio)){foreach($usuariosMedio as $usuario){ echo substr($usuario,0,17)."<br>";}}
															else{echo"Sem desempenhos";}
														?></span> 
														<span class="pull-right"><?php												 
														if(isset($pontuacaoesMedio)){foreach($pontuacaoesMedio as $pontuacao){echo number_format(floatval($pontuacao),2, ',','')."<br>";}}?></span><br>
													</div>						
												</div>
											</div>
											<div class="col-md-4">
												<div class="panel panel-quimicamente"> 
													<div class="panel-heading">
														<!---->
														<i class="glyphicon glyphicon-th-list"></i>
														<span class="pull-right"> Difícil</span><br>
													</div>	
													<div class="panel-body" style="height: 510px">
														<span class="pull-left"><?php
															if(isset($usuariosDificil)){foreach($usuariosDificil as $usuario){ echo substr($usuario,0,17)."<br>";}}
															else{echo"Sem desempenhos";}
														?></span> 
														<span class="pull-right"><?php												 
														if(isset($pontuacaoesDificil)){foreach($pontuacaoesDificil as $pontuacao){echo number_format(floatval($pontuacao),2, ',','')."<br>";}}?></span><br>
													</div>						
												</div>
											</div>
								</div> <!-- /row -->
							</div><!--panel body-->							
						</div> <!-- /panel-primary -->
					</div> <!-- /col-md-10 -->
				</div> <!-- /row -->
			</div> <!-- /container-fluid -->
				

	<?php include 'templates/footer.php'; ?>


</body>
</html>