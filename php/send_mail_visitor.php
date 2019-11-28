<?php
require '../phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->Host       = "smtp.gmail.com";
$mail->Port       = 587;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";

$mail->Username   = "rajdeep@indusnet.co.in";
$mail->Password   = "wioi8982";

$sql_host_mail = "SELECT * from host_details ";
$results_host_mail = mysqli_query($con, $sql_host_mail);
$row_results_host_mail = mysqli_fetch_assoc($results_host_mail);
$host_name = $row_results_host_mail['name'];

$sql_mail = "SELECT * from visitor_details ";
$results_mail = mysqli_query($con, $sql_mail);
$row = mysqli_fetch_assoc($results_mail);
    $tomail = $row['email'];
    // echo $tomail;

$date1 = strtotime($row["check_time"]);
$checkin_time= date("H:i:s", $date1);
// echo $checkin_time;
date_default_timezone_set("Asia/Calcutta");
$checkout_time = date('H:i:s');
// echo "  ". $checkout_time;

$mail->SetFrom('rajdeep@indusnet.co.in', 'Company');
$mail->addAddress($tomail, 'Host');
$mail->addReplyto('rajdeep@indusnet.co.in');

$mail->IsHTML(true);
$mail->Subject = "Check-in details";
// $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
$message = "<p>Visiting details<p>";
$message .= "<p> 1) Name:-" . $row['name'] . "</p>";
$message .= "<p> 2) Phone Number:-" . $row['phone'] . "</p>";
$message .= "<p> 3) Check In:-" . $checkin_time . "</p>";
$message .= "<p> 4) check out:-" . $checkout_time . "</p>";
$message .= "<p> 5) Host Name:-" . $host_name . "</p>";
$message .= "<p> 6) Address:-" . $row['address']. "</p>";

$mail->Body = $message;

if (!$mail->Send()) {
    echo "Error while sending Email.";
    var_dump($mail);
} else {
    // echo "Email sent successfully";
}


