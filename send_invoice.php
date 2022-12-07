<?php

require_once("helper.php"); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'admin/Exception.php';
require 'admin/PHPMailer.php';
require 'admin/SMTP.php';

if(isset($_GET["total"])){
  $user = mysqli_query($con, "SELECT * from customer where id_customer='".$_SESSION["login"] ."'");
  $user = $user->fetch_assoc();
  //print_r($_SESSION['cart']);
  $invoice = "<div><h1>Thank you for your purchase!</h1><br><h2>Here's your invoice!<br>Total: Rp.".number_format($_GET['total'], 0, ',', '.')."</h2></div>";
  $invoice = $invoice."<hr style='border:1px solid black; width: 90%;'><br>";
  for ($i=0; $i < count($_SESSION['cart']); $i++) { 
    $getHarga = mysqli_query($con, "SELECT * from sepeda where id_sepeda = '".$_SESSION['cart'][$i]['idBarang']."'");
      $getHarga = $getHarga->fetch_assoc();
      $invoice = $invoice."<h3>".$getHarga['nama_sepeda']." x ".$_SESSION['cart'][$i]['jumlah']."<br>Rp. ".number_format(($_SESSION['cart'][$i]['jumlah']*$getHarga['harga_sepeda']),0, ',', '.')."<h3><br>";
  }
  //echo $invoice;
  $logoUrl = 'https://ourcycle.my.id/assets/icon.png';
  $invoice = $invoice."<br><br><br><br><hr style='border:1px solid black; width: 90%;'><br>Sincerely,<br>The Ourcycle Team.
  <img src=".$logoUrl." style='width:50px; height: 50px'>";
  //echo $invoice;  
  $total = $_GET['total'];
    $mail = new PHPMailer(true);
    $logoUrl = 'https://ourcycle.my.id/assets/icon.png';
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
        $mail->addAddress($user['email_customer'],$user['nama_customer']);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Purchase Invoice";
        $mail->Body    = strval($invoice);
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

?>