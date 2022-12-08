<?php
    require_once("helper.php"); 
    $idT = $_REQUEST['id'];
    $trans = mysqli_query($con, "SELECT * FROM htrans WHERE htrans_id = '$idT'");
    $trans = $trans->fetch_assoc();

    $customer = mysqli_query($con, "SELECT * from customer where id_customer = '".$trans['id_customer']."'");
    $customer = $customer->fetch_assoc();
    $date = $trans['h_date'];
    $year = date('Y', strtotime($date));
    $month = date('F', strtotime($date));
    $day = date('l', strtotime($date));
    $angka = date("d", strtotime($date));
    if($trans['status']==1||$trans['status']==2){
        $dtrans = mysqli_query($con, "SELECT * from dtrans where htrans_id = '".$trans['htrans_id']."'");
    }
    
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
</head>
<body onload="reload()">
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
            <form class="d-flex" method="post"> 
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" style="width:300px">
              <button type="submit" name="searchBtn" class="btn">
                <img src="../assets/search.png" alt="search" height="30px">
              </button>
                <li class="nav-item navbar-nav">
                  <a class="nav-link fs-5 fw-bold active" href="homeUser.php">Admin</a>
                </li>
            </form>
            </div>
        </div>
      </nav>
    <!-- Navbar END-->

    <div class="container">
        <div class="isi">
            <h1><?php echo $customer['nama_customer'] ?></h1>
            <h2>Username : <?php echo $customer['username_customer']?></h2>
            <h2>Grand Total : Rp.<?php echo number_format($trans['harga_total'], 0, ',', '.')?></h2>
            <h2>Tanggal Transaksi : <?php echo $day."-".$angka."-".$month."-".$year?></h2>
            <h2>Detail Transaksi :</h2>
            <?php
                if($trans['status']==1||$trans['status']==2){
                    foreach ($dtrans as $key => $value) {
                        $sepeda = mysqli_query($con, "SELECT * FROM SEPEDA WHERE id_sepeda = '".$value['id_sepeda']."'");
                        $sepeda = $sepeda->fetch_assoc();
                        echo "<h2>";
                        echo $sepeda['nama_sepeda']."<br>";
                        echo $value['jumlah']." x Rp.".number_format($sepeda['harga_sepeda'], 0, ',', '.')." = Rp.".number_format($value['subtotal'], 0, ',', '.');                        
                        echo "</h2>";
                    }
                }
                else{
                    Echo "<h2>Transaksi Pending dan Belum bisa diproses.</h2>";
                }
            ?>
            <div class="" style="display:flex; flex-direction:column; align-items: center"><h2>Status<div class="" id='status'></div></h2></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
<script>
    function reload(){
        statusdiv = document.querySelector("#status");
        fetchStatus();
    }

    function fetchStatus(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                statusdiv.innerHTML = this.responseText;
            }
        };
        xhttp.open('GET','StatusTrans.php?id=<?php echo $idT?>',true);
        xhttp.send();
    }
</script>
</html>