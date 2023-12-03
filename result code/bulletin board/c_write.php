<?php
	session_start();
	if(!$_SESSION["userId"])
	{
?>
	<script>
	alert("로그인 후 이용해 주세요");
	location.replace("login_main.php")
	</script>
<?php
	exit;
	}
?>
<?php
	$page = $_REQUEST["page"] ?? 1;

	$title = "";
	$writer = "";
	$content = "";
	$action = "c_insert.php";
	
	// $num = isset($_REQUEST["num"] ? $_REQUEST["num"] : 0;
	$num = $_REQUEST["num"] ?? 0;
	
	if($num > 0){ 
		require("db_connect.php");
		$query = $db->query("select * from camp where num=$num");
		if ($row = $query->fetch()) {
			$title = $row["title"];
			$content = $row["content"];
			$writer = $row["writer"];
			$action = "c_update.php?num=$num&page=$page";
		}
	}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<style>
        table.table2{
				
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 20px 10px;
				
        }
        table.table2 tr {
                 width: 50px;
                 padding: 10px;
                 font-weight: bold;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
        table.table2 td {
                 width: 100px;
                 padding: 10px;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
		
 
</style>
</head>
<body>

<form method="post" action="<?=$action?>">
 <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
         <tr>
         <td height=20 align= center bgcolor=#ccc><font color=white> 방문 후기</font></td>
         </tr>
         <tr>
         <td bgcolor=white>
<table class = "table2">
	<tr>
        <th>작성자</th>
        <td><input type="hidden" name="writer"  style="width:300px;height:200px;" maxlength="20" value="<?=$_SESSION['userName']?>"><?=$_SESSION['userName']?></td>
    </tr>
    <tr>
        <th>제목</th>
        <td><input type="text" name="title"  style="width:550px;" maxlength="80" value="<?=$title?>"</td>
    </tr>
    <tr>
        <th>내용</th>
        <td><textarea name="content"  style="width:550px;height:200px;" rows="10"><?=$content?></textarea></td>
    </tr>
</table>

<br>
<input type="submit" value="저장">
<input type="button" value="취소" onclick="history.back()">
</form>


</body>
</html>