<?php
include "../connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$password = $_POST["p"];
$mobile = $_POST["m"];
$gender = $_POST["g"];

if (empty($fname)) {
    echo ("Please Enter Your First Name.");
} else if (strlen($fname) > 50) {
    echo ("First Name must contain lower than 50 characters.");
} else if (empty($lname)) {
    echo ("Please Enter Your Last Name.");
} else if (strlen($lname) > 45) {
    echo ("Lirst Name must contain lower than 45 characters.");
} else if (empty($email)) {
    echo ("Please enter your Email Adress.");
} else if (strlen($email) > 100) {
    echo ("Email Adress must contain lower than 100 characters.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Adress.");
} else if (empty($password)) {
    echo ("Please Enter password");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password must contain 5 to 20 characters.");
} else if (empty($mobile)) {
    echo ("Please enter your mobile");
} else if (strlen($mobile) != 10) {
    echo ("Mobile number must contain 10 characters");
} else if (!preg_match("/07[01245678]{1}[0-9]{7}/", $mobile)) {
    echo ("Invalid mobile number");
} else if ($gender == 0) {
    echo ("Please select gender");
} else {

    $rs = DataBase::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `mobile`='" . $mobile . "'");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo ("This Email or Mobile number already exists");
    } else {

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        DataBase::iud("INSERT INTO `user`
        (`fname`,`lname`,`email`,`password`,`mobile`,`joined_date`,`gender_gender_id`,`status_status_id`) VALUES 
        ('" . $fname . "','" . $lname . "','" . $email . "','" . $password . "','" . $mobile . "','" . $date . "','" . $gender . "','1')");

        echo ("Registerd");
    }
}
