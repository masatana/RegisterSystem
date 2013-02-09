<?php session_start();?>
<html>
<body>
<?php
require_once "definition.php";
$sql_no = $_SESSION["no"];
$s = mysql_connect("localhost", "root") or die("failed");

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
$sql_course_charge = 1000;
$result = mysql_select_db('test', $s);

$sql_UPDATE =<<<EOS
UPDATE `member_list`
SET `name_uji`='{$sql_name_uji}', `name_na`='{$sql_name_na}', `name_uji_yomi`='{$sql_name_uji_yomi}', `name_na_yomi`='{$sql_name_na_yomi}',
	`mail_address`='{$sql_mail_address}', `birth`='{$sql_birth}', `age`='{$sql_age}', `blood_type`='{$sql_blood_type}',
	`course_name`='{$sql_course_name}', `course_charge`='{$sql_course_charge}', `special_report`='{$sql_special_report}'
WHERE `no`='{$sql_no}'
EOS;


$table = mysql_query($sql_UPDATE, $s);

echo "<p>登録完了</p>";
echo "<a href='index.html'>トップへ戻る</a>";
mysql_close($s);
session_destroy();
?>
</body>
</html>
