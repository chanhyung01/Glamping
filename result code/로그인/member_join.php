<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
	$id = $_REQUEST["id"];
	$pw = $_REQUEST["pw"];
	$name = $_REQUEST["name"];
	
	require("db_connect.php");
	
	if( !($id && $pw && $name)){
?>
		<script>
			alert('빈칸 없이 입력해야 합니다');
			history.back();
		</script>
<?php
	}else if ($db->query("select * from member where id = '$id'")->fetch()){
?>
		<script>
			alert('이미 등록된 아이디 입니다');
			history.back();
		</script>
<?php	
	} else{
		
		$db->exec("insert into member values ('$id','$pw','$name')")
	
?>
		가입이 완료되었습니다<br>
		<input type ="button" value="로그인 화면으로"onclick="location.href='login_main.php'"><br>
<?php
	}
?>
</body>
</html>