<?php
require_once("simple_html_dom.php");

    $listImage = [];
    $listDesc = [];
    $listSubURL = [];
    $listHarga = [];
    $listNama = [];

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'db_toko_sepeda';
    $port = '3306';
    $conn = new mysqli($host, $user, $password, $database);
    if ($conn->connect_errno) {
        die("gagal connect : " . $conn->connect_error);
        echo "<script>alert('Connect Gagal')</script>";
    }

    $html = file_get_html('https://www.polygonbikes.com/junior/');
    $divData = $html->find('div[class=product-list__image]');
    foreach ($divData as $key => $value) {  
        $img = $value->find('img');
        foreach ($img as $temp) {
            $text = $temp->src;
            array_push($listImage,$text);
        }
        
    }

    //ambil desc singkat
    $Data = $html->find('div[class=product-list__tagline excerpt-3]');
    //print_r($Data);
    if($Data){
        foreach ($Data as $key => $value) {
            $txt = $value->text();
            array_push($listDesc,$txt);
        }
    }
    else{
        echo "gagal";
    }


    //ambil sub page.
    $SubURL = $html->find('div[class=product-list__title] a');
    if($SubURL){
        foreach ($SubURL as $key => $value) {
            $link = $value->href;
            array_push($listSubURL,$link);
        }
    }
    else{
        echo "Tidak dapet";
    }

    $namaProduk = $html->find('div[class=product-list__title]');
    if($namaProduk){
        foreach($namaProduk as $key => $value){
            $name = $value->text();
            array_push($listNama,$name);
        }
    }

    //ambil harga dari web.
    foreach ($listSubURL as $key => $value) {
        $subPage = file_get_html($value);
        $target = $subPage->find('bdi');
        foreach($target as $k => $v){
            $price = $v->text();
            if(str_contains($price, ',')){
                // $search = array(',');
                // $replace = array('');
                $temp = str_replace(",", "", $price);
                $temps = substr($temp, 2);
                $temps = substr($temps, 3);
                array_push($listHarga, $temps);
            }
        }
    }

    print_r($listHarga);
    $count = 19;
    for ($i=0; $i < sizeof($listDesc); $i++) { 
        $r = rand(0,100);
        $insert = "INSERT INTO SEPEDA (id_sepeda, nama_sepeda, id_kategori, id_merk, image_sepeda, deskripsi_sepeda, stok_sepeda, harga_sepeda, status_sepeda) values ('spd_$count', '$listNama[$i]', 'kat_2', 'merk_1', '$listImage[$i]', '$listDesc[$i]', '$r', ($listHarga[$i]*15500) ,1)"; 
        echo $insert."<br>";
        if ($conn->query($insert) === TRUE) {
            echo "<script>alert('Berhasil add!')</script>";
        }
        $count++; 
    }




?>