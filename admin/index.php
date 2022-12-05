<?php
  require_once("helper.php");
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">  
    <style>
      .per3{
        display: flex;
        flex-direction: column;
        width: 33%;
        height: 100%;
      }

      .column{
        display: flex;
        flex-direction: row;
      }

    </style>
  </head>
<body onload="loadAjax()">
    <!-- Navbar Start-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid" style="margin:0px 50px">
            <a class="navbar-brand" href="index.php">
              <img src="../assets/icon.png" alt="icon" height="75px">
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
                  <a class="nav-link fs-5 fw-bold" href="trans.php">All Transaction</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-5 fw-bold" href="Announcement.php">Mailer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-5 fw-bold" href="items.php">Items</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-5 fw-bold" href="listUser.php">Users</a>
                </li>
            </ul>
            <!-- <form class="d-flex" method="post"> 
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" style="width:300px">
              <button type="submit" name="searchBtn" class="btn">
                <img src="../assets/search.png" alt="search" height="30px">
              </button>
                <li class="nav-item navbar-nav">
                  <a class="nav-link fs-5 fw-bold active" href="homeUser.php">Admin</a>
                </li>
            </form> -->
            </div>
        </div>
      </nav>
    <!-- Navbar END-->
    <div class="container-fluid column">
      <div class="container per3">
        <h1>Penjualan Hari ini</h1>
        <?php
          $hasil = mysqli_query($con, "SELECT SUM(harga_total) from htrans where DATE(h_date) = CURDATE()");
          //$hasil = $hasil->fetch_assoc();
          $row = $hasil->fetch_assoc();
          if (is_null($row["SUM(harga_total)"])) {
            echo "Rp. 0";
          }
          else{
            echo $row["SUM(harga_total)"];
          }
        ?>
      </div>
      <div class="container per3">
        <h1>Penjualan Kemarin</h1>
        <?php
          $hasil = mysqli_query($con, "SELECT SUM(harga_total) from htrans where DATE(h_date) = CURDATE() -1");
          $hasil = $hasil->fetch_assoc();
          echo $hasil["SUM(harga_total)"];
        ?>
      </div>
      <div class="container per3">
        <h1>Penjualan Bulan ini</h1>
        <?php
          $hasil = mysqli_query($con, "SELECT SUM(harga_total) from htrans WHERE MONTH(h_date) = MONTH(NOW()) AND YEAR(h_date) = YEAR(NOW())");
          $hasil = $hasil->fetch_assoc();
          echo $hasil["SUM(harga_total)"];
        ?>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>