<?php
	
	USE PHPMailer\PHPMailer\PHPMailer; // actual phpmailer lib
	USE PHPMailer\PHPMailer\Exception; // for error handling

	require '../vendor/autoload.php'; // loads the dependencies you downloaded

	// Sender
	$email_sender = 'kevinsalvino@gmail.com'; // this should be an existing email acct.
	$email_password = ''; // password of your email_sender

	$from_mail = "kevinski_academy@kevinski.com";
	$from_name = "Grow Veggies"; // name of sender

	// Receiver
	$to_email = "michaelallenmateo@gmail.com";
	$to_name = "Mike";
	$mail_subject = "Hi Pogi!";
	$mail_body = "<p>Congratulations! You just won $1,000,000!!! Please go to www.meatspin.com to claim your price.</p>";

	// Sending the email part
	$mail = new PHPMailer(true);
	// Settings
	try {
		$mail->SMTPDebug = 4; // level of debug message 4 is lowest, 1 is the highest
		$mail->isSMTP(); // makes sure to use SMTP (Simple Mail Transfer Protocol) to mail.
		$mail->SMTPOptions = array( // custom connection options 
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true,
			)
		);
		$mail->SMTPAuth = true; // if your going to smtp authentication
		$mail->SMTPSecure = 'tls'; // enables TLS (Transport Layer Security) encryption, 'ssl' is also accepted here
		$mail->Host = 'smtp.gmail.com'; // smtp host of gmail
		$mail->Port = 587; // this is the default mail submission port.

		// Sender
		$mail->Username = $email_sender;
		$mail->Password = $email_password;
		$mail->setFrom($from_mail, $from_name); // sets the alias of sender

		// Receiver
		$mail->addAddress($to_email, $to_name); // sets the receiver mail and how to call receiver

		// Actual email
		$mail->isHTML(true); // reads the html syntax
		$mail->Subject = $mail_subject;
		$mail->Body = $mail_body;

		// Sending email
		$mail->send();

	} catch (Exception $error) {
		echo "Message couldn't be sent. Mail error " . $mail->ErrorInfo;
	}

?>