<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="common.css">
</head>
<style>
h1{
			color:purple;
			font-family:"Arial";
			font-size:60px;
			text-shadow:5px,5px,8px,#666666;
			}
</style>
<body>
	<header> 
		<section id = "top">
			<h1>The glamping</h1>
			
			<nav id = "top_menu">
				<ul>
				<?php
					session_start();
					if (empty($_SESSION["userId"])){
				?>
					<li class = "green"><a href="login_main.php">로그인</a></li>
				<?php
				
					}else {
				?>
					<li class = "green"><?=$_SESSION["userName"]?>님로그인</a></li>
					<li class = "red"><a href="logout.php">로그아웃</a></li>
					<li class = "red"><a href="login_main.php">회원수정/회원탈퇴</a></li>					
				<?php
				    }
				?>	
				
				</ul>
			</nav>
			<div class = "clear"></div>
		</section>
		<nav id = "main_menu">
			<ul>
				<li><a href="come.html">오시는 길</a><li>
				<li><a href="location_table.php">글램핑 예약</a><li>
				<li><a href="c_list.php">방문 후기</a><li>
			</ul>
		</nav>
		<center>
		<img src = "main.jpg" style="float:left; width:max; height:max;"></img>
		
		<img src = "glamping2.jpg" style="float:left; width:max; height:max;"></img>
		</center>
	</header>

	

</body>
</html>