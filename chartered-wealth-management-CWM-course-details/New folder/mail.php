<?php
error_reporting(E_ALL);

require_once('class.phpmailer.php');
include("class.smtp.php");

   /* for lead  Lsq cloased 15-01-2024*/
        /*include('leadsquared.php');
        define('LSQ_NAME', 'nexgen');
        define('LSQ_ACCESSKEY', 'u$r5bd4ba836950c37691fe55b3e673f493');
        define('LSQ_SECRETKEY', 'e9f02ad6e003c30b4307c7a2bf22003c46e659a0');
        $leadsquared = new Leadsquared_Api();
		*/
        $Website= "aafmindia.co.in";
        $Source= "https://www.aafmindia.co.in/chartered-wealth-management-CWM-course-details/";
        
             /* for lead */
//$from_page=getenv('HTTP_REFERER');

if(isset($_GET['submit']))
{

	$utmSource = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
    $utmMedium = isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '';
    $utmCampaign = isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '';
    $utmTerm = isset($_GET['utm_term']) ? $_GET['utm_term'] : '';
    $utmContent = isset($_GET['utm_content']) ? $_GET['utm_content'] : '';

	$name 	= $_GET["name"];
  $email	= $_GET["email"]; 
	$phone 	= $_GET["mobile"];
	$remark 	= $_GET["pincode"];

 

	$subject = $name." has Submitted request in chartered-wealth-management-CWM-course-details";
	$body="<html><head><title>Flabindia Form</title></head><body>
		<table width='450'border='1' rules='none' frame='box'>
		<tr bgcolor='#b0e1c6'><td align='center' colspan='2'>chartered-wealth-management-CWM-course-details</td></tr>
		<tr><td>Name</td><td>".$name."</td></tr>
		<tr><td>Email</td><td>".$email."</td></tr>
		<tr><td>Contact No</td><td>".$phone."</td></tr>
		<tr><td>Remark</td><td>".$remark."</td></tr>
		
		<tr><td>From URL</td><td>".$Source."</td></tr>
		
		<tr><td>utmSource</td><td>".$utmSource ."</td></tr>
		<tr><td>utmMedium </td><td>".$utmMedium."</td></tr>
		<tr><td>utmCampaign</td><td>".$utmCampaign."</td></tr>
		<tr><td>utmContent</td><td>".$utmContent."</td></tr>
		<tr><td>utmTerm</td><td>".$utmTerm."</td></tr>
		<tr bgcolor='#b0e1c6'><td colspan='2' align='center'>Thanks</td></tr>
		</table></body></html>";


	//$msg='<div class="alert_success" >Thanks for your queries, our team will get back to you.</div>';
	
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 0;

	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = '';
	$mail->SMTPAuth = true;
	$mail->Username = "feedback@aafmindia.co.in";
	$mail->Password = "admin_123";
	$mail->setFrom('feedback@aafmindia.co.in');
	
	$mail->addAddress('info@aafmindia.co.in', 'Deepak.'); 	
  $mail->addCC('dimple@aafmindia.co.in','Dimple');
   //$mail->addCC('sarvesh@aafm.co.in','Sarvesh');
   //$mail->AddCC('memberships@aafm.club');
  //$mail->addAddress('technicalsupport1@aafm.co.in');
      //$mail->addAddress('yadavadarshkumar@gmail.com');

	$mail->Subject = $name." has Submitted request in chartered-wealth-management-CWM-course-details";
	$mail->Body = $body;

	//$mail->Send();
	//if (!$mail->send()) {echo "Mailer Error: " . $mail->ErrorInfo;}
	//else {echo $msg;}
	if ($mail->send()) {//echo $msg; 
	
	


			//echo "Data successfully inserted into the database table ...";
			header("location:Thank-You.html");
	       /* $lead_data = '{
"FirstName":"'.$name.'",
"EmailAddress":"'.$email.'",
"Phone":"'.$phone.'",
 "SourceCampaign":"'.$Source_Campaign.'",
 "Source":"'.$Source.'"
}';
$res= $leadsquared->capture_lead($lead_data);
*/

$apiUrl = 'https://thirdpartyapi.extraaedge.com/api/SaveRequest';

$apiKey = 'AAFMINDIASALES-25-07-2023'; // Replace with your actual API key



// Prepare JSON data to send to the API

$postData = [
	'AuthToken'     => $apiKey,
	"Source"        => "aafmindiasales",
	'FirstName'     => $name,
	'Email'         => $email,
	'MobileNumber'  => $phone,
	"leadSource"    => $Website,
	"leadCampaign"  => $utmCampaign,
	"leadChannel"   => $utmMedium,
	"field9"        => $utmTerm,
	"field10"       => $utmContent,
	"field15"       => $utmSource,
	"EducationalQualification" => $Source	

];




// Initialize cURL session

$ch = curl_init($apiUrl);



// Set cURL options

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, [

'Content-Type: application/json',

'Content-Length: ' . strlen(json_encode($postData))

]);



// Execute cURL request and get response

$response = curl_exec($ch);



// Check for errors

if ($response === false) {

echo 'cURL error: ' . curl_error($ch);

} else {

// Decode the JSON response

$responseData = json_decode($response, true);



// Display the API response


}



// Close cURL session

curl_close($ch);


		
	}
  else {
  echo "Mail Is Not Send";
  
  }
	
	
//}
//}

}

elseif(isset($_GET['submitpop']))		
{

	$utmSource = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
    $utmMedium = isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '';
    $utmCampaign = isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '';
    $utmTerm = isset($_GET['utm_term']) ? $_GET['utm_term'] : '';
    $utmContent = isset($_GET['utm_content']) ? $_GET['utm_content'] : '';

	$name 	= $_GET["f_name"];
	$phone 	= $_GET["f_phone"];
	$msg 	= $_GET["f_msg"];
	$mcity 	= $_GET["f_city"];
	$email	= $_GET["f_email"];


	$subject = $name." has Submitted request in chartered-wealth-management-CWM-course-details";
	$body="<html><head><title>Flabindia Form</title></head><body>
		<table width='450'border='1' rules='none' frame='box'>
		<tr bgcolor='#b0e1c6'><td align='center' colspan='2'>chartered-wealth-management-CWM-course-details</td></tr>
		<tr><td>Name</td><td>".$name."</td></tr>
		<tr><td>Email</td><td>".$email."</td></tr>
		<tr><td>Contact No</td><td>".$phone."</td></tr>
		<tr><td>Remark</td><td>".$remark."</td></tr>
		
		<tr><td>From URL</td><td>".$Source."</td></tr>
		
		<tr><td>utmSource</td><td>".$utmSource ."</td></tr>
		<tr><td>utmMedium </td><td>".$utmMedium."</td></tr>
		<tr><td>utmCampaign</td><td>".$utmCampaign."</td></tr>
		<tr><td>utmContent</td><td>".$utmContent."</td></tr>
		<tr><td>utmTerm</td><td>".$utmTerm."</td></tr>
		<tr bgcolor='#b0e1c6'><td colspan='2' align='center'>Thanks</td></tr>
		</table></body></html>";


	//$msg='<div class="alert_success" >Thanks for your queries, our team will get back to you.</div>';
	
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 0;

	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = '';
	$mail->SMTPAuth = true;
	$mail->Username = "feedback@aafmindia.co.in";
	$mail->Password = "admin_123";
	$mail->setFrom('feedback@aafmindia.co.in');
	
	$mail->addAddress('info@aafmindia.co.in', 'Deepak.'); 	
  $mail->addCC('dimple@aafmindia.co.in','Dimple');
   //$mail->addCC('sarvesh@aafm.co.in','Sarvesh');
   //$mail->AddCC('memberships@aafm.club');
     //$mail->addAddress('technicalsupport1@aafm.co.in');
      //$mail->addAddress('yadavadarshkumar@gmail.com');

	$mail->Subject = $name." has Submitted request in chartered-wealth-management-CWM-course-details";
	$mail->Body = $body;

	//$mail->Send();
	//if (!$mail->send()) {echo "Mailer Error: " . $mail->ErrorInfo;}
	//else {echo $msg;}
	if ($mail->send()) {//echo $msg; 
	
	


			//echo "Data successfully inserted into the database table ...";
			header("location:images/CWM Brochure.pdf");
	        /*$lead_data = '{
"FirstName":"'.$name.'",
"EmailAddress":"'.$email.'",
"Phone":"'.$phone.'",
 "SourceCampaign":"'.$Source_Campaign.'",
 "Source":"'.$Source.'"
}';
$res= $leadsquared->capture_lead($lead_data);
*/
$apiUrl = 'https://thirdpartyapi.extraaedge.com/api/SaveRequest';

$apiKey = 'AAFMINDIASALES-25-07-2023'; // Replace with your actual API key



// Prepare JSON data to send to the API
$postData = [
	'AuthToken'     => $apiKey,
	"Source"        => "aafmindiasales",
	'FirstName'     => $name,
	'Email'         => $email,
	'MobileNumber'  => $phone,
	"leadSource"    => $Website,
	"leadCampaign"  => $utmCampaign,
	"leadChannel"   => $utmMedium,
	"field9"        => $utmTerm,
	"field10"       => $utmContent,
	"field15"       => $utmSource,
	"EducationalQualification" => $Source

];



// Initialize cURL session

$ch = curl_init($apiUrl);



// Set cURL options

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, [

'Content-Type: application/json',

'Content-Length: ' . strlen(json_encode($postData))

]);



// Execute cURL request and get response

$response = curl_exec($ch);



// Check for errors

if ($response === false) {

echo 'cURL error: ' . curl_error($ch);

} else {

// Decode the JSON response

$responseData = json_decode($response, true);



// Display the API response



}



// Close cURL session

curl_close($ch);


		
	}
  else {
  echo "Mail Is Not Send";
  
  }
	
	
}

?>