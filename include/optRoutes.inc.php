<?php
session_start();
if (isset($_SESSION['code']) && isset($_GET['id']) && isset($_GET['route'])) {
    $_SESSION['__id'] = $_GET['id'];
    header('location: ../pages/subscriber.php');
} else {
    header("location: ../pages/log-in.php");
    exit();
}