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
$course_text = "";
$special_report_text = "";


echo '<div align="center"><p>会員管理システム</p><a href="./index.html">トップへ戻る</a></div>';
// FIXME
if (isset($_SESSION[NAME_UJI])) $name_uji_text = $_SESSION[NAME_UJI];
if (isset($_SESSION[NAME_NA])) $name_na_text = $_SESSION[NAME_NA];
if (isset($_SESSION[NAME_UJI_YOMI])) $name_uji_yomi_text = $_SESSION[NAME_UJI_YOMI];
if (isset($_SESSION[NAME_NA_YOMI])) $name_na_yomi_text = $_SESSION[NAME_NA_YOMI];
if (isset($_SESSION[MAIL_ADDRESS])) $mail_adress_text = $_SESSION[MAIL_ADDRESS];
if (isset($_SESSION[BIRTH_YEAR])) $birth_year_text = $_SESSION[BIRTH_YEAR];
if (isset($_SESSION[BIRTH_MONTH])) $birth_month_text = $_SESSION[BIRTH_MONTH];
if (isset($_SESSION[BIRTH_DAY])) $birth_day_text = $_SESSION[BIRTH_DAY];
if (isset($_SESSION[BLOOD_TYPE])) $blood_type_text = $_SESSION[BLOOD_TYPE];
if (isset($_SESSION[COURSE_NAME])) $course_text = $_SESSION[COURSE_NAME];
if (isset($_SESSION[SPECIAL_REPORT])) $special_report_text = $_SESSION[SPECIAL_REPORT];

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
for ($y = 1900; $y < date(Y) + 1; $y++) {
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
    $select_year = "";
    if ($birth_day_text == $d) $select_day = "selected='selected'";
    echo '<option value="'.$d.'"'.$select_day.'>'.$d."</option>";
}
echo "</select></td>";
echo "</tr><tr>";

echo "<td>血液型</td>";
echo "<td><input type='radio' name='input_blood_type' value='A'>A型</input>";
echo "<input type='radio' name='input_blood_type' value='B'>B型</input>";
echo "<input type='radio' name='input_blood_type' value='O'>O型</input>";
echo "<input type='radio' name='input_blood_type' value='AB'>AB型</input></td>";
echo "</tr><tr>";

echo "<td>希望コース</td>";
echo "<td><input type='checkbox' name='input_course_name[]' value='atami'>熱海温泉ツアー(¥¥1,000)</input>";
echo "<input type='checkbox' name='input_course_name[]' value='hokkaido'>北海道回線ツアー(¥¥2,000)</input>";
echo "<input type='checkbox' name='input_course_name[]' value='shikoku'>四国八十八ヶ所めぐり(¥¥3,000)</input></td>";
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
