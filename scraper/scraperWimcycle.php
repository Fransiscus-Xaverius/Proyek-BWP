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
        array_push($listNama,$text);
    }

    

?>