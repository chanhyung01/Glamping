<?php
    $num = $_REQUEST["num"];
	$page = $_REQUEST["page"] ?? 1;
    
    require("db_connect.php");
    $db->exec("delete from camp where num=$num");
    
    header("Location:c_list.php?page=$page");
    exit();
?>