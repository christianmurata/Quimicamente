//sweet alert 2
//tipos de alerts:
//SUCCESS, WARNING, DANGER, INFO, QUESTION
//como usar:
//msg('tipo do alerta', 'texto do alerta');

function msg(alerta, msg){
	if (alerta === 'success') {
		swal({
				title: 'Sucesso!',
				text: msg,
				type: 'success',
				confirmButtonText: 'OK'
		});
     } 
	 else if(alerta === 'danger'){
		swal({
			title: 'Erro!',
			text: msg,
			type: 'error',
			confirmButtonText: 'OK'
		});
	 }
	 else if(alerta === 'warning'){
		 swal({
			title: 'Atenção!',
			text: msg,
			type: 'warning',
			confirmButtonText: 'OK'
		});
	 }
	 else if(alerta === 'question'){
		 swal({
			title: 'Espere!',
			text: msg,
			type: 'question',
			confirmButtonText: 'OK'
		});
	 }
	 else if(alerta ==='info'){
		 swal({
			title: 'Informação!',
			text: msg,
			type: 'info',
			confirmButtonText: 'OK'
		});
	 }
     else{
        swal({
			title: 'Mensagem!',
			text: msg,
			confirmButtonText: 'OK'
		}); 
     }
} 

//alerts personalizados bootstrap
//tipos de alerts:
//SUCCESS, WARNING, DANGER, INFO, QUIMICAMENTE
//como usar:
//msg('tipo do alerta', 'texto do alerta');
function msg(alerta, texto) {
     var resposta = '';
     $("#alerta").empty();

     if (alerta === 'success') {
       resposta = "<div class='alert alert-success' role='alert'>" +
         "<button type='button' class='close' data-dismiss='alert' class='close'>&times;</button>" +
         texto + "</div>";
     } 
	 else if (alerta === 'warning') {
       resposta = "<div class='alert alert-warning' role='alert'>" +
         "<button type='button' class='close' data-dismiss='alert' class='close'>&times;</button>" +
         texto + "</div>";
     } 
	 else if (alerta === 'danger') {
       resposta = "<div class='alert alert-danger' role='alert'>" +
         "<button type='button' class='close' data-dismiss='alert' class='close'>&times;</button>" +
         texto + "</div>";
     }
	 else if(alerta === 'info'){
		resposta = "<div class='alert alert-info' role='alert'>" +
         "<button type='button' class='close' data-dismiss='alert' class='close'>&times;</button>" +
         texto + "</div>";
	 }
	 else if(alerta === 'quimicamente'){
		resposta = "<div class='alert alert-quimicamente' role='alert'>" +
         "<button type='button' class='close' data-dismiss='alert' class='close'>&times;</button>" +
         texto + "</div>";
	 }

     $("#alerta").append(resposta);

     $(".alert").click(function() {
       $(".alert").hide();
     });
}