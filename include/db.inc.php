<?php

$server = "localhost";
$user = "root";
$pass = "";
$db_name = "bscn-db";

$con = mysqli_connect($server, $user, $pass, $db_name);

if (!$con) {
    die("Connect failed:" . mysqli_connect_error());
}