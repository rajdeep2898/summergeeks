<?php
// Authorisation details.
$username = "rajdeep@indusnet.co.in";
$hash = "a05998853cc46ea7f1d1e22cdd10b9618dac3e7da655a06306a55262acccb22f";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
    $test = "0";

$sql_mail = "SELECT * from host_details ";
$results_mail = mysqli_query($con, $sql_mail);
$row = mysqli_fetch_assoc($results_mail);
    $to_numbers = $row['phone'];


	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = $to_numbers; // A single number or a comma-seperated list of numbers
$message = " " . $name1 . " has checked-in.Additional details are\n";
$message .= " 1) Email:-" . $mail1 . "\n";
$message .= "2) Phone Number:-" . $ph_number1 . "\n";
$message .= "3) Address:-" . $address1 . "\n";

	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
    curl_close($ch);

    echo "<pre>";
    print_r($result);
    echo "hi";
