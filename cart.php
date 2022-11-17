<?php

require_once("helper.php");
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

if(isset($_POST["hapus"])){
    $id = $_POST["idCart"];
    echo "<script>alert(".$id.")</script>";
    array_splice($cart, $id, 1);
    $_SESSION['cart'] = $cart;
    header("Location: cart.php");
    exit;
}

if(isset($_POST["update"])){
    $id = $_POST["idCart"];
    header("Location: edit.php?idCart=".$id."");
    exit;
}

// if(isset($_POST["beli"])){
//   $id = $_POST["id"];
//   $_SESSION['barang'] = $id;
//   header("Location: detail.php");
// }
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
</head>
<body>
    <!-- Navbar Start-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid" style="margin:0px 50px">
            <a class="navbar-brand" href="homeUser.php">
              <img src="assets/icon.png" alt="icon" height="75px">
              <h1 class="judul">SEPEDAKU</h1>
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
                  <a class="nav-link fs-5 fw-bold" href="#">Get In Touch</a>
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
                <?php
                $grandTotal = 0;
                $biayaPengiriman = 500000;
                for ($i=0; $i < sizeof($cart); $i++) { 
                    if($cart[$i]['idUser'] == $temp){
                        $barang = mysqli_fetch_array(mysqli_query($con, "select * from sepeda where id_sepeda = '".$cart[$i]['idBarang']."'"));
                        $total = $barang['harga_sepeda'] * $cart[$i]['jumlah'];
                        echo "
                        <div class='container'>
                            <div class='row'>
                                <div class='col-12 mb-3' style='border : 1px solid black; border-radius : 10px;'>
                                    <div class='row'>
                                        <div class='col-6'>
                                            <img src='".$barang['image_sepeda']."' alt='gambar' width='450px'>
                                        </div>
                                        <div class='col-6 mt-5'>
                                            <h3 class='ps-5 fw-bold fs-2'>".$barang['nama_sepeda']."</h3>
                                            <h5 class='ps-5'> Harga : ".$barang['harga_sepeda']."</h5>
                                            <h5 class='ps-5'> Jumlah : ".$cart[$i]['jumlah']."</h5>
                                            <h5 class='ps-5'> Total : ".$total."</h5>
                                            <form method='post'>
                                                <input type='hidden' name='idCart' value='".$i."'>
                                                <button type='submit' name='update' class='btn btn-danger ms-5'>Update</button>
                                                <button type='submit' name='hapus' class='btn btn-danger'>Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                        $grandTotal += $total;
                    }
                }
                ?>
            </div>
            <div class="col-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-3" style="border : 1px solid black; border-radius : 10px;">
                            <div class="row">
                                <div class="col-12 p-5">
                                    <h3 class="fw-bold fs-2">Total Barang</h3>
                                    <h5 class="fs-3"><?php echo $grandTotal;?></h5>
                                    <h3 class="fw-bold fs-2">Biaya Pengiriman</h3>
                                    <h5 class="fs-3"><?php echo $biayaPengiriman;?></h5>
                                    <h3 class="fw-bold fs-2">Grand Total</h3>
                                    <h5 class="fs-3"><?php echo ($grandTotal+$biayaPengiriman);?></h5>

                                    <form action="checkout.php" method="post">
                                        <button type="submit" name="checkout" class="btn btn-primary ps-5 pe-5">Checkout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Barang end-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>