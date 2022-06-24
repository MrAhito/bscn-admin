<?php

function emptyLogin($name, $pass)
{
    $result = '';

    if (empty($name) || empty($pass)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($con, $name, $pass)
{
    $userExist = userExist($con, $name);

    if ($userExist === false) {
        header("location: ../pages/log-in.php?error=nouser");
        exit();
    }

    $passHashed = $userExist["u_pass"];
    $checkPass = password_verify($pass, $passHashed);

    if ($checkPass === false) {
        header("location: ../pages/log-in.php?error=wrongpass");
        exit();
    } else if ($checkPass === true) {
        session_start();
        $_SESSION["code"] = $userExist['u_code'];
        $_SESSION["name"] = $userExist['u_user'];
        $_SESSION["_id"] = $userExist['u_id'];
        header("location: ../index.php");
        exit();
    }
}


function userExist($con, $uname)
{
    $sqL = "SELECT * FROM user_tbl WHERE u_user = ?;";
    $stmnt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmnt, $sqL)) {
        header("location: ../pages/log-in.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmnt, "s", $uname);
    mysqli_stmt_execute($stmnt);

    $res = mysqli_stmt_get_result($stmnt);

    if ($row = mysqli_fetch_assoc($res)) {
        return $row;
    } else {
        $res = false;
        return $res;
    }

    mysqli_stmt_close($stmnt);
}
//  echo password_hash("pass1234", PASSWORD_DEFAULT);


function disconnect($con, $a){
$sql = "UPDATE subs_info_tbl SET `status`= 0 WHERE `uid_`=" . $a;
    if ($con->query($sql)) {
        header('location: ../pages/dashboard.php');
    }
    if ($con->error) {
        printf("Could not insert record into table: %s<br />", $con->error);
    }
$con->close();
}
function reconnect($con, $a){
    $sql = "UPDATE subs_info_tbl SET `status`= 1 WHERE `uid_`=" . $a;
        if ($con->query($sql)) {
            header('location: ../pages/dashboard.php');
        }
        if ($con->error) {
            printf("Could not insert record into table: %s<br />", $con->error);
        }
    $con->close();
    }