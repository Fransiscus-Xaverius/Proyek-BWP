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

    $totalSemua = $grandTotal + $pengiriman;

    echo '
    <div class="col-12 mb-3" style="border : 1px solid black; border-radius : 10px;">
        <div class="row">
            <div class="col-12 p-5">
                <table>
                    <tr>
                        <td><h4 class=""> Subtotal </h4></td>
                        <td><h4 class=""> : </h4></td>
                        <td><h4 class="text-end">'.number_format($grandTotal, 0, ',', '.').'</h4></td>
                    </tr>
                    <tr>
                        <td><h4 class=""> Pengiriman </h4></td>
                        <td><h4 class=""> : </h4></td>
                        <td><h4 class="text-end">'.number_format($pengiriman, 0, ',', '.').'</h4></td>
                    </tr>
                    <tr>
                        <td><h4 class=""> Total </h4></td>
                        <td><h4 class=""> : </h4></td>
                        <td><h4 class="text-end">'.number_format($totalSemua, 0, ',', '.').'</h4></td>
                    </tr>
                    <tr>
                        <td colspan=3><h4 class=""> 
                            <button type="submit" name="checkout" id="checkout" class="btn btn-primary ps-5 pe-5">Checkout</button>
                        </h4></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    ';
?>