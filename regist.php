<?php session_start();?>
<html>
<body>
<?php
require_once "definition.php";
$s = mysql_connect("localhost", "root") or die("failed");
echo "Suceess";
$sql_name_uji = $_SESSION['input_name_uji'];
$sql_name_na = $_SESSION['input_name_na'];
$sql_name_uji_yomi = $_SESSION['input_name_uji_yomi'];
$sql_name_na_yomi = $_SESSION['input_name_na_yomi'];
$sql_mail_address = $_SESSION['input_mail_address'];
$sql_birth = $_SESSION['input_birth_year']."-".$_SESSION['input_birth_month']."-".$_SESSION['input_birth_day'];
$birth = $_SESSION['input_birth_year'].$_SESSION['input_birth_month'].$_SESSION['input_birth_day'];
$sql_blood_type = $_SESSION['input_blood_type'];
$sql_course_name = implode($_SESSION['input_course_name']);
$sql_special_report = $_SESSION['input_special_report'];

$sql_age = (int) ((date('Ymd')-(int)$birth)/10000);
// TODO 年齢が違う
echo $sql_age;
$sql_course_charge = getCharge($_SESSION['input_course_name']);


$sql_SELECT = "SELECT MAX(no) as mx FROM test.member_list";
$result = mysql_query($sql_SELECT);
$row =  mysql_fetch_assoc($result);
$sql_id = (int)(((string)mt_rand(1,9)).((string)$row['mx']));
echo $sql_id;

$sql_INSERT = "insert into test.member_list (no, id, name_uji, name_na, name_uji_yomi, name_na_yomi, mail_address,
	birth, age, blood_type, course_name, course_charge, special_report)
	values (NULL, '$sql_id', '$sql_name_uji', '$sql_name_na', '$sql_name_uji_yomi', '$sql_name_na_yomi', '$sql_mail_address',
	'$sql_birth', '$sql_age', '$sql_blood_type', '$sql_course_name', '$sql_course_charge', '$sql_special_report');";

$table = mysql_query($sql_INSERT);

echo "<p>登録完了</p>";
echo "<a href='index.html'>トップへ戻る</a>";
mysql_close($s);
session_destroy();

function getCharge($course_array) {
	$charge = 0;
	if (in_array("atami",$course_array)) $charge += 1000;
	if (in_array("hokkaido", $course_array)) $charge += 2000;
	if (in_array("shikoku", $course_array)) $charge += 3000;
	return $charge;
}

?>
</body>
</html>
