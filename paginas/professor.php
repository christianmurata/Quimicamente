<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css"/>
    <link rel="stylesheet" href="../css/css_menu.css"/>
    <link rel="stylesheet" href="../css/css_professor.css"/>
	<link rel="stylesheet" href="../css/elements.css"/>
	<link rel="stylesheet" href="../css/metisMenu.min.css"/>
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.min.js" /></script>
	<script src="../js/java.js"></script>
	<script src="../js/ajax.js"></script>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/style.css">

	<style>
        .btn-qmt{
            background: #4FFFBC;
            color: white;
        }
        
        .panel-quimicamente{
            border-color: #4FFFBC;
        }
        
        .panel-quimicamente > .panel-heading {
            border-color: #4FFFBC;
            color: white;
            background-color: #4FFFBC;
        }
        
        [id*=questao]{
            cursor: pointer;
        }
        [id*=selModulo]{
            cursor: pointer;
        }
        [id*=modulo]{
            cursor: pointer;   
        }
        .btn-right{
            float: right;
        }
    </style>
	
	<script src="js/jquery-1.8.3.min.js"></script>
	<link rel="shortcut icon" href="images/logo.ico">
	<title> Tela Inicial | Quimicamente </title>
</head>
<body>      
            <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #ccc">        
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img  src="../imagens/logoQuim.png" width="200px"></a>
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
                            <li onclick = "return logout();"><a href="#"><span class="glyphicon glyphicon-log-out"></span>     Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
			<!--FINAL DA BARRA DE NAVEGAÇÃO SUPERIOR-->
		</nav>
    <!--Corpo da Página-->
    <section id="inicio">
            <div id="wrapper">
			<!--Corpo da Página-->
				<div class="row">
					<div class="col-lg-8">
						<div class="panel panel-quimicamente">
							<div class="panel-heading">
								Turmas
							</div>
							<div class="panel-body">
								<h1> lista de Turmas </h1>
							<table class="table">
									<!-- Tabela -->
									<thead>
										<tr>
											<th>ID</th>
											<th>Turma</th>
											<th>Status</th>
											<th>Detalhes</th>
											<th> &nbsp; </th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row"><p>1</p></th>
											<td><p>Turma do fundão</p></td>
											<td>
												<a href="#" class="b" data-toggle="modal" data-target="#atds">Ativa</a>
												<!-- Modal -->
												<div class="modal fade" id="atds" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																<h4 class="modal-title" id="myModalLabel">Ativar/Desativar</h4>
															</div>
															<div class="modal-body">
																<center>
																	<p> Deseja realmente desativar essa turma? </p>
																	<button type="button" class="btn btn-success">Confirmar</button>
																	<button type="button" class="btn btn-danger" class="close" data-dismiss="modal">Cancelar</button>
																</center>
															</div>
															<!--<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary">Save changes</button>
															</div>-->
														</div><!-- /.modal-content -->
													</div><!-- /.modal-dialog -->
												</div><!-- /.modal -->
											</td>
											<td>
												<a href="#" class="b">Exibir</a>
											</td>
											<td>
												<a href="#" class="b" data-toggle="modal" data-target="#excluir">Excluir</a>
												<!-- Modal -->
												<div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																<h4 class="modal-title" id="myModalLabel">Exclusão</h4>
															</div>
															<div class="modal-body">
																<center>
																	<p> Deseja realmente excluir essa turma? </p>
																	<button type="button" class="btn btn-success">Confirmar</button>
																	<button type="button" class="btn btn-danger" class="close" data-dismiss="modal">Cancelar</button>
																</center>
															</div>
															<!--<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary">Save changes</button>
															</div>-->
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
												</div><!-- /.modal -->
											</td>
										</tr>
									</tbody>
							</table>
							</div>
							<div class="panel-footer">
								<input type="button" value="Todas as turmas" class="special"/>
							</div>
						</div><!--panel panel-quimicamente-->
					</div> <!-- /.col-lg-8 -->
					<div class="col-lg-4">
						<div class="panel panel-quimicamente">
							<div class="panel-heading">
								Ranking
							</div>
							<div class="panel-body">
								<p> Ranking indisponível no momento </p>
								<br><br><br><br><br>
							</div>
							<div class="panel-footer">
								<input type="button" value="Ranking completo" class="special"/>
							</div>
						</div>
					</div><!-- /.col-lg-4 -->
				</div>
				<div class="row"> 
					<div class="col-lg-12">
						<div class="panel panel-quimicamente">
							<div class="panel-heading">
								Conteúdo do curso
							</div>
							<div class="panel-body">
								<div class="flex flex-4">
									<div class="box person">
										<div class="image round">
											<img src="../imagens/hist.jpg"/>
										</div>
										<center>
											<p>História da Química</p>
										</center>
									</div>
									<div class="box person">
										<div class="image round">
											<img src="../imagens/hist.jpg"/>
										</div>
										<center>
											<p>História da Química</p>
										</center>
									</div>
									<div class="box person">
										<div class="image round">
											<img src="../imagens/hist.jpg"/>
										</div>
										<center>
											<p>História da Química</p>
										</center>
									</div>
									<div class="box person">
										<div class="image round">
											<img src="../imagens/hist.jpg"/>
										</div>
										<center>
											<p>História da Química</p>
										</center>
									</div>
								</div>
							</div>
							<div class="panel-footer">
								<input type="button" value="Todos os conteúdos" class="special"/>
							</div>
						</div>
					</div> <!-- /.col-lg-12 -->
				</div>
				<script src="../assets/js/jquery-1.11.1.min.js"></script>
                <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
                <script src="../assets/js/jquery.backstretch.min.js"></script>
                <script src="../assets/js/retina-1.1.0.min.js"></script>
                <script src="../assets/js/scripts.js"></script>
                <script src="../js/metisMenu.min.js"></script>
                <script src="../js/elements.js"></script>
		</div>
	</section><!--/Corpo da Página-->
	<footer id="footer" class="hidden-xs">
		<ul class="icons">
			<li><a href="https://www.facebook.com/cti.unesp.bauru/?fref=ts" target="_blank">Facebook</a><br></li>
			<li><a href="http://quarkztech.blogspot.com.br" target="_blank">Blog dos Desenvolvedores</a></li>
			<li><a href="http://www.cti.feb.unesp.br/" target="_blank">Site do CTI</a></li>
			<br><br>
			<li><a href="https://www.facebook.com/quarkzQuimicamente" target="_blank"><img src="../imagens/ico_face.png" width="50" /></a></li>
			<li><img src="../imagens/ico_twitter.png" width="50" /></li>
			<li><img src="../imagens/ico_blog.png" width="50"/></li>
			<li><img src="../imagens/ico_link.png" width="50" /></li>
		</ul>
		<div class="container">
			<ul class="copyright">
				<li>&copy; 2017 Quimicamente </li>
				<li>Desenvolvido por: Quarkz Technology </li> 
			</ul>
		</div>
	</footer>
	<footer id="footer" class="visible-xs">
		<ul class="copyright">
			<li>Desenvolvido por: Quarkz Technology </li> 
		</ul>
	</footer>
	
</body>
</html>