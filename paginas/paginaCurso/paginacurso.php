<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
//$_SESSION['NOME'];

include "controlpaginacurso.php";

$variavel = $_GET['conteudos_id'];
$variavel = $variavel + 1;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
	<meta name="description" content="Site do curso de química baseado em EaD">
	<meta name="keywords" content="química, quimicamente, quarkz, cti, tcc, 3º ano">
	<meta name="author" content="alunocti" >
	<title>Página do Curso</title>
    <!--adicionando o bootstrap-->
	<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!--css personalizado-->
    <link href="../../assets/bootstrap/css/estilo.css" rel="stylesheet" media="screen">
    <<link rel="stylesheet" type="text/css" href="../../assets/sweetalert/dist/sweetalert.css">
	
    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- [if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->	
</head>
<body id="corpo">
    <input type="hidden" value="<?php echo $variavel;?>" id="idconteudo">
	<div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #ccc">        
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="../../imagens/logoQuim.png" width="200px"></a>
            </div>
			
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="padding-right:10px;">
                    <li class="active"><a href="#">Curso</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="../sala.php"><span class="glyphicon glyphicon-blackboard"></span>     Sala</a></li>
							<li><a href="../alteradados2.php"><span class="glyphicon glyphicon-user"></span>     Perfil</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-edit"></span>     Curso</a></li>
							<li><a href="../modoCompeticao/telacompeticao.php"><span class="glyphicon glyphicon-time"></span>     Competir</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-cog"></span>     Sobre</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-log-out"></span>     Sair</a></li>
						</ul>
					</li>
					<li><a href="#">Sobre</a></li>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-wrench"></span>     Editar perfil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>     Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
			<!--FINAL DA BARRA DE NAVEGAÇÃO SUPERIOR-->						
        </nav>		
	</div>		  
		  
	<!--CONTEÚDO DA PÁGINA-->	
	<div class="col-sm-6 col-sm-offset-3" style="padding-top: 70px" id="conteudo">
		<div class="container col-sm-12">
            <div class="row">
                <div class="col-sm-8">
                    <p class="text-warning">Clique nas abas para visualizar o conte&uacute;do!</p>
                </div>
                <div class="col-sm-4">
                    <input type="button" id="fazerprova" value="Fazer prova" class="btn btn-success m-r-5 m-b-5">
                </div>
            </div>
            <div>
                <h3>Assunto: <?php echo $tituloconteudo[0]['conteudos_nome']; ?></h3>
            </div>
			<ul class="nav nav-tabs">	  
				<?php for($x=0; $x<count($conteudo); $x++) {?>
					<li><a class="" data-toggle="tab" href="#<?php echo $x; ?>">Slide <?php echo $x+1; ?></a></li>
				<?php }?>
			</ul>	  					
			<div class="tab-content">
				<br>
				<?php for($x=0; $x<count($conteudo); $x++) {?>
					<div id="<?php echo $x; ?>" class="tab-pane fade">
						<?php echo $conteudo[$x]['slides_conteudo']?>
					</div>		  		
				<?php }?>
			</div>	  
		</div>
	</div>
	<!--FIM DO CONTEÚDO-->
	
	<!--COMEÇO QUESTOES-->
	<div class="col-sm-6 col-sm-offset-3" style="padding-top:50px; display:none" id="perguntas">
		<div class="row">
            <div class="container col-sm-12">		
                <div id="pergunta1" style="display: show">
                    <div class="row">
                        <div class="col-sm-9">
                            <p><?php echo $perguntas[0]['perguntas']?></p>
                            <div id="radio">
                                <input type="radio" name="optradio1" value="<?php echo $perguntas[0]['correta'];?>"><?php echo $perguntas[0]['respostas'];?><br>
                                <input type="radio" name="optradio1" value="<?php echo $perguntas[1]['correta'];?>"><?php echo $perguntas[1]['respostas'];?><br>
                                <input type="radio" name="optradio1" value="<?php echo $perguntas[2]['correta'];?>"><?php echo $perguntas[2]['respostas'];?><br>
                                <input type="radio" name="optradio1" value="<?php echo $perguntas[3]['correta'];?>"><?php echo $perguntas[3]['respostas'];?><br>
                                <input type="radio" name="optradio1" value="<?php echo $perguntas[4]['correta'];?>"><?php echo $perguntas[4]['respostas'];?><br>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="button" class="btn btn-primary" value="PRÓXIMA" id="mostrar2">						
                        </div>					
                    </div>
                </div>
                <div id="pergunta2" style="display: none">
                    <div class="row">
                        <div class="col-sm-9">
                            <p><?php echo $perguntas[5]['perguntas']?></p>
                            <div id="radio">
                                <input type="radio" name="optradio2" value="<?php echo $perguntas[5]['correta'];?>"><?php echo $perguntas[5]['respostas'];?><br>
                                <input type="radio" name="optradio2" value="<?php echo $perguntas[6]['correta'];?>"><?php echo $perguntas[6]['respostas'];?><br>
                                <input type="radio" name="optradio2" value="<?php echo $perguntas[7]['correta'];?>"><?php echo $perguntas[7]['respostas'];?><br>
                                <input type="radio" name="optradio2" value="<?php echo $perguntas[8]['correta'];?>"><?php echo $perguntas[8]['respostas'];?><br>
                                <input type="radio" name="optradio2" value="<?php echo $perguntas[9]['correta'];?>"><?php echo $perguntas[9]['respostas'];?><br>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="button" class="btn btn-primary" value="PRÓXIMA" id="mostrar3">
                        </div>					
                    </div>
                </div>
                <div id="pergunta3" style="display: none">
                    <div class="row">
                        <div class="col-sm-9">
                            <p><?php echo $perguntas[10]['perguntas']?></p>
                            <div id="radio">
                                <input type="radio" name="optradio3" value="<?php echo $perguntas[10]['correta'];?>"><?php echo $perguntas[10]['respostas'];?><br>
                                <input type="radio" name="optradio3" value="<?php echo $perguntas[11]['correta'];?>"><?php echo $perguntas[11]['respostas'];?><br>
                                <input type="radio" name="optradio3" value="<?php echo $perguntas[12]['correta'];?>"><?php echo $perguntas[12]['respostas'];?><br>
                                <input type="radio" name="optradio3" value="<?php echo $perguntas[13]['correta'];?>"><?php echo $perguntas[13]['respostas'];?><br>
                                <input type="radio" name="optradio3" value="<?php echo $perguntas[14]['correta'];?>"><?php echo $perguntas[14]['respostas'];?><br>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="button" class="btn btn-primary" value="PRÓXIMA" id="mostrar4">
                        </div>					
                    </div>
                </div>
                <div id="pergunta4" style="display: none">
                    <div class="row">
                        <div class="col-sm-9">
                            <p><?php echo $perguntas[15]['perguntas']?></p>
                            <div id="radio">
                                <input type="radio" name="optradio4" value="<?php echo $perguntas[15]['correta'];?>"><?php echo $perguntas[15]['respostas'];?><br>
                                <input type="radio" name="optradio4" value="<?php echo $perguntas[16]['correta'];?>"><?php echo $perguntas[16]['respostas'];?><br>
                                <input type="radio" name="optradio4" value="<?php echo $perguntas[17]['correta'];?>"><?php echo $perguntas[17]['respostas'];?><br>
                                <input type="radio" name="optradio4" value="<?php echo $perguntas[18]['correta'];?>"><?php echo $perguntas[18]['respostas'];?><br>
                                <input type="radio" name="optradio4" value="<?php echo $perguntas[19]['correta'];?>"><?php echo $perguntas[19]['respostas'];?><br>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="button" class="btn btn-primary" value="PRÓXIMA" id="mostrar5">
                        </div>					
                    </div>
                </div>
                <div id="pergunta5" style="display: none">
                    <div class="row">
                        <div class="col-sm-9">
                            <p><?php echo $perguntas[20]['perguntas']?></p>
                            <div id="radio">
                                <input type="radio" name="optradio5" value="<?php echo $perguntas[20]['correta'];?>"><?php echo $perguntas[20]['respostas'];?><br>
                                <input type="radio" name="optradio5" value="<?php echo $perguntas[21]['correta'];?>"><?php echo $perguntas[21]['respostas'];?><br>
                                <input type="radio" name="optradio5" value="<?php echo $perguntas[22]['correta'];?>"><?php echo $perguntas[22]['respostas'];?><br>
                                <input type="radio" name="optradio5" value="<?php echo $perguntas[23]['correta'];?>"><?php echo $perguntas[23]['respostas'];?><br>
                                <input type="radio" name="optradio5" value="<?php echo $perguntas[24]['correta'];?>"><?php echo $perguntas[24]['respostas'];?><br>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="button" class="btn btn-danger" value="CONFERIR" id="conferir">
                        </div>					
                    </div>
                </div>
            </div>		
        </div>
	</div>
	<!--FIM QUESTOES-->
	
	<!--TESTE DE POPUP
	<div class="col-sm-6 col-sm-offset-3"><input type="button" id="btn-teste" value="TESTE"></div>
	-->
	
	
	<!--CHAMADA DOS SCRIPTS-->
    <script src="../../assets/bootstrap/js/jquery-3.2.1.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/bootstrap/js/main.js"></script>
	<script src="../../assets/sweetalert/dist/sweetalert.min.js"></script>
	<script src="teste.js"></script>
    <script src="trocaperguntas.js"></script>
	<script>
		$('#fazerprova').click(function(){
			$('#perguntas').show();
		});               
	   alert($("#idconteudo").val());
        
		var contador = 5;
		//pergunta1
		$("#mostrar2").on('click',function(){
			if($('input[name=optradio1]:checked').val() == 's'){									
				swal("Acerto, miseraviiii!");									
			}
			else{
				contador = contador - 1;
				swal("Errrrooouuuuu!!!");
			}
		});
		//pergunta2
		$("#mostrar3").on('click',function(){
			if($('input[name=optradio2]:checked').val() == 's'){									
				swal("Acerto, miseraviiii!");									
			}
			else{
				contador = contador - 1;
				swal("Errrrooouuuuu!!!");
			}
		});
		//pergunta3
		$("#mostrar4").on('click',function(){
			if($('input[name=optradio3]:checked').val() == 's'){									
				swal("Acerto, miseraviiii!");									
			}
			else{
				contador = contador - 1;
				swal("Errrrooouuuuu!!!");
			}
		});
		//pergunta4
		$("#mostrar5").on('click',function(){
			if($('input[name=optradio4]:checked').val() == 's'){									
				swal("Acerto, miseraviiii!");									
			}
			else{
				contador = contador - 1;
				swal("Errrrooouuuuu!!!");
			}
		});
		//pergunta5
		$("#conferir").on('click',function(){
			if($('input[name=optradio5]:checked').val() == 's'){									
				swal("Acerto, miseraviiii!");									
			}
			else{
				contador = contador - 1;
				swal("Errrrooouuuuu!!!");
			}
			if(contador > 2){
				$.ajax({
					'url': "controlsalvaconteudo.php",
					'type': 'GET',
					'data': {
						'parametro1': $("#idconteudo").val()						
					},
					'success': function(retorno){
						if(retorno == "1"){
							swal(
							  'Ahhh miseravi!',
							  'você passou!',
							  'success'							
							);
							window.location.reload();
						}
					}
				});
			}else{
				swal(
					'Que pena, você foi reprovado.',
					'você terá que responder o questionário novamente, tente ler o conteúdo primeiro',
					'error'
				);
				window.location.reload();
			}
		});
	</script>
</body>
</html>