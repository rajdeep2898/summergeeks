<?php
    include("set_connection.php");

    include("send_mail_visitor.php");





?>
<html>

<head>
    <title>Others</title>

    <?php include("header.php"); ?>


</head>

<body>
    <div class="card card_style ">
        <div class="card-body">
            <div class="container-fluid">
                <div style="margin-top: 100px;">
                    <p>
                        <h2>Thankyou for staying</h2>
                    </p>
                    <button class="btn btn-primary float-right" onclick="window.location.href ='index.php';" style="margin-top:10px">
                        <h3>Back to home page</h3>
                    </button>

                </div>
            </div>
        </div>
</body>