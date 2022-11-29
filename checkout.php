<?php
require_once("helper.php");
if(!isset($_SESSION['login'])){
  header("Location: index.php");
}

if(!isset($_SESSION['barang'])){
  header("Location: homeUser.php");
}

$cart = [];
if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
    // print_r($cart);
}

if(isset($_POST["back"])){
  header("location: homeUser.php");
}

if(isset($_REQUEST["orderID"])){

  $getCount = mysqli_query($con, "select htrans_id from htrans order by htrans_id desc limit 1");
  $getCount = mysqli_fetch_array($getCount);
  if($getCount!=null){
    $temp = substr($getCount[0],2);
    $num = intval($temp);
    $num++;
  }
  else{
    $num=1;
  }
  $insert = mysqli_query($con, "insert into htrans (id_customer, harga_total,htrans_id, h_date,order_id) VALUES ('".$_SESSION["login"]."','".$_REQUEST["nominal"]."','n_".$num."','".date('Y-m-d H:i:s')."','".$_REQUEST["orderID"]."')");
  if($insert){
    echo "<script>alert('Transaksi Berhasil')</script>";
  }
  else{
    echo "<script>alert('Transaksi Tidak Berhasil')</script>";
  }
}
else{
  echo "<script>alert('Order ID Error.')</script>";
}

$temp = $_SESSION['login'];
$user = mysqli_fetch_array(mysqli_query($con, "select * from customer where id_customer = '".$temp."'"));
$IDuser = reset($user);

$idBarang = $_SESSION['barang'];
$barang = mysqli_fetch_array(mysqli_query($con, "select * from sepeda where id_sepeda = '".$idBarang."'"));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHECKOUT</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body onload="send_email()">
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

    <!-- INVOICE start -->
    <div class="container mt-2 mb-5" style='border : 1px solid black'>
        <div class="row justify-content-center" id="invoice">
            <h1 class='text-center fw-bold mb-4 mt-3'>INVOICE</h1>
            <div class="col-12">
                <?php
                    $query = mysqli_query($con, "select htrans_id from htrans order by htrans_id desc limit 1");
                    $nota = mysqli_fetch_array($query);
                    if($nota == null){
                        $nota = 'n_1';
                    }
                    else{
                        $nota = $nota[0];
                    }
                    $tanggal = date("Y-m-d");
                    $total = $_REQUEST['nominal'];
                    $id = $user['id_customer'];
                    $customer = $user['nama_customer'];
                    echo "<table style='width:30%; font-size:20px'>";
                    echo "<tr>";
                    echo "<td>Invoice</td>"."<td>:</td>". "<td>".$nota."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Tanggal</td>"."<td>:</td>"."<td>".$tanggal."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Customer</td>"."<td>:</td>"."<td>".$customer."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Grand Total</td>"."<td>:</td>"."<td>".$total."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Status</td>"."<td>:</td>"."<td>Pembayaran Berhasil</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "<br><br><br><br>";
                    echo "<table style='width:70%; margin:auto; font-size:20px' class='text-start'>";
                    echo "<tr>";
                    echo "<th>Nama Barang</th>"."<th>Jumlah</th>"."<th>Harga</th>"."<th class='ps-3'>Subtotal</th>";
                    echo "</tr>";
                    for ($i=0; $i < sizeof($cart); $i++) { 
                        if($cart[$i]['idUser'] == $temp){
                            $barang = mysqli_fetch_array(mysqli_query($con, "select * from sepeda where id_sepeda = '".$cart[$i]['idBarang']."'"));
                            $subtotal = $barang['harga_sepeda'] * $cart[$i]['jumlah'];
                            $insert = mysqli_query($con,"INSERT INTO dtrans (htrans_id, id_sepeda, jumlah, subtotal) values ('".$nota."','".$cart[$i]['idBarang']."','".$cart[$i]['jumlah']."','".$subtotal."')");
                            if($insert){
                              echo "<script>alert('Berhasil ditambahkan')</script>";
                            }
                            echo "<tr>";
                            echo "<td class='text-start'>".$barang['nama_sepeda']."</td>"."<td class='text-start'>".$cart[$i]['jumlah']."</td>"."<td class='text-start'>".$barang['harga_sepeda']."</td>"."<td class='ps-3'>".$subtotal."</td>";
                            echo "</tr>";
                        }
                    }

                    echo "<tr>";
                    echo "<td colspan='3' class='text-end'>Ongkos Kirim</td>"."<td class='ps-3'>500000</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td colspan='3' class='text-end'>Total</td>"."<td class='ps-3'>".$total."</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "<br><br><br><br>";
                    echo "<h2 class='text-center fw-bold'>Terima Kasih Telah Berbelanja di Sepedaku</h2>";
                    echo "<br>";
                    echo "<h4 class='text-center fw-bold'>Barang Akan Dikirimkan Melalui Jasa Pengiriman JNE</h4>";
                    echo "<h4 class='text-center fw-bold'>Nomor Resi : 123456789</h4>";
                    echo "<h4 class='text-center fw-bold'>Terima Kasih</h4>";
                    $id = -1;
                    for ($i=0; $i < sizeof($cart); $i++) { 
                      $tempArr = $cart[$i];
                      if($tempArr["idUser"]==$IDuser){
                        $id=$i;
                      }
                    }
                    if($id!=-1){
                      array_splice($cart, $id, 1);
                      $_SESSION['cart'] = $cart;
                    }
                ?>
            </div>
            <div style="width:100%; display:flex; flex-direction:column; align-items:center; justify-items:center;">
            <form action="" method="POST">
                <button type=submit name="back" class="text-white mb-4" style='border-radius: 5px; border:none; background-color: red;'>Back to Menu</button>
            </form>
            </div>
            <div class="emailmsg" id="emailmsg"></div>
        </div>
    </div>

    <?php
      $tanggal = date("Y-m-d");
      $total = $_REQUEST['nominal'];
      $id = $user['id_customer'];
      $customer = $user['nama_customer'];
      echo "<script>
      var total = ".$total."
      var id = '".$id."'
      var customer = '".$customer."'
      </script>";
    ?>
    <!-- Invoice end -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
      function send_email(){
        var invoice = $("#invoice").prop('outerHTML');
        var url = 'send_invoice.php?invoice=SET&total='+total+'&id'+id+'&customer'+customer;
        alert(url);
        var msg = $("#emailmsg");
        msg.innerHTML = invoice;
        r = new XMLHttpRequest();
        r.open('GET',url);
        r.onreadystatechange = function() {
                if ((this.readyState==4) && (this.status==200)) {
                    emailmsg.innerHTML = this.responseText;
                }        
            }
        r.send();
      }
    </script>
</body>
</html>