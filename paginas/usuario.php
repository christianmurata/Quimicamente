		<fieldset>
			<div class="form-group">
				<input type="text" name="nome" maxlength="20" placeholder="Nome" onkeypress="return letras();" onblur="javascript:confirma_nome(this.value, this.id);" class="f1-first-name form-control" id="nome" data-toggle="tooltip" data-placement="bottom" title="Insira seu nome">
				<label class="label_error" id="label_nome"></label>
			</div>
			<div class="form-group">
				<input type="text" name="sobrenome" maxlength="20" placeholder="Sobrenome" onkeypress="return letras();" onblur="javascript:confirma_nome(this.value, this.id)" class="f1-last-name form-control" id="sobrenome" data-toggle="tooltip" data-placement="bottom" title="Insira seu sobrenome">
				<label class="label_error" id="label_sobrenome"></label>
			</div>
			<div class="form-group">
				&nbsp;
				<div id="mini">
					<input type="text" id="dtnas" placeholder="Nascimento" onkeypress="mascaraData( this, event );return numeros();" onblur="confirma_data(this, this.value)" maxlength="10" class="f1-last-name form-control" id="f1-last-name" data-toggle="tooltip" data-placement="bottom" title="Insira sua data de Nascimento">
					<label class="label_error" id="label_dtnas"></label>
				</div>
				<div id="medium">
					<input type="text" placeholder="RA" maxlength="11" onkeypress="return numeros();" onblur="javascripit:confirma_nome(this.value, this.id);" class="f1-last-name form-control" id="RA" name="RA" data-toggle="tooltip" data-placement="bottom" title="Insira seu RA"/>
					<label class="label_error" id="label_cpf"></label>
				</div>
				<br>&nbsp;
			</div>
			<div class="f1-buttons"><br>
				<input type="button" class="total special btn btn-next" value="Próximo"><br><br>
				<input type="button" class="total default btn btn-next" value="Cancelar">
			</div>
		</fieldset>

		<fieldset>
			<div class="form-group">
				<input type="text" name="email" placeholder="Email" onblur="javascript:confirma_email(cadastro.email)" class="f1-email form-control" id="email" data-toggle="tooltip" data-placement="bottom" title="Insira seu Email">
				<label class="label_error" id="label_email"></label>
			</div>
			<div class="form-group">
				<input type="password" id="senha" name="senha" placeholder="Senha (Min. 6 caracteres)" onkeyup="javascript:verifica_senha()" onblur="javascript:conta_senha()" class="f1-repeat-password form-control" data-toggle="tooltip" data-placement="bottom" title="Insira sua Senha"/>
				<center><div id="barra_forca"></div></center>
				<label class="label_error" id="label_senha"></label>
			</div>
			<div class="form-group">
				<input type="password" name="conf_senha" placeholder="Confirme sua senha" onblur="javascript:confirma_senha()" class="f1-repeat-password form-control" id="conf_senha" data-toggle="tooltip" data-placement="bottom" title="Insira sua confirmação de Senha"/>
				<label class="label_error" id="label_conf_senha"></label>
			</div>
			<div class="f1-buttons">
				<input type="button" class="special btn btn-next total" value="Próximo"><br><br>
				<input type="button" class="default btn-previous total" value="Voltar"/>
			</div>
		</fieldset>

		<fieldset>
			<div class="form-group">
				<textarea class="form-control" rows="7" readonly>
				</textarea>
			</div>
			<div class="form-group">
				<label class="sr-only" for="f1-first-name">Termos e condições</label>
				<input type="checkbox" id="priority-low" name="priority" required>
				<label for="priority-low">Li e aceito os termos e condições </label><br>
			</div>
			<div class="f1-buttons">
				<input type="submit" class="total special btn btn-submit" value="Criar conta"/><br><br>
				<input type="button" class="total default btn-previous" value="Voltar"/>
			</div>
			<!-- Javascript -->
			<script src="../assets/js/jquery-1.11.1.min.js"></script>
			<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
			<script src="../assets/js/jquery.backstretch.min.js"></script>
			<script src="../assets/js/retina-1.1.0.min.js"></script>
			<script src="../assets/js/scripts.js"></script>
		</fieldset>