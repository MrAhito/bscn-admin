<?php
session_start();
// if (isset($_SESSION['personal']) && isset($_SESSION['equip'])) {
$personal = $_SESSION['personal'];
// unset($_SESSION['personal']);
$equip = $_SESSION['equip'];
// unset($_SESSION['equip']);
// }
include '../include/db.inc.php';

$changes = [];
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

// Personal Changes
// print_r($equip);

$old = [
    strtolower(trim($personal['lname'])),
    strtolower(trim($personal['fname'])),
    strtolower(trim($personal['mname'])),
    strtolower(trim($personal['contact_'])),
    strtolower(trim($personal['email'])),
    strtolower(trim($personal['ip_address'])),
    strtolower(trim($personal['mac_address'])),
    strtolower(trim($personal['mun'])),
    strtolower(trim($personal['brgy'])),
    strtolower(trim($personal['addr'])),
    strtolower(trim($personal['subs_type'])),
    strtolower(trim($personal['install_type'])),
    strtolower(trim($personal['plan'])),
    strtolower(trim($personal['lineman'])),
    strtolower(trim($equip['serial'])),
    strtolower(trim($equip['onu_model'])),
    strtolower(trim($equip['nap'])),
    strtolower(trim($equip['slot'])),
    strtolower(trim($equip['layer'])),
    strtolower(trim($equip['lcp'])),
    strtolower(trim($equip['olt'])),
    strtolower(trim($equip['gpon'])),
    strtolower(trim($equip['wr_type'])),
    strtolower(trim($equip['wr_start'])),
    strtolower(trim($equip['wr_end'])),
    strtolower(trim($equip['box'])),
    strtolower(trim($equip['card'])),
];

$new = [
    strtolower(trim($lname)),
    strtolower(trim($fname)),
    strtolower(trim($mname)),
    strtolower(trim($cnum)),
    strtolower(trim($email)),
    strtolower(trim($ip)),
    strtolower(trim($mac)),
    strtolower(trim($mun)),
    strtolower(trim($brgy)),
    strtolower(trim($addr)),
    strtolower(trim($subs)),
    strtolower(trim($install)),
    strtolower(trim($plan)),
    strtolower(trim($lineman)),
    strtolower(trim($serial)),
    strtolower(trim($onu_model)),
    strtolower(trim($nap)),
    strtolower(trim($slot)),
    strtolower(trim($layer)),
    strtolower(trim($lcp)),
    strtolower(trim($olt)),
    strtolower(trim($gpon)),
    strtolower(trim($wr_type)),
    strtolower(trim($wrStr)),
    strtolower(trim($wrEnd)),
    strtolower(trim($boxn)),
    strtolower(trim($cardn)),
];
$label = [
    "Last Name",
    "First Name",
    "Middle Name",
    "Contact Number",
    "Email Address",
    "IP Address",
    "MAC Address",
    "Municipality",
    "Barangay",
    "Address",
    "Subscriber Type",
    "Installation Type",
    "Plan/Bundle",
    "Lineman",
    'Serial',
    'Onu Model',
    'NAP',
    'SLOT',
    'LAYER',
    'LCP',
    'OLT',
    'GPON',
    'Wire Type',
    'Wire Start',
    'Wire End',
    'Box Number',
    'Card Number',
];
$labelStr = '[ ';
// $oldStr = '[ ';
// $newStr = '[ ';
$record = '';
$countStr = 0;
for ($a = 0; $a <= count($old) - 1; $a++) {
    if ($new[$a] !== $old[$a]) {
        if ($countStr < 1) {
            $labelStr .=  $label[$a];
            $record .= '[ ' . $old[$a] . '=>' . $new[$a] . ' ]';
            // $oldStr .=  $old[$a];
            // $newStr .=  $new[$a];
        } else {
            $labelStr .= ", " . $label[$a];
            $record .= '<br/>' . '[ ' . $old[$a] . '=>' . $new[$a] . ' ]';
            // $oldStr .= ", " . $old[$a];
            // $newStr .= ", " . $new[$a];
        }
        $countStr++;
    }
}
$labelStr .= " ]";

if ($countStr < 1) {
    $_SESSION['alert'] = ["warning", "No Changes Applied"];
    header('location: ../pages/subscriber.php');
} else if ($changes >= 1) {
    $_SESSION['alert'] = ["success", "Changes Applied"];

    $sqlUpdate = "INSERT INTO `subs_history_tbl`(`subs_id`, `user_id`, `history`, `remarks`) 
    VALUES (" . $_SESSION['__id'] . ", " . $_SESSION['_id'] . ", 'Update User Records " . $labelStr . "', '" . $record . "') ";

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

    if ($con->query($sqlInfo)) {
        if ($con->query($sqlEquip)) {
            if ($con->query($sqlUpdate)) {
                header('location: ../pages/subscriber.php');
            }
            if ($con->error) {
                printf("Could not insert record into table: %s<br />", $con->error);
            }
        }
        if ($con->error) {
            printf("Could not insert record into table: %s<br />", $con->error);
        }
    }
    if ($con->error) {
        printf("Could not insert record into table: %s<br />", $con->error);
    }
} else {
    $_SESSION['alert'] = ["error", "Error Making Changes"];
    header('location: ../pages/subscriber.php');
}