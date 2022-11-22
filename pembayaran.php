<?php
    require_once dirname(__FILE__) . '/Midtrans.php';

    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-_VkLv7E_ab9hH4p3yOnyQ73l';
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;
    
    $params = array(
        'transaction_details' => array(
            'order_id' => rand(),
            'gross_amount' => 10000,
        ),
        'customer_details' => array(
            'first_name' => 'Kurasa',
            'last_name' => 'Takada',
            'email' => 'YONDAKTAUKOKTANYASAYA@example.com',
            'phone' => '08111222333',
        ),
    );
    
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    $snapURL = \Midtrans\Snap::getSnapUrl($params);
    header("Location: ".$snapURL);
    echo $snapToken;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>