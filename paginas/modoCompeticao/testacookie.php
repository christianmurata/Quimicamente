<script type="text/javascript" src="../../js/jquery.js"></script>
<script language="JavaScript">
	function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
    var resps = getCookie('resps');
	var dific = getCookie('dificul');
    var temporizador = getCookie('temporizado');
    alert(temporizador);
    alert(dific);    
	
	//resps = resps.toString();
	
	$.ajax({
		url :'mostraresultado.php',
		type :'POST',
		data:{re:resps,dificuldade:dific,tempo:temporizador},
		success: function(resposta){
			console.log('redirecionando...');
			console.log(resposta);			
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			var erro = ("Um erro. Tente novamente mais tarde." + errorThrown); 
			alert(erro);
	  }
	});	
		
		
	
</script>


	