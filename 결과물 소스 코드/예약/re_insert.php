<?php	
	session_start();
	$cr_date=$_REQUEST["cr_date"];
	$ac_num=$_REQUEST["ac_num"];
	$ac_date=$_REQUEST["ac_date"];
	$r_id = $_SESSION["userId"];
	$c_id = $_REQUEST["c_id"];
	
	
	if ($cr_date && $ac_num && $ac_date){
		
		require("db_connect.php");
		$query = $db->exec("insert into c_reservation ( c_id, r_id, cr_date, ac_num, ac_date) values ('$c_id','$r_id','$cr_date', '$ac_num', '$ac_date')");
		header("Location:location_table.php");
		exit;
	}
	
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<script>
	alert('모든 항목은 공백으로만 채울 수 없습니다.');
	history.back();
</script>

</body>
</html>