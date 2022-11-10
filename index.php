<?php
  require("helper.php");
  
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyek BWP</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>

  <style>
    .catalog{
      display: flex;
      flex-direction: column;
      justify-items: center;
      align-items: center;
    }
  </style>

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
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
              <button>BUY NOW</button>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="assets/img-2.png" class="d-block" height="500px" alt="img" style="margin:auto">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
              <button>BUY NOW</button>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/img-3.png" height="500px" class="d-block" alt="img" style="margin:auto">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
              <button>BUY NOW</button>
            </div>
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
    <!-- carousel end -->

    <!-- start of catalog -->
    <div class="d-flex flex-wrap">
      <?php
        if(isset($_POST['searchBtn'])){
            $keyword = $_POST["search"];
            $searchBrand = $con->query("select * from merk where nama_merk like '%".$keyword."%'");
            if($searchBrand->num_rows == 0) {
                $result = $con->query("select * from sepeda where nama_sepeda like '%".$keyword."%'");
            } else {
                $brand = $searchBrand->fetch_assoc();
                $id = $brand["id_merk"];
                $result = $con->query("select * from sepeda where id_merk like '%".$id."%'");
            }
        }
        else{
          $result = mysqli_query($con , "select * from sepeda");
        }
        foreach ($result as $key => $value) {
          echo '<div class="card" style="width: 18rem;">
          <img src="'.$value["image_sepeda"].'" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">'.$value["nama_sepeda"].'</h5>
            <p class="card-text"> Rp.'.$value["harga_sepeda"].'</p>
            <p class="card-text">'.$value["deskripsi_sepeda"].'</p>
            <a href="#" class="btn btn-primary">Beli</a>
          </div>
        </div>';
        }
    ?>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>