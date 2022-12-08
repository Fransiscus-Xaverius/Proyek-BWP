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
    echo "<script>alert('Harap Login Dulu jika Ingin Membeli Barang')</script>";
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
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /> 
  </head>
  <body>
    <div class="">
      <!-- Navbar Start-->
      <nav class="navbar" id="nav">
        <div class="container-fluid" style="margin:0px 50px">
            <a class="navbar-brand" href="index.php">
              <img src="assets/icon.png" alt="icon" height="75px">
              <h1 class="judul">OURCYCLE</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active fw-bold fs-5" aria-current="page" href="index.php">Home</a>
                </li>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-5 fw-bold" href="about.php">Get In Touch</a>
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
      <div class="container-fluid bg">
          <section >
            <div id="main_slider" class="section carousel slide banner-main" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#main_slider" data-slide-to="0" class="active"></li>
                  <li data-target="#main_slider" data-slide-to="1"></li>
                  <li data-target="#main_slider" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                      <div class="container">
                        <div class="row marginii">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <div class="carousel-sporrt_text ">
                                  <h1 class="sport_text"><strong>Sports<br><span style="color: #fff;">Cycle</span></strong></h1>
                                  <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content</p>
                                  <button class="boynow_bt">Buy Now</button>
                                  <button class="contact_bt" onclick="location.href='./about.php';">Contact Us</button>
                              </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <div class="img-box">
                                  <figure><img src="assets/img-1.png"  alt ="bruh" style="max-width: 100%;"/></figure>
                              </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <div class="container">
                        <div class="container">
                        <div class="row marginii">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <div class="carousel-sporrt_text ">
                                  <h1 class="sport_text"><strong>Sports<br><span style="color: #fff;">Cycle</span></strong></h1>
                                  <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content</p>
                                  <button class="boynow_bt">Buy Now</button>
                                  <button class="contact_bt">Contact Us</button>
                              </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <div class="img-box">
                                  <figure><img src="assets/img-1.png"  alt ="bruh" style="max-width: 100%;"/></figure>
                              </div>
                            </div>
                        </div>
                      </div>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <div class="container">
                        <div class="row marginii">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <div class="carousel-sporrt_text ">
                                  <h1 class="sport_text"><strong>Sports<br><span style="color: #fff;">Cycle</span></strong></h1>
                                  <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content</p>
                                  <button class="boynow_bt">Buy Now</button>
                                  <button class="contact_bt">Contact Us</button>
                              </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                              <div class="img-box">
                                  <figure><img src="assets/img-1.png" style="max-width: 100%;" alt ="bruh"></figure>
                              </div>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
          </section>
      </div>
      <!-- carousel end -->
    </div>
    </div>

    <!-- start of catalog -->
    <div class="container-fluid filter">
      <div class="row justify-content-center">
        <div class="col-3">
          <div class="mt-3 p-2" style="border: 1px solid lightgray; border-radius:3px; margin-left:125px;"> 
            <form action="" method="post">
              <h3 class="pb-4">&nbsp;<img src="assets/filter.png" alt="filter icon" height='27px'>&nbsp;&nbsp;FILTER</h3> 
              
              <h4 class="">Kategori</h4>
              <input type="checkbox" name="MTB" id="MTB" value="id_kategori like '%kat_1%'">
              <label class="fs-5">&nbsp;MTB</label> <br>
              <input type="checkbox" name="Urban" id="Urban" value="id_kategori like '%kat_2%'">
              <label class="fs-5">&nbsp;Urban</label> <br>
              <input type="checkbox" name="BMX" id="BMX" value="id_kategori like '%kat_3%'">
              <label class="fs-5">&nbsp;BMX</label> <br>
              <input type="checkbox" name="Junior" id="Junior" value="id_kategori like '%kat_4%'">
              <label class="fs-5">&nbsp;Junior</label> <br>
              <input type="checkbox" name="Electric" id="Electric" value="id_kategori like '%kat_5%'">
              <label class="fs-5">&nbsp;Electric</label> <br>

              <hr><h4 class="pt-3">Merk</h4>
              <input type="checkbox" name="Polygon" id="Polygon" value="id_merk like '%merk_1%'">
              <label class="fs-5">&nbsp;Polygon</label> <br>
              <input type="checkbox" name="Wimcycle" id="Wimcycle" value="id_merk like '%merk_2%'">
              <label class="fs-5">&nbsp;Wimcycle</label> <br>
              <input type="checkbox" name="KONA" id="KONA" value="id_merk like '%merk_3%'">
              <label class="fs-5">&nbsp;KONA</label> <br>

              <hr><h4 class="pt-3">Rentang Harga</h4>
              <input type="number" name="min" placeholder='min' style='width:30%'> - 
              <input type="number" name="max" placeholder='max' style='width:30%'>
              
              <hr><h4>Order Price</h4>
              <fieldset id="orderby">
                <input type="radio" name="order" id="" value="asc" checked>
                <label class="fs-5">&nbsp;Ascending</label> <br>
                <input type="radio" name="order" id="" value="desc">
                <label class="fs-5">&nbsp;Descending</label> <br>
              </fieldset>

              <button type="submit" name= 'filter' class='btn btn-primary mt-3'>Filter</button>
            </form>
          </div>
        </div>
        <div class="col-8">
          <div class="d-flex flex-wrap">
            <?php
              if(isset($_POST['searchBtn'])){
                $keyword = $_POST["search"];
                
                if($keyword != ""){
                  $searchBrand = $con->query("SELECT * from merk where nama_merk like '%".$keyword."%'");
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
                      $result = $con->query("select * from sepeda where nama_sepeda like '%".$keyword."%' and status_sepeda = 1 and stok_sepeda > 0 LIMIT 12 OFFSET ".$dex);
                      
                      $banyak = $con->query("select count(*) as 'jumlah' from sepeda where nama_sepeda like '%".$keyword."%' and status_sepeda = 1 and stok_sepeda > 0 ");
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
                      $result = $con->query("select * from sepeda where id_merk like '%".$id."%' and status_sepeda = 1 and stok_sepeda > 0 LIMIT 12 OFFSET ".$dex);
                      $banyak = $con->query("select count(*) as 'jumlah' from sepeda where id_merk like '%".$id."%' and status_sepeda = 1 and stok_sepeda > 0 ");
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
                  $result = mysqli_query($con , "SELECT * FROM sepeda where status_sepeda = 1 and stok_sepeda > 0 LIMIT 12 OFFSET ".$dex);
                  $banyak = mysqli_query($con , "SELECT count(*) as'jumlah' FROM sepeda where status_sepeda = 1 and stok_sepeda > 0 LIMIT 12 OFFSET ".$dex);
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
                $result = mysqli_query($con , "SELECT * FROM sepeda where status_sepeda = 1 and stok_sepeda > 0 LIMIT 12 OFFSET ".$dex);
                $banyak = mysqli_query($con , "SELECT count(*) as'jumlah' FROM sepeda where status_sepeda = 1 and stok_sepeda > 0 LIMIT 12 OFFSET ".$dex);
                $banyakPage = mysqli_fetch_array($banyak);
              }

              if(isset($_POST['filter'])){
                $kategori = "";
                $merk = "";
                if(isset($_POST['MTB'])){
                  if($kategori == ""){ $kategori = $_POST['MTB'];
                  } else { $kategori = $kategori." or " . $_POST['MTB']; }
                }
                if(isset($_POST['Urban'])){
                  if($kategori == ""){ $kategori = $_POST['Urban'];
                  } else { $kategori = $kategori." or " . $_POST['Urban']; }
                }
                if(isset($_POST['BMX'])){
                  if($kategori == ""){ $kategori = $_POST['BMX'];
                  } else { $kategori = $kategori." or " . $_POST['BMX']; }
                }
                if(isset($_POST['Junior'])){
                  if($kategori == ""){ $kategori = $_POST['Junior'];
                  } else { $kategori = $kategori." or " . $_POST['Junior']; }
                }
                if(isset($_POST['Electric'])){
                  if($kategori == ""){ $kategori = $_POST['Electric'];
                  } else { $kategori = $kategori." or " . $_POST['Electric']; }
                }

                if(isset($_POST['Polygon'])){
                  if($merk == ""){ $merk = $_POST['Polygon'];
                  } else { $merk = $merk." or " . $_POST['Polygon']; }
                }
                if(isset($_POST['Wimcycle'])){
                  if($merk == ""){ $merk = $_POST['Wimcycle'];
                  } else { $merk = $merk." or " . $_POST['Wimcycle']; }
                }
                if(isset($_POST['KONA'])){
                  if($merk == ""){ $merk = $_POST['KONA'];
                  } else { $merk = $merk." or " . $_POST['KONA']; }
                }
                $min = $_POST['min'];
                $max = $_POST['max'];
                if(isset($_POST['order'])){
                  $order = $_POST['order'];
                }

                if($kategori != "" && $merk != "" && $min != "" && $max != ""){
                  $result = $con->query("select * from sepeda where ".$kategori." and ".$merk." and harga_sepeda between ".$min." and ".$max." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where '".$kategori."' and '".$merk."' and harga_sepeda between ".$min." and ".$max." and status_sepeda = 1 and stok_sepeda > 0");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($kategori != "" && $merk != "" && $min != ""){
                  $result = $con->query("select * from sepeda where ".$kategori." and ".$merk." and harga_sepeda >= ".$min." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where ".$kategori." and ".$merk." and harga_sepeda >= ".$min." and status_sepeda = 1 and stok_sepeda > 0");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($kategori != "" && $merk != "" && $max != ""){
                  $result = $con->query("select * from sepeda where ".$kategori." and ".$merk." and harga_sepeda <= ".$max." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where ".$kategori." and ".$merk." and harga_sepeda <= ".$max." and status_sepeda = 1 and stok_sepeda > 0");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($kategori != "" && $min != "" && $max != ""){
                  $result = $con->query("select * from sepeda where ".$kategori." and harga_sepeda between ".$min." and ".$max." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where ".$kategori." and harga_sepeda between ".$min." and ".$max." and status_sepeda = 1 and stok_sepeda > 0");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($merk != "" && $min != "" && $max != ""){
                  $result = $con->query("select * from sepeda where ".$merk."and harga_sepeda between ".$min." and ".$max." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where ".$merk." and harga_sepeda between ".$min." and ".$max." and status_sepeda = 1 and stok_sepeda > 0");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($kategori != "" && $merk != ""){
                  $result = $con->query("select * from sepeda where ".$kategori." and ".$merk." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where ".$kategori." and ".$merk." and status_sepeda = 1 and stok_sepeda > 0");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($kategori != "" && $min != ""){
                  $result = $con->query("select * from sepeda where ".$kategori." and harga_sepeda >= ".$min." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where ".$kategori." and harga_sepeda >= ".$min." and status_sepeda = 1 and stok_sepeda > 0");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($kategori != "" && $max != ""){
                  $result = $con->query("select * from sepeda where ".$kategori." and harga_sepeda <= ".$max." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where ".$kategori." and harga_sepeda <= ".$max." and status_sepeda = 1 and stok_sepeda > 0");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($merk != "" && $min != ""){
                  $result = $con->query("select * from sepeda where ".$merk." and harga_sepeda >= ".$min." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where ".$merk." and harga_sepeda >= ".$min." and status_sepeda = 1 and stok_sepeda > 0");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($merk != "" && $max != ""){
                  $result = $con->query("select * from sepeda where ".$merk." and harga_sepeda <= ".$max." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where ".$merk." and harga_sepeda <= ".$max." and status_sepeda = 1 and stok_sepeda > 0");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($min != "" && $max != ""){
                  $result = $con->query("select * from sepeda where harga_sepeda between ".$min." and ".$max." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where harga_sepeda between ".$min." and ".$max." and status_sepeda = 1 and stok_sepeda > 0");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($kategori != ""){
                  $result = $con->query("select * from sepeda where ".$kategori." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where ".$kategori." and status_sepeda = 1 and stok_sepeda > 0 ");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($merk != ""){
                  $result = $con->query("select * from sepeda where ".$merk." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where ".$merk." and status_sepeda = 1 and stok_sepeda > 0 ");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($min != ""){
                  $result = $con->query("select * from sepeda where harga_sepeda >= ".$min." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where harga_sepeda >= ".$min." and status_sepeda = 1 and stok_sepeda > 0 ");
                  $banyakPage = mysqli_fetch_array($banyak);
                  $banyakPage = $banyakPage['jumlah'];
                  if(isset($_SESSION['maks'])){
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  } else {
                    $maks = floor($banyakPage/12) + 1;
                    $_SESSION['maks'] = $maks;
                  }
                } else if($max != ""){
                  $result = $con->query("select * from sepeda where harga_sepeda <= ".$max." and status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where harga_sepeda <= ".$max." and status_sepeda = 1 and stok_sepeda > 0 ");
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
                  $result = $con->query("select * from sepeda where status_sepeda = 1 and stok_sepeda > 0 order by harga_sepeda ".$order." LIMIT 12 OFFSET ".$dex);
                  $banyak = $con->query("select count(*) as 'jumlah' from sepeda where status_sepeda = 1 and stok_sepeda > 0 ");
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
                $result = mysqli_query($con , "SELECT * FROM sepeda where status_sepeda = 1 and stok_sepeda > 0 LIMIT 12 OFFSET ".$dex);
                $banyak = mysqli_query($con , "SELECT count(*) as'jumlah' FROM sepeda where status_sepeda = 1 and stok_sepeda > 0 LIMIT 12 OFFSET ".$dex);
                $banyakPage = mysqli_fetch_array($banyak);
              }

              if($result->num_rows > 0){
                foreach ($result as $key => $value) {
                echo 
                  '<div class="col-lg-3 col-md-4 col-6 ms-3 me-3 mt-3 mb-3">
                    <div class="card" style="height=350px">
                      <img src="getImages/'.$value["image_sepeda"].'" class="card-img-top" alt="sepeda" style="max-height : 350px;">
                      <div class="card-body" style = "">
                        <h5 class="card-title">'.$value["nama_sepeda"].'</h5>
                        <p class="card-text"> Rp. '.number_format($value['harga_sepeda'], 0, ',', '.').'</p>
                        <form method="POST">
                        <button type="submit" name="beli" style="border:none; background-color:lightgreen; border-radius:5px; padding: 3px 15px;">Detail</button>
                        </form>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                $banyakPage = 0;
                $_SESSION['maks'] = "";
                echo '<div class="alert alert-danger text-center" style="margin-left:30%; margin-top: 50px;" role="alert">
                        <h1>Sepeda tidak ditemukan</h1>
                      </div>';
              }
            ?>
          </div>
          <div class="pagination justify-content-end">
            <div class="d-flex">
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
        </div>
      </div>
    </div>
    <!-- END OF CATALOGUE-->


    <!-- Start of Footer-->
    <div class="container-fluid iniFooter">
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
                  <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                    <label for="newsletter1" class="visually-hidden">Email address</label>
                    <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                    <button class="btn btn-primary" type="button" name="subscribe" onclick="bro()">Subscribe</button>
                  </div>
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
    </div>

    <script>

      $(window).resize(function() {
        var win = $(this);
        //navbar class + carousel image change on window size.
            var win = $(this);
            //navbar class + carousel image change on window size.
            if (win.width() > 1366) {
              $('.car-img').attr('width','500');
            } else if(win.width() >= 992){
              $('.car-img').attr('width','450');
            } else if(win.width() >= 768){
              $('.car-img').attr('width','300');
            } else {
              $('.car-img').attr('width','200');
            }

            if (win.width() > 1200) {
              $('#nav').addClass('navbar-expand-lg');
            } else if(win.width() >= 992){
              $('#nav').addClass('navbar-expand-md');
            } else if(win.width() >= 768){
              $('#nav').addClass('navbar-expand-sm');
            } else {
              $('#nav').addClass('navbar-expand-xs');
            }
      });

      $(document).ready(
        function(e){
            var win = $(this);
            //navbar class + carousel image change on window size.
            var win = $(this);
            //navbar class + carousel image change on window size.
            if (win.width() > 1366) {
              $('.car-img').attr('width','500');
            } else if(win.width() >= 992){
              $('.car-img').attr('width','450');
            } else if(win.width() >= 768){
              $('.car-img').attr('width','300');
            } else {
              $('.car-img').attr('width','200');
            }

            if (win.width() > 1200) {
              $('#nav').addClass('navbar-expand-lg');
            } else if(win.width() >= 992){
              $('#nav').addClass('navbar-expand-md');
            } else if(win.width() >= 768){
              $('#nav').addClass('navbar-expand-sm');
            } else {
              $('#nav').addClass('navbar-expand-xs');
            }
        }
        
      )

      window.addEventListener("load", start, false);
      function start(){

      }

      function bro(){
        mail =document.getElementById("newsletter1").value;
        if(mail!=""){
          alert('masuk');
          $.ajax({
              url: 'subscribeMail.php?mail=' + mail,
              type: 'GET',
              success: function(results) { 
                  alert(results);
              }
          });
        }
        else{
          alert('Tidak ada alamat email yang dimasukkan :(');
        }
      }

    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
