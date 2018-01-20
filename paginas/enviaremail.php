<?php
	require("PHPMailer/class.phpmailer.php");
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
	$mail->addAddress('christiamurata@gmail.com','qualquer coisa que quiser');
	$mail->Subject=("Recuperar de senha");
	$message = file_get_contents('index.html');
	$mail->msgHTML($message);
	if ($mail->send())
	{
	    $ok = true;
	}else{
	    $ok = false;
	}
?>

