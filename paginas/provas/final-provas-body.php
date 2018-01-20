<link rel="stylesheet" href="../css/css_final_prova.css">
<link rel="stylesheet" href="../css/animate.css">
<link rel="stylesheet" href="../css/hover.css">
	<body>
		<div class="site-wrapper animated fadeInUp">
			<div class="site-wrapper-inner">
				<div class="cover-container">
					<div class="inner cover">
<?php
						if($passou == "true"){
?>
							<h1 class="cover-heading">Parabéns!</h1>
<?php
						}else{
?>
							<h1 class="cover-heading">Não foi dessa vez.</h1>
<?php
						}
?>
						<h1 class="cover-heading">Resultado</h1>
						<h2 class="cover-heading">Sua nota é: <?php echo $media ?></h2>
						<p class="lead">
<?php
						$i = 0;
						foreach ($respostas as $resposta) {
							echo "Resposta ".$i.": ".$resposta."<br>";
							$i++;
						}
?>
						</p>
						<p class="lead">
							<a href="sala.php" class="btn btn-lg btn-secondary">Voltar</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</body>