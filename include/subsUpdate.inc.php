<?php
session_start();
include '../include/db.inc.php';

$lname = $_POST['lname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$cnum = $_POST['cnum'];
$email = $_POST['email'];
$address = '';
$ip = $_POST['ip'];
$mac = $_POST['mac'];
$mun = $_POST['mun'];
$brgy = $_POST['brgy'];
$addr = $_POST['addr'];
$subs = $_POST['subs'];
$install = $_POST['install'];
$plan = $_POST['plan'];
$lineman = $_POST['lineman'];
$boxn = 0;
$cardn = 0;
$a_type = ' ';
$b_type = ' ';
$c_type = ' ';

if ($mun = 'Balanga City') {
    $address = $addr . ", " . $brgy;
} else {
    $address = $addr . ", " . $brgy . ", " . $mun;
}

if ($subs == "new") {
    $a_type = 'NEW INSTALL';
} else if ($subs == "cable") {
    $a_type = 'EXISTING CABLE';
} else if ($subs == "docsis") {
    $a_type = 'EXISTING DOCSIS';
}

if ($install == 'catv') {
    $b_type = "CABLE ONLY";
} else if ($install == 'netonly') {
    $b_type = "INTERNET ONLY";
} else if ($install == 'catvnet') {
    $b_type = "CABLE AND INTERNET";
} else if ($install == 'fbr_catv') {
    $b_type = "UPGRADE TO DIGITAL BOX";
} else if ($install == 'fbr_netonly') {
    $b_type = "UPGRADE TO FIBER DISCO-CATV";
} else if ($install == 'fbr_catvnet') {
    $b_type = "UPGRADE TO FIBER";
}

$c_type = $a_type . " " . $b_type;


$ip = $_POST['ip'];
$mac = $_POST['mac'];
$serial = $_POST['serial'];
$onu_model = $_POST['onu_model'];
$nap = $_POST['nap'];
$slot = $_POST['slot'];
$layer = $_POST['layer'];
$lcp = $_POST['lcp'];
$olt = $_POST['olt'];
$gpon = $_POST['gpon'];
$wr_type = $_POST['wr_type'];
$wrStr = $_POST['wrStr'];
$wrEnd = $_POST['wrEnd'];


// Equipments Info
if ($install == 'catv' || $install == 'fbr_catv') {
    $card = $_POST['cardn'];
    $box = $_POST['boxn'];
    $plan = '';
    $ip = '';
    $mac = '';
    $serial = '';
    $onu_model = '';
    $nap = '';
    $slot = 0;
    $layer = '';
    $lcp = '';
    $olt = 0;
    $gpon = '';
}
if ($install == 'netonly' || $install == 'fbr_netonly') {
    $card = 0;
    $box = 0;
    $plan = $_POST['plan'];
    $ip = $_POST['ip'];
    $mac = $_POST['mac'];
    $serial = $_POST['serial'];
    $onu_model = $_POST['onu_model'];
    $nap = $_POST['nap'];
    $slot = $_POST['slot'];
    $layer = $_POST['layer'];
    $lcp = $_POST['lcp'];
    $olt = $_POST['olt'];
    $gpon = $_POST['gpon'];
}
if ($install == 'catvnet' || $install == 'fbr_catvnet') {
    $plan = $_POST['plan'];
    $ip = $_POST['ip'];
    $mac = $_POST['mac'];
    $serial = $_POST['serial'];
    $onu_model = $_POST['onu_model'];
    $nap = $_POST['nap'];
    $slot = $_POST['slot'];
    $layer = $_POST['layer'];
    $lcp = $_POST['lcp'];
    $olt = $_POST['olt'];
    $gpon = $_POST['gpon'];
    $card = $_POST['cardn'];
    $box = $_POST['boxn'];
}

// ='[value-16]'
$sqlInfo = "UPDATE `subs_info_tbl` SET 
    `fname`= '" . $fname . "', 
    `mname`= '" . $mname . "', 
    `lname`= '" . $lname . "', 
    `contact_`= '" . $cnum . "', 
    `email`= '" . $email . "', 
    `address`= '" . $address . "', 
    `ip_address`= '" . $ip . "', 
    `mac_address`= '" . $mac . "', 
    `mun`= '" . $mun . "', 
    `brgy`= '" . $brgy . "', 
    `addr`= '" . $addr . "', 
    `type`= '" . $c_type . "', 
    `subs_type`= '" . $subs . "', 
    `install_type`= '" . $install . "', 
    `plan`= '" . $plan . "', 
    `lineman`= '" . $lineman . "' 
    WHERE `uid_` = " . $_SESSION['__id'] . "";

// echo"<br/><br/>".$sqlInfo;

$sqlEquip = "UPDATE `subs_equip_tbl` SET
`ip`= '" . $ip . "',
`mac`= '" . $mac . "',
`serial`= '" . $serial . "',
`onu_model`= '" . $onu_model . "',
`nap`= '" . $nap . "',
`slot`= " . $slot . ",
`layer`= '" . $layer . "',
`lcp`= '" . $lcp . "',
`olt`= " . $olt . ",
`gpon`= '" . $gpon . "',
`wr_type`= '" . $wr_type . "',
`wr_start`= " . $wrStr . ",
`wr_end`= " . $wrEnd . ",
`box`= " . $boxn . ",
`card`= " . $cardn . "
 WHERE `subs_id`= " . $_SESSION['__id'] . "";

// echo"<br/><br/>".$sqlEquip;


if ($con->query($sqlInfo)) {
    if ($con->query($sqlEquip)) {
        header('location: ../pages/subscriber.php');
        echo "<script>alert('Subscriber's Info has been Updated')</script>";
    }
    if ($con->error) {
        printf("Could not insert record into table: %s<br />", $con->error);
    }
}
if ($con->error) {
    printf("Could not insert record into table: %s<br />", $con->error);
}