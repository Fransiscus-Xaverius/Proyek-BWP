<?php
require_once("helper.php"); 
if(isset($_POST['post'])){
    $judul = $_POST['judul'];
    $deksripsi = $_POST['desc'];
    $kategori = $_POST['kategori'];
    $merk = $_POST['merk'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    
    if($judul == "" || $deksripsi == ""|| $kategori == "" || $merk == "" || $stok == ""|| $harga == ""){
      echo "<script>alert('field tidak boleh kosong')</script>";
    } else {
      if (count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
          $errors = array();
          $file_name = $_FILES['gambar']['name'];
          $file_size = $_FILES['gambar']['size'];
          $file_tmp = $_FILES['gambar']['tmp_name'];
          $file_type = $_FILES['gambar']['type'];
          if ($file_size > 2097152) {
            $errors[] = 'File size melebihi batas';
          }
  
          if (empty($errors) == true && $file_name != "") {
            move_uploaded_file($file_tmp, "../getImages/" . $file_name);

            $kueri = mysqli_query($con, "select count(*) as 'jumlah' from sepeda order by id_sepeda");
            $result = mysqli_fetch_array($kueri);
            $id = $result['jumlah'];
            $id = $id + 1;
            $id = "spd_" . $id;
              $kueri = mysqli_query($con, "INSERT INTO sepeda VALUES('$id', '$judul', '$kategori', '$merk', '$file_name', '$deksripsi','$stok', '$harga', '1')");

              if(!$kueri){
                echo "<script>alert('Gagal Menambahkan Item!')</script>";
              } else {
                echo "<script>alert('Berhasil Menambahkan Item!')</script>";
              }
          
          } else {
            echo "<script>alert('Ukuran file melebihi batas')</script>";
          }
        } else {
          echo "<script>alert('File Gambar tidak ada')</script>";
        }
      } else {
        echo "<script>alert('Harus masukkan gambar')</script>";
      }
    }
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

    <!-- Add Item -->
    <div class="konten">
        <div class="isi">
        <h2 class="fw-bold">Tambah Item Baru</h2>
        <form action="" method="post" enctype="multipart/form-data">
          <input type="text" name="judul" id="input" placeholder="Masukkan Nama Sepeda">
          <textarea name="desc" id="input" cols="30" rows="8" placeholder="Insert post description here"></textarea>
          Pilih Kategori : 
          <select name="kategori" id="input">
            <?php
              $kueri = mysqli_query($con, "select * from kategori");
              while($result = mysqli_fetch_array($kueri)){
                echo "<option value='".$result['id_kategori']."'>".$result['nama_kategori']."</option>";
              }
            ?>
          </select>
          Pilih Merk : 
          <select name="merk" id="input">
            <?php
              $kueri = mysqli_query($con, "select * from merk");
              while($result = mysqli_fetch_array($kueri)){
                echo "<option value='".$result['id_merk']."'>".$result['nama_merk']."</option>";
              }
            ?>
          </select>
          Masukkan Stok :
          <input type="number" name="stok" id="input" min="0" value="0">
          Masukkan Harga :
          <input type="number" name="harga" id="input" min="0" value="0">
          Tambah Gambar : 
          <input type="file" name="gambar" accept="image/*" class="custom-file-input" id="inp" ><br>
          <button type="submit" name="post" id="tambahPost" style="padding:3px 45px; margin-top:15px">Tambah</button>
        </form>
        </div>
    </div>
    <!-- Add Item -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
<script>
  function loadAjax(){
    
  }
</script>
</html>