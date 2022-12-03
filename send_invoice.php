<?php

require_once("helper.php"); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'admin/Exception.php';
require 'admin/PHPMailer.php';
require 'admin/SMTP.php';

$header = "<!DOCTYPE html>
<html>
  <head>
    <title>Hello, World!</title>
  </head>
  <body>";

$footer = "  </body>
</html>";

if(isset($_GET["invoice"])){
    $cart = $_SESSION['cart'];

    $invoice = '<div class="row justify-content-center" id="invoice">
            <h1 class="text-center fw-bold mb-4 mt-3">INVOICE</h1>
            <div class="col-12">';
    $query = mysqli_query($con, "select htrans_id from htrans order by htrans_id desc limit 1");
    $nota = mysqli_fetch_array($query);
    if($nota == null){
        $nota = 'n_1';
    }
    else{
        $nota = $nota[0];
    }
    $tanggal = date("Y-m-d");
    $total = $_POST['nominal'];
    $id = $_POST['id_customer'];
    $customer = $_POST['nama_customer'];
    $invoice = $invoice."<table style='width:30%; font-size:20px'>";
    $invoice = $invoice."<tr>";
    $invoice = $invoice."<td>Invoice</td>"."<td>:</td>". "<td>".$nota."</td>";
    $invoice = $invoice."</tr>";
    $invoice = $invoice."<tr>";
    $invoice = $invoice."<td>Tanggal</td>"."<td>:</td>"."<td>".$tanggal."</td>";
    $invoice = $invoice."</tr>";
    $invoice = $invoice."<tr>";
    $invoice = $invoice."<td>Customer</td>"."<td>:</td>"."<td>".$customer."</td>";
    $invoice = $invoice."</tr>";
    $invoice = $invoice."<tr>";
    $invoice = $invoice."<td>Grand Total</td>"."<td>:</td>"."<td>".$total."</td>";
    $invoice = $invoice."</tr>";
    $invoice = $invoice."<tr>";
    $invoice = $invoice."<td>Status</td>"."<td>:</td>"."<td>Pembayaran Berhasil</td>";
    $invoice = $invoice."</tr>";
    $invoice = $invoice."</table>";
    $invoice = $invoice."<br><br><br><br>";
    $invoice = $invoice."<table style='width:70%; margin:auto; font-size:20px' class='text-start'>";
    $invoice = $invoice."<tr>";
    $invoice = $invoice."<th>Nama Barang</th>"."<th>Jumlah</th>"."<th>Harga</th>"."<th class='ps-3'>Subtotal</th>";
    $invoice = $invoice."</tr>";
    for ($i=0; $i < sizeof($cart); $i++) { 
        if($cart[$i]['idUser'] == $temp){
            $barang = mysqli_fetch_array(mysqli_query($con, "select * from sepeda where id_sepeda = '".$cart[$i]['idBarang']."'"));
            $subtotal = $barang['harga_sepeda'] * $cart[$i]['jumlah'];
            $insert = mysqli_query($con,"INSERT INTO dtrans (htrans_id, id_sepeda, jumlah, subtotal) values ('".$nota."','".$cart[$i]['idBarang']."','".$cart[$i]['jumlah']."','".$subtotal."')");
            $invoice = $invoice."<tr>";
            $invoice = $invoice."<td class='text-start'>".$barang['nama_sepeda']."</td>"."<td class='text-start'>".$cart[$i]['jumlah']."</td>"."<td class='text-start'>".$barang['harga_sepeda']."</td>"."<td class='ps-3'>".$subtotal."</td>";
            $invoice = $invoice."</tr>";
        }
    }

                    $invoice = $invoice."<tr>";
                    $invoice = $invoice."<td colspan='3' class='text-end'>Ongkos Kirim</td>"."<td class='ps-3'>500000</td>";
                    $invoice = $invoice."</tr>";
                    $invoice = $invoice."<tr>";
                    $invoice = $invoice."<td colspan='3' class='text-end'>Total</td>"."<td class='ps-3'>".$total."</td>";
                    $invoice = $invoice."</tr>";
                    $invoice = $invoice."</table>";
                    $invoice = $invoice."<br><br><br><br>";
                    $invoice = $invoice."<h2 class='text-center fw-bold'>Terima Kasih Telah Berbelanja di Sepedaku</h2>";
                    $invoice = $invoice."<br>";
                    $invoice = $invoice."<h4 class='text-center fw-bold'>Barang Akan Dikirimkan Melalui Jasa Pengiriman JNE</h4>";
                    $invoice = $invoice."<h4 class='text-center fw-bold'>Nomor Resi : 123456789</h4>";
                    $invoice = $invoice."<h4 class='text-center fw-bold'>Terima Kasih</h4>";
                    $invoice = $invoice.'</div></div>';
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
        $mail->addAddress('xaverius.fransiscus078@gmail.com', 'Fransiscus Xaverius');     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Purchase Invoice";
        $mail->Body    = $invoice;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

?>