<?php
	$cr_date = "";
	$ac_num = "";
	$ac_date = "";	
	$action = "re_insert.php";
	$r_id = "";
	
	
	// $num = isset($_REQUEST["num"] ? $_REQUEST["num"] : 0;
	$c_id = $_REQUEST["c_id"] ?? 0;
	
	if($c_id > 0){ 
		require("db_connect.php");
		$query = $db->query("select * from c_reservation where c_id=$c_id");
		if ($row = $query->fetch()) {
			$cr_date = $row["cr_date"];
			$ac_num = $row["ac_num"];
			$ac_date = $row["ac_date"];
			$r_id = $row["r_id"];			
			$action = "re_update.php?c_id=$c_id";
		}
	}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
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
<body>


</form>

<form method="post" action="<?=$action?>">
<table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
		<tr>
        <td height=20 align= center bgcolor=#ccc><font color=white> 예약하기</font></td>
        </tr>
		<tr>
		<td bgcolor=white>
        <table class = "table2">
        <th>예약날짜</th>
        <td><input type="text" name="cr_date" maxlength="80" value="<?=$cr_date?>"</td>
    </tr>
    <tr>
        <th>총 인원수</th>
        <td><input type="text" name="ac_num" maxlength="20" value="<?=$ac_num?>"></td>
    </tr>
    <tr>
        <th>숙박기간</th>
        <td><input type ="text" name="ac_date" maxlength="20" value ="<?=$ac_date?>"></td>
    </tr>
	<input type ="hidden" name="c_id" maxlength="20" value ="<?=$c_id?>"></td>
	
</table>


<br>
<center>
<input type = "submit" value="예약">
<input type="button" value="취소" onclick="history.back()">
</center>
</form>


</body>
</html>