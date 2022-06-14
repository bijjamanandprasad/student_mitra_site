<?php

//Include required phpmailer files
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';
require 'phpMailer/Exception.php';

//define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create instance of phpmailer
$mail = new PHPMailer();

//Set mailer to use smtp
$mail->isSMTP();

//define smtp host
$mail->Host = "smtp.gmail.com";

//enable smtp authentication
$mail->SMTPAuth = "true";

//set type of encryption (ssl/tls)
$mail->SMTPSecure = "tls";

//set port to connect smtp
$mail->Port = "587";

//set gmail username
$mail->Username = "anandreddy0020@gmail.com";

//set gmail password
$mail->Password = "@n@nd reddy";

?>