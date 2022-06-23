<?php
session_start();
if (isset($_SESSION['code']) && isset($_GET['id']) && isset($_GET['route'])) {
    $_SESSION['__id'] = $_GET['id'];
    
    if($_GET['route'] == 'c'){
        header('location: ../pages/subscriber.php');
    }else if($_GET['route'] == 'r'){
        include_once '../include/functions.inc.php';
        include_once '../include/db.inc.php';
        reconnect($con, $_SESSION['__id']);
    }else if($_GET['route'] == 's'){
        include_once '../include/functions.inc.php';
        include_once '../include/db.inc.php';
        disconnect($con, $_SESSION['__id']);
    }else{

    }
} else {
    header("location: ../pages/log-in.php");
    exit();
}