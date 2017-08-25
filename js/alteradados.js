$(document).ready(function(){

	debugger
	console.log("TESTE");
	
	var email = $("#email").val();
	console.log(email);
	
});

function verifica_senha() {
		senha = document.getElementById("senha").value;
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
				forca += 10;
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
			true;
		}
};

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