<?php
session_start();

if (!isset($_SESSION['code'])) {
    header("location: pages/log-in.php");
}

header("location: pages/dashboard.php");