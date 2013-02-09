<?php
$s = mysql_connect("localhost", "root") or die("failed");
echo $_GET["delete"];
$del = $_GET["delete"];
$sql = "DELETE FROM test.member_list where no = $del";
echo $sql;
echo "delete";
$result = mysql_query($sql);
mysql_close($s);
?>