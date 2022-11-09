<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <!-- Topbar Start -->
  <div class="container-fluid border-bottom d-none d-lg-block">
    <div class="row gx-0">
      <div class="col-lg-4 text-center py-2">
        <div class="d-inline-flex align-items-center">
          <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
          <div class="text-start">
            <h6 class="text-uppercase mb-1">Our Office</h6>
            <span>Jalan doang jadian kagak</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4 text-center border-start border-end py-2">
        <div class="d-inline-flex align-items-center">
          <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
          <div class="text-start">
            <h6 class="text-uppercase mb-1">Email Us</h6>
            <span>iniTokoGes@gmail.com</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4 text-center py-2">
        <div class="d-inline-flex align-items-center">
          <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
          <div class="text-start">
            <h6 class="text-uppercase mb-1">Call Us</h6>
            <span>+6212 3456 7890</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Topbar End -->  

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-primary navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <a href="index.html" class="navbar-brand ms-lg-5">      
      <h1 class="m-0 text-uppercase text-dark"><img src="assets/icon.png" alt="Icon" width="70px"><i class="bi bi-shop fs-1 text-primary me-3"></i>SEPEDAKU</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="col-lg-8 col-6 text-left ms-3 me-3">
        <form action="">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for products">
            <div class="input-group-append ps-2 pe-2">
              <a href="" class="btn border">
                <img src="assets/search.png" alt="Search" width="25px">
                <i class="text-primary"></i>
              </a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-2 col-5 text-right">
        <a href="" class="btn border">
          <i class="text-primary">
            <img src="assets/akun.png" alt="Search" width="30px">
          </i>
          <span class="badge text-black">Login Now</span>
        </a>
      </div>
      <div class="togle_main" style="margin-left:30px"><a class="openbtn" onclick="openNav()">
        <img src="assets/togle-menu-icon.png" style="width: 50px;">
      </a></div>
    </div>
  </nav>
  <!-- Navbar End -->
  
  <!-- jumbo start-->
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
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="assets/img-2.png" class="d-block" height="500px" alt="img" style="margin:auto">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img-3.png" height="500px" class="d-block" alt="img" style="margin:auto">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
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

  <!-- <div id="header-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" style="height: 700px;">
        <img class="" style="margin:auto" src="assets/img-1.png" alt="Image">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
          <div class="p-3" style="max-width: 700px;">
            <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
            <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
            <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
          </div>
        </div>
      </div>
      <div class="carousel-item" style="height: 410px;">
        <img class="img-fluid" src="assets/img-2.png" alt="Image">
          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 700px;">
              <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
              <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
              <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item" style="height: 700px;">
        <img class="img-fluid" src="assets/img-2.jpg" alt="Image">
          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 700px;">
              <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
              <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
              <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item" style="height: 700px;">
        <img class="img-fluid" src="assets/img-3.jpg" alt="Image">
          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 700px;">
              <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
              <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
              <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
          <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
      </a>
      <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
          <span class="carousel-control-next-icon mb-n2"></span>
        </div>
      </a>
    </div>
  </div> -->
  <!-- jumbo end-->
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>