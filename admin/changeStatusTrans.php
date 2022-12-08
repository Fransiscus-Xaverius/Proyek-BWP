<?php

require_once("helper.php");

if(isset($_GET['id'])&&isset($_GET['status'])){
    $query = mysqli_query($con, "UPDATE `htrans` SET status = ".$_GET['status']." where htrans_id = '".$_GET['id']."'");
    if($query){
        echo "Berhasil Update Status Pembayaran";
    }
    else{
        echo "Gagal Update Status Pembayaran";
    }
}
else{
    echo "data tidak didapat";
}

?>