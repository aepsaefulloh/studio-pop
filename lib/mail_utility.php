<?php
require_once ROOT_PATH.'/lib/PHPMailer/PHPMailerAutoload.php';

function sendmail($objItem){

$mail = new PHPMailer;

$mail->SMTPDebug = false;                   // Enable verbose debug output

$mail->isSMTP();                        // Set mailer to use SMTP
$mail->Host = SMTP_HOST;  				// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                 // Enable SMTP authentication
$mail->Username = SMTP_USER;            // SMTP username
$mail->Password = SMTP_PASS;            // SMTP password
$mail->SMTPSecure = 'TLS';              // Enable TLS encryption, `ssl` also accepted
$mail->Port = SMTP_PORT;                // TCP port to connect to

$mail->setFrom(SMTP_USER, SENDER_NAME);
$mailto=explode(";",$objItem['MAILTO']);

foreach($mailto as $address){
	$mail->addAddress($address, $objItem['NAME']);     // Add a recipient
}

$mail->addReplyTo(SMTP_USER, SENDER_NAME);

if(isset($objItem['ATTACH'])&& $objItem['ATTACH']!=''){
	$mail->addAttachment($objItem['ATTACH']);         // Add attachments
}
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $objItem['SUBJECT'];
$mail->Body    = $objItem['BODY'];
$mail->AltBody = '';


$status=false;
if(!$mail->send()) {
    //echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $status=true;
}

return $status;

}


?>
