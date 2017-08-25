//Login
function faz_login(){
	var email = $("#txtEmail").val();
	var senha = $("#txtSenha").val();
	$.ajax({
	  type: 'post',
	  url: '../controllers/control_login.php',
	  data: {
		action:"login", email:email, senha:senha
	  },
	  success: function (response) {
		alert(response);
		if (response.indexOf("errAlreadyLogged") >= 0){ 
			msg('danger', '<b> Erro </b> ao efetuar o Login, ainda existe uma sessÃ£o aberta.');
		}
		else if (response.indexOf("errInvalidCredentials") >= 0){ 
			msg('danger', '<b> Erro </b> UsuÃ¡rio ou senha incorretos.');
		}
		else{
			msg('success', '<b> Sucesso </b> ao efetuar o Login.');
			setTimeout('window.location="MODEL/teste.php"', 5000);
		}
	  },
	  error: function(XMLHttpRequest, textStatus, errorThrown) { 
		var erro = ("Um erro ocorreu. Tente novamente mais tarde." + errorThrown); 
		msg('warning', erro);
	  }
	 });
	return false;
}


//Cadastro
function Cadastro(){
	var nome = $("#nome").val()+" "+$("#sobrenome").val();
	var datanasc = $("#dtnas").val();
	var cpf = $("#cpf").val();
    var email = $("#email").val();
	var senha = $("#senha").val();
	var conf_senha = $("#conf_senha").val();

	if(typeof cpf !== 'undefined'){
		$.ajax({
		type: 'post',
		url: '../controllers/control_usuario_prof.php',
		data: {
			nome:nome, senha:senha, email:email,conf_senha:conf_senha,cpf:cpf , datanasc:datanasc
		},
		success: function (response) {
			alert(response);
			/*
            if (response.indexOf("Email já cadastrado!") >= 0){
				msg('danger', '<b> Erro </b>'+response);
			}
			else if (response.indexOf("CPF Inválido") >= 0){ 
				msg('danger', '<b> Erro </b>'+response);
			}
			else if (response.indexOf("CPF já cadastrado!") >= 0){ 
				msg('danger', '<b> Erro </b>'+response);
			}
			else if (response.indexOf("Senha muito curta!") >= 0){ 
				msg('danger', '<b> Erro </b>'+response);
			}
			else if (response.indexOf("Insira um nome válido!") >= 0){ 
				msg('danger', '<b> Erro </b>'+response);
			}
			else if (response.indexOf("Insira um email válido!") >= 0){ 
				msg('danger', '<b> Erro </b>'+response);
			}
			else{
				msg('success', '<b> Sucesso </b> Cadastro realizado com sucesso!');
			}*/
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
            var erro = ("Um erro ocorreu. Tente novamente mais tarde." + errorThrown); 
		    msg('warning', erro);
		}
		});
		return false;
	}
    else{
        $.ajax({
		type: 'post',
		url: '../controllers/control_usuario.php',
		data: {
			nome:nome, senha:senha, email:email, conf_senha:conf_senha, datanasc:datanasc,
		},
		success: function (response) {
			alert(response);
			/*if (response.indexOf("Email já cadastrado!") >= 0){
				msg('danger', '<b> Erro </b>'+response);
			}
			else if (response.indexOf("Senha muito curta!") >= 0){ 
				msg('danger', '<b> Erro </b>'+response);
			}
			else if (response.indexOf("Insira um nome válido!") >= 0){ 
				msg('danger', '<b> Erro </b>'+response);
			}
			else if (response.indexOf("Insira um email válido!") >= 0){ 
				msg('danger', '<b> Erro </b>'+response);
			}
			else{
				msg('success', '<b> Sucesso </b> Cadastro realizado com sucesso!');
			}*/
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			var erro = ("Um erro ocorreu. Tente novamente mais tarde." + errorThrown); 
		    msg('warning', erro);
		}
		});
		return false;
    }
}