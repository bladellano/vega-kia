<?php

namespace Source;

use \PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
	const USERNAME = MAIL['mail_email'];
	const PASSWORD = MAIL['mail_password'];
	const NAME_FROM =  MAIL['mail_from_name'];
	const HOST = MAIL['mail_host'];
	const INBOX = MAIL['mail_email_inbox'];

	private $mail;

	public function __construct($fromAdress, $fromName, $subject, $body = "")
	{

		// var_dump(MAIL);

		// echo '<pre>$fromAdress<br />'; print_r($fromAdress); echo '</pre>';die;
		$this->mail = new PHPMailer();
		$this->mail->isSMTP();
		$this->mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		$this->mail->SMTPDebug = 1;
		$this->mail->Debugoutput = 'html';
		$this->mail->Host = Mailer::HOST;
		$this->mail->Port = 587;
		$this->mail->SMTPSecure = 'tls';
		$this->mail->SMTPAuth = true;
		$this->mail->Username = Mailer::USERNAME;
		$this->mail->Password = Mailer::PASSWORD;
		$this->mail->setFrom($fromAdress, utf8_decode($fromName));
		$this->mail->addAddress(Mailer::INBOX, Mailer::NAME_FROM);
		$this->mail->Subject = utf8_decode($subject);
		$this->mail->msgHTML($body);
		$this->mail->AltBody = 'This is a plain-text message body';
	}

	public function send()
	{
		return $this->mail->send();
	}
}
