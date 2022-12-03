<?php

require_once("helper.php");

if($_REQUEST['jumlah'] > 0){
    $id = $_REQUEST["id"];
    $jumlah = $_REQUEST['jumlah'];
    $idBarang = $_SESSION['barang'];
    $barang = mysqli_fetch_array(mysqli_query($con, "select * from sepeda where id_sepeda = '".$idBarang."'"));
    $stok = $barang['stok_sepeda'];
    if ($stok - $jumlah > 0){
      $_SESSION['cart'][] = [
        'idUser' => $_SESSION['login'],
        'idBarang' => $id,
        'jumlah' => $jumlah
      ];
      echo "Berhasil menambahkan barang";
    } else {
      echo "Jumlah yang ingin dibeli melebihi stok yang ada";
    }
}
else{
    echo "Jumlah yang dibeli harus lebih dari 0";
}

?>