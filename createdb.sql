CREATE TABLE member_list (
    no INT AUTO_INCREMENT PRIMARY KEY,
    id INT NOT NULL,
    name_uji VARCHAR(30) NOT NULL,
    name_na VARCHAR(30) NOT NULL,
    name_uji_yomi VARCHAR(50) NOT NULL,
    name_na_yomi VARCHAR(50) NOT NULL,
    mail_address VARCHAR(256) NOT NULL,
    birth DATE NOT NULL,
    age INT NOT NULL,
    blood_type VARCHAR(2) NOT NULL,
    course_name TEXT NOT NULL,
    course_charge INT NOT NULL,
    special_report TEXT
);
