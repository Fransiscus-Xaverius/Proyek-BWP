<?php
	require("helper.php");
    $update_id = $_REQUEST['update_id'];
    $cart = $_SESSION['cart'];
    array_splice($cart, $update_id, 1);
    $_SESSION['cart'] = $cart;
?>