<?php
session_start();
if (isset($_SESSION['code'])) {
    session_destroy();
    echo "<script>alert('User has logged out');</script>";
    header("location: ../pages/log-in.php");
} else {
    header("location: ../pages/log-in.php");
}