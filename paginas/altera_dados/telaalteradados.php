<link rel="stylesheet" href="../assets/css/alterardados.css"/>
<link rel="stylesheet" href="../assets/bootstrap/css/css_menu.css"/>
<link rel="stylesheet" href="../assets/bootstrap/css/css_aluno.css"/>
<link rel="stylesheet" href="../assets/bootstrap/css/elements.css"/>
<link rel="stylesheet" href="../assets/bootstrap/css/metisMenu.min.css"/>
<link rel="stylesheet" href="../css/alteradados.css"/>
<script src="../js/alteradados.js"></script>
<script src="../js/java.js"></script>
<script src="../js/mensagens.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<link rel="stylesheet" href="../sweet_alert/sweetalert2.css">
<script src="../sweet_alert/sweetalert2.js"></script>	  
		  
	<!--CONTEÚDO DA PÁGINA-->
    
    <section id="inicio">
	    <div class="row">
			<div class="container-fluid">
				<div class="col-md-2"></div>
				<div class="col-md-8">	
					<div class="panel panel-quimicamente">
						<div class="panel-heading">
								Alterar Dados
							</div><br><br>
							<div id="divmae">
		<center><div class="row">
			
			<div class="col-md-3">
			<div id="divfoto"> 
			<form id="form_foto" method="post" enctype="multipart/form-data">
				<img id="imgb" src="<?php echo $foto?>" width="200px" height="200px" >
				<center><label>Alterar Foto</label></center>
				<div class="box-file">
					<input type="hidden" name="MAX_FILE_SIZE" value="2388608"/>
					<input type="file" name="Arquivo" id="Arquivo" size="30px" onchange="javascript: carregaimg();">
				</div>
			</form>
			</div>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<div id="divinput">
				<div id="divcaixatexto">
					<form id="teste">
								<br>
								<h3>EMAIL</h3><input type="email" class="f1-first-name form-control" id="email" name="email" size="30" value="<?php echo $email?>" readonly><br>
								<h3>NOME</h3><input type="text" class="f1-first-name form-control" name="nome" id="nome" value="<?php echo $nome?>" size="30" onkeypress="return teste(event);" data-toggle="tooltip" data-placement="bottom"><br>
								<h3>DATA DE NASCIMENTO</h3><input class="f1-last-name form-control" type="date" id="data" name="data" onkeypress="return numeros();" maxlength="10" value="<? echo $data?>" size="12" data-toggle="tooltip" data-placement="bottom"><br>
								<input type="button" class="btn btn-primary big" value="ALTERAR DADOS" onclick="alteraDados(1);"> 
								<input type="button" class="btn btn-primary big" value="VOLTAR" onclick="window.location.href='aluno.php'"><br><br>
					</form>
								<input type="button" value="Alterar Senha" class="btn btn-primary big" data-toggle="modal" data-target="#em"/>		
								<div class="modal fade" id="em" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Alterar Senha</h4>
                                        </div>
                                        <div class="modal-body">
										<div id="alerta"></div>
										<form id="teste2">
                                            <br><br><h3>SENHA ATUAL</h3> <input type="password" id="senha_atual_form" name="senha_atual_form" placeholder="Senha Atual" class="f1-repeat-password form-control" data-toggle="tooltip" data-placement="bottom" title="Senha Atual" minlength="6"/>									
											<h3>NOVA SENHA</h3><input type="password" id="nova_senha" name="nova_senha" placeholder="Senha (Min. 6 caracteres)" onkeydown="verifica_senha1()" class="f1-repeat-password form-control" data-toggle="tooltip" data-placement="bottom" title="Insira sua Senha" minlength="6"/>
											<div id="barra_forca"></div>
											<h3>CONFIRMAR NOVA SENHA</h3><input type="password" id="confirm_nova_senha" name="confirm_nova_senha" onchange="validarSenha();" placeholder="Digite a nova senha novamente" class="f1-repeat-password form-control" data-toggle="tooltip" data-placement="bottom" title="Digite a nova senha novamente" minlength="6" /><br>
											<input type="button"  onclick="alteraSenha(2);" class="btn btn-primary" id="btn-senha" value="CONFIRMAR ALTERAÇÃO DA SENHA" disabled/>
                                        </form>
										</div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                         <!-- /.modal -->
					
				</div>
			</div>
			</div>
		</div>
			</div> <!-- /col-md-9 -->
		</div>
		</div> 
	</section>