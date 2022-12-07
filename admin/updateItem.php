<?php
    require("helper.php");
    $id = $_REQUEST['id'];
    $_SESSION['idBarang'] = $id;
    
    header("Location: updateBarang.php");
    exit;
?>