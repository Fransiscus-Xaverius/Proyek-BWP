<?php
require_once("simple_html_dom.php");

    $listImage = [];
    $listDesc = [];
    $listSubURL = [];
    $listHarga = [];
    $listNama = [];

    $html = file_get_html('https://www.polygonbikes.com/mountain-bikes/');
    $divData = $html->find('div[class=product-list__image]');
    foreach ($divData as $key => $value) {  
        $img = $value->find('img');
        foreach ($img as $temp) {
            $text = $temp->src;
            echo $text;
            array_push($listImage,$text);
            echo "<img src='$text'><br>";
        }
        
    }

    //ambil desc singkat
    $Data = $html->find('div[class=product-list__tagline excerpt-3]');
    //print_r($Data);
    if($Data){
        foreach ($Data as $key => $value) {
            echo $value;
            array_push($listDesc,$value);
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
            echo $link;
            array_push($listSubURL,$link);
        }
    }
    else{
        echo "Tidak dapet";
    }

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
                echo $temps. "<br>";
                array_push($listHarga, $temps);
            }
        }
    }

    


?>