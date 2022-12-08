<?php
    require("helper.php");
    $id = $_REQUEST['id'];
    $_SESSION['idDetail'] = $id;
    
    header("Location: detailTrans.php");
    exit;
?>
