<?php
	include_once("../PHPMailer/class.phpmailer.php");
	include_once("servico.php");
	include_once("entidades.php");

	$mail= new PHPMailer;
	$mail->IsSMTP();        // Ativar SMTP
	$mail->SMTPDebug = false;       // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;     // Autenticação ativada
	$mail->SMTPSecure = 'ssl';  // SSL REQUERIDO pelo GMail
	$mail->Host = 'smtp.gmail.com'; // SMTP utilizado
	$mail->Port = 465; 
	$mail->Username = 'quarkztechnology@gmail.com';
	$mail->Password = 'senhatime';
	$mail->SetFrom('quarkztechnology@gmail.com', 'Quimicamente');
	$mail->addAddress('christiamurata@gmail.com','email para recuperação de senha');
	$mail->Subject=("Recuperar senha");
	$message = file_get_contents('../paginas/email/html-padrao.html');
	$message = str_replace('%hash%', 'teste', $message); 
	$mail->msgHTML($message);
	
	if ($mail->send()){
		echo true;
	}else{
	    echo false;
	}

