<?php

if (isset($_POST["submit"])) {
    $uname = $_POST['uname'];
    $upass = $_POST['upass'];
    include_once 'db.inc.php';
    include_once 'functions.inc.php';

    if (emptyLogin($con, $uname, $upass) !== false) {
        header("location: ../components/log-in.php?error=emptyinput");
        exit();
    }

    loginUser($con, $uname, $upass);
} else {
    header("location: ../components/log-in.php");
    exit();
}