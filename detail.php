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

if(isset($_POST["keranjang"])){
    if($_POST['jumlah'] > 0){
        $id = $_POST["id"];
        $_SESSION['cart'][] = [
            'idUser' => $user['id_customer'],
            'idBarang' => $id,
            'jumlah' => $_POST["jumlah"]
        ];
        header("Location: homeUser.php");
        exit;
    }
    else{
        echo "<script>alert('JUMLAH HARUS LEBIH DARI 0')</script>";
    }
}

if(isset($_POST["back"])){
  header("location: homeUser.php");
  exit;
}

$idBarang = $_SESSION['barang'];
$barang = mysqli_fetch_array(mysqli_query($con, "select * from sepeda where id_sepeda = '".$idBarang."'"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETAIL</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
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

    <!-- Konten -->
    <div class="container">
      <div class="row mt-3">
        <div class="col-6">
          <img src="getImages/<?php echo $barang['image_sepeda']?>.png" alt="gambar" width="600px">
        </div>
        <div class="col-6 justify-content-start">
          <h1 class="fw-bold"><?php echo $barang['nama_sepeda']?></h1>
          <h3 class="subjudul"><?php echo $barang['deskripsi_sepeda']?></h3>
          <h3 class="subjudul">Rp. <?php echo $barang['harga_sepeda']?></h3>
          <form method="post">
            <div class="fs-5">
                jumlah : 
                <input type="number" name="jumlah" id="jumlah" min="1" max="100" value="1">
            </div><br>
            <input type="hidden" name="id" value="<?php echo $barang['id_sepeda']?>">
            <button type="submit" name="keranjang" class="btn btn-primary">Tambahkan ke Keranjang</button>
            <button type="submit" name="back" class="btn btn-primary">Back</button>
          </form>
        </div>
      </div>
    <!-- Konten -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>