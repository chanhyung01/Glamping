<?php	
	session_start();
    $id = $_REQUEST["id"];
    
    require("db_connect.php");
    $db->exec("delete from member where id='$id'");
	echo "
    <script>
        alert(\"정상처리 되었습니다.\");
        location.href = \"logout.php\";
    </script>";
	
    
    
    exit();
?>