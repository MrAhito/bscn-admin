<?php

$table = 'package_tbl';

$primaryKey = 'uid_';
$columns = array(
    array('db' => 'uid_', 'dt' => 0),
    array('db' => 'code',  'dt' => 1),
    array('db' => 'desc_', 'dt' => 2),
    array('db' => 'value',   'dt' => 3),
    array(
        'db'        => 'uid_',
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