<?php
require_once("helper.php"); 
if(isset($_POST['post'])){
    $judul = $_POST['judul'];
    $deksripsi = $_POST['desc'];
    
    if($judul == "" || $deksripsi == ""){
      echo "<script>alert('judul dan deskripsi tidak boleh kosong')</script>";
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
            move_uploaded_file($file_tmp, "images/" . $file_name);
          } else {
            echo "<script>alert('Ukuran file melebihi batas')</script>";
          }
        }
      }
  
      $kueri = mysqli_query($con, "select post_id from post order by post_id desc limit 1");
      $result = mysqli_fetch_array($kueri);
  
      if($result != null){
        $temp = substr($result['post_id'],2,3);
        $id = (int)$temp + 1;
      } else {
        $id = 1;
      }
      $id = "PO".str_pad($id, 3, "0", STR_PAD_LEFT);
  
      if(count($_FILES) <= 0){
        $kueri = mysqli_query($con, "INSERT into post (post_id, us_id, post_judul, post_deskripsi, post_like) values('".$id."', '".$userLogin['us_id']."', '".$judul."', '".$deksripsi."',0)");
      } else {
        $kueri = mysqli_query($con, "insert into post values('".$id."', '".$userLogin['us_id']."', '".$judul."', '".$_FILES['gambar']['name']."', '".$deksripsi."',0)");
      }
  
      if(!$kueri){
        echo "<script>alert('Gagal Post!')</script>";
      } else {
        echo "<script>alert('Berhasil Post!')</script>";
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

    <!-- Add Item -->
    <div class="konten">
        <div class="isi">
        <h2 class="fw-bold">Add New Item</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="judul" id="input" placeholder="Masukkan Nama Sepeda">
            <textarea name="desc" id="input" cols="30" rows="8" placeholder="Insert post description here"></textarea>
            Add Picture 
            <input type="file" name="gambar" accept="image/*" class="custom-file-input" id="inp" ><br>
            <button type="submit" name="post" id="tambahPost" style="padding:3px 45px; margin-top:15px">Post</button>
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