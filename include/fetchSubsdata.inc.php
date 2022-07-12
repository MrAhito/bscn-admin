<?php

include_once '../include/db.inc.php';

$sql = "SELECT * FROM subs_info_tbl WHERE uid_ = " . $_SESSION['__id'] . "";
$result = $con->query($sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['personal'] = $row;

$fname =  $row['fname'];
$mname =  $row['mname'];
$lname =  $row['lname'];
$contact_ =  $row['contact_'];
$email = trim($row['email']);
$address =  $row['address'];
$ip_address =  $row['ip_address'];
$mac_address =  $row['mac_address'];
$mun =  $row['mun'];
$brgy_ =  $row['brgy'];
$addr =  $row['addr'];
$type =  $row['type'];
$subs_type =  $row['subs_type'];
$install_type =  $row['install_type'];
$plan =  $row['plan'];
$lineman =  $row['lineman'];
$disco =  $row['disco'];
$recon =  $row['recon'];

mysqli_free_result($result);

$sql2 = "SELECT * FROM subs_equip_tbl WHERE uid_ = " . $_SESSION['__id'] . "";
$res = $con->query($sql2);
$row2 = mysqli_fetch_assoc($res);
$_SESSION['equip'] = $row2;

$serial =  $row2['serial'];
$onu_model =  $row2['onu_model'];
$nap =  $row2['nap'];
$slot =  $row2['slot'];
$layer =  $row2['layer'];
$lcp =  $row2['lcp'];
$olt =  $row2['olt'];
$gpon =  $row2['gpon'];
$wr_type =  $row2['wr_type'];
$wr_start =  $row2['wr_start'];
$wr_end =  $row2['wr_end'];
$box =  $row2['box'];
$card =  $row2['card'];

mysqli_free_result($res);