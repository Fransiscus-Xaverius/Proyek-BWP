<?php
	require("helper.php");
    $update_id = $_REQUEST['update_id'];
    $jumlah = $_REQUEST['jumlah'];
    $cart = $_SESSION['cart'];
    $sekarang = $cart[$update_id]['jumlah'];
    $sekarang += $jumlah;
    if($sekarang < 0){
        $sekarang = 0;
    }
    $cart[$update_id]['jumlah'] = $sekarang;
    $_SESSION['cart'] = $cart;
   
?>