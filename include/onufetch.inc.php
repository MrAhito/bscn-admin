<?php

$table = 'onu_tbl';

$primaryKey = 'uid';
$columns = array(
    array('db' => 'uid', 'dt' => 0),
    array('db' => 'code',  'dt' => 1),
    array('db' => 'brand', 'dt' => 2),
    array('db' => 'dec_',   'dt' => 3),
    array(
        'db'        => 'uid',
        'dt'        => 4,
        'formatter' => function ($d, $row) {

            return "<div class='optDiv'>
                <i class='fas fa-cogs sett' onclick='showOpts(" . $d . ")'></i>
            <div>";
        }
    )
);
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'bscn-db',
    'host' => 'localhost'
);

require('ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);