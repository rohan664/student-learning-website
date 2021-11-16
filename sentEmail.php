<?php
use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['name']) && isset($_POST['email'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	require_once "phpmailer/PHPMailer.php";
	require_once "phpmailer/SMTP.php";
	require_once "phpmailer/Exception.php";
	
	$mail = new phpmailer();
	
	$mail->isSMTP();
	$mail-> Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = "studentinsight01@gmail.com";
	$mail->Password = "Student@123";
	$mail->Port = 465;
	$mail->SMTPSecure = "ssl";
	
	
	$mail->isHTML(true);
	$mail->setFrom($email,$name);
	$mail->addAddress("studentinsight01@gmail.com");
	$mail->Subject = ("$email ($subject)");
	$mail->Body = $message;
	
	if($mail->send()){
		$status = "success";
		$response = "Email is sent !";
		
	}
	else 
	{
		$status = "failed";
		$response = "something is wrong : <br>" .$mail->ErrorInfo;
	}
	
	exit(json_encode(array("status" => $status, "response" => $response)));
	
	
} 
?>