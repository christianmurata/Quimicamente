<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/css_final_curso.css">
	<link rel="stylesheet" href="../../css/animate.css">
	<link rel="stylesheet" href="../../css/hover.css">
	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/java.js"></script>
    <script type="text/javascript" src="../../js/jquery.js"></script>
    
    <script language="JavaScript">
    $(document).ready(function(){
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
        var tempo = 0;
        var resps = getCookie('resps');
        var dific = getCookie('dificul');
        var temporizador = getCookie('temporizado');
        
        

        contador = temporizador ;
		
		var min = parseInt(contador/60);
		var seg = contador % 60;
			
		if(min < 10){
			min = "0" + min;
			min = min.substr(0, 2);
		}
		
		if(seg <= 9){
			seg = "0" + seg;
		}
			
		tempo =  min +":"+ seg;
        
        //temporizador = tempo;
        
        $.ajax({
            url :'mostraresultado.php',
            type :'POST',
            data:{re:resps,dificuldade:dific,tempo:temporizador},
            success: function(resposta){
                console.log(resposta);
                $('body').find('.nota').html(resposta);
                $('body').find('.tempo').html(tempo);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                var erro = ("Um erro. Tente novamente mais tarde." + errorThrown); 
                alert(erro);
        }
        });

        //tempo =  min +':'+ seg;

        //$(this).find('.tempo').html();	
    });     
        
    </script>
    <title>Modo competição | Quimicamente</title>
	<link rel="shortcut icon" href="../imagens/logo.ico">
</head>
<body>
    
    <main>
        <section class="curso">
        
            <div class="jumbotron text-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="pad animated fadeInDown">Parabéns!!!</h1>
                            <h3 class="animated fadeIn">Você finalizou o modo competição</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img class="animated fadeInUp" src="../../imagens/frasco.gif"/>
                        </div>
                        <div class="col-md-6 text-left">
                            <h1 class="pad animated fadeInRight">Tempo</h1>
                            <p class="animated fadeInLeft tempo">  </p>
                            <h1 class="pad animated fadeInRight">Nota final</h1>
                            <p class="animated fadeInLeft nota">  </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-left">
                            <p class="animated fadeInRight"><a href="../aluno.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar para tela inicial</a><p>
                        </div>
                        <div class="col-md-4 text-center">
                        </div>
                        <div class="col-md-4 text-right">
                            <p class="animated fadeInLeft"><a href="../rank.php">Ir para o ranking <i class="fa fa-arrow-right" aria-hidden="true"></i> </a><p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>