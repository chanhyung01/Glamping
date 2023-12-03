<?php
    $c_id = $_REQUEST["c_id"];
    
    require("db_connect.php");
    $db->exec("delete from c_reservation where c_id=$c_id");
    
    header("Location:location_table.php");
    exit();
?>