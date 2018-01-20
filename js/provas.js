var pontuacao = 0;
var qnt_perguntas = 0;
var contador_respostas = [];
var a = 0;

var contador=0;
function adicionarBarra(){
	var valor = $('.progress-bar').attr('aria-valuenow');
	contador += 100 / valor;
	$('.progress-bar').css('width', contador + '%');
}

function carregarPergunta(id){
	$("#inicial").fadeOut(500).remove();
	if($("#pergunta_"+id)){
		$("#pergunta_"+id).fadeIn(1000);
		qnt_perguntas = $('.progress-bar').attr('aria-valuenow');
	}
}

function checkRespostas(btn,resposta_id, pergunta_id){
	var respostas = document.getElementsByName("btn_resp_"+pergunta_id);
	var tipo = $("#tipo").val();
	$.ajax({
		type: "POST",
		dataType: 'html',
		url: '../controllers/control_perguntas.php?action=checkRespostasComunidade',
		async: false,
		data: {'pergunta_id' : pergunta_id, 'resposta_id' : resposta_id},
		beforeSend: function(){
			$(btn).removeClass('btn-primary');
			for(var i=0;i<respostas.length;i++){
				$(respostas[i]).prop('disabled', true);
			}
			$("#btn_next_" + pergunta_id).css("display", "block");
			adicionarBarra();
		},
		success: function(resultado){
			var res = JSON.parse(resultado);
			
			if(res.resposta_correta == 'S'){
				$(btn).toggleClass('btn-success');
				pontuacao += 1;
				contador_respostas[a] = "Correta";
			}else if(res.resposta_correta == 'N'){
				$(btn).toggleClass('btn-danger');
				$("#btn_resp_"+res.resposta_certa).toggleClass('btn-success');
				contador_respostas[a] = "Incorreta";
			}
		},
		error: function(error){
			console.log(error);
		},
		complete: function(data){
			a++;
		}
	});
}

function proximaPergunta(pergunta_atual_id, pergunta_prox_id){
	$("#pergunta_" + pergunta_atual_id).hide();
	$("#pergunta_" + pergunta_prox_id).fadeIn(800);
}

var media = 0;
function finalizar(){
	var valor = $('.progress-bar').attr('aria-valuenow');
	var pontos_por_pergunta = (1 / valor) * 10;
	media = pontuacao  * pontos_por_pergunta;

	if(media >= 5){
		msg("parabens", true);
	}else{
		msg("reprovou", false);
	}
}

function msg($value, $bool){
	if($value == "erro"){
		swal({
			title: 'Erro!',
			text: "Parece que este conteúdo está desativado!",
			type: 'error',
			showCancelButton: false,
			showConfirmButton: false,
			allowOutsideClick: 'false',
			timer: 3000,
			onOpen: function () {
				swal.showLoading();
				}
		}).then(
			function () {},
			function (dismiss) {
			if (dismiss === 'timer') {
			  window.location.href = "sala.php";
			}
		});
	}
	if($value == "reprovou"){
		swal( {
			title: '#NãoDesista!',
			text: "Você reprovou!.",
			type: 'error',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'OK',
			allowOutsideClick: 'false'
		}).then(function () {
			//window.location.href = "todosconteudos.php";
			CreateRequest($bool);
		});
	}

	if($value == "parabens"){
		swal( {
			title: 'Parabéns!',
			text: "Você passou!",
			type: 'success',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'OK',
			allowOutsideClick: 'false'
		}).then(function () {
			//window.location.href = "todosconteudos.php";
			CreateRequest($bool);
		});
	}
}

function CreateRequest($bool){
	debugger
	var provas_id = $("#provas_id").val();

	var form = document.createElement("form");
    var element1 = document.createElement("input"); 
    var element2 = document.createElement("input");
    var element3 = document.createElement("input");

    form.method = "POST";
    form.action = "final-prova.php";
    form.novalidate = "novalidate";  

    element1.value = media;
    element1.name = "media";
    form.appendChild(element1);

    element2.value = $bool;
    element2.name = "passou";
    form.appendChild(element2);

    element3.value=provas_id;
    element3.name="provas_id";
    form.appendChild(element3);

    for(var i=0;i<contador_respostas.length;i++){
    	var respostas = document.createElement("input");
    	respostas.value=contador_respostas[i];
	    respostas.name="respostas[]";
	    form.appendChild(respostas);
    }

    document.body.appendChild(form);

    form.submit();
}