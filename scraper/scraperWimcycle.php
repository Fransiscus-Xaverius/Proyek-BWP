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

    $html = file_get_html('wimcycle.html');
    $divData = $html->find('img[class="fade-in"]');
    foreach ($divData as $key => $value) {  
        $text = $value->src;
        array_push($listImage,$text);
    }

    $dataNama = $html->find('h2[class="title"]');
    foreach($dataNama as $key => $value){
        $text = $value->text();
        $nama = str_replace("   ", "", $text);
        array_push($listNama,$nama);
    }

    $dataPrice = $html->find('div[class="price"]');
    foreach ($dataPrice as $key => $value) {
        $text = $value->text();
        $hilang = str_replace(",-", "", $text);
        $hilang2 = str_replace(".", "", $hilang);
        $duit = str_replace("IDR ", "", $hilang2);
        array_push($listHarga,$duit);
    }

    $desc = "A Classic Urban Bike for City use from the prestigious local brand, Wimcycle.";

    $count = 56;
    for ($i=0; $i < sizeof($listHarga); $i++) { 
        $r = rand(0,100);
        $insert = "INSERT INTO SEPEDA (id_sepeda, nama_sepeda, id_kategori, id_merk, image_sepeda, deskripsi_sepeda, stok_sepeda, harga_sepeda, status_sepeda) values ('spd_$count', '$listNama[$i]', 'kat_2', 'merk_2', '$listImage[$i]', '$desc', '$r', $listHarga[$i] ,1)"; 
        echo $insert."<br>";
        if ($conn->query($insert) === TRUE) {
            echo "<script>alert('Berhasil add!')</script>";
        }
        $count++; 
    }

?>