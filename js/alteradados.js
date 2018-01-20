$(document).ready(function(){
	
	$("#form_foto").submit(function (event) {
		event.preventDefault();
		var formData = new FormData(this);
		formData.append("opcao","3");
		
		$.ajax({
			url: "../controllers/alteradados_control.php",
	        type: 'POST',
	        data: formData,
			beforeSend: function() {
				// setting a timeout
				msg('carregando');
			},
			success: function (data) {
				 if(data == "1"){
					msg('danger', 'Arquivo não selecionado'); 
				 }else if(data == "2"){
					 msg('danger','Extensão de arquivo nao suportada!');
				 }else if(data == "3"){
					 msg('danger','Arquivo com tamanho maior que 2 mb, ou muito pequeno!');
				 }else{
					document.getElementById("imgb").src = data;
					setTimeout('location.reload()',2000);
				 }
			},
			cache: false,
	        contentType: false,
	        processData: false,
		});
	});
	
	var email = $("#email").val();
	console.log(email);
	
});

function carregaimg(){
	$("#form_foto").submit();
}

function verifica_senha1() {
		senha = document.getElementById('nova_senha').value;
		barra_forca = document.getElementById("barra_forca");
		forca = 0;
		if(senha.length < 6){
			forca += 0;
		}else if((senha.length >= 6) && (senha.length < 8)){
			forca += 10;
		}else {
			forca += 25;
		}
		if(senha.length >= 6){ //sÃ³ vai avaliar a senha se jÃ¡ tiver 6+ caracteres
			if(senha.match(/[a-z]+/)){ //letras minÃºsculas (uma ou mais)
				forca += 15;
			}
			if(senha.match(/[A-Z]+/)){ //letras maiÃºsculas (uma ou mais)
				forca += 20;
			}
			if(senha.match(/[0-9]+/)){ //dÃ­gitos (um ou mais)
				forca += 20;
			}
			if(senha.match(/.[!@#$%^&*?_~]+/)){ //caracteres especiais (um ou mais)
				forca += 25;
			}
		}
		//mostra_forca.innerHTML = "forÃ§a: " + forca;
		if(forca == 0){
			barra_forca.style.backgroundColor = "#000";
		}else if((forca > 0) && (forca < 30)){
			barra_forca.style.backgroundColor = "#B20000";
		}else if((forca >= 30) && (forca < 60)){
			barra_forca.style.backgroundColor = "#FF9900";
		}else if((forca >= 60) && (forca < 85)){
			barra_forca.style.backgroundColor = "#99CC00";
		}else{
			barra_forca.style.backgroundColor = "#009900";
		}
		var w = forca*0.99; //daquele jeito
		if (w==0) w=3;
		barra_forca.style.width = w+"%";
};
	
function letras(){
	tecla = event.keyCode;
	if (tecla >= 48 && tecla <= 57){
	    return false;
	}else{
	   return true;
	}
};

function numeros(){
	tecla = event.keyCode;
	if (tecla >= 48 && tecla <= 57){
	    return true;
	}else{
	   return false;
	}
}

function mascaraData( campo, e )
{
	var kC = (document.all) ? event.keyCode : e.keyCode;
	var data = campo.value;
	
	if( kC!=8 && kC!=46 )
	{
		if( data.length==2 )
		{
			campo.value = data += '/';
		}
		else if( data.length==5 )
		{
			campo.value = data += '/';
		}
		else
			campo.value = data;
	}
};

function validarSenha(){
   NovaSenha = document.getElementById('nova_senha').value;
   CNovaSenha = document.getElementById('confirm_nova_senha').value;
   if (NovaSenha != CNovaSenha) {
      alerta('danger','Novas senhas não conferem!'); 
	  $('#btn-senha').attr('disabled', 'disabled');
   }else{
      $('#btn-senha').removeAttr('disabled');
   }
};

function teste(e)
	{
		var expressao;

		expressao = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;

		if(expressao.test(String.fromCharCode(e.keyCode)))
		{
			return true;
		}
		else
		{
			return false;
		}
	};


function alteraSenha(value){
		var senha_atual_form=$('#senha_atual_form').val();
		var nova_senha=$('#nova_senha').val();
		var confirm_nova_senha=$('#confirm_nova_senha').val();
		
	
		var opcao=value;
		if(senha_atual_form == nova_senha){
			alerta('danger', 'Digite uma nova senha diferente da antiga!');
			$('#nova_senha').focus();
			return;
		}else if(senha_atual_form==""){
			alerta('danger','Digite sua senha atual!');
			$('#senha_atual_form').focus();
			return;
		}else if(nova_senha==""){
			alerta('danger','Digite uma nova senha valida!');
			$('#nova_senha').focus();
			return;
		}else if(confirm_nova_senha==""){
			alerta('danger','Confirme sua senha!');
			$('#confirm_nova_senha').focus();
			return;
		}else if(senha_atual_form.length<6){
			alerta('danger','Digite sua senha(6 caracters)!');
			$('#senha_atual_form').focus();
		}else if(nova_senha.length<6){
			alerta('danger','Digite uma nova senha valida (6 caracters)!');
			$('#nova_senha').focus();
			return;
		}else if(confirm_nova_senha.length<6){
			alerta('danger','Confirme sua senha (6 caracters)!');
			$('#confirm_nova_senha').focus();
			return;
		}else if(nova_senha!=confirm_nova_senha){
			alerta('danger','As senhas nÃ£o conferem!');
			$('#confirm_nova_senha').focus();
			return;
		}else{
			$.ajax({	
				type:'post',
				url:'../controllers/alteradados_control.php',
				data:{senha_atual_form:senha_atual_form,nova_senha:nova_senha,confirm_nova_senha:confirm_nova_senha,opcao:opcao},
				success:function(response){
					if(response){
						alerta('danger',response);
					}
					else{
						msg('carregando');
						setTimeout('location.reload()',2000);
					}
				},
				Error:function(XMLHttpRequest, textStatus, errorThrown){
					alerta('danger',errorThrown);
				}
			});
		}
}

function alteraDados(value){
	debugger;
	var nome=$('#nome').val();
	var data=$('#data').val();
	var opcao=value;
	var auxdata=data.split("-");
	
	
	if(nome==""){
		msg('danger','Digite um nome valido!');
		$('#nome').focus();
	}else if(nome.length<3){
		msg('danger','Digite um nome valido!');
		$('#nome').focus();
	}else if(data==""){
		msg('danger','Digite uma data valida!');
		$('#data').focus();
	}else if(auxdata[0]<=1910){
		msg('danger','Digite um ano valido!');
		$('#data').focus();
	}else if(auxdata[0]>=2015){
		msg('danger','Digite um ano valido!');
		$('#data').focus();
	}else{
		$.ajax({	
				type:'post',
				url:'../controllers/alteradados_control.php',
				data:{nome:nome,data:data,opcao:opcao},
				beforeSend: function() {
				// setting a timeout
				msg('carregando');
			},
				success:function(response){
					if(response){
						msg('danger',response);
						
					}
					else{
						setTimeout('location.reload()',1500);
					}
				},
				Error:function(XMLHttpRequest, textStatus, errorThrown){
					msg('warning',errorThrown);
				}
			});
	}
}
