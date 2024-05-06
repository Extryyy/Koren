<?php


if(isset($_POST["submit"])){
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd)) {
        header("location: ../Koda/login.php?error=emptyfields");
        exit();
    }


    loginUser($conn, $username, $pwd);

}else{
    header("location: ../Koda/login.php");
    exit();
}
