<?php 
 session_start();
include '../include/db.inc.php';

if(isset($_SESSION['code']) && isset($_POST['submit'])){
// print_r($_POST);
// Personal Info
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$addr = $_POST['addr'];
$brgy = $_POST['brgy'];
$mun = $_POST['mun'];
$address = $addr . ", ". $brgy.", ".$mun;
$cnum = $_POST['cnum'];
$email = $_POST['email'];
$lineman = $_POST['lineman'];
$wr_type = $_POST['wr_type'];
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
    $a_type = 'NEW INSTALL';
}else if($subs == "cable"){
    $a_type = 'EXISTING CABLE';
}else if($subs == "docsis"){
    $a_type = 'EXISTING DOCSIS';
}

if($install == 'catv'){
    $b_type = "CABLE ONLY";
}else if($install == 'netonly'){
    $b_type = "INTERNET ONLY";
}else if($install == 'catvnet'){
    $b_type = "CABLE AND INTERNET";
}else if($install == 'fbr_catv'){
    $b_type = "UPGRADE TO DIGITAL BOX";
}else if($install == 'fbr_netonly'){
    $b_type = "UPGRADE TO FIBER DISCO-CATV";
}else if($install == 'fbr_catvnet'){
    $b_type = "UPGRADE TO FIBER";
}
$c_type = $a_type ." ".$b_type;

// Equipments Info
if($install=='catv' || $install=='fbr_catv') {
$card=$_POST['cardn'];
$box=$_POST['boxn'];
}
if($install=='netonly' || $install=='fbr_netonly') {
$card=0;
$box=0;
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
    $box=$_POST['boxn'];
}

$sqlInfo = "INSERT INTO 
`subs_info_tbl`(`fname`, `mname`, `lname`, `contact_`, `email`, `address`, `ip_address`, `mac_address`, `mun`, `brgy`, `addr`, `type`, 
`subs_type`, `install_type`, `plan`, `lineman`) 
VALUES
('".$fname."','".$mname."','".$lname."','".$cnum."','".$email."','".$address."','".$ip."','".$mac."','".$mun."','".$brgy."',
'".$addr."','".$c_type."','".$subs."','".$install."','".$plan."','".$lineman."')";

/*

INSERT INTO `subs_info_tbl`
(`fname`, `mname`, `lname`, `contact_`, `email`, `address`, `ip_address`, `mac_address`, `mun`, `brgy`, `addr`, `type`, `subs_type`, 
`install_type`, `plan`, `lineman`) 
VALUES 
('".$fname."','".$mname."','".$lname."','".$cnum."','".$email."','".$address."','".$ip."','".$mac."','".$mun."','".$brgy."',
'".$addr."','".$c_type."','".$subs."','".$install."','".$plan."','".$lineman."');

INSERT INTO 
`subs_info_tbl`(`uid_`, `status`, `fname`, `mname`, `lname`, `contact_`, `email`, `address`, `ip_address`, `mac_address`, `mun`, `brgy`, `addr`, `type`, 
`subs_type`, `install_type`, `plan`, `lineman`, `date_installed`, `disco`, `recon`) 
VALUES
('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]',
'[value-13]','[value-14]','[value-15]','[value-16]','[value-17]','[value-18]','[value-19]','[value-20]','[value-21]')

 INSERT INTO `subs_equip_tbl`(`uid_`, ) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]','[value-16]','[value-17]')
// echo "<br/><br/>".$sqlInfo;
// echo "<br/><br/>".$sqlEquip;
*/
//
    if ($con->query($sqlInfo)) {
            $id_ = $con->insert_id;
        
            $sqlEquip = "INSERT INTO 
            `subs_equip_tbl` (`subs_id`, `ip`, `mac`, `serial`, `onu_model`, `nap`, `slot`, `layer`, `lcp`, `olt`, `gpon`, `wr_type`, `wr_start`, `wr_end`, `box`, `card`) 
            VALUES 
            (".$id_.", '".$ip."','".$mac."','".$serial."','".$onu_model."','".$nap."',".$slot.",'".$layer."','".$lcp."',".$olt.",'".$gpon."',
            '".$wr_type."',".$wrStr.",".$wrEnd.",".$box.",".$card.");";
            
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