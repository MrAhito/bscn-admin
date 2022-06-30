<?php
session_start();
echo"".$_GET['route'];
if (isset($_SESSION['code']) && isset($_GET['id']) && isset($_GET['route'])) {
    if($_GET['route'] == 'c'){
        $_SESSION['view'] = 'info'; 
        $_SESSION['__id'] = $_GET['id'];
        header('location: ../pages/subscriber.php');
    }else if($_GET['route'] == 'r'){
        include_once '../include/functions.inc.php';
        include_once '../include/db.inc.php';
        reconnect($con,  $_GET['id']);
    }else if($_GET['route'] == 's'){
        include_once '../include/functions.inc.php';
        include_once '../include/db.inc.php';
        disconnect($con,  $_GET['id']);
    }else if($_GET['route'] == 'n'){
        $_SESSION['view'] = 'onu'; 
        header('location: ../pages/subscriber.php');
    }else if($_GET['route'] == 'l'){
        $_SESSION['view'] = 'plans'; 
        header('location: ../pages/subscriber.php');
    }else{
        unset($_SESSION['view']);
        unset($_SESSION['__id']);
        header('location: ../pages/subscriber.php');
    }
} else {
    header("location: ../pages/log-in.php");
    exit();
}