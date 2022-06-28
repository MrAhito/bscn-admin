<?php 
    session_start();
    include '../include/db.inc.php';
    
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $cnum = $_POST['cnum'];
    $email = $_POST['email'];
    $address = $_POST['addr'];
    $ip = $_POST['ip'];
    $mac = $_POST['mac'];
    $mun = $_POST['mun'];
    $brgy = $_POST['brgy'];
    $addr = $_POST['addr'];
    $subs = $_POST['subs'];
    $install = $_POST['install'];
    $plan = $_POST['plan'];
    $lineman = $_POST['lineman'];

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


    $onu_model = $_POST['onu_model'];
    $ip = $_POST['ip'];
    $mac = $_POST['mac'];
    $serial = $_POST['serial'];
    $boxn = $_POST['boxn'];
    $cardn = $_POST['cardn'];
    $wr_type = $_POST['wr_type'];
    $wrStr = $_POST['wrStr'];
    $wrEnd = $_POST['wrEnd'];
    $nap = $_POST['nap'];
    $slot = $_POST['slot'];
    $layer = $_POST['layer'];
    $lcp = $_POST['lcp'];
    $olt = $_POST['olt'];
    $gpon = $_POST['gpon'];

// ='[value-16]'
$sqlInfo = "UPDATE `subs_info_tbl` SET 
    `fname`= '".$fname."', 
    `mname`= '".$mname."', 
    `lname`= '".$lname."', 
    `contact_`= '".$cnum."', 
    `email`= '".$email."', 
    `address`= '".$address."', 
    `ip_address`= '".$ip."', 
    `mac_address`= '".$mac."', 
    `mun`= '".$mun."', 
    `brgy`= '".$brgy."', 
    `addr`= '".$addr."', 
    `type`= '".$c_type."', 
    `subs_type`= '".$subs."', 
    `install_type`= '".$install."', 
    `plan`= '".$plan."', 
    `lineman`= '".$lineman."' 
    WHERE `uid_` = ".$_SESSION['__id']."";

    echo"<br/><br/>".$sqlInfo;

    if ($con->query($sqlInfo)) {
        printf("Record updated successfully.<br />");
    }
    if ($con->error) {
        printf("Could not insert record into table: %s<br />", $con->error);
    }

?>