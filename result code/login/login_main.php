<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
	session_start();
	if(empty($_SESSION["userId"])){ //로그인 안된 상태이면 userId 세션번수가 없음
?>
		<form action="login.php" method="post">
			아이디:   <input type="text"     name="id">&ensp;
			비밀번호: <input type="password" name="pw">&ensp;
			<input type="submit" value="로그인"> 
			<input type="button" value="회원가입" 
				   onclick = "location.href='member_join_form.php'"> 
		    
		</form>
<?php
	}else {
?>
		<form action="logout.php" method="post">
			<?=$_SESSION["userName"]?>님 로그인&ensp;	
			<input type="submit" value="로그아웃"> 
			<input type="button" value="회원정보 수정" 
                    onclick="location.replace('member_update_form.php');"

			<input type="button" value="홈페이지로 이동" 
				   onclick= "location.href='main.php'">
			
		</form>
		<input type="button" value="회원탈퇴" 
				   onclick= "location.href='m_delete.php?id=<?=$_SESSION["userId"]?>'">
	
<?php
	}
?>
	

</body>
</html>
