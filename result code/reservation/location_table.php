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
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="table.css">
</head>
<body>

<table class="member">
    <tr>
        <th>번호</th>
        <th>유형</th>
		<th>위치</th>
		<th>가격</th>
		<th>평수</th>
		<th>예약</th>
    </tr>
<?php
	
	require("db_connect.php");
	$query = $db->query("select * from place order by c_id desc");{
    while ($row = $query->fetch()) {
		$rmnum = $row["c_id"];
?>   
    <tr>
		<td><?=$row["c_id"]?></td>        
        <td><?=$row["c_name"]?></td>
        <td><?=$row["c_floor"]?></td>
        <td><?=$row["price"]?></td>
		<td><?=$row["contents"]?></td>
		<?php
			
			require("db_connect.php");
			$result = $db->query("select * from c_reservation where c_id ='$row[c_id]'");
			if($row=$result->fetch()){				
				if($_SESSION["userId"] ==  $row["r_id"]) {
		?>
					<td><input type="button" value="예약수정"  onclick="location.href='reservation.php?c_id=<?=$row["c_id"]?>&id=<?=$_SESSION["userId"]?>'">
					<input type="button" value="예약취소"  onclick="location.href='re_delete.php?c_id=<?=$row["c_id"]?>'"></td>
		<?php
				}else{
		?>
					<td>예약불가</td>
		<?php			
				}
			}else{
		?>
				<td><a href="reservation.php?c_id=<?=$rmnum?>&id=<?=$_SESSION["userId"]?>">예약가능</a></td>
		<?php
			}
		?>
    </tr>
<?php
	}
	}
?>
</table>


 
</body>
</html>