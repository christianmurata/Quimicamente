		<fieldset>
            <!-- 686.91 x 164 -->
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
					<input type="text" id="dtnas" placeholder="Nascimento" onkeypress="mascaraData( this, event ); return numeros();" onblur="confirma_data(this, this.value)" maxlength="10" class="f1-last-name form-control" id="f1-last-name" data-toggle="tooltip" data-placement="bottom" title="Insira sua data de Nascimento">
					<label class="label_error" id="label_dtnas"></label>
				</div>
				<div id="medium">
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
				<input type="password" id="senha" name="senha" placeholder="Senha (Min. 6 caracteres)" onkeyup="javascript:verifica_senha()" class="f1-repeat-password form-control" data-toggle="tooltip" data-placement="bottom" title="Insira sua Senha"/>
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
				<div class="termos-condicoes">
                    <h2>Política de privacidade para <a href='http://quimicamente.gq'>Quimicamente</a></h2>
                    <p>Todas as suas informações pessoais recolhidas, serão usadas para o ajudar a tornar a sua visita
                        no nosso site o mais produtiva e agradável possível.</p>
                    <p>A garantia da confidencialidade dos dados pessoais dos utilizadores do nosso site é importante
                        para o Quimicamente.</p>
                    <p>Todas as informações pessoais relativas a membros, assinantes, clientes ou visitantes que usem o
                        Quimicamente serão tratadas em concordância com a Lei da Proteção de Dados Pessoais de 26 de
                        outubro de 1998 (Lei n.º 67/98).</p>
                    <p>A informação pessoal recolhida pode incluir o seu nome, e-mail, número de telefone e/ou
                        telemóvel, morada, data de nascimento e/ou outros.</p>
                    <p>O uso do Quimicamente pressupõe a aceitação deste Acordo de privacidade. A equipe do Quimicamente
                        reserva-se ao direito de alterar este acordo sem aviso prévio. Deste modo, recomendamos que
                        consulte a nossa política de privacidade com regularidade de forma a estar sempre
                        atualizado.</p>
                    <h2>Os Cookies e Web Beacons</h2>
                    <p>Utilizamos cookies para armazenar informação, tais como as suas preferências pessoas quando
                        visita o nosso website. Isto poderá incluir um simples popup, ou uma ligação em vários serviços
                        que providenciamos, tais como fóruns.</p>
                    <p>Você detém o poder de desligar os seus cookies, nas opções do seu browser, ou efetuando
                        alterações nas ferramentas de programas Anti-Virus, como o Norton Internet Security. No entanto,
                        isso poderá alterar a forma como interage com o nosso website, ou outros websites. Isso poderá
                        afetar ou não permitir que faça logins em programas, sites ou fóruns da nossa e de outras
                        redes.</p>
                    <h2>Ligações a Sites de terceiros</h2>
                    <p>O Quimicamente possui ligações para outros sites, os quais, a nosso ver, podem conter informações
                        / ferramentas úteis para os nossos visitantes. A nossa política de privacidade não é aplicada a
                        sites de terceiros, pelo que, caso visite outro site a partir do nosso deverá ler a politica de
                        privacidade do mesmo.</p>
                    <p>Não nos responsabilizamos pela política de privacidade ou conteúdo presente nesses mesmos
                        sites.</p>
                </div>
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