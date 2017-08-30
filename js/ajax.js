//Login
function login(){
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
			if(response.indexOf("2") >=0 )
				setTimeout('window.location="../paginas/professor.php"', 5000);
			else
				setTimeout('window.location="../paginas/teste.php"', 5000);

		}
	  },
	  error: function(XMLHttpRequest, textStatus, errorThrown) { 
		var erro = ("Um erro ocorreu. Tente novamente mais tarde." + errorThrown); 
		msg('warning', erro);
	  }
	 });
	return false;
}

function logout(){
	$.ajax({
		type: 'post',
		url: '../controllers/control_login.php',
		data: {
			action:"logout"
		},
		success: function (response) {
			window.location="../paginas/login.php";
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
			msg('danger', '<b> Erro </b>'+response);
			/*
            if (response.indexOf("Email já cadastrado!") >= 0){
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
			nome:nome, senha:senha, email:email, conf_senha:conf_senha, datanasc:datanasc
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
//Turmas
function turmas(turma){
	$.ajax({
			type: 'post',
			url: '../paginas/sala.php',
			data: {
				turma:turma
			},
			success: function (response) {
				window.location="../paginas/sala.php";
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				var erro = ("Um erro ocorreu. Tente novamente mais tarde." + errorThrown); 
				msg('warning', erro);
			}
		});
}
//Adicionar Turmas
function inserir_turmas(){
	var nome = $("#turmas_nome").val();
	$.ajax({
		type: 'post',
		url: '../controllers/control_professor.php',
		data:{
			action:"inserir", turmas_nome:nome
		},
		success: function(response){
			if(response){
				msg('danger', "Erro: " +response);
				alert(response);
			}
			else{
				msg('success', 'A turma foi cadastrada com sucesso!');
				setTimeout('window.location="../paginas/professor.php"', 3000);
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			var erro = ("Um erro ocorreu. Tente novamentemas tarde." +errorThrown);
			msg('warning', erro);
		}
	});
}
//Excluir turmas
function excluir_turmas(id_turma){
	$.ajax({
		type: 'post',
		url: '../controllers/control_professor.php',
		data:{
			action: "excluir", turmas_id:id_turma
		},
		success: function(response){
			if(response){
				msg('danger', "Erro: " +response);
				//alert(response);
			}
			else{
				msg('success', 'Turma excluida com sucesso!');
				setTimeout('window.location="../paginas/professor.php"', 3000);
			}
		},
		error: function (XMLHttpRequest, textStatus, errorThrown){
			var erro = ("Um erro ocorreu. Tente novamentemas tarde." +errorThrown);
			msg('warning', erro);
		}
	});
}