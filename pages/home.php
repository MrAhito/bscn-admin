<?php
include_once '../themes/header.php';
include '../include/db.inc.php';

$json = file_get_contents('../data/data.json');

// Decode the JSON file
$json_data = json_decode($json, true);


foreach ($json_data as $item) {
    $discoDate = '';
    $reconDate = '';

    $cnum = "";
    if (strlen($item['CONTACT #']) == 10 && $item['CONTACT #'][0] == 9) {
        $cnum = "0" . substr($item['CONTACT #'], 0, 3) . "-" . substr($item['CONTACT #'], 3, 3) . "-" . substr($item['CONTACT #'], 6, 4);
    } else {
        $cnum = $item['CONTACT #'];
    }


    if (strlen($item['DATE RECONNECTED']) == 10) {
        $recon = new DateTime($item['DATE RECONNECTED']);
        $reconDate =  $recon->format('Y/m/d');
    }
    if (strlen($item['DATE DISCONNECTED']) < 15) {
        $disco = new DateTime($item['DATE DISCONNECTED']);
        $discoDate =  $disco->format('Y/m/d');
    }
    if ($item['DATE INSTALL'] == 'Decenber 14, 2021') {
        $date = new DateTime('12/14/2021');
        $formattedDate =  $date->format('Y/m/d');
    } else {
        $date = new DateTime($item['DATE INSTALL']);
        $formattedDate =  $date->format('Y/m/d');
    }

    if ($item['#'] >= 2000 && $item['#'] < 3000) {
        // if ($item['#'] < 3) {

        $sqlinfo = "INSERT INTO `subs_info_tbl`
        (`status`, `fname`, `mname`, `lname`, `contact_`, `email`, `address`, `ip_address`, `mac_address`,
        `type`, `plan`, `lineman`, `date_installed`, `disco`, `recon`) 
        VALUES 
        (" . $item['STATUS'] . ", '" . $item['FIRST NAME'] . "', '" . $item['MIDDLE NAME'] . "', '" . $item['LAST NAME'] . "', '" . $item['CONTACT #'] . "', '" . $item['REMARKS'] . "',
         '" . $item['ADDRESS'] . "', '" . $item['IP ADDRESS'] . "', '" . $item['MAC ADDRESS'] . "', '" . $item['APPLICATION'] . "', '" . $item['PLAN'] . "', '" . $item['LINEMAN'] . "', 
        cast('" . $formattedDate . "' AS datetime), cast('" . $discoDate . "' AS datetime), cast('" . $reconDate . "' AS datetime))";

        if ($con->query($sqlinfo)) {
            $id_ = $con->insert_id;
            $sqL = "INSERT INTO `subs_equip_tbl`
            (`subs_id`, `ip`, `mac`, `serial`, `nap`, `lcp`, `gpon`, `wr_type`) 
            VALUES 
            (" . $id_ . ", '" . $item['IP ADDRESS'] . "', '" . $item['MAC ADDRESS'] . "', '" . $item['SERIAL NO.'] . "', '" . $item['NAP # / SLOT #'] . "',
             '" . $item['LCP / OLT #'] . "', '" . $item['GPON #'] . "', '" . $item['WIRE'] . "')";

            if ($con->query($sqL)) {
                printf("Record updated successfully.<br />");
            }
            if ($con->error) {
                printf("Could not insert record into table: %s<br />", $con->error);
            }
        }
        if ($con->error) {
            printf("Could not insert record into table: %s<br />", $con->error);
        }
    }
}
?>

<?php
include_once '../themes/footer.php';
?>
<!-- 
#
STATUS
LAST NAME
FIRST NAME
MIDDLE NAME
CONTACT #
REMARKS
ADDRESS
IP ADDRESS
MAC ADDRESS
SERIAL NO.
NAP # / SLOT #
LCP / OLT #
GPON #
PLAN
MBPS
DATE INSTALL
APPLICATION
LINEMAN
DATE DISCONNECTED
DATE RECONNECTED
WIRE 
-->