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
        echo "<script>alert('BERHASIL MENAMBAHKAN CART')</script>";
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

$idBarang = $_SESSION['barang'];
$barang = mysqli_fetch_array(mysqli_query($con, "select * from sepeda where id_sepeda = '".$idBarang."'"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>