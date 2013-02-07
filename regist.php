<?php session_start();?>
<html>
<body>
<?php
session_start();
require_once "definition.php";
$s = mysql_connect("localhost", "root") or die("failed");
echo "Suceess";
mysql_select_db("test");

$table = mysql_query("INSERT INTO test (id, name_uji, name_na, name_uji_yomi, name_na_yomi, mail_address,
    birth, age, blood_type, course_name, course_charge, special_report) VALUES ('10', '$_SESSION[NAME_UJI]',
    '$_SESSION[NAME_NA]', '$_SESSION[NAME_UJI_YOMI]', '$_SESSION[NAME_NA_YOMI]', $_SESSION[MAIL_ADDRESS]',
    '1990/10/04', '22', '$_SESSION[BLOOD_TYPE]', '$_SESSION[COURSE_NAME]', '3000', '$_SESSION[SPECIAL_REPORT]'");
mysql_close($s);
?>
</body>
</html>
