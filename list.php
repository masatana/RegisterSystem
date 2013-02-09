<?php session_start();?>
<html>
<body>
<?php
echo "<table border='1'";
echo "<tr><th>会員no</th><th>会員id</th><th>氏名</th><th>フリガナ</th><th>メール</th><th>生年月日</th><th>年齢</th>";
echo "<th>血液型</th><th>希望コース</th><th>請求金額</th><th>特記事項</th><th></th></tr>";

$s = mysql_connect("localhost", "root") or die("failed");

$result = mysql_query("SELECT * FROM test.member_list");
while ($row = mysql_fetch_assoc($result)) {


	$no = $row["no"];
	$id = $row["id"];
	$name = $row["name_uji"].$row["name_na"];
	$name_yomi = $row["name_uji_yomi"].$row["name_na_yomi"];
	$mail_address = $row["mail_address"];
	$birth = $row["birth"];
	$age = $row["age"];
	$blood_type = $row["blood_type"];
	$course_name = $row["course_name"];
	$course_charge = $row["course_charge"];
	$special_report = $row["special_report"];

	$str_no = (string) $no;

	echo "<tr><td>$no</td>";
	echo "<td>$id</td>";
	echo "<td>$name</td>";
	echo "<td>$name_yomi</td>";
	echo "<td>$mail_address</td>";
	echo "<td>$birth</td>";
	echo "<td>$age</td>";
	echo "<td>$blood_type</td>";
	echo "<td>$course_name</td>";
	echo "<td>$course_charge</td>";
	echo "<td>$special_report</td>";
	echo "<td><button onclick=location.href='edit.php?edit=${str_no}'>編集</button>";
	echo "<button onclick=location.href='delete.php?delete=${str_no}'>削除</button></td></tr>";
	//echo '<td><button value="削除" onclick="location.href=$location></button></td></tr>';
	//echo "<td><button onclick=$location>削除</button></td></tr>";
}
echo "</table>";
mysql_close($s);

?>

</body>
</html>