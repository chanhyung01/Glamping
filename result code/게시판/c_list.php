<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
    <style>
 		table{
				width:800px; text-align:center;
                border-top: 1px solid #444444;
                border-collapse: collapse;
        }
        tr{
                border-bottom: 1px solid #444444;
                padding: 10px;
        }
        td{
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                text-align:center;
                padding-top:20px;
                color:#000000
        }
        .text:hover{
                text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover { text-decoration : underline;}
    </style>

<body>
		
        <table align = center>
        
		<h2 align=center>게시판</h2>
		<table align = center>
        <thead align = "center">
    <tr>
        <th>번호    </th>
        <th>제목    </th>
        <th>작성자  </th>
        <th>작성일시</th>
		<th>조회수</th>
    </tr>
<?php
	session_start();
	$listSize = 7;
	$page = $_REQUEST["page"] ?? 1;
	$start = ($page - 1) * $listSize;

	require("db_connect.php");
	$query = $db->query("select * from camp order by num desc limit $start, $listSize");
    while ($row = $query->fetch()) {
?>   

    <tr>
		<td><?=$row["num"]?></td>
        <td style="text-align:left;"><a href="c_view.php?num=<?=$row["num"]?>&&page=<?=$page?>"><?=$row["title"]?></a></td>
        <td><?=$row["writer"]?></td>
        <td><?=$row["regtime"]?></td>
        <td><?=$row["hits"]?></td>
    </tr>
<?php
	}
?>
</table>
<center>
<div style = "width:680px; text-align:center;" >
<?php 
	$paginationSize = 3;
	
	$firstLink = floor(($page - 1) / $paginationSize) * $paginationSize + 1;
	$lastLink = $firstLink + $paginationSize - 1;
	
	$query = $db->query("select count(*) from camp");
    $row = $query->fetch();
	$numRecords = $row[0];
	// $numRecords = $$db->query("select count(*) from board") ->fettch()[0];
	$numPages = ceil($numRecords / $listSize);
	if ($lastLink > $numPages){
		$lastLink = $numPages;
	}
	
	if ($firstLink > 1) {
		$link = $firstLink - 1 ;
		echo "<a href=\"c_list.php?page=$link\">이전</a>";
	}
	
	for ($i = $firstLink; $i <= $lastLink; $i++){
		if ($i == $page) {
			echo "<a href=\"c_list.php?page=$i\"><u>$i</u></a>";
		}
		else{
		echo "<a href=\"c_list.php?page=$i\">$i</a>";
		}
	}
	
	if ($lastLink < $numPages) {
		$link = $lastLink + 1 ;
		echo "<a href=\"c_list.php?page=$link\">다음</a>";
	}
?>
</div>
</center>
<br>
<center>
<input type="button" value="글쓰기" onclick="location.href='c_write.php'">
<input type="button" value="홈페이지로 이동" onclick="location.href='main.php'">
</center> 
</body>
</html>