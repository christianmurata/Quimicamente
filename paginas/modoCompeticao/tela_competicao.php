<?php
	$tempo_atual = @mktime(date("Y/m/d H:i:s"));
	$tempo_permitido = 600; // tempo em segundos até redirecionar
	$fim = "";	
	//$per = $recebePergunta;
	//
	include_once ("../models/model_competicao.php");
	
	//echo $recebePergunta;
	
	//print_r($recebePergunta);

	$tes1 = $recebePergunta[0];
	//print_r($tes1);
	$tes2= $recebePergunta[1];
	//print_r($tes2);
?>

<!--adicionando o bootstrap-->
<!--css -->
<link href="../css/elements.css" rel="stylesheet" />
<link href="../css/style.css" rel="stylesheet" media="screen">
<link href="../sweet_alert/sweetalert2.css"  rel="stylesheet">
<link href="modoCompeticao/competicao.css" rel="stylesheet" media="screen">

<!--CHAMADA DOS SCRIPTS-->

<title>Competição | Quimicamente </title>
<script language="JavaScript">
	var contador = '<?php if($fim=="") { echo $tempo_permitido+1; } else { echo "$fim"; } ?>';
	
	var per = JSON.parse('<?php echo json_encode($tes1);?>');
	var res = JSON.parse('<?php echo json_encode($tes2);?>');

	var numpergunta = 0;
	var bloq = false;
		
	var ids_pergs = [];
	var ids_resps = [];		
	
	
	function carregapergunta(alt){
		if(alt > 0 && bloq == false){		//CLICOU NA ALTERNATIVA
			ids_pergs.push(per[numpergunta-1]["idperguntas"]);		//SALVA ID DA PERGUNTA RESPONDIDA
			ids_resps.push(document.getElementById("alt"+alt).value);		//SALVA ID DA RESPOSTA SELECIONADA			
			if(numpergunta == per.length){
				//sweetAlert("Modo competicao finalizao espere para calcularmos a sua pontuaçao");
				bloq = true;
				setCookie('temporizado',contador);
				setCookie('resps', ids_resps);
				setCookie('pergs', ids_pergs);     //seta o cookie para poder usalo dps
				window.location.href = "modoCompeticao/desempenho_final.php";				
				return;
			}
		}
			
		if(bloq == true){
			return;
		}
			
		document.getElementById("alt1").innerHTML=res[numpergunta][0]["respostas_desc"];
		document.getElementById("alt2").innerHTML=res[numpergunta][1]["respostas_desc"];
		document.getElementById("alt3").innerHTML=res[numpergunta][2]["respostas_desc"];
		document.getElementById("alt4").innerHTML=res[numpergunta][3]["respostas_desc"];
		document.getElementById("alt5").innerHTML=res[numpergunta][4]["respostas_desc"];			
		document.getElementById("alt1").value=res[numpergunta][0]["respostas_id"];
		document.getElementById("alt2").value=res[numpergunta][1]["respostas_id"];
		document.getElementById("alt3").value=res[numpergunta][2]["respostas_id"];
		document.getElementById("alt4").value=res[numpergunta][3]["respostas_id"];
		document.getElementById("alt5").value=res[numpergunta][4]["respostas_id"];
			
		document.getElementById("enun").innerHTML=per[numpergunta]["perguntas_descricao"];

	
		numpergunta++;
	}
		
		
	function setCookie(cname, cvalue) {  //funcao para setar o coookie 
   		var d = new Date();
   		d.setTime(d.getTime() + (7*24*60*60*1000));
   		var expires = "expires="+ d.toUTCString();
   		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}


	function Conta() {
		if(contador <= 0) {
			sweetAlert("Tempo esgotado!");
			setCookie('temporizado',contador);
			setCookie('resps', ids_resps);
			setCookie('pergs', ids_pergs);     //seta o cookie para poder usalo dps
			window.location.href = "modoCompeticao/desempenho_final.php";				
			return;
			
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
			
		tempo = "TEMPO	"+ min + ':' + seg ;
		
		setTimeout("Conta()", 1000);
			
		document.getElementById("time").innerHTML = "<p>" + tempo + "</p>" ; 
	}
		
	window.onload = function() {
		Conta();
		carregapergunta(0);
	}
</script>
	

    <section id="inicio">
	    <div class="row">
			<div class="container-fluid" style="margin-top:30px">
				<div class="col-xs-12">
					<div class="panel panel-quimicamente">
						<div class="panel-body" onselectstart="return false;">
							<div id="time"></div>
							
						</div>
						<div class="panel-body" onselectstart="return false;">
							<div class="pergunta" id="enun"></div>
						
								<a onclick="carregapergunta(1)">
									<div class="alternativa" id="alt1" class="fill-div"></div>
								</a>
								<a onclick="carregapergunta(2)">
									<div class="alternativa" id="alt2" class="fill-div"></div>
								</a>
								<a onclick="carregapergunta(3)">	
									<div class="alternativa" id="alt3" class="fill-div"></div>
								</a>
								<a onclick="carregapergunta(4)">
									<div class="alternativa" id="alt4" class="fill-div"></div>
								</a>
								<a onclick="carregapergunta(5)">
									<div class="alternativa" id="alt5" class="fill-div"></div>
								</a>
						</div>
					</div>		
				</div>
				
			</div>	
		</div>		
</section>
