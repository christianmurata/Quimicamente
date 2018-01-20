<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">    
<meta name="description" content="Site do curso de química baseado em EaD">
<meta name="keywords" content="química, quimicamente, quarkz, cti, tcc, 3º ano">
<meta name="author" content="jose">
<title>Competição | Quimicamente</title>
<script language="JavaScript">	
	
	function geraCokies(dif){    	
    	
		setCookie('dificul', dif);    	
		
    }

    function setCookie(cname, cvalue) {  //funcao para setar o coookie 
   		var d = new Date();
   		d.setTime(d.getTime() + (7*24*60*60*1000));
   		var expires = "expires="+ d.toUTCString();
   		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}
	
		
</script>
<link href="../css/css_competicao.css" media="screen" rel="stylesheet">
		  
<div class="container-fluid">	
	<div class="row" style="padding-top: 50px">
		<div class="col-lg-12 col-xs-12">
			<div class="boasVindas">
				<div class="titulo">
					Competição
				</div>
				<div class="desc">
					Selecione a dificuldade:
				</div>
			</div>
		</div>
		<div class="col-lg-12" style="padding-bottom: 50px">
			<div class="col-lg-4 col-xs-12">
				<a href="modoCompeticao.php">
					<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
						<div class="flipper">
							<div class="front">
								Fácil
							</div>
							<div class="back" onclick="geraCokies(1)" onselectstart="return false;">
								 <p>Responda 10 perguntas em 10 minutos.</p> 								
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-xs-12">
				<a href="modoCompeticao.php">	
					<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
						<div class="flipper">
							<div class="front">
								Médio
							</div>
							<div class="back" onclick="geraCokies(2)" onselectstart="return false;">
								<p>Responda 20 perguntas em 10 minutos.</p>
							</div>
						</div>
					</div>
				</a>	
			</div>
			<div class="col-lg-4 col-xs-12" >
				<a href="modoCompeticao.php">
					<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
						<div class="flipper">
							<div class="front">
								Difícil
							</div>
							<div class="back" onclick="geraCokies(3)" onselectstart="return false;">
								<p>Responda 30 perguntas em 10 minutos.</p>
							</div>
						</div>
					</div>
				</a>	
			</div>
		</div> <!-- /col-md-10 -->
	</div> <!-- /row -->
</div> <!-- /container-fluid -->
<!--CHAMADA DOS SCRIPTS-->
