<?php session_start();?>
<html>
<body>
<form method="post" action="./confirm.php">
<?php
require_once "definition.php";

$name_uji_text = "";
$name_na_text = "";
$name_uji_yomi_text = "";
$name_na_yomi_text = "";
$mail_adress_text = "";
$birth_year_text = "";
$birth_month_text = "";
$birth_day_text = "";
$blood_type_text = "";
$course_text = array();
$special_report_text = "";


echo '<div align="center"><p>会員管理システム</p><a href="./index.html">トップへ戻る</a></div>';
// FIXME
if (isset($_SESSION['input_name_uji'])) $name_uji_text = $_SESSION['input_name_uji'];
if (isset($_SESSION['input_name_na'])) $name_na_text = $_SESSION['input_name_na'];
if (isset($_SESSION['input_name_uji_yomi'])) $name_uji_yomi_text = $_SESSION['input_name_uji_yomi'];
if (isset($_SESSION['input_name_na_yomi'])) $name_na_yomi_text = $_SESSION['input_name_na_yomi'];
if (isset($_SESSION['input_mail_address'])) $mail_adress_text = $_SESSION['input_mail_address'];
if (isset($_SESSION['input_birth_year'])) $birth_year_text = $_SESSION['input_birth_year'];
if (isset($_SESSION['input_birth_month'])) $birth_month_text = $_SESSION['input_birth_month'];
if (isset($_SESSION['input_birth_day'])) $birth_day_text = $_SESSION['input_birth_day'];
if (isset($_SESSION['input_blood_type'])) $blood_type_text = $_SESSION['input_blood_type'];
if (isset($_SESSION['input_course_name'])) $course_text = $_SESSION['input_course_name'];
if (isset($_SESSION['input_special_report'])) $special_report_text = $_SESSION['input_special_report'];




if (isset($_SESSION['invalid'])) echo implode($_SESSION['invalid']);




echo "<table border='1'><tr>";

echo "<td>氏名</td>";
echo "<td><input type='text' name='input_name_uji' value='$name_uji_text'></input>";
echo "<input type='text' name='input_name_na' value='$name_na_text'></input></td>";
echo "</tr><tr>";

echo "<td>フリガナ</td>";
echo "<td><input type='text' name='input_name_uji_yomi' value='$name_uji_yomi_text'></input>";
echo "<input type='text' name='input_name_na_yomi' value='$name_na_yomi_text'></input></td>";
echo "</tr><tr>";

echo "<td>メール</td>";
echo "<td><input type='text' name='input_mail_address' value='$mail_adress_text'></input></td>";
echo "</tr><tr>";

echo "<td>生年月日</td>";
echo "<td><select name='input_birth_year'>";
for ($y = 1900; $y < date('Y') + 1; $y++) {
    $select_year = "";
    if ($birth_year_text == $y) $select_year = "selected='selected'";
    echo '<option value="'.$y.'"'.$select_year.'>'.$y."</option>";
}
echo "</select>";
echo "<select name='input_birth_month'>";
for ($m = 1; $m <= 12; $m++) {
    $select_month = "";
    if ($birth_month_text == $m) $select_month = "selected='selected'";
    echo '<option value="'.$m.'"'.$select_month.'>'.$m."</option>";
}
echo "</select>";
echo "<select name='input_birth_day'>";
for ($d = 1; $d <= 31; $d++) {
    $select_day = "";
    if ($birth_day_text == $d) $select_day = "selected='selected'";
    echo '<option value="'.$d.'"'.$select_day.'>'.$d."</option>";
}
echo "</select></td>";
echo "</tr><tr>";

echo "<td>血液型</td>";
$checked = "";
if ($blood_type_text === "A") $checked = "checked";
echo "<td><input type='radio' name='input_blood_type' value='A' {$checked} default>A型</input>";
$checked = "";
if ($blood_type_text === "B") $checked = "checked";
echo "<input type='radio' name='input_blood_type' value='B' {$checked}>B型</input>";
$checked = "";
if ($blood_type_text === "O") $checked = "checked";
echo "<input type='radio' name='input_blood_type' value='O' {$checked}>O型</input>";
$checked = "";
if ($blood_type_text === "AB") $checked = "checked";
echo "<input type='radio' name='input_blood_type' value='AB' {$checked}>AB型</input></td>";
$checked = "";
echo "</tr><tr>";

echo "<td>希望コース</td>";
if (in_array("atami", $course_text)) $checked = "checked";
echo "<td><input type='checkbox' name='input_course_name[]' value='atami' {$checked}>熱海温泉ツアー</input>";
$checked = "";
if (in_array("hokkaido", $course_text)) $checked = "checked";
echo "<input type='checkbox' name='input_course_name[]' value='hokkaido' {$checked}>北海道回線ツアー</input>";
$checked = "";
if (in_array("shikoku", $course_text)) $checked = "checked";
echo "<input type='checkbox' name='input_course_name[]' value='shikoku'>四国</input></td>";
$checked = "";
echo "</tr><tr>";

echo "<td>特記事項</td>";
echo "<td><textarea name='input_special_report' rows='30%' cols='100%' value='$special_report_text'></textarea></td>";
echo "</tr><tr>";

echo "<td><input type='submit' value='確認'></input></td>";
echo "</tr></table>";
?>

</form>
</body>
</html>
