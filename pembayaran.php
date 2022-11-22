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
    // $snapURL = \Midtrans\Snap::getSnapUrl($params);
    // header("Location: ".$snapURL);
    // echo $snapToken;

    echo "<script>
        var token = '".$snapToken."';
    </script>"


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-gW3E2kSrL-aYdLGv"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>
<body>
<button id="pay-button">Pay!</button>
<script type="text/javascript">
    
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay(token, {
          onSuccess: function(result){
            alert("payment success!"); console.log(result);
            window.location.href = "http://stackoverflow.com";
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>
</body>
</html>