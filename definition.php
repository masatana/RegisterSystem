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
        // TODO めんどい。後で作る
        return TRUE;
    }
    function getAge() {
        // めんどい。あとで作る
        return 30;
    }
}
define("ID", "input_id");
define("NO", "input_no");
define("NAME_UJI", "input_name_uji");
define("NAME_NA", "input_name_na");
define("NAME_UJI_YOMI", "input_name_uji_yomi");
define("NAME_NA_YOMI", "input_name_na_yomi");
define("MAIL_ADDRESS", "input_mail_address");
define("BIRTH_YEAR", "input_birth_year");
define("BIRTH_MONTH", "input_birth_month");
define("BIRTH_DAY", "input_birth_day");
define("AGE", "input_age");
define("BLOOD_TYPE", "input_blood_type");
define("COURSE_NAME", "input_course_name");
define("SPECIAL_REPORT", "input_special_report");
?>
