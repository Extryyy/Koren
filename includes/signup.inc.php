<?php

if (isset($_POST["submit"])) {

    $name = isset($_POST["name"]) ? $_POST["name"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $username = isset($_POST["uid"]) ? $_POST["uid"] : '';
    $pwd = isset($_POST["pwd"]) ? $_POST["pwd"] : '';
    $pwdRepeat = isset($_POST["pwdrepeat"]) ? $_POST["pwdrepeat"] : '';

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
        header("location: ../Koda/register.php?error=emptyfields");
        exit();
    }

    if (invalidUid($username) !== false) {
        header("location: ../Koda/register.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../Koda/register.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../Koda/register.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) != false) {
        header("location: ../Koda/register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);

} else {
    header("location: ../register.php");
}
