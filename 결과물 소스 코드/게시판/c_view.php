<?php
	$num = $_REQUEST["num"];
	$page = $_REQUEST["page"] ?? 1;
	
	require("db_connect.php");
	
	$query = $db->query("select * from camp where num=$num");
    if ($row = $query->fetch()) {
		$writer = $row["writer"];
		$regtime = $row["regtime"];
		$hits = $row["hits"];
		
		$title = str_replace(" ","&nbsp", $row["title"]);
		$content = str_replace(" ","&nbsp", $row["content"]);
		$content = str_replace("\n","<br>", $content);
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
<table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
		<tr>
         <td height=20 align= center bgcolor=#ccc><font color=white> <?=$num?>번 글보기</font></td>
         </tr>
         <tr>
         <td bgcolor=white>
<table class = "table2">
    <tr>
        <th>제목</th><td style="width:500px;"><?=$title?></td>
    </tr>
    <tr>
        <th>작성자</th><td style="width:500px;"><?=$writer?></td>
    </tr>
    <tr>
        <th>작성일시</th><td style="width:500px;"><?=$regtime?></td>
    </tr>
    <tr>
        <th>조회수</th><td style="width:500px;"><?=$hits?></td>
    </tr>
    <tr>
        <th>내용</th><td style="width:500px;"><?=$content?></td>
    </tr>
</table>

<br>

<?php
	session_start();
	if(isset($_SESSION["userId"])&& $_SESSION['userName']==$writer){
?>
<input type="button" value="수정"     onclick="location.href='c_write.php?num=<?=$num?>&page=<?=$page?>'">
<input type="button" value="삭제"     onclick="location.href='c_delete.php?num=<?=$num?>&page=<?=$page?>'">
<?php
	}
?>
<input type="button" value="목록보기" onclick="location.href='c_list.php?page=<?=$page?>'">
</body>
</html>