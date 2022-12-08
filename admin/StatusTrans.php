<?php
    require("helper.php");
    if(isset($_GET['id'])){
        $status = mysqli_query($con, "SELECT status from htrans where htrans_id = '".$_GET['id']."'");
        $status = $status->fetch_assoc();
        if($status['status']==1){
            echo '<div class="btn btn-success">Accepted</div>';
        }
        else if($status['status']==2){
            echo '<div class="btn btn-primary">Pending</div>';
        }
        else if($status['status']==3){
            echo '<div class="btn btn-warning">Rejected</div>';
        }
    }

?>