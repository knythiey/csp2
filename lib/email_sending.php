<?php
	session_start();
	USE PHPMailer\PHPMailer\PHPMailer; // actual phpmailer lib
	USE PHPMailer\PHPMailer\Exception; // for error handling

	require '../vendor/autoload.php'; // loads the dependencies you downloaded
	$userEmail = $_SESSION['user_email'];
	$userFullName = $_SESSION['checkoutFname'] . ' '. $_SESSION['checkoutLname'];
	$order_id = " " .$_SESSION['order_id'];

	// Sender
	$email_sender = 'kynt.sample@gmail.com'; // this should be an existing email acct.
	$email_password = '4175801Kynt'; // password of your email_sender

	$from_mail = "Admin_Kynt@kynt.com";
	$from_name = "Admin_Kynt"; // name of sender

	// Receiver
	$to_email = "kynt.sample@gmail.com";
	$to_name = "$userFullName";
	$mail_subject = "Receipt of your order with order number " . $order_id;
	$ref_num = $_SESSION['reference_number'];

	$mail_body = "<p>Thank you for purchasing from Kynt's Gadgets. Here is the reference number [ " . $ref_num . " ]</p>
			<br>
			<p>This is a system generated email. Don't reply to this email. Have a good day!</p>
		";
	

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
		echo "Message couldn't be sent. Mail error" . $mail->ErrorInfo;
	}
	echo '<script>window.location.href="../receipt.php" </script>';
	?>