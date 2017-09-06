function pagina(user){
		if(user == 2){
			//location.reload();
			$("#form").load("../paginas/usuario_prof.php");
		}
		else if(user == 3){
			//location.reload();
			$("#form").load("../paginas/usuario.php");
		}
}

//Validar Login
function ValidarLogin(strLogin,strSenha)
{
//linha de debug
//alert("Login " + strLogin + "\n" + "Senha: " + strSenha);
     if (strLogin == "")
      { 
         response = "Preencha o campo Login.";
		 Alert.error("Atenção: "+response);
		 document.frmLogin.login.focus();
		 return false;
      }
     else if (strSenha == "")
      { 
         response = "Preencha o campo Senha.";
		 Alert.error("Atenção: "+response);
		 document.frmLogin.senha.focus();
		 return false;
      }
     else 
      { 
        return true;
      }
}

//Função loading
$(document).ready(function(){
		// ESCONDE O CONTEUDO
		$('div#mae').hide(); 
		// DAR O EFEITO ... E MUDA DE COR
		function loadProgress(){ 
			var atribuicao = "div#loading span";
			var loadRet = setInterval(function(){$(atribuicao).append('');}, 500);
			var cor     = setInterval(function(){$("div#loading").css('color','#777');}, 500);
			setInterval(function(){
			clearInterval(loadRet);
			clearInterval(cor);
			$(atribuicao).html('')
			$("div#loading").css('color','#000');
			}, 2000);
		}
		loadProgress();
		setInterval(loadProgress, 0);
		
		
		// MOSTRA O CONTEUDO QUANDO O SITE FOR CARREGADO POR COMPLETO
		$(window).load(function(){
			$('div#loading').fadeOut();
			$('div#mae').fadeIn();
		});

});

//Voltar ao topo
$(document).ready(function(){

    // hide #back-top first
    $('#backtopo').hide();
       
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 150) {
                $('#backtopo').fadeIn();
            } else {
                $('#backtopo').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#backtopo').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

		$('.click-scroll').click(function () {
			$('html, body').animate({
				scrollTop: $("#title").offset().top
				}, 800); // Tempo em ms que a animação irá durar
		})
    });

});

//Mascara para o campo data
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
}

//Apenas letras
function letras(){
	tecla = event.keyCode;
	if (tecla >= 48 && tecla <= 57){
	    return false;
	}else{
	   return true;
	}
}

//Apenas números
function numeros(){
	tecla = event.keyCode;
	if (tecla >= 48 && tecla <= 57){
	    return true;
	}else{
	   return false;
	}
}

//verifica senha
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
		barra_forca.style.width ="20%";
		barra_forca.style.backgroundColor = "#000";
		barra_forca.innerHTML = "<p> Fraca </p>";
	}else if((forca > 0) && (forca < 30)){
		barra_forca.style.width ="35%";
		barra_forca.style.backgroundColor = "#B20000";
		barra_forca.innerHTML = "<p> Fraca </p>";
	}else if((forca >= 30) && (forca < 60)){
		barra_forca.style.width ="50%";
		barra_forca.style.backgroundColor = "#FF9900";
		barra_forca.innerHTML = "<p> Boa </p>";
	}else if((forca >= 60) && (forca < 85)){
		barra_forca.style.width ="75%";
		barra_forca.style.backgroundColor = "#99CC00";
		barra_forca.innerHTML = "<p> Muito boa </p>";
	}else{
		barra_forca.style.width ="100%";
		barra_forca.style.backgroundColor = "#009900";
		barra_forca.innerHTML = "<p> Excelente </p>";
	}
	var w = forca*0.99; //daquele jeito
	if (w==0) w=3;
	barra_forca.style.width = w+"%";
}

//Corfirmação de nome
function confirma_nome(str, campo){
	if(str.length < 3){
		//document.getElementById(campo).removeClass('input-ok');
		$('#'+campo+'').addClass('input-error');
	}
	else{
		//document.getElementById(campo).removeClass('input-error');
		$('#'+campo+'').addClass('input-ok');
	}
}

//Confirmação de senha
function confirma_senha(){
	senha = document.getElementById("senha").value;
	conf_senha = document.getElementById("conf_senha").value;

	if(senha != conf_senha){
		alerta('warning', '<b> Atenção </b> as senhas não conferem!');
		$('#senha').removeClass('input-ok');
		$('#conf_senha').removeClass('input-ok');
		$('#senha').addClass('input-error');
		$('#conf_senha').addClass('input-error');
	}
	else{
		document.getElementById("alerta").innerHTML = "";
		$('#senha').removeClass('input-error');
		$('#conf_sennha').removeClass('input-error');
		$('#senha').addClass('input-ok');
		$('#conf_senha').addClass('input-ok');
	}
		
}

//Confirmação CPF
function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
    
	for (i=1; i<=9; i++) {
		Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
	}
	
		Resto = (Soma * 10) % 11;
	
    if ((Resto == 10) || (Resto == 11))  
		Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) {
		alerta('warning', '<b> Atenção </b> CPF inválido!');
		$('#cpf').addClass('input-error');
	}
	
	Soma = 0;

    for (i = 1; i <= 10; i++) {
		Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
	}


	Resto = (Soma * 10) % 11;
	
    if ((Resto == 10) || (Resto == 11))  
		Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ){
		alerta('warning', '<b> Atenção </b> CPF inválido!');
		$('#cpf').addClass('input-error');
	}
	else{
		document.getElementById("alerta").innerHTML = "";
		$('#cpf').removeClass('input-error');
		$('#cpf').addClass('input-ok');
	}
}

 