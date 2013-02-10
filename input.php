<?php session_start();
echo '<html>';
echo '<body>';
echo '<form method="post" action="./confirm.php">';
require_once 'definition.php';

$name_uji_text = "";
$name_na_text = "";
$name_uji_yomi_text = "";
$name_na_yomi_text = "";
$mail_adress_text = "";
$birth_year_text = "";
$birth_month_text = "";
$birth_day_text = "";
$blood_type_text = 'A';
$course_array = array();
$special_report_text = "";


echo '<div align="center"><p>会員管理システム</p><a href="./index.php">トップへ戻る</a></div>';
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
if (isset($_SESSION['input_course_name'])) $course_array = $_SESSION['input_course_name'];
if (isset($_SESSION['input_special_report'])) $special_report_text = $_SESSION['input_special_report']; 


if (isset($_SESSION['invalid'])) echo implode($_SESSION['invalid']);




echo '<table border="1"><tr>';

echo <<<EOShimei
<td>氏名</td>
<td><input type='text' name='input_name_uji' value='{$name_uji_text}'></input>
<input type='text' name='input_name_na' value='{$name_na_text}'></input></td>
</tr><tr>
EOShimei;

echo <<<EOYomi
<td>フリガナ</td>
<td><input type='text' name='input_name_uji_yomi' value='{$name_uji_yomi_text}'></input>
<input type='text' name='input_name_na_yomi' value='{$name_na_yomi_text}'></input></td>
</tr><tr>
EOYomi;

echo <<<EOMail
<td>メール</td>
<td><input type='text' name='input_mail_address' value='{$mail_adress_text}'></input></td>
</tr><tr>
EOMail;

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

echo '<td>希望コース</td><td>';
setCheckboxCourseName('input_course_name[]', 'atami', $course_array, '熱海温泉ツアー');
setCheckboxCourseName('input_course_name[]', 'hokkaido', $course_array, '北海道回線ツアー');
setCheckboxCourseName('input_course_name[]', 'shikoku', $course_array, '四国');
echo '</td></tr><tr>';

echo "<td>特記事項</td>";
echo "<td><textarea name='input_special_report' rows='30%' cols='100%' value='{$special_report_text}'></textarea></td>";
echo "</tr><tr>";

echo "<td><input type='submit' value='確認'></input></td>";
echo '</tr></table>';

echo '</form>';
echo '</body>';
echo '</html>';
?>
