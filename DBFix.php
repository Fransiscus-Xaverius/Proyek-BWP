<?php
    require_once("helper.php");

    $result = mysqli_query($con, "select * from sepeda");
    foreach ($result as $key => $value) {
        $filename = $value["image_sepeda"];
        $id = $value["id_sepeda"];
        $query = "UPDATE sepeda SET image_sepeda='".$filename.".png' WHERE id_sepeda = '".$id."'";
        $go = mysqli_query($con, $query);
        if($go){
            echo "berhasil<br>";
        }
    }

?>