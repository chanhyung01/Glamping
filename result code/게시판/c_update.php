<?php
	session_start();
	$num = $_REQUEST["num"];
	$page = $_REQUEST["page"] ?? 1;
	
	$title=$_REQUEST["title"];
	$writer=$_REQUEST["writer"];
	$content=$_REQUEST["content"];
	$username = $_SESSION["userName"];
	
	if ($title && $writer && $content){
		$regtime = date("Y-m-d H:i:s");
		
		require("db_connect.php");
		$query = $db->exec("update camp set writer='$username', title='$title', content='$content',
							regtime='$regtime' where num=$num");
		
		header("Location:c_view.php?num=$num&page=$page");
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