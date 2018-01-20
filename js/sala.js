$(function() {

    $('#cont-lib-link').click(function(e) {
		$("#div-conteudo").delay(100).fadeIn(100);
 		$("#div-conteudo-comunidade").fadeOut(100);
		$('#cont-lib-comu-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#cont-lib-comu-link').click(function(e) {
		$("#div-conteudo-comunidade").delay(100).fadeIn(100);
 		$("#div-conteudo").fadeOut(100);
		$('#cont-lib-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});




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
	 else if(alerta ==='turma'){
		 swal({
			title: 'Calma lá fera!',
			text: msg,
			type: 'info',
			confirmButtonText: 'OK'
		});
	 }else if(alerta ==='sairturma'){
		 swal({
			title: 'Calma lá fera!',
			text: msg,
			type: 'info',
			confirmButtonText: 'Fazer oq né?',
			showCancelButton: true,
		}).then(function () {
  			var id = $("#alunos_id").val();
  			$.post("../controllers/salaControl.php?action=sair", {id_aluno: id},
  				function(retorno){
  					debugger
  					var int = $.parseJSON(retorno);
  					if(int){
  						swal({
			    			type: 'success',
			    			title: 'Você saiu da sala!',
			    			showConfirmButton: false,
			    			timer: 2000
						});
						setTimeout("redireciona()", 2000);
  					}else{
  						swal({
		    				type: 'error',
		    				title: ':(',
						})
  					}
  				}
  			);
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

function redireciona(){
	window.location.replace("../paginas/index.php");
}

function prova(id){
	if(id != ""){
		$.post("../controllers/salaControl.php?action=prova", {provas_id: id},
			function(retorno){
				debugger
				var int = $.parseJSON(retorno);
				if(int){
					swal({
	    			type: 'success',
	    			title: 'Você saiu da sala!',
	    			showConfirmButton: false,
	    			timer: 2000
				});
				setTimeout("redireciona()", 2000);
				}else{
					swal({
    				type: 'error',
    				title: ':(',
				})
				}
			}
		);
	}
}