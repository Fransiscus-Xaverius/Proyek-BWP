<?php

require_once("helper.php"); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);
    $body =  $_POST["Body"];
    $Subject = $_POST["Subject"];
    $logoUrl = 'https://ourcycle.my.id/assets/icon.png';
    $body = $body."<br><br><br><br><hr style='border:1px solid black; width: 80%;'><br>Sincerely,<br>The Ourcycle Team.
    <img src=".$logoUrl." style='width:50px; height: 50px'>";
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.ourcycle.my.id';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'admin@ourcycle.my.id';                     //SMTP username
        $mail->Password   = 'semogatidakdijebol';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('admin@ourcycle.my.id', 'Mailer');
        $mail->addAddress('xaverius.fransiscus078@gmail.com', 'Fransiscus Xaverius');     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $Subject;
        $mail->Body    = $body;
    
        $mail->send();
        echo '<script>alert("Message has been sent")</script>';
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        *{
            margin:0px;
            padding:0px;
        }

        body{
            display:grid;
            place-items:center;
        }

        .container{
            width:40%;
            padding-top: 25px;
            padding-bottom: 25px;
            display:flex;
            justify-content: center;
            align-items:center;
            border: 1px solid black;
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <!-- Navbar Start-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid" style="margin:0px 50px">
            <a class="navbar-brand" href="index.php">
              <img src="../assets/icon.png" alt="icon" height="75px">
              <h1 class="judul">OURCYCLE</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active fw-bold fs-5" aria-current="page" href="index.php">Home</a>
                </li>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-5 fw-bold" href="trans.php">All Transaction</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-5 fw-bold" href="Announcement.php">Mailer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-5 fw-bold" href="items.php">Items</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-5 fw-bold" href="listUser.php">Users</a>
                </li>
            </ul>
            <form class="d-flex" method="post"> 
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" style="width:300px">
              <button type="submit" name="searchBtn" class="btn">
                <img src="../assets/search.png" alt="search" height="30px">
              </button>
                <li class="nav-item navbar-nav">
                  <a class="nav-link fs-5 fw-bold active" href="homeUser.php">Admin</a>
                </li>
            </form>
            </div>
        </div>
      </nav>
    <!-- Navbar END-->

    <div class="container">
        <form action="" method="POST">
            <h4>Announcement Subject</h4>
            <input type="text" name="Subject" id="Subject">
            <br>
            <br>
            <h5>Announcement</h5>
            <textarea name="Body" id="" cols="70" rows="10"></textarea>
            <br>
            <br>
            <input type="submit" class="btn-primary text-white" value="Send Announcement" name="send" style="padding: 5px; border-radius: 10px; border: none;">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>