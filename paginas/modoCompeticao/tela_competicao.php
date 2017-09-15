<?php
	
	$tempo_atual = @mktime(date("Y/m/d H:i:s"));
	$tempo_permitido = 30; // tempo em segundos até redirecionar
	$fim = "";
	
	if(@$_SESSION['Cookie_countdown']=="") {
		$tempo_entrada = @mktime(date("Y/m/d H:i:s"));
		$tempo_cookie = '3600'; // em segundos
		$_SESSION['Cookie_countdown'] = $tempo_entrada;
	} 
	else {
		$tempo_gravado = $_SESSION['Cookie_countdown'];
		$tempo_gerado = $tempo_atual - $tempo_gravado;
		$fim.= $tempo_permitido - $tempo_gerado;
		if($fim <= 0) {
			$_SESSION['Cookie_countdown'] = "";
		}
		else {
		}
	}
?>

	<script src="../sweet_alert/sweetalert2.min.js"></script>
	<link href="../sweet_alert/sweetalert2.css"  rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet" media="screen">
	<link href="../css/font-awesome.min.css" rel="stylesheet" media="screen">
	<link href="../imagens/logo.ico" rel="shortcut icon">
	<link href="modoCompeticao/competicao.css" rel="stylesheet" media="screen">

	<title>Competição | Quimicamente </title>
	<script language="JavaScript">
		var contador = '<?php if($fim=="") { echo $tempo_permitido+1; } else { echo "$fim"; } ?>';
		
		function Conta() {
			if(contador <= 0) {
				sweetAlert("Tempo esgotado!");
				return false;
			}
			contador = contador - 1;
			
			var min = parseInt(contador/60);
			var seg = contador % 60;
			
			if(min < 10){
					min = "0" + min;
					min = min.substr(0, 2);
				}
			
			if(seg <= 9){
				seg = "0" + seg;
			}
			
			tempo = "TEMPO	"+ min + ':' + seg;
			
			setTimeout("Conta()", 1000);
			
			document.getElementById("time").innerHTML = tempo;
		}
		
		window.onload = function() {
			Conta();
		}
</script>

    <section id="inicio">
	    <div class="row">
			<div class="container-fluid">
				<div class="col-xs-12 col-lg-8">
					<div class="panel panel-quimicamente">
						<div class="panel-body">
							<div class="pergunta">
								<?php echo $pergunta[9]['perguntas']; ?>
							</div>
						</div>
					</div>		
				</div>
				<div class="col-xs-12 col-lg-4">
					<div class="panel panel-quimicamente">	
						<div class="panel-body">
							<div id="time"></div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-lg-4">
					<div class="panel panel-quimicamente">	
						<div class="panel-body">
							<div class="alternativa">
								<a href="#" class="fill-div"></a>
							</div>
							<div class="alternativa">
								<a href="#" class="fill-div"></a>
							</div>
							<div class="alternativa">
								<a href="#" class="fill-div"></a>
							</div>
							<div class="alternativa">
								<a href="#" class="fill-div"></a>
							</div>
							<div class="alternativa">
								<a href="#" class="fill-div"></a>
							</div>
						</div>
					</div>	
				</div>
			</div>	
		</div>
	</section>
