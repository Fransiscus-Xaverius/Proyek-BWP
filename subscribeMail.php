<?php

    require_once("helper.php");

    if(isset($_GET["mail"])){
        $query = "INSERT INTO `email` (`email`) values ('".$_GET["mail"]."')";
        $insert = mysqli_query($con, $query);
        if($insert){
            echo "Berhasil berlangganan ke OurCycle mail! nantikan berbagai promo dan penawaran lainnya yang pasti serba asik melalui email anda.";
        }
        else{
            echo "Gagal berlangganan ke OurCycle mail, coba lagi beberapa saat lagi..";
        }
    }

?>