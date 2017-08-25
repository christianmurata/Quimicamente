<?php
//session_start();
//$_SESSION['NOME'];
//$_SESSION['ID'];
include "controlpaginacurso.php";
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
	<title>ESTUDO</title>
    <!--adicionando o bootstrap-->
	<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!--css personalizado-->
    <link href="../../assets/bootstrap/css/estilo.css" rel="stylesheet" media="screen">
    
    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- [if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
</head>
<body>
	<input type="hidden" id="id">
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
							<li><a href="#"><span class="glyphicon glyphicon-blackboard"></span>     Sala</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-user"></span>     Perfil</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-edit"></span>     Curso</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-time"></span>     Competir</a></li>
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
	<div class="col-sm-8 col-sm-offset-2" style="padding-top: 70px" id="conteudo">
		<div class="container col-sm-12">
		<ul class="nav nav-tabs">	  
			<?php for($x=0; $x<count($conteudo); $x++) {?>
				<li><a data-toggle="tab" href="#<?php echo $x; ?>">Slide <?php echo $x+1; ?></a></li>
	  		<?php }?>
	  	</ul>	  					
	  	<div class="tab-content">
	  		<?php for($x=0; $x<count($conteudo); $x++) {?>
				<div id="<?php echo $x; ?>" class="tab-pane fade">
					<?php echo $conteudo[$x]?>
				</div>		  		
	  		<?php }?>
	  	</div>
		  
		  
		  <!--<ul class="nav nav-tabs">
		  			
		    <li class="active"><a data-toggle="tab" href="#slide1">Slide 1</a></li>
		    <li><a data-toggle="tab" href="#slide2">Slide 2</a></li>
		    <li><a data-toggle="tab" href="#slide3">Slide 3</a></li>
		    <li><a data-toggle="tab" href="#slide4">Slide 4</a></li>
		    <li><a data-toggle="tab" href="#slide5">Slide 5</a></li>
		    <li><a data-toggle="tab" href="#slide6">Slide 6</a></li>
		    <li><a data-toggle="tab" href="#slide7">Slide 7</a></li>
		  </ul>
		
		  <div class="tab-content">
		    <div id="slide1" class="tab-pane fade in active">
		      <p style="text-align: justify;">As misturas tamb&eacute;m s&atilde;o chamadas de subst&acirc;ncias compostas, 
		      uma mistura pode ser homog&ecirc;nea ou heterog&ecirc;nea. Se uma mistura apresenta pelo menos duas fases ela 
		      &eacute; chamada de mistura heterog&ecirc;nea e pode ser separada por um m&eacute;todo f&iacute;sico. Quando uma 
		      mistura apresenta uma &uacute;nica fase ela &eacute; chamada de mistura homog&ecirc;nea e sua separa&ccedil;&atilde;o 
		      requer m&eacute;todos qu&iacute;micos.</p>
		    </div>
		    <div id="slide2" class="tab-pane fade">
		      
		      <div style="text-align: justify;">Exemplos de misturas heterog&ecirc;neas:</div>
				<div style="text-align: justify;">&nbsp;</div>
				<ul>
				<li style="text-align: justify;">&aacute;gua e &oacute;leo;</li>
				<li style="text-align: justify;">&aacute;gua e areia;</li>
				<li style="text-align: justify;">&aacute;gua e ferro;</li>
				</ul>
				<div style="text-align: justify;">&nbsp;</div>
				<div style="text-align: justify;">Exemplos de misturas homog&ecirc;neas:</div>
				<div style="text-align: justify;">&nbsp;</div>
				<ul>
				<li style="text-align: justify;">&aacute;gua e &aacute;lcool;</li>
				<li style="text-align: justify;">&aacute;gua e sal;</li>
				<li style="text-align: justify;">bronze (Cobre e Estanho);</li>
				</ul>
		    </div>
		    <div id="slide3" class="tab-pane fade">
		      
		      <div style="text-align: justify;">T&eacute;cnicas para separa&ccedil;&atilde;o de misturas:</div>
				<div style="text-align: justify;">&nbsp;</div>
				<ul>
				<li style="text-align: justify;">Filtra&ccedil;&atilde;o;</li>
				<li style="text-align: justify;">Cata&ccedil;&atilde;o;</li>
				<li style="text-align: justify;">Peneira&ccedil;&atilde;o;</li>
				<li style="text-align: justify;">Leviga&ccedil;&atilde;o;</li>
				<li style="text-align: justify;">Separa&ccedil;&atilde;o magn&eacute;tica;</li>
				<li style="text-align: justify;">Ventila&ccedil;&atilde;o;</li>
				<li style="text-align: justify;">Dissolu&ccedil;&atilde;o fracionada;</li>
				<li style="text-align: justify;">Evapora&ccedil;&atilde;o;</li>
				<li style="text-align: justify;">Destila&ccedil;&atilde;o;</li>
				<li style="text-align: justify;">Cristaliza&ccedil;&atilde;o;</li>
				<li style="text-align: justify;">Liquefa&ccedil;&atilde;o fracionada;</li>
				<li style="text-align: justify;">Adsor&ccedil;&atilde;o;</li>
				</ul>
				<div style="text-align: justify;">&nbsp;</div>
		    </div>
		    <div id="slide4" class="tab-pane fade">
		      
		      <div style="text-align: justify;">
				<div style="text-align: justify;">Filtra&ccedil;&atilde;o - consiste em separar a mistura por um filtro. A parte s&oacute;lida da mistura fica retida no filtro, passando apenas o l&iacute;quido ou o g&aacute;s que pode ser coletado.</div>
				<div style="text-align: justify;">&nbsp;</div>
				<div style="text-align: justify;">Cata&ccedil;&atilde;o - consiste em separar gr&atilde;os com as m&atilde;os.</div>
				<div style="text-align: justify;">&nbsp;</div>
				<div style="text-align: justify;">Peneira&ccedil;&atilde;o - consiste em passa a mistura por uma peneira. Essa t&eacute;cnica separa gr&atilde;os com tamanhos diferentes.</div>
				<div style="text-align: justify;">&nbsp;</div>
				<div style="text-align: justify;">Leviga&ccedil;&atilde;o - permite separar misturas que contenham materiais com diferentes densidades. Por exemplo, &eacute; poss&iacute;vel separar serragem de areia apenas com a adi&ccedil;&atilde;o de &aacute;gua na mistura.</div>
				<div style="text-align: justify;">&nbsp;</div>
				<div style="text-align: justify;">Slide 5:</div>
				<div style="text-align: justify;">Separa&ccedil;&atilde;o magn&eacute;tica - consiste em separar materiais que possam ser atra&iacute;dos por um im&atilde;. Por exemplo, &eacute; poss&iacute;vel separar limalha de ferro de areia apenas passando um im&atilde; sobre a mistura.</div>
				<div style="text-align: justify;">&nbsp;</div>
				<div style="text-align: justify;">Ventila&ccedil;&atilde;o - esta t&eacute;cnica separa materiais com diferentes massas, os mais leves s&atilde;o carregados pelo vento enquanto os mais pesados permanecem no lugar.</div>
		    </div>
		    <div id="slide5" class="tab-pane fade">
		      
		      <div style="text-align: justify;">&nbsp;</div>
				<div style="text-align: justify;">Dissolu&ccedil;&atilde;o fracionada - consiste na separa&ccedil;&atilde;o de misturas que contenham subst&acirc;ncias insol&uacute;veis em alguns solventes. Por exemplo &eacute; poss&iacute;vel separar o &aacute;lcool da gasolina apenas pela adi&ccedil;&atilde;o de &aacute;gua na mistura.</div>
				<div style="text-align: justify;">&nbsp;</div>
				<div style="text-align: justify;">Evapora&ccedil;&atilde;o - essa t&eacute;cnica permite separar misturas que contenham algum sal dissolvido. Por exemplo &eacute; poss&iacute;vel extrair sal da &aacute;gua pela simples evapora&ccedil;&atilde;o da &aacute;gua (&eacute; assim que o sal de cozinha &eacute; obtido).</div>
				<div style="text-align: justify;">&nbsp;</div>
				<div style="text-align: justify;">Destila&ccedil;&atilde;o - essa t&eacute;cnica permite separar l&iacute;quidos com diferentes pontos de ebuli&ccedil;&atilde;o. Por exemplo &eacute; poss&iacute;vel separar &aacute;lcool de &aacute;gua apenas com o aquecimento da mistura. O &aacute;lcool (etanol) tem ponto de ebuli&ccedil;&atilde;o de 78,37&ordm;C enquanto a &aacute;gua possui ponto de ebuli&ccedil;&atilde;o de 100&ordm;C. Assim</div>
				<div style="text-align: justify;">&nbsp;</div>
				<div style="text-align: justify;">Slide 6:</div>
				<div style="text-align: justify;">Cristaliza&ccedil;&atilde;o - esta t&eacute;cnica permite separar s&oacute;lidos. Dissolvendo os s&oacute;lidos em um solvente e abaixando-se a temperatura do sistema &eacute; poss&iacute;vel separar os s&oacute;lidos pela diferen&ccedil;a de solubilidade dos s&oacute;lidos.</div>
				<div style="text-align: justify;">&nbsp;</div>
				<div style="text-align: justify;">Liquefa&ccedil;&atilde;o fracionada - essa t&eacute;cnica permite a separa&ccedil;&atilde;o de gases em uma mistura homog&ecirc;nea. Se uma mistura de gases for submetida a diminui&ccedil;&atilde;o de temperatura, um dos componentes vai sofrer a liquefa&ccedil;&atilde;o primeiro.&nbsp;</div>
				<div style="text-align: justify;">Por exemplo &eacute; poss&iacute;vel separar os gases nitrog&ecirc;nio e am&ocirc;nia apenas abaixando a temperatura do sistema. O ponto de ebuli&ccedil;&atilde;o da am&ocirc;nia &eacute; de -33,34&ordm;C enquanto que o ponto de ebuli&ccedil;&atilde;o do nitrog&ecirc;nio &eacute; de -195,8&ordm;C. Assim, se a temperatura for de -50&ordm;C a am&ocirc;nia ser&aacute; um l&iacute;quido, que poder&aacute; ser coletado, separando a mistura.</div>
				<div style="text-align: justify;">&nbsp;</div>
				<div style="text-align: justify;">Adsor&ccedil;&atilde;o - essa t&eacute;cnica pode ser utilizada na separa&ccedil;&atilde;o de gases. Consiste em passar a mistura por um filtro, esse filtro ret&eacute;m apenas as part&iacute;culas gasosas que interagem com o material presente no filtro. Por exemplo, em uma m&aacute;scara contra gases venenosos, o nitrog&ecirc;nio e o oxig&ecirc;nio passam enquanto o veneno fica retido pela intera&ccedil;&atilde;o que sofre ao passar pelo filtro de carv&atilde;o ativo.</div>
				<div style="text-align: justify;">A adsor&ccedil;&atilde;o pode ser qu&iacute;mica (quando ocorre liga&ccedil;&atilde;o qu&iacute;mica) ou f&iacute;sica (quando a intera&ccedil;&atilde;o se d&aacute; por for&ccedil;as de Van der Walls), o processo qu&iacute;mico &eacute; irrevers&iacute;vel enquanto o f&iacute;sico pode ser revertido.</div>
				</div>
		    </div>		    
		  </div>-->
		</div>
	</div>
	<!--FIM DO CONTEÚDO-->	
	
	<!--CHAMADA DOS SCRIPTS-->
    <script src="../../assets/bootstrap/js/jquery-3.2.1.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/bootstrap/js/main.js"></script>
	
</body>
</html>