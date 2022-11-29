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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
</body>
</html>