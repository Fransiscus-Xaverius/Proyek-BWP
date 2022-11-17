<?php
  require_once("helper.php");
  unset($_SESSION['login']);

  if(isset($_POST["subscribe"])){
    //mailer.
  }
  $banyakPage = 0;

  if(isset($_SESSION['maks'])){
    $maks = $_SESSION["maks"];
    for ($i=0; $i < $maks; $i++) { 
      if(isset($_POST['btn'.$i])){
        $dex = $i*12;
      }
    }
  
  } else {
    $maks = 0;
  }

  if(isset($_POST['prev'])){
    if($dex-12 >= 0){
      $dex -= 12;
    }
  }

  if(isset($_POST['next'])){
    if($dex+12 <= ($maks*12)){
      $dex += 12;
    }
  }

  if(isset($_POST["beli"])){
    echo "<script>alert('Harap Login Dulu')</script>";
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyek BWP</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
      .catalog{
        display: flex;
        flex-direction: column;
        justify-items: center;
        align-items: center;
      }

      .iniKatalog{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
      }
    </style>
  </head>
  <body>
    <div class="bg">
      <!-- Navbar Start-->
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid" style="margin:0px 50px">
            <a class="navbar-brand" href="#">
              <img src="assets/icon.png" alt="icon" height="75px">
              <h1 class="judul">SEPEDAKU</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active fw-bold fs-5" aria-current="page" href="#">Home</a>
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
                  <a class="nav-link fs-5 fw-bold active" href="login.php">Login</a>
                </li>
            </form>
            </div>
        </div>
      </nav>
    <!-- Navbar END-->

    <!-- carousel start -->
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="4000">
            <img src="assets/img-1.png" class="d-block" height="500px" style="margin:auto" alt="img">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="assets/img-2.png" class="d-block" height="500px" alt="img" style="margin:auto">
          </div>
          <div class="carousel-item">
            <img src="assets/img-3.png" height="500px" class="d-block" alt="img" style="margin:auto">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- carousel end -->

    <!-- start of catalog -->
    <div class="d-flex flex-wrap iniKatalog justify-content-center">
      <?php
        if(isset($_POST['searchBtn'])){
          $keyword = $_POST["search"];
          
          if($keyword != ""){
            $searchBrand = $con->query("select * from merk where nama_merk like '%".$keyword."%'");
            $banyak = $con->query("select count(*) as 'jumlah' from merk where nama_merk like '%".$keyword."%'");
            $banyakPage = mysqli_fetch_array($banyak);
            $banyakPage = $banyakPage['jumlah'];
            if(isset($_SESSION['maks'])){
              $maks = floor($banyakPage/12) + 1;
              $_SESSION['maks'] = $maks;
            } else {
              $maks = floor($banyakPage/12) + 1;
              $_SESSION['maks'] = $maks;
            }
            if($searchBrand->num_rows == 0) {
                $result = $con->query("select * from sepeda where nama_sepeda like '%".$keyword."%' LIMIT 12 OFFSET ".$dex);
                $banyak = $con->query("select count(*) as 'jumlah' from sepeda where nama_sepeda like '%".$keyword."%'");
                $banyakPage = mysqli_fetch_array($banyak);
                $banyakPage = $banyakPage['jumlah'];
                if(isset($_SESSION['maks'])){
                  $maks = floor($banyakPage/12) + 1;
                  $_SESSION['maks'] = $maks;
                } else {
                  $maks = floor($banyakPage/12) + 1;
                  $_SESSION['maks'] = $maks;
                }
            } else {
              $brand = $searchBrand->fetch_assoc();
              $id = $brand["id_merk"];
                $result = $con->query("select * from sepeda where id_merk like '%".$id."%' LIMIT 12 OFFSET ".$dex);
                $banyak = $con->query("select count(*) as 'jumlah' from sepeda where id_merk like '%".$id."%'");
                $banyakPage = mysqli_fetch_array($banyak);
                $banyakPage = $banyakPage['jumlah'];
                if(isset($_SESSION['maks'])){
                  $maks = floor($banyakPage/12) + 1;
                  $_SESSION['maks'] = $maks;
                } else {
                  $maks = floor($banyakPage/12) + 1;
                  $_SESSION['maks'] = $maks;
                }
            }
          } else {
            $result = mysqli_query($con , "SELECT * FROM sepeda LIMIT 12 OFFSET ".$dex);
            $banyak = mysqli_query($con , "SELECT count(*) as'jumlah' FROM sepeda LIMIT 12 OFFSET ".$dex);
            $banyakPage = mysqli_fetch_array($banyak);
            $banyakPage = $banyakPage['jumlah'];
            if(isset($_SESSION['maks'])){
              $maks = floor($banyakPage/12) + 1;
              $_SESSION['maks'] = $maks;
            } else {
              $maks = floor($banyakPage/12) + 1;
              $_SESSION['maks'] = $maks;
            }
          }
        }
        else{
          $result = mysqli_query($con , "SELECT * FROM sepeda LIMIT 12 OFFSET ".$dex);
          $banyak = mysqli_query($con , "SELECT count(*) as'jumlah' FROM sepeda LIMIT 12 OFFSET ".$dex);
          $banyakPage = mysqli_fetch_array($banyak);
        }
        // echo '<form action="" method="post">';
        foreach ($result as $key => $value) {
          echo 
          '<div class="col-lg-3 col-md-4 col-6 ms-3 me-3 mt-3 mb-3">
            <div class="card" style="height=350px">
              <img src="getImages/'.$value["image_sepeda"].'.png" class="card-img-top" alt="sepeda" style="max-height : 200px">
              <div class="card-body" style = "">
                <h5 class="card-title">'.$value["nama_sepeda"].'</h5>
                <p class="card-text"> Rp.'.$value["harga_sepeda"].'</p>
                <p class="card-text">'.$value["deskripsi_sepeda"].'</p>
                <form method="POST">
                <button type="submit" name="beli">Beli</button>
                </form>
              </div>
            </div>
          </div>';
        }
        // echo '</form>';
      ?>
    </div>
    <!-- END OF CATALOGUE-->
    <div class="pagination col-11 me-5 justify-content-end">
      <div class="me-4 d-flex">
        <form action="" method="post">
          <button type="submit" name='prev'>Previous</button>
        </form>
        <?php
          echo "<form action='' method='POST'>";
          if(isset($_SESSION['maks'])){
            $maks = $_SESSION['maks'];
          } else {
            $maks = floor($banyakPage['jumlah']/12) + 1;
            $_SESSION['maks'] = $maks;
          }
          // echo "<script>alert('".$maks."')</script>";
          for ($i=0; $i < $maks; $i++) { 
            $temp = "btn".$i;
            echo "<button type='submit' value = '".$i."' name='".$temp."'>".($i+1)."</button>";
          }
          echo "</form>";
        ?>
        <form action="" method="post">
          <button type="submit" name='next'>Next</button>
        </form>
      </div>
    </div>


    <!-- Start of Footer-->
    <div class="container">
      <footer class="py-5">
        <div class="row">
          <div class="col-6 col-md-2 mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
            </ul>
          </div>

          <div class="col-md-5 offset-md-1 mb-3">
            <form>
              <h5>Subscribe to our newsletter</h5>
              <p>Monthly digest of what's new and exciting from us.</p>
              <form action="" method="POST">
                <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                  <label for="newsletter1" class="visually-hidden">Email address</label>
                  <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                  <button class="btn btn-primary" type="submit" name="subscribe">Subscribe</button>
                </div>
              </form>
            </form>
          </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
          <p>© 2022 Company, Inc. All rights reserved.</p>
          <ul class="list-unstyled d-flex">
            <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
            <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
            <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
          </ul>
        </div>
      </footer>

      <!-- end of footer -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
