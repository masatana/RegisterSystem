<html>
<body>
<div align="center"><p>会員管理システム</p><a href="./index.html">トップへ戻る</a></div>
<br />
<form method="post" action="./confirm.php">
<?php 

$id_text = "";
$no_text = "";
$name_uji_text = "";
$name_na_text = "";
$name_uji_yomi_text = "";
$name_na_yomi_text = "";
$mail_adress_text = "";
$birth_text = "";
$age_text = "";
$blood_type_text = "";
$course_text = "";
$special_report_text = "";

session_start();
require_once(difinition.php);

// FIXME
if (isset($_SESSION[ID])) $id_text = $_SESSION[ID];
if (isset($_SESSION[NO])) $no_text = $_SESSION[no];
if (isset($_SESSION[NAME_UJI])) $name_uji_text = $_SESSION[NAME_UJI];
if (isset($_SESSION[NAME_NA])) $name_na_text = $_SESSION[NAME_NA];
if (isset($_SESSION[NAME_UJI_YOMI])) $name_uji_yomi_text = $_SESSION[NAME_UJI_YOMI];
if (isset($_SESSION[NAME_NA_YOMI])) $name_na_yomi_text = $_SESSION[NAME_na_YOMI];
if (isset($_SESSION[MAIL_ADDRESS])) $mail_adress_text = $_SESSION[MAIL_ADDRESS];
if (isset($_SESSION[BIRTH])) $birth_text = $_SESSION[BIRTH];
if (isset($_SESSION[AGE])) $age_text = $_SESSION[AGE];
if (isset($_SESSION[BLOOD_TYPE])) $blood_type_text = $_SESSION[BLOOD_TYPE];
if (isset($_SESSION[COURSE])) $course_text = $_SESSION[COURSE];
if (isset($_SESSION[SPECIAL_REPORT])) $special_report_text = $_SESSION[SPECIAL_REPORT];

$tmpdate =strtotime("$birth_text");
// TODO 20130206作りかけ
$input_year = 

echo "<table><tr>"
echo "<td>氏名</td>"
    echo "<td><input type='text' name='input_name_uji' value='$name_uji_text'></input>"
    echo "<input type='text' name='input_name_na' value='$name_na_text'></input></td>"
echo "</tr><tr>"
echo "<td>フリガナ</td>"
    echo "<td><input type='text' name='input_name_uji_yomi' value='$name_uji_yomi_text'></input>"
    echo "<input type='text' name='input_name_na_yomi' value='$name_na_yomi_text'></input></td>"
echo "</tr><tr>"
echo "<td>メール</td>"
    echo "<td><input type='text' name='input_mail_address' value='$mail_adress_text'></input></td>"
echo "</tr><tr>"
echo "<td>生年月日</td>"
// TODO プルダウン型のメニューには後ほどする 取り敢えずtextのinputで
echo "</tr><tr>"
    echo "<td><input type='text' name='' value='$name_uji_yomi_text'></input>"
echo "<td>血液型</td>"
    echo "<td><input type='radio' name='

echo "</tr></table>"
