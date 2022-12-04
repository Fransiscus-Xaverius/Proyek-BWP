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

$success = "";
$error = "";
$sisa = "";

$idBarang = $_SESSION['barang'];
$barang = mysqli_fetch_array(mysqli_query($con, "select * from sepeda where id_sepeda = '".$idBarang."'"));
$stok = $barang['stok_sepeda'];
if($barang['stok_sepeda'] > 0 && $barang['stok_sepeda'] < 10){
  $sisa = "Sisa ".$barang['stok_sepeda']." Sepeda";
}

if(isset($_POST["back"])){
  header("location: homeUser.php");
  exit;
}

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
    <style>
        .success{
          color:green;
        }

        .error, .sisa{
          color:red;
        }
    </style>
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

    <!-- Popup Modal -->
    <div class="modal" tabindex="-1" id="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h1>Barang ditambahkan ke cart!</h1>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" name="kembali" id="kembali">Kembali berbelanja</button>
            <button type="button" class="btn btn-primary" name="checkout" id="checkout">Checkout</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Konten -->
    <div class="container">
      <div class="row mt-3">
        <div class="col-6">
          <img src="getImages/<?php echo $barang['image_sepeda']?>" alt="gambar" width="600px">
        </div>
        <div class="col-6 justify-content-start">
          <h1 class="fw-bold"><?php echo $barang['nama_sepeda']?></h1>
          <h3 class="subjudul"><?php echo $barang['deskripsi_sepeda']?></h3>
          <h3 class="subjudul">Rp. <?php echo number_format($barang['harga_sepeda'], 0, ',', '.')?></h3>
            <div class="fs-5">
                jumlah : 
                <input type="number" name="jumlah" id="jumlah" min="1" max="100" value="1">
            </div><br>
            <input type="hidden" name="id" value="<?php echo $barang['id_sepeda']?>">
            <div class="sisa">
              <?php 
                if(isset($sisa)){
                  if(strlen($sisa) > 0){
                    echo $sisa;
                  }
                }
              ?>
            </div>
            <div class="success">
              <?php 
                if(isset($success)){
                  if(strlen($success) > 0){
                    echo $success;
                  }
                }
              ?>
            </div>
            <div class="error">
              <?php 
                if(isset($error)){
                  if(strlen($error) > 0){
                    echo $error;
                  }
                }
              ?>
            </div>
            <button type="submit" id="keranjang" name="keranjang" class="btn btn-primary" >Tambahkan ke Keranjang</button>
            <button type="submit" name="back" class="btn btn-primary">Back</button>
        </div>
      </div>
    <!-- Konten -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
      document.getElementById ("keranjang").addEventListener ("click", pop);
      function pop(){
        id = '<?php echo $barang['id_sepeda'] ?>';
        jumlah = document.getElementById("jumlah").value;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
          }
        };
        xhttp.open("GET", `addToCart.php?id=${id}&jumlah=${jumlah}`, true);
        xhttp.send();
        $('#modal').modal('show');
      }

      $(document).on("click", "#kembali", function(event){
        window.location.href = "homeUser.php";
      });

      $(document).on("click", "#checkout", function(event){
        window.location.href = "cart.php";
      });

    </script>            
  </body>
</html>