<?php
	include_once("suporte.php");
	include_once("servico.php");
	include_once("../PHPMailer/class.phpmailer.php");

	class Model_recuperacao{
		Static function gerarHash($email){
			// Consulta o email e verifica se ele exixte
			$sql = "SELECT * FROM usuarios WHERE usuarios_email = ? AND usuarios_del = 'N'";
			try{
				$query = Database::selecionaObjeto($sql, $email);
				if($query){
					$usuario = Servico::objUsuarios($query[0]);
				}else{
					die("ErrorNotEmail");
				}
			}catch(Exception $error){
				die($error);
			}

			// Caso o email exista, é gerado uma hash MD5 utilizando o próprio email do usuário
			// A hash só pode ser acessada uma vez 
			// Depois que o usuario altera sua senha ela é excluida
			$time = time();
			$hash = md5($usuario->getUsuarios_email().$time);

			$sql_hash = "INSERT INTO recupera_senha (usuarios_id, recupera_senha_hash, recupera_senha_del) VALUES(?, ?, 'N')";
			$param = array($usuario->getUsuarios_id(), $hash);
			try{
				$query = Database::executarParam($sql_hash, $param);
				if($query){
					header("Content-type: text/html; charset=utf-8");
					// Instancia da classe PHPMailer utilizada para o envio do email
					$mail= new PHPMailer;
					$mail->IsSMTP();        // Ativar SMTP
					$mail->CharSet = 'UTF-8';
					$mail->SMTPDebug = false;       // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
					$mail->SMTPAuth = true;     // Autenticação ativada
					$mail->SMTPSecure = 'ssl';  // SSL REQUERIDO pelo GMail
					$mail->Host = 'smtp.gmail.com'; // SMTP utilizado
					$mail->Port = 465;
					$mail->Username = 'quarkztechnology@gmail.com';
					$mail->Password = 'senhatime';
					$mail->SetFrom('quarkztechnology@gmail.com', 'Quimicamente');
					$mail->addAddress($email,'email para recuperação de senha');
					$mail->Subject=("Recuperar senha");
					$message = file_get_contents('../paginas/email/email.html');
					$message = str_replace('%hash%', $hash, $message);
					$mail->msgHTML($message);
					
					if ($mail->send()){
						die("hashSuccess");
					}else{
						die("hashError");
					}
				}
			}catch(Exception $error){
				die($error);
			}
		}

		static function verificaHash($hash){
			$sql = "SELECT * FROM recupera_senha WHERE recupera_senha_hash = ? AND recupera_senha_del = 'N'";
			try{
				$query = Database::selecionaObjeto($sql, $hash);
				if($query){
					return "hashActive";
				}else{
					return "hashDisable";
				}
			}catch(Exception $error){
				die($error);
			}
		}

		static function alterarSenha($senha, $hash){
			// Seta o objRecupera_Senha
			$sql_recupera = "SELECT * FROM recupera_senha WHERE recupera_senha_hash = ? AND recupera_senha_del = 'N'";
			try{
				$query = Database::selecionaObjeto($sql_recupera, $hash);
				if($query){
					$recuperacao = Servico::objRecupera_senha($query[0]);
				}else{
					die("errorObject");
				}
			}catch(Exception $error){
				die($error);
			}

			// Altera senha
			$sql = "UPDATE usuarios SET usuarios_senha = ? WHERE usuarios_id = ?";
			$param = array(md5($senha), $recuperacao->getUsuarios_id());
			try{
				$query_altera = Database::executarParam($sql, $param);
				// Caso a alteração da senha tenha sido efetuada com sucesso a hash atual é desabilitadas
				if($query_altera){
					$sql_disable = "UPDATE recupera_senha SET recupera_senha_del = 'S' WHERE usuarios_id = ? AND recupera_senha_del = 'N'";
					try{
						Database::executarParam($sql_disable, array($recuperacao->getUsuarios_id()));
					}catch(Exception $error){
						die($error);
					}
				}else{
					die("erroAlterarSenha");
				}
			}catch(Exception $error){
				die ($error);
			}

			die("senhaAlterada");

		}
	}
?>
