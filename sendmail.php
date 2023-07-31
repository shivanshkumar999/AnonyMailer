<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

session_start();
$email = $_POST['email'];

// $subject = $_POST['subject'];

$subject = "hi";

$emailbody = $_POST['emailbody'];

// $msg = "
// <div style='text-align:center;border:2px solid greenyellow; padding : 10px'>
// <h1>A<u>nony<span style='color:greenyellow'>Mailer</span></u></h1>

// <div style='text-align:justify'><p style='font-size:20px'>$emailbody</p></div>

// </div>
// ";

$msg="
<h1>How does it feel to get spoofed? Nice nah..... hahahahahahahaha.

Common now, It's time to take your LOA, let's take it and get that lady slapped with a penalty</h1>";

$flag = smtp_mailer($email, $subject, $msg);

if($flag != 1){
	echo "<p style='color:red'><b> Error sending Email. </b></p>";	
} else {
	echo "<p style='color:green;'><b> Email sent successfully. </b></p>";
}



function smtp_mailer($to,$subject, $msg){
	require_once("smtp/class.phpmailer.php");
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->StartTLS = true;
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'SSL'; 
	$mail->Host = "ssl://smtp.gmail.com";
	$mail->Port = 465; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "666anonymailer999@gmail.com";
	$mail->Password = "kxwapeedoljoghol";
	$mail->SetFrom("22mca20854@cuchd.in", "police@hry.nic.in");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
}

?> 
