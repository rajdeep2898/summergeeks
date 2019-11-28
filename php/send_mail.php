<?php
require '../phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->Host       = "smtp.gmail.com";
$mail->Port       = 587;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";

$mail->Username   = "rajdeep@indusnet.co.in";
$mail->Password   = "wioi8982";

$sql_mail = "SELECT * from host_details ";
$results_mail = mysqli_query($con, $sql_mail);
while ($row = mysqli_fetch_assoc($results_mail)) {
    $tomail=$row['email'];

}
$mail->SetFrom('rajdeep@indusnet.co.in', 'Company');
$mail->addAddress($tomail, 'Host');
$mail->addReplyto('rajdeep@indusnet.co.in');

$mail->IsHTML(true);
$mail->Subject = "Check-in details";
// $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
$message="<p>".$name1." has checked-in.Additional details are<p>";
$message.="<p> 1) Email:-".$mail1."</p>";
$message .= "<p> 2) Phone Number:-" . $ph_number1 . "</p>";
$message .= "<p> 3) Address:-" . $address1 . "</p>";

$mail->Body = $message;

// $mail->IsSMTP();



// $mail->IsHTML(true);


// $mail->MsgHTML($content);
if (!$mail->Send()) {
    echo "Error while sending Email.";
    var_dump($mail);
} else {
    echo "Email sent successfully";
}








// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer-master/src/Exception.php';
// require 'PHPMailer-master/src/PHPMailer.php';
// require 'PHPMailer-master/src/SMTP.php';

// $mail = new PHPMailer();
// $mail->IsSMTP();
// $mail->Mailer = "smtp";

// $mail->SMTPDebug  = 1;
// $mail->SMTPAuth   = TRUE;
// $mail->SMTPSecure = "tls";
// $mail->Port       = 587;
// $mail->Host       = "smtp.gmail.com";
// $mail->Username   = "rajdeep@indusnet.co.in";
// $mail->Password   = "wioi8982";

// $mail->IsHTML(true);
// $mail->AddAddress('rajdeep2898@gamil.com', 'Rajdeep Datta');
// $mail->SetFrom('rajdeep@indusnet.co.in', 'Indusnet');
// // $mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
// // $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
// $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
// $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";

// $mail->MsgHTML($content);
// if (!$mail->Send()) {
//     echo "Error while sending Email.";
//     var_dump($mail);
// } else {
//     echo "Email sent successfully";
// }
// // try {
//     $mail->isSMTP();
//     $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
//     $mail->SMTPAuth = true;
//     $mail->Username = 'rajdeep@indusnet.in';   //username
//     $mail->Password = 'wioi8982';   //password
//     $mail->SMTPSecure = 'ssl';
//     $mail->Port = 465;                    //smtp port
  
//     $mail->setFrom('rajdeep@indusnet.in', 'INdusnet');
//     $mail->addAddress('rajdeep2898@gamil.com', 'Rajdeep Datta');
 
//     // $mail->addAttachment(__DIR__ . '/attachment1.png');
//     // $mail->addAttachment(__DIR__ . '/attachment2.png');
 
//     $mail->isHTML(true);
//     $mail->Subject = 'Email Subject';
//     $mail->Body    = '<b>Email Body</b>';
 
//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
// }
