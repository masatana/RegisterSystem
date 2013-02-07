<?php session_start();?>
<html>
<body>
<?php
require_once "definition.php";

$member = new Member($_POST[NAME_UJI], $_POST[NAME_NA], $_POST[NAME_UJI_YOMI], $_POST[NAME_NA_YOMI],
    $_POST[MAIL_ADDRESS], $_POST[BIRTH_YEAR], $_POST[BIRTH_MONTH],
    $_POST[BIRTH_DAY], $_POST[BLOOD_TYPE], $_POST[COURSE_NAME], $_POST[SPECIAL_REPORT]);

$isValidInputs = array(NAME_UJI=>TRUE, NAME_NA=>TRUE, NAME_UJI_YOMI=>TRUE,
    NAME_NA_YOMI=>TRUE, MAIL_ADDRESS=>TRUE, BIRTH=>TRUE, BLOOD_TYPE=>TRUE, COURSE_NAME=>TRUE
);
$canGoNextPage = $member->isValidInput();
$_SESSION[NAME_UJI] = $_POST[NAME_UJI];
$_SESSION[NAME_NA] = $_POST[NAME_NA];
$_SESSION[NAME_UJI_YOMI] = $_POST[NAME_UJI_YOMI];
$_SESSION[NAME_NA_YOMI] = $_POST[NAME_NA_YOMI];
$_SESSION[MAIL_ADDRESS] = $_POST[MAIL_ADDRESS];
$_SESSION[BIRTH_YEAR] = $_POST[BIRTH_YEAR];
$_SESSION[BIRTH_MONTH] = $_POST[BIRTH_MONTH];
$_SESSION[BIRTH_DAY] = $_POST[BIRTH_DAY];
$_SESSION[BLOOD_TYPE] = $_POST[BLOOD_TYPE];
$_SESSION[COURSE_NAME] = $_POST[COURSE_NAME];
$_SESSION[SPECIAL_REPORT] = $_POST[SPECIAL_REPORT];

/*
function checkValidInput ($sPost) {
    $isValidInput = TRUE;
    if(!isset($sPost) || $sPost == "") {
        $isValidInput = FALSE;
    }
    return $isValidInput;
}

$isValidInputs[NAME_UJI] = checkValidInput($_POST[NAME_UJI]);
$isValidInputs[NAME_NA] = checkValidInput($_POST[NAME_NA]);
$isValidInputs[NAME_UJI_YOMI] = checkValidInput($_POST[NAME_UJI_YOMI]);
$isValidInputs[NAME_NA_YOMI] = checkValidInput($_POST[NAME_NA_YOMI]);
$isValidInputs[MAIL_ADDRESS] = checkValidInput($_POST[MAIL_ADDRESS]);
$isValidInputs[BIRTH] = checkValidInput($_POST[BIRTH]);
$isValidInputs[AGE] = checkValidInput($_POST[AGE]);
$isValidInputs[BLOOD_TYPE] = checkValidInput($_POST[BLOOD_TYPE]);
$isValidInputs[COURSE_NAME] = checkValidInput($_POST[COURSE_NAME]);
$isValidInputs[SPECIAL_REPORT] = checkValidInput($_POST[SPECIAL_REPORT]);

foreach($isValidInputs as $inputValue) {
    if (!$inputValue) {
        $canGoNextPage = FALSE;
    }
}
*/

if ($canGoNextPage) {
    echo "会員管理登録確認";
    echo "<a href='index.html'>トップへ戻る</a><br />";
    echo "<table border='1'><tr>";

    echo "<td>氏名</td>";
    $output_name = htmlspecialchars($member->name_uji, ENT_QUOTES).htmlspecialchars($member->name_na, ENT_QUOTES);
    echo "<td>$output_name</td>";
    echo "</tr><tr>";

    echo "<td>フリガナ</td>";
    $output_name_yomi = htmlspecialchars($member->name_uji_yomi, ENT_QUOTES).htmlspecialchars($member->name_na_yomi, ENT_QUOTES);
    echo "<td>$output_name_yomi</td>";
    echo "</tr><tr>";

    echo "<td>メール</td>";
    $output_mail_address = htmlspecialchars($member->mail_address, ENT_QUOTES);
    echo "<td>$output_mail_address</td>";
    echo "</tr><tr>";

    echo "<td>生年月日</td>";
    // TODO 取り敢えず適当に
    $output_birth = htmlspecialchars($member->birth_year).htmlspecialchars($member->birth_month).htmlspecialchars($member->birth_day);
    echo "<td>$output_birth</td>";
    echo "</tr><tr>";

    echo "<td>血液型</td>";
    $output_blood_type = htmlspecialchars($member->blood_type, ENT_QUOTES);
    echo "<td>$output_blood_type</td>";
    echo "</tr><tr>";

    echo "<td>希望コース</td>";
    // TODO 取り敢えずシカト、多分foreachかなんかでarrayを回す
    $output_course = implode($member->course_name);
    echo "<td>$output_course</td>";
    echo "</tr><tr>";

    echo "<td>特記事項</td>";
    $output_special_report = htmlspecialchars($member->special_report, ENT_QUOTES);
    echo "<td>$output_special_report</td>";
    echo "</tr><tr>";

    echo '<td><input type="button" onclick="location.href=\'regist.php\'" value="確認"></input></td>';
    echo '<td><input type="button" onclick="location.href=\'input.php\'" value="戻る"></input></td>';
    echo "</tr></table>";
}
?>
</body>
</html>
