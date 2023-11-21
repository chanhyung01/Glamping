<?php
	$cr_date=$_REQUEST["cr_date"];
	$ac_num=$_REQUEST["ac_num"];
	$ac_date=$_REQUEST["ac_date"];
	$c_id = $_REQUEST["c_id"];
	
	if ($cr_date && $ac_num && $ac_date){
		
		require("db_connect.php");
		$query = $db->exec("update c_reservation set  cr_date='$cr_date',
							ac_num='$ac_num',ac_date='$ac_date' where c_id=$c_id");
	
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