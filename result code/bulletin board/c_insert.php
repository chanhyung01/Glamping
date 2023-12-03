<?php	
	session_start();
	$title=$_REQUEST["title"];
	$content=$_REQUEST["content"];
	$username = $_SESSION["userName"];
	
	if ($title && $content){
		$regtime = date("Y-m-d H:i:s");
		
		require("db_connect.php");
		$query = $db->exec("insert into camp (writer, title, content, regtime, hits) values ('$username', '$title', '$content', '$regtime', 0 )");
		
		header("Location:c_list.php");
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