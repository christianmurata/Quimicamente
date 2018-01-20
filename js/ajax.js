//redirecionamento do botão "sala"
function redirecionamentos(){
	$.ajax({
        type: 'post',
        url: '../controllers/control_login.php',
		data: {action: "checkNivel"},

		success: function (resposta) {
			resp = JSON.parse(resposta);

			console.log(resp["nivel"]);

			if(resp["nivel"] != 1){
                $("#liUsuarios").remove();
			}

			if(resp["nivel"] == 2){
				$("#redirSala").attr("href","gerenciar_turma.php");
				$("#liCompeticao").remove();
			}

			else if(resp["nivel"] == 3){
                $("#redirSala").href = "sala.php";
			}
			else{
				$("#liCompeticao").remove();
				$("#liSala").remove();
			}
        }
	})
}

// Login
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
		console.log(response);
		  resp = JSON.parse(response);
		  if(resp[0] === "error"){
              if (resp[1] === "errAlreadyLogged"){
                  msg('danger', 'Erro ao efetuar o Login, ainda existe uma sessão aberta.');
                  return;
              }
              if (resp[1] === "errInvalidCredentials"){
                  msg('danger', 'Erro usuário ou senha incorretos.');
                  return;
              }
		  }

		else{
			msg('success', 'Sucesso ao efetuar o Login.');
			if(resp[1] == "2")
				setTimeout('window.location="../paginas/professor.php"', 1000);
			else if(resp[1] == "3")
				setTimeout('window.location="../paginas/aluno.php"', 1000);
			else{
                setTimeout('window.location="../paginas/adicionar_conteudos.php"', 1000);
			}

		}
	  },
	  error: function(XMLHttpRequest, textStatus, errorThrown) { 
		var erro = ("Um erro ocorreu. Tente novamente mais tarde." + errorThrown); 
		msg('warning', erro);
	  }
	 });
	return false;
}

// Função logout
function logout(){
	$.ajax({
		type: 'post',
		url: '../controllers/control_login.php',
		data: {
			action:"logout"
		},
		success: function (response) {
			msg('success', 'Não desista do lado Quarkz da força!');
			setTimeout('window.location="../paginas/index.php"', 1000);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			var erro = ("Um erro ocorreu. Tente novamente mais tarde." + errorThrown); 
		    msg('warning', erro);
		}
	});
	
	return false;
}

// Cadastro
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
			if(response)
				msg('danger', response);
			else{
				msg('success', 'Cadastro realizado com sucesso!');
				setTimeout('window.location="../paginas/login.php"', 1000);
			}
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
			if(response)
				msg('danger', response);
			else{
				msg('success', 'Cadastro realizado com sucesso!');
				setTimeout('window.location="../paginas/login.php"', 1000);
			}
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
// Turmas
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
				msg('danger', response);
				alert(response);
			}
			else{
				msg('success', 'A turma foi cadastrada com sucesso!');
				setTimeout('window.location="../paginas/professor.php"', 1000);
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			var erro = ("Um erro ocorreu. Tente novamentemas tarde." +errorThrown);
			msg('warning', erro);
		}
	});
}
// Excluir turmas
function excluir_turmas(id_turma){
	$.ajax({
		type: 'post',
		url: '../controllers/control_professor.php',
		data:{
			action: "excluir", turmas_id:id_turma
		},
		success: function(response){
			if(response){
				msg('danger', response);
				//alert(response);
			}
			else{
				msg('success', 'Turma excluida com sucesso!');
				setTimeout('window.location="../paginas/professor.php"', 1000);
			}
		},
		error: function (XMLHttpRequest, textStatus, errorThrown){
			var erro = ("Um erro ocorreu. Tente novamentemas tarde." +errorThrown);
			msg('warning', erro);
		}
	});
}

// Gerar Hash
function gerarHash(){
	msg('enviando', '');
	var email = $('#txtEmail').val();
	$.ajax({
		type: 'post',
		url: '../controllers/control_hash.php',
		data:{
			email:email
		},
		success: function(response){
			if(response == 'hashSuccess'){
				msg('success', 'O email foi enviado com sucesso');
				setTimeout('window.location="../paginas/index.php"', 1000);
			}else if(response == 'hashError'){
				msg('danger', 'Erro ao enviar ao enviar o email');
			}else if(response == 'ErrorNotEmail'){
				msg('danger', 'Esse email não está cadastrado em nosso sistema');
			}else{
				msg('danger', response);
			}
		},
		error: function (XMLHttpRequest, textStatus, errorThrown){
			var erro = ("Um erro ocorreu. Tente novamentemas tarde." +errorThrown);
			msg('warning', erro);
		}
	});

	return false;
}

// Recuperar senha || Alterar senha
function alteraSenha(hash){
	var newPass = $('#newPass').val();
	var confirm_newPass = $('#confirm_newPass').val();
	
	if(newPass == ""){
		msg('danger','Digite uma nova senha valida!');
		$('#newPass').focus();
		return false;
	}else if(confirm_newPass == ""){
		msg('danger','Confirme sua senha!');
		$('#confirm_newPass').focus();
		return false;
	}else if(newPass.length < 6){
		msg('danger','Digite uma nova senha valida (6 caracters)!');
		$('#newPass').focus();
		return false;
	}else if(confirm_newPass.length < 6){
		msg('danger','Confirme sua senha (6 caracters)!');
		$('#confirm_newPass').focus();
		return false;
	}else if(newPass != confirm_newPass){
		msg('danger','As senhas não conferem!');
		$('#confirm_newPass').focus();
		return false;
	}else{
		$.ajax({	
			type:'post',
			url:'../controllers/control_recuperacao.php',
			data:{action: "alterarSenha", newPass:newPass, hash:hash},
			success:function(response){
				if(response == "senhaAlterada"){
					msg('success', 'A senha foi redefinida');
					setTimeout('window.location="../paginas/login.php"', 1000);
				}else if(response == 'errorObject'){
					msg('danger', 'Você já alterou sua senha recentemente');
				}
				else{
					msg('danger', response);
				}
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){
				msg('danger',errorThrown);
			}
		});

		return false;
	}
}

