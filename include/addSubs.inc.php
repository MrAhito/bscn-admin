<?php 
 session_start();
include '../include/db.inc.php';

if(isset($_SESSION['code']) && isset($_POST['submit'])){
// print_r($_POST);
// Personal Info
$lname = strtoupper($_POST['lname']);
$fname = strtoupper($_POST['fname']);
$mname = strtoupper($_POST['mname']);
$addr = strtoupper($_POST['addr']);
$brgy = strtoupper($_POST['brgy']);
$mun = strtoupper($_POST['mun']);
$address = $addr . ", ". $brgy.", ".$mun;
$cnum = strtoupper($_POST['cnum']);
$lineman = strtoupper($_POST['lineman']);
$wr_type = strtoupper($_POST['wr_type']);
$wrStr = $_POST['wrStr'];
$wrEnd = $_POST['wrEnd'];
$ip='';
$mac='';
$serial='';
$onu_model='';
$nap='';
$slot='';
$layer='';
$lcp='';
$olt='';
$gpon='';
$card='';
$box='';

// Account Info
$subs = $_POST['subs'];
$install = $_POST['install'];
$a_type = ' ';
$b_type = ' ';
$c_type = ' ';

if($subs == "new"){
    $a_type = 'New Install';
}else if($subs == "cable"){
    $a_type = 'Existing Cable';
}else if($subs == "docsis"){
    $a_type = 'Existing DOCSIS';
}

if($install == 'catv'){
    $b_type = "Cable Only";
}else if($install == 'netonly'){
    $b_type = "Internet Only";
}else if($install == 'catvnet'){
    $b_type = "Cable and Internet";
}else if($install == 'fbr_catv'){
    $b_type = "Upgrade to Digital Box";
}else if($install == 'fbr_netonly'){
    $b_type = "Upgrade to Fiber DISCO-CATV";
}else if($install == 'fbr_catvnet'){
    $b_type = "Upgrade to Fiber";
}

$c_type = $a_type ." ".$b_type;

// Equipments Info
if($install=='catv' || $install=='fbr_catv') {
$card=$_POST['cardn'];
$box=$_POST['boxn'];;
}
if($install=='netonly' || $install=='fbr_netonly') {
$plan = $_POST['plan'];
$ip= $_POST['ip'];
$mac= $_POST['mac'];
$serial= $_POST['serial'];
$onu_model= $_POST['onu_model'];
$nap= $_POST['nap'];
$slot= $_POST['slot'];
$layer= $_POST['layer'];
$lcp= $_POST['lcp'];
$olt= $_POST['olt'];
$gpon= $_POST['gpon'];
}
if($install=='catvnet' || $install=='fbr_catvnet') {
    $plan = $_POST['plan'];
    $ip= $_POST['ip'];
    $mac= $_POST['mac'];
    $serial= $_POST['serial'];
    $onu_model= $_POST['onu_model'];
    $nap= $_POST['nap'];
    $slot= $_POST['slot'];
    $layer= $_POST['layer'];
    $lcp= $_POST['lcp'];
    $olt= $_POST['olt'];
    $gpon= $_POST['gpon'];
    $card=$_POST['cardn'];
    $box=$_POST['boxn'];;
}

$sqlInfo = "INSERT INTO `subs_info_tbl`
(`fname`, `mname`, `lname`, `contact_`, `address`, `ip_address`, `mac_address`, `mun`, `brgy`, `addr`, `type`, `subs_type`, 
`install_type`, `plan`, `lineman`) 
VALUES 
('".$fname."','".$mname."','".$lname."','".$cnum."','".$address."','".$ip."','".$mac."','".$mun."','".$brgy."',
'".$addr."','".$c_type."','".$subs."','".$install."','".$plan."','".$lineman."');";

$sqlEquip = "INSERT INTO `subs_equip_tbl`
(`ip`, `mac`, `serial`, `onu_model`, `nap`, `slot`, `layer`, `lcp`, `olt`, `gpon`, `wr_type`, `wr_start`, `wr_end`, `box`, `card`) 
VALUES 
('".$ip."','".$mac."','".$serial."','".$onu_model."','".$nap."',".$slot.",'".$layer."','".$lcp."',".$olt.",'".$gpon."',
'".$wr_type."',".$wrStr.",".$wrEnd.",".$box.",".$card.")";

// echo "<br/><br/>".$sqlInfo;
// echo "<br/><br/>".$sqlEquip;

    if ($con->query($sqlInfo)) {
        if ($con->query($sqlEquip)) {
            echo"<script>alert('Could not insert record');</script>";
            header("location: ../pages/dashboard.php");
        }
        if ($con->error) {
            echo"<script>alert('Could not insert record into table: %s<br />', ".$con->error.");</script>";
        }
    }
    if ($con->error) {
        echo"<script>alert('Could not insert record into table: %s<br />', ".$con->error.");</script>";
    }

 }else{
     header("location: ../pages/log-in.php");
 }

?>