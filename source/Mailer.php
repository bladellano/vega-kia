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
	const PORT = MAIL['mail_port'];
	const SMTP_SECURE = MAIL['mail_smtp_secure'];

	private $mail;

	public function __construct($fromAdress, $fromName, $subject, $body = "")
	{

		$this->mail = new PHPMailer();
		$this->mail->isSMTP();	
		$this->mail->SMTPDebug = 0;
		$this->mail->Debugoutput = 'html';
		$this->mail->Host = Mailer::HOST;
		$this->mail->Port = Mailer::PORT;
		$this->mail->SMTPSecure = Mailer::SMTP_SECURE;
		$this->mail->SMTPAuth = true;
		$this->mail->Username = Mailer::USERNAME;
		$this->mail->Password = Mailer::PASSWORD;
		$this->mail->setFrom(Mailer::USERNAME, utf8_decode($fromName));
		$this->mail->addAddress(Mailer::USERNAME, Mailer::NAME_FROM);
		$this->mail->addAddress("bladellano@gmail.com", "Desenvolvedor");
		$this->mail->Subject = utf8_decode($subject);
		$this->mail->msgHTML($body);
		$this->mail->AltBody = 'This is a plain-text message body';
	}

	public function send()
	{
		return $this->mail->send();
	}
}
