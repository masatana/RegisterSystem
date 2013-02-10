<?php session_start();?>
<html>
<body>
<?php
require_once "definition.php";
$member = new Member($_POST['input_name_uji'], $_POST['input_name_na'],
    $_POST['input_name_uji_yomi'], $_POST['input_name_na_yomi'],
    $_POST['input_mail_address'], $_POST['input_birth_year'], $_POST['input_birth_month'],
    $_POST['input_birth_day'], $_POST['input_blood_type'], $_POST['input_course_name'],
    $_POST['input_special_report']);

$canGoNextPage = $member->isValidInput();
$_SESSION['input_name_uji'] = $_POST['input_name_uji'];
$_SESSION['input_name_na'] = $_POST['input_name_na'];
$_SESSION['input_name_uji_yomi'] = $_POST['input_name_uji_yomi'];
$_SESSION['input_name_na_yomi'] = $_POST['input_name_na_yomi'];
$_SESSION['input_mail_address'] = $_POST['input_mail_address'];
$_SESSION['input_birth_year'] = $_POST['input_birth_year'];
$_SESSION['input_birth_month'] = $_POST['input_birth_month'];
$_SESSION['input_birth_day'] = $_POST['input_birth_day'];
$_SESSION['input_blood_type'] = $_POST['input_blood_type'];
$_SESSION['input_course_name'] = $_POST['input_course_name'];
$_SESSION['input_special_report'] = $_POST['input_special_report'];

if ($canGoNextPage == array()) { // errorがない場合
    echo "会員管理登録確認";
    echo "<a href='index.php'>トップへ戻る</a><br />";
    echo "<table border='1'><tr>";

    echo "<td>氏名</td>";
    //$output_name = htmlspecialchars($_POST['input_name_uji'], ENT_QUOTES).htmlspecialchars($member->name_na, ENT_QUOTES);
    // TODO 苦肉の策。なぜか2バイト文字をhtmlspecialchars()に通すと消える
    $output_name = $member->name_uji.$member->name_na;
    echo "<td>$output_name</td>";
    echo "</tr><tr>";

    echo "<td>フリガナ</td>";
    // $output_name_yomi = htmlspecialchars($member->name_uji_yomi, ENT_QUOTES).htmlspecialchars($member->name_na_yomi, ENT_QUOTES);
    // TODO 氏名の場合と同様
    $output_name_yomi = $member->name_uji_yomi.$member->name_na_yomi;
    echo "<td>$output_name_yomi</td>";
    echo "</tr><tr>";

    echo "<td>メール</td>";
    $output_mail_address = htmlspecialchars($member->mail_address, ENT_QUOTES);
    echo "<td>$output_mail_address</td>";
    echo "</tr><tr>";

    echo "<td>生年月日</td>";
    // TODO 取りあえず適当に
    $output_birth = htmlspecialchars($member->birth_year).htmlspecialchars($member->birth_month).htmlspecialchars($member->birth_day);
    echo "<td>$output_birth</td>";
    echo "</tr><tr>";

    echo "<td>血液型</td>";
    $output_blood_type = htmlspecialchars($member->blood_type, ENT_QUOTES);
    echo "<td>$output_blood_type</td>";
    echo "</tr><tr>";

    echo "<td>希望コース</td>";
    // TODO 取りあえず適当に
    $output_course = '';
    for ($i = 0; $i < count($member->course_name); $i++) {
        $output_course = $output_course . $JAPANESE_COURSE_NAME[$member->course_name[$i]];
    }
    echo "<td>$output_course</td>";
    echo "</tr><tr>";

    echo "<td>特記事項</td>";
    // $output_special_report = htmlspecialchars($member->special_report, ENT_QUOTES);
    // TODO 氏名の場合と同様
    $output_special_report = $member->special_report;
    echo "<td>$output_special_report</td>";
    echo "</tr><tr>";

    echo '<td><input type="button" onclick="location.href=\'regist.php\'" value="確認"></input></td>';
    echo '<td><input type="button" onclick="location.href=\'input.php\'" value="戻る"></input></td>';
    echo "</tr></table>";
} else {
	echo "error";
	echo "<a href='input.php'>戻る</a>";
	$_SESSION["invalid"] = $canGoNextPage;
	echo implode($canGoNextPage);
}
?>
</body>
</html>
