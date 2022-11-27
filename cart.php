<?php
require_once("helper.php");
require_once dirname(__FILE__) . '/Midtrans.php';

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-_VkLv7E_ab9hH4p3yOnyQ73l';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

if(!isset($_SESSION['login'])){
  header("Location: index.php");
}
if(!isset($_SESSION['barang'])){
  header("Location: homeUser.php");
}
$temp = $_SESSION['login'];
$user = mysqli_fetch_array(mysqli_query($con, "select * from customer where id_customer = '".$temp."'"));

$cart = [];
if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
}
  $ft =0;
  $banyakCart = 0;
  for ($i=0; $i < sizeof($cart); $i++) { 
    if($cart[$i]['idUser'] == $temp){
        $banyakCart++;
        $barang = mysqli_fetch_array(mysqli_query($con, "select * from sepeda where id_sepeda = '".$cart[$i]['idBarang']."'"));
        $total = $barang['harga_sepeda'] * $cart[$i]['jumlah'];
        $t = $barang['harga_sepeda'] * $cart[$i]['jumlah'];
        $ft+=$t;
      }
  }

  $order_id = rand();

  if($banyakCart > 0){
    $params = array(
      'transaction_details' => array(
          'order_id' => $order_id,
          'gross_amount' => $ft,
      ),
      'customer_details' => array(
          'first_name' => $user['nama_customer'],
          'email' => $user['email_customer'],
          'phone' => $user['noTelp_customer'],
      ),
    );
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    // $payment = \Midtrans\Transaction::status($order_id);
    echo "<script>
        var token = '".$snapToken."';
        var grandTotal = ".$ft.";
        var orderID = ".$order_id.";
    </script>";
  }
  else{
    echo "<script>alert('Keranjang Kosong')</script>";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-gW3E2kSrL-aYdLGv"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
  </head>
<body onload="loadAjax()">
    <!-- Navbar Start-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid" style="margin:0px 50px">
            <a class="navbar-brand" href="homeUser.php">
              <img src="assets/icon.png" alt="icon" height="75px">
              <h1 class="judul">OURCYCLE</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active fw-bold fs-5" aria-current="page" href="homeUser.php">Home</a>
                </li>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-5 fw-bold" href="#">Transaction</a>
                </li>
            </ul>
            <form class="d-flex" method="post"> 
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" style="width:300px">
              <button type="submit" name="searchBtn" class="btn">
                <img src="assets/search.png" alt="search" height="30px">
              </button>
                <li class="nav-item navbar-nav">
                  <a class="nav-link fs-5 fw-bold active" href="homeUser.php"><?php echo $user['nama_customer']?></a>
                </li>
                <li class="nav-item navbar-nav">
                  <a class="nav-link fs-5 fw-bold active" href="cart.php">Cart</a>
                </li>
                <li class="nav-item navbar-nav">
                  <a class="nav-link fs-5 fw-bold active" href="index.php">Logout</a>
                </li>
            </form>
            </div>
        </div>
      </nav>
    <!-- Navbar END-->

    <!-- Daftar Barang start-->
    <div class="container">
        <div class="row">
            <div class="col-8">
              <div id="carts">

              </div>
            </div>
            <div class="col-4">
                <div class="jumlahCart">

                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Barang end-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script type="text/javascript">

      function loadAjax(){
        cart = document.getElementById('carts');
        loadCart();
        jumlahCart();
      }

      function loadCart(){
        user = "<?php echo $temp;?>";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            cart.innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", `loadCart.php?id=${user}`, true);
        xhttp.send();
      }

      function ajax_func(method, url, callback, data="") {
        r = new XMLHttpRequest();
        r.onreadystatechange = function() {
          callback(this);
        }
        r.open(method, url);
        if(method.toLowerCase() == "post") r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        r.send(data);
      }

      function jumlahCart(){
        user = "<?php echo $temp;?>";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            cart.innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", `totalCart.php?id=${user}`, true);
        xhttp.send();
      }

      function refresh(xhttp){
        if ((xhttp.readyState==4) && (xhttp.status==200)) {
          loadCart();
          jumlahCart();
        }
      }

      function tambah(obj){
        update_id = obj.value;
        jumlah = obj.getAttribute("jumlah");
        ajax_func('GET', `updateCart.php?update_id=${update_id}&jumlah=${jumlah}`, refresh);
      }

      function hapus(obj){
        update_id = obj.value;
        ajax_func('GET', `deleteCart.php?update_id=${update_id}`, refresh);
      }

      function ajax_payment(grandtotal, ){

      }
    
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('checkout');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay(token, {
          onSuccess: function(result){
            alert("payment success!"); console.log(result);
            window.location.href = "checkout.php?nominal="+grandTotal+"&orderID="+orderID;
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