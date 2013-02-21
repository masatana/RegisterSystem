<?php session_start();
echo '<html>';
echo '<script type="text/javascript" src="script.js"></script>';
echo '<body>';
echo '<form name="edit" method="post" action="./confirm_update.php" onSubmit="return checkInput()">';
require_once 'definition.php';

$s = mysql_connect("localhost", "root") or die("failed");
echo $_GET["edit"];
$edit = $_GET["edit"];
$sql = "SELECT * FROM test.member_list where no = $edit";
echo $sql;
echo "delete";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

$no = $row["no"];
$id = $row["id"];

$_SESSION["no"] = $no;

$birth_array = explode("-", (string)$row["birth"]);

$name_uji_text = $row["name_uji"];
$name_na_text = $row["name_na"];
$name_uji_yomi_text = $row["name_uji_yomi"];
$name_na_yomi_text = $row["name_na_yomi"];
$mail_adress_text = $row["mail_address"];
$birth_year_text = $birth_array[0];
$birth_month_text = $birth_array[1];
$birth_day_text = $birth_array[2];
$blood_type_text = $row["blood_type"];
$course_text = $row["course_name"];
$special_report_text = $row["special_report"];


echo '<div align="center"><p>会員管理システム</p><a href="./index.php">トップへ戻る</a></div>';

echo "<table border='1'><tr>";

echo "<td>会員no</td>";
echo "<td>$no</td>";
echo "</tr><tr>";

echo "<td>会員id</td>";
echo "<td>$id</td>";
echo "</tr><tr>";

echo '<td>氏名</td><td>';
echo <<<EOShimei
<input type='text' name='input_name_uji' value='{$name_uji_text}'></input>
<input type='text' name='input_name_na' value='{$name_na_text}'></input>
EOShimei;
echo '</td></tr><tr>';

echo '<td>フリガナ</td><td>';
echo <<<EOYomi
<input type='text' name='input_name_uji_yomi' value='{$name_uji_yomi_text}'></input>
<input type='text' name='input_name_na_yomi' value='{$name_na_yomi_text}'></input>
EOYomi;
echo '</td></tr><tr>';

echo '<td>メール</td><td>';
echo <<<EOMail
<input type='text' name='input_mail_address' value='{$mail_adress_text}'></input>
EOMail;
echo '</td></tr><tr>';

echo '<td>生年月日</td><td>';
setPulldownYear('input_birth_year', $birth_year_text);
setPulldownMonth('input_birth_month', $birth_month_text);
setPulldownDay('input_birth_day', $birth_day_text);
echo '</td></tr><tr>';

echo '<td>血液型</td><td>';
setRadioBloodType('input_blood_type', 'A', $blood_type_text);
setRadioBloodType('input_blood_type', 'B', $blood_type_text);
setRadioBloodType('input_blood_type', 'O', $blood_type_text);
setRadioBloodType('input_blood_type', 'AB', $blood_type_text);
echo '</td></tr><tr>';

$course_array = explode(',', $course_text);

echo '<td>希望コース</td><td>';
setCheckboxCourseName('input_course_name[]', 'atami', $course_array, '熱海温泉ツアー');
setCheckboxCourseName('input_course_name[]', 'hokkaido', $course_array, '北海道回線ツアー');
setCheckboxCourseName('input_course_name[]', 'shikoku', $course_array, '四国');
echo '</td></tr><tr>';

echo "<td>特記事項</td>";
echo "<td><textarea name='input_special_report' rows='30%' cols='100%' value='$special_report_text'></textarea></td>";
echo "</tr><tr>";

echo "<td><input type='submit' value='確認'></input></td>";
echo "</tr></table>";


mysql_close($s);


echo '</form>';
echo '</body>';
echo '</html>';
?>
