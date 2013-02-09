<?php
class Member {
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
        // TODO めんどい
    	mb_regex_encoding("SJIS");
        $invalid_list = array();
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $this->mail_adress)) $invalid_list[] = "mail_address";
        if (!mb_ereg("^[ア-ン゛゜ァ-ォャ-ョー「」、]+$", $this->name_uji_yomi)) $invalid_list[] = "name_yomi";
        if (!mb_ereg("^[ア-ン゛゜ァ-ォャ-ョー「」、]+$", $this->name_na_yomi)) $invalid_list[] = "name_yomi";
        if ($this->name_uji === "") $invalid_list[] = "name";
        if ($this->name_na === "") $invalid_list[] = "name";
        if ($this->course_name == array()) $invalid_list[] = "course";
        return $invalid_list;
    }
    function getAge() {
        // めんどい
        return 30;
    }
}
?>
