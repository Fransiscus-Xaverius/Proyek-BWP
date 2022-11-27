<?php
    require("helper.php");
    $cart = $_SESSION['cart'];
    $temp = $_REQUEST['id'];

    $grandTotal = 0;
    $pengiriman = 500000;
    for ($i=0; $i < sizeof($cart); $i++) { 
        if($cart[$i]['idUser'] == $temp){
            $barang = mysqli_fetch_array(mysqli_query($con, "select * from sepeda where id_sepeda = '".$cart[$i]['idBarang']."'"));
            $total = $barang['harga_sepeda'] * $cart[$i]['jumlah'];
            $grandTotal += $total;
        }
    }
    if($grandTotal == 0){
        $pengiriman = 0;
    }

    echo '
    <div class="col-12 mb-3" style="border : 1px solid black; border-radius : 10px;">
        <div class="row">
            <div class="col-12 p-5">
                <h3 class="fw-bold fs-2">Total Barang</h3>
                <h5 class="fs-3">'.$grandTotal.'</h5>
                <h3 class="fw-bold fs-2">Biaya Pengiriman</h3>
                <h5 class="fs-3">'.$pengiriman.'</h5>
                <h3 class="fw-bold fs-2">Grand Total</h3>
                <h5 class="fs-3"><?php $total = ($grandTotal+$biayaPengiriman);echo $total;?></h5>
                <form method="post">
                    <input type="hidden" name="nominal" value='<?php echo $total?>'>
                </form>
                <button type="submit" name="checkout" id="checkout" class="btn btn-primary ps-5 pe-5">Checkout</button>
                </div>
            </div>
        </div>
    ';
?>