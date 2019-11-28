<?php
session_start();
include("set_connection.php");
if (isset($_SESSION['var'])) {
    // echo "1";
    if ($_SESSION["var"] == 0) {
        // echo $_SESSION["user_name"];
        header('location:accountant-account.php');
    }
    if ($_SESSION["var"] == 1) {
        header('location:vendor-account.php');
    }
}


if (isset($_POST['Submit1'])) {


    $name1 = trim($_POST["user"]);
    $mail1 = trim($_POST["mail"]);
    $ph_number1 = $_POST["ph_number"];
    $address1 = $_POST["address"];

    if ($name1 == "") {
        $errorMsg =  "error : You did not enter a user name.";
        $code = "1";
    } elseif ($mail1 == "") {
        $errorMsg =  "error : Please enter Mail.";
        $code = "2";
    } elseif ($ph_number1 == "") {
        $errorMsg =  "error : Please enter Phone number.";
        $code = "3";
    } elseif ($address1 == "") {
        $errorMsg =  "error : Please enter addess.";
        $code = "4";
    } elseif ((strlen($ph_number1) < 10 || strlen($ph_number1) > 11) && $ph_number1 != "") {
        $errorMsg =  "error :Please enter a valid Contact No.";
        $code = "3";
        // } elseif ($poc_mail == "") {
        //     $errorMsg =  "error : Please enter E-mail.";
        //     $code = "10";
    } elseif ((!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $mail1)) && $mail1 != "") {
        $errorMsg = 'error : You did not enter a valid email.';
        $code = "2";
    }else {
        include("send_mail.php");
        include("send_sms.php");
        $sql = 'DELETE FROM visitor_details';
        $query_sql = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on data Deletion<br/>" . mysqli_error($con));


        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $sql_insert = "INSERT INTO visitor_details(name,email ,phone,address,check_time)
            VALUES('$name1','$mail1', '$ph_number1','$address1','$date')";
        $query_sql_insert = mysqli_query($con, $sql_insert) or die("<b>Error:</b> Problem on data Insertion<br/>" . mysqli_error($con));

        // header("Location: checkout_page.php");
    }
}
if (isset($_POST['Submit2'])) {


    $name2 = trim($_POST["user"]);
    $mail2 = trim($_POST["mail"]);
    $ph_number2 = $_POST["ph_number"];


    if ($name2 == "") {
        $errorMsg =  "error : You did not enter a user name.";
        $code = "5";
    } elseif ($mail2 == "") {
        $errorMsg =  "error : Please enter mail.";
        $code = "6";
    } elseif ($ph_number2 == "") {
        $errorMsg =  "error : Please enter Phone number.";
        $code = "7";
    } elseif ((strlen($ph_number2) < 10 || strlen($ph_number2) > 11) && $ph_number2 != "") {
        $errorMsg =  "error :Please enter a valid Contact No.";
        $code = "7";
    } elseif ((!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $mail2)) && $mail2 != "") {
        $errorMsg = 'error : You did not enter a valid email.';
        $code = "6";
    }else {
        // session_start();
        // echo "1";

        $sql = 'DELETE FROM host_details';
        $query_sql = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on data Deletion<br/>" . mysqli_error($con));



        // header('location:login.php');
        include("set_connection.php");



        $sql_insert = "INSERT INTO host_details(name,email ,phone)
            VALUES('$name2','$mail2', '$ph_number2')";
        $query_sql_insert = mysqli_query($con, $sql_insert) or die("<b>Error:</b> Problem on data Insertion<br/>" . mysqli_error($con));
    }
}
?>
<html>

<head>

    <title>hotel booking</title>
    <?php include("header.php"); ?>

</head>

<body>
    <p id="demo"></p>
    <div class="container-fluid">

        <?php if (isset($errorMsg)) {
            echo "<p align=\"center\" class='message'style='color:red;'>" . $errorMsg . "</p>";
        } ?>
        <div class="login-box">
            <div class="row">
                <div class="col-md-6 login-left">
                    <h2>Visitor Login</h2>
                    <form action="" id="userresignation_form1" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" id="user" class="form-control" value="<?php if (isset($name1)) {
    echo $name1;
                                                                                                    } ?>" <?php if (isset($code) && $code == 1) {
                                                                                                                echo "style='  border: 1px solid red !important ;'";
                                                                                                            } ?>>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="mail" id="mail" class="form-control" value="<?php if (isset($mail1)) {
                                                                                                        echo $mail1;
                                                                                                    } ?>" <?php if (isset($code) && $code == 2) {
                                                                                                                echo "style='  border: 1px solid red !important ;'";
                                                                                                            } ?>>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="ph_number" id="ph_number" class="form-control" value="<?php if (isset($ph_number1)) {
                                                                                                                    echo $ph_number1;
                                                                                                                } ?>" <?php if (isset($code) && $code == 3) {
                                                                                                                            echo "style='  border: 1px solid red !important ;'";
                                                                                                                        } ?>>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="<?php if (isset($address1)) {
                                                                                                            echo $address1;
                                                                                                        } ?>" <?php if (isset($code) && $code == 4) {
                                                                                                                    echo "style='  border: 1px solid red !important ;'";
                                                                                                                } ?>>
                        </div>
                        <button type="submit" name="Submit1" value="Submit" class="btn btn-primary">Check-in</button>
                    </form>
                </div>
                <!-- <div class="mar">

            </div> -->

                <div class="col-md-6 login-right">
                    <h2>Host Details</h2>
                    <form action="" id="userresignation_form2" method="post">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="user" id="user" class="form-control" value="<?php if (isset($name2)) {
    echo $name2;

                                                                                                    } ?>" <?php if (isset($code) && $code == 5) {
                                                                                                                echo "style='  border: 1px solid red !important ;'";
                                                                                                            } ?>>
                        </div>
                        <div class=" form-group">
                            <label>E-mail:</label>
                            <input type="email" name="mail" id="mail" class="form-control" value="<?php if (isset($mail2)) {
                                                                                                        echo $mail2;
                                                                                                    } ?>" <?php if (isset($code) && $code == 6) {
                                                                                                                echo "style='  border: 1px solid red !important ;'";
                                                                                                            } ?>>
                        </div>
                        <div class=" form-group">
                            <label>Phone Number:</label>
                            <input type="number" name="ph_number" id="ph_number" class="form-control" value="<?php if (isset($ph_number2)) {
                                                                                                                    echo $ph_number2;
                                                                                                                } ?>" <?php if (isset($code) && $code == 7) {
                                                                                                                            echo "style='  border: 1px solid red !important ;'";
                                                                                                                        } ?>>
                        </div>

                        <button type="submit" name="Submit2" value="Submit2" onclick="myFunction()" class="btn btn-primary">Enter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function myFunction() {
        confirm("Enter details for Host");
    }
</script>

<script type="text/javascript" src="javafile.js">
</script>

</html>