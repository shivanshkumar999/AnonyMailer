<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

session_start();
$email = $_POST['email'];
$_SESSION['email'] = $email;
$subject = "Email Verification";
	// $subject = "Warning!!!!";
$otp = rand(111111,999999);
$msg = "
<div style='text-align:center; border:2px solid greenyellow'>
<h1 id='logo'>A<u>nony<span style='color:greenyellow'>Mailer</span></u></h1>

<p><b>Enter the following OTP on the website <br> to verify your account. </b></p>

<h1 style='color:white; background-color:black; padding:10px; margin:10px; width:25%; display:block; margin-left:auto; margin-right:auto'>$otp</h1><br>
</div>
";




	// $msg = "<p>Hello Shivansh (UID - 22MCA20854) <br> We as university administration feel very disappointed to have such students like you. You have been served against a complaint for harrassing and abusing a girl named Ruchika. You are kindly advised to visit the Director's office (DSW) on Monday else strict actions could be taken against you. Since, the University's Administration has evaluated all the proofs and all the proofs are against you. So, currently you are being suspended from sitting in the placements for one week. You will be ineligible to sit for the companies coming this week. You may sit for the companies provided earlier than this date. If you don't show up on monday this punishment could be extended.<br>
	// 	Regards<br>
	// 	Additional Director<br>
	// 	UIC, Chandigarh university
	// </p>";
	// $msg = "Han bhai, mail to check kr hi lia hoga tune. Kasa lgra hai placement s debarr hoke?? Maja aa rha hai ya ni ? Bola tha na tujhe maine ki aaj ki rat dekh tere sath kya kruga. Dekh abhi to ek hafte k liye debarr kraya hai aur abhi or b ho skta hai agr monday ni gya to. Dekh police s to bach jayga idhr s kaise bchega. Idhr to mai openly auga aur dekh tujhe kase fsauga. Jaldi se 20 hazar rupaye mere kahe huye account mai dal de bach jayga. Abhi to tujhse bade pase lene hai beta. Tune humare bade pase niklvaye hai. Agr bachna chahta hai to is reply p 'ok' reply krde vrna kl subh tk tera ek hafte ka debarr ek mahine ka krva duga. mjhe pkdne ya pkdvane ki koshish mt krna or na police ko btana vrna acha ni hoga. jaldi reply krde agar bchna hai to. <br> tera ek dushman <br> s ";

$con = mysqli_connect('localhost', 'root', '', 'emailapp');

$res = mysqli_query($con,"insert into logindata values('$email','$otp','0')");

$count = mysqli_num_rows(mysqli_query($con, "select * from logindata where email = '$email'")); 

if($count>0){
	smtp_mailer($email, $subject, $msg);
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
	$mail->SetFrom("hod.uic@cumail.in");
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
