<?php
class Member {
    public $id;
    public $no;
    public $name_uji;
    public $name_na;
    public $name_uji_yomi;
    public $name_na_yomi;
    public $mail_adress;
    public $birth_year;
    public $birth_month;
    public $birth_day;
    public $blood_type;
    public $course_name;
    public $special_report;
    // FIXME 糞みたいな引数をなんとかする
    // コンストラクタを使用せず、引数ごとにset関数を使用する？
    // やっぱりIDとNOだけ抜き出してsetしよう
    function __construct($param1, $param2, $param3, $param4, $param5, $param6, $param7,
        $param8, $param9, $param10, $param11) {
        $this->name_uji = $param1;
        $this->name_na = $param2;
        $this->name_uji_yomi = $param3;
        $this->name_na_yomi = $param4;
        $this->mail_address = $param5;
        $this->birth_year = $param6;
        $this->birth_month = $param7;
        $this->birth_day = $param8;
        $this->blood_type = $param9;
        $this->course_name = $param10;
        $this->special_report = $param11;
    }
    function setId($input_id) {
        $this->id = $input_id;
    }
    function setNo($input_no) {
        $this->no = $input_no;
    }
    function getCourseCharge() {
        // TODO 現時点では複数に対応していない
        switch ($this->course_name) {
        case "atami":
            return 3000;
            break;
        case "hokkaido":
            return 2000;
            break;
        case "shikoku":
            return 1000;
            break;
        }
    }
    function isValidInput() {
        // TODO SJISなら変更
    	// mb_regex_encoding("SJIS");
        $invalid_list = array();
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $this->mail_adress)) $invalid_list[] = "mail_address";
        // TODO ここも。一部変えるだけでSJIS環境とUTF-8環境を行き来できるようにしたい
        if (!preg_match("/^[ァ-ヶー]+$/u", $this->name_uji_yomi)) $invalid_list[] = 'name_yomi';
        if (!preg_match("/^[ァ-ヶー]+$/u", $this->name_na_yomi)) $invalid_list[] = 'name_yomi';
        if ($this->name_uji === '') $invalid_list[] = 'name';
        if ($this->name_na === '') $invalid_list[] = 'name';
        if ($this->course_name == array()) $invalid_list[] = "course";
        if (!checkdate($this->birth_year, $this->birth_month, $this->birth_day)) $invalid_list[] = 'birth';
        return $invalid_list;
    }
    function getAge() {
        // めんどい
        return 30;
    }
}

function setPulldownYear($name, $birth_year_text) {
    echo "<select name='{$name}'>";
    for ($y = 1900; $y < date('Y') + 1; $y++) {
        $select_year = '';
        if ($birth_year_text == $y) $select_year = "selected='selected'";
        echo '<option value=' . $y . ' ' . $select_year . '>' . $y . '</option>';
    }
    echo '</select>';
}
function setPulldownMonth($name, $birth_month_text) { 
    echo "<select name='{$name}'>";
    for ($m = 1; $m <= 12; $m++) {
        $select_month = '';
        if ($birth_month_text == $m) $select_month = "selected='selected'";
        echo '<option value=' . $m . ' ' . $select_month . '>' . $m . '</option>';
    }
    echo '</select>';
}
function setPulldownDay($name, $birth_day_text) {
    echo "<select name='{$name}'>";
    for ($d = 1; $d <= 31; $d++) {
        $select_day = '';
        if ($birth_day_text == $d) $select_day = "selected='selected'";
        echo '<option value=' . $d . ' ' . $select_day . '>' . $d . '</option>';
    }
    echo '</select>';
}
function setRadioBloodType($name, $value, $blood_type_text) {
    $checked = '';
    if ($blood_type_text === "{$value}") $checked = 'checked';
    echo "<input type='radio' name='{$name}' value='{$value}' {$checked}>{$value}型</input>";
}
function setCheckboxCourseName($name, $value, $course_array, $tour_name) {
    $checked = '';
    if (in_array($value, $course_array)) $checked = 'checked';
    echo "<input type='checkbox' name='{$name}' value='{$value}' {$checked}>{$tour_name}</input>";
}
$JAPANESE_COURSE_NAME = array('atami' => '熱海温泉ツアー', 'hokkaido' => '北海道回線ツアー', 'shikoku' => '四国');
?>
