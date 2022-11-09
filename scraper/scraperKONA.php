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

    $desc = "THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE";

    $html = file_get_html('https://konaworld.com/bikes_electric.cfm');
    $divData = $html->find('div[class=bikethumb_image]');
    foreach ($divData as $key => $value) {  
        $img = $value->find('img');
        foreach ($img as $temp) {
            $text = $temp->src;
            array_push($listImage,$text);
            $name = $temp->alt;
            array_push($listNama, $name);
            $r = rand(3000000,10000000);
            array_push($listHarga, $r);
        }
    }

    $count = 93;
    for ($i=0; $i < sizeof($listHarga); $i++) { 
        $r = rand(0,100);
        $insert = "INSERT INTO SEPEDA (id_sepeda, nama_sepeda, id_kategori, id_merk, image_sepeda, deskripsi_sepeda, stok_sepeda, harga_sepeda, status_sepeda) values ('spd_$count', '$listNama[$i]', 'kat_5', 'merk_3', '$listImage[$i]', '$desc', $r, $listHarga[$i] ,1)"; 
        echo $insert."<br>";
        if ($conn->query($insert) === TRUE) {
            echo "<script>alert('Berhasil add!')</script>";
        }
        $count++; 
    }





?>