<?php
if($_REQUEST)
{

// 	echo '<pre>';
// 	print_r($_POST);die;

$to="info@aafmindia.co.in, memberships@aafm.club";
$From="info@aafmindia.co.in";

$subject="16 September Page";
$body ="name : ".$_POST['name'] ."\r\n";
$body.="email : ".$_POST['email'] ."\r\n";
$body.="phone : ".$_POST['phone'] ."\r\n";
$body.="message : ".$_POST['message'] ."\r\n";

$header = "From: ".$From."\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/plain; charset=utf-8\r\n"; 
$header.= "X-Priority: 1\r\n"; 
$send_contact = mail($to,$subject,$body,$header);
$err_msg="Enquiry sends successfully";

//$send_contact=mail("sharadchandra1984@gmail.com", $subject,$body,$headers);
if($send_contact)
{
	echo "<center><strong>Thank you for your enquiry!<br /><br />We will get back to you within 24 Hrs.<br /><br />
	Redirecting.....</strong><br /><br />
	<img src='loading-spiral.gif'>
	</center><META HTTP-EQUIV='Refresh'
	CONTENT='3; URL=https://smartpay.easebuzz.in/74328/-aafmindia-workshop/'>";
}
else 
{
	echo"ERROR";
}
}
?>