<?php 

session_start();
$email = $_SESSION['email'];
$otp = $_POST['otp'];

$con = mysqli_connect('localhost','root','','emailapp');

$query = "update logindata set verified = '1' where otp='$otp'";

$res = mysqli_query($con,$query);

$count = mysqli_num_rows(mysqli_query($con,"select * from logindata where otp = '$otp' and verified = '1'"));

if($count>0){
	echo "yes";
} else {
	echo "<p style='color:red; font-weight: bold'> You entered the wrong OTP. Try again. </p>";
}

?>