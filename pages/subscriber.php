
<?php
session_start();

if(!isset($_SESSION['__id']) || !isset($_SESSION['code'])){
    header("location: log-in.php");
    exit();
}
include_once '../themes/header.php';
include_once '../styles/addSubs.style.php';
include_once '../include/fetchSubsdata.inc.php';

?>
<style>
.section_subs{
    width: 100%;
}

.add_sub {
    width: 100%;
    overflow: hidden;
    border-radius: 5px;
}

.add_head {
    margin: 0;
    background-color: var(--primary);
    font-size: 0.65em;
    padding: 0 15px;
    border-bottom: 1px solid var(--secondary);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.add_head>h2 {
    color: var(--tertiary);
    font-size: 1.1em;
}
.add_head>h2 > i {
    font-size: 1.2em;
}
.add_head>i {
    color: var(--primary);
    font-size: 1.65em;
    margin-right: 5px;
}

.add_head>i:hover {
    color: red;
}

.hidAdd {
    display: flex;
}
.historyTBL{
    zoom: .75;
}

.exportBtn {
    width: 100px;
    padding: 5px;
    font-weight: 600;
    font-size: .8em;
    margin: auto 40px auto 0;
    border-radius: 4px;
}

div.dataTables_filter>label>input {
    outline: none;
    border: 2px solid var(--fontDark) !important;
    transition: .3s ease-in;
    margin-bottom: 18px;
}

div.dataTables_filter>label>input:hover,
div.dataTables_filter>label>input:focus {
    outline: none;
    border: 2px solid var(--secondary) !important;
    transition: .3s ease-in;
}

table.dataTable tbody tr:hover {
    background-color: var(--fontDark);
}

table.dataTable tbody tr:hover>.sorting_1 {
    background-color: var(--fontDark);
}

th.dt-center,
td.dt-center {
    text-align: center;
}

table.dataTable thead tr {
    background-color: var(--tertiary);
    font-weight: 100;
    height: 40px;
    color: var(--primary);
}

table.dataTable tbody tr {
    width: 100%;
    text-transform: uppercase;
    min-height: 70px !important;
}

</style>
<section class="section_subs">
<?php
    include_once '../components/navBar.php';
    ?>
    <div class="add_sub">
        <div class="add_head">
            <h2><i class="fas fa-info-circle"></i> Subscriber</h2>
            <i class="fas fa-times" onclick="hideSubs()"></i>
        </div>
        <form class="form_add" method="POST" id='formAdd' action="">
            <span class="header1 gr1">Account Details</span>
            <form-control class="gr2-1">
                <label><pre>Last Name: </pre></label>
                <input type="text" value="<?php echo"".$lname;?>" name="lname" required/>
            </form-control>
            <form-control class="gr2-2">
                <label><pre>First Name: </pre></label>
                <input type="text" value="<?php echo"".$fname;?>" name="fname" required/>
            </form-control>
            <form-control class="gr2-3">
                <label><pre>Middle Name: </pre></label>
                <input type="text" value="<?php echo"".$mname;?>" name="mname" />
            </form-control>
            <form-control class="gr2-1">
                <label><pre>Municipality: </pre></label>
                <select onchange="selectOpt(this)" name="mun"  required>
                    <option value="" hidden>Select Municipality</option>
                    <option <?php if($mun == "BALANGA CITY"){echo"selected";}?> value="BALANGA CITY">Balanga City</option>
                    <option <?php if($mun == "PILAR"){echo"selected";}?> value="PILAR">Pilar</option>
                    <option <?php if($mun == "ORION"){echo"selected";}?> value="ORION">Orion</option>
                </select>
            </form-control>
            <form-control class="gr2-2">
                <label><pre>Barangay: </pre></label>
                <select id='brgySel' name="brgy" required>
                    <option value="" hidden>Select Barangay</option>
                    <?php
                    include '../data/address.php';
                    foreach ($brgy as $val) {
                        echo "<option ";
                         if($brgy_ == strtoupper($val[1])){echo"selected";}
                         echo" id='" . $val[0] . "' class='opt_brgy' value='" . $val[1] . "'>" . $val[1] . "</option>";
                    }
                    ?>
                </select>
            </form-control>
            <form-control class="gr2-3">
                <label><pre>Address: </pre></label>
                <input type="text" value="<?php if($addr == ' '){echo"".$address;}else{echo"".$addr;}?>" name="fname" name="addr" required />
            </form-control>
            <form-control class="gr2-1">
                <label><pre>Contact #: </pre></label>
                <input type="text" value="<?php echo"".$contact_;?>"  pattern="[0-9]{4}[-][0-9]{3}[-][0-9]{4}" name="cnum" required />
            </form-control>

            <form-control class="gr2-1">
                <label><pre>Subscriber: </pre></label>
                <select onchange="selectSubs(this)" name="subs" required>
                    <option value="" hidden>SELECT SUBSCRIBER TYPE</option>
                    <option <?php if($subs_type == "new"){echo"selected";}?> value="new">NEW INSTALL</option>
                    <option <?php if($subs_type == "cable"){echo"selected";}?> value="cable">EXISTING CABLE ONLY</option>
                    <option <?php if($subs_type == "docsis"){echo"selected";}?> value="docsis">EXISTING DOCSIS</option>
                </select>
            </form-control>
            <form-control class="gr2-2" >
                <label><pre>Installation: </pre></label>
                <select id="install_type" onchange="selectInst(this)" name="install" required>
                    <option value="" hidden>SELECT INSTALLATION TYPE</option>
                    <option <?php if($install_type == "catv"){echo"selected";}?> style="display:none" id='newsub-1' value="catv">CABLE ONLY</option>
                    <option <?php if($install_type == "netonly"){echo"selected";}?> style="display:none" id='newsub-2' value="netonly">INTERNET ONLY</option>
                    <option <?php if($install_type == "catvnet"){echo"selected";}?> style="display:none" id='newsub-3' value="catvnet">CABLE AND INTERNET</option>
                    <option <?php if($install_type == "fbr_catv"){echo"selected";}?> style="display:none" id='existc-1' value="fbr_catv">UPGRADE TO FIBER CATV</option>
                    <option <?php if($install_type == "fbr_catvnet"){echo"selected";}?> style="display:none" id='exist-1' value="fbr_catvnet">UPGRADE TO FIBER </option>
                    <option <?php if($install_type == "fbr_netonly"){echo"selected";}?> style="display:none" id='exist-2' value="fbr_netonly">UPGRADE TO FIBER DISCO-CABLE</option>
                </select>
            </form-control>
            <form-control class="gr2-3">
                <label><pre>Plan/Bundle: </pre></label>
                <select id="plan_type" name="plan" required>
                    <option value="" hidden>SELECT PLAN/BUNDLE</option>
                    <?php
                    include '../include/db.inc.php';
                        $sql = "SELECT * FROM package_tbl";

                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                               echo"<option ";
                               if($plan == $row['code']){echo"selected ";}
                               echo"id='".$row['code']."' style='display:none' value='".$row['code']."'>".$row['desc_']."</option>";
                            }
                        }
                        mysqli_free_result($result);
                        $con->close();

                    ?>
                </select>
            </form-control>
            <form-control class="gr2-1">
                <label><pre>Lineman: </pre></label>
                <input type="text"  value="<?php echo"".$lineman;?>" name="lineman" required/>
            </form-control>

            <span class="header1 gr1">Equipment Details</span>
            <form-control class="gr5-1">
                <label><pre>IP Address: </pre></label>
                <input type="text" value="<?php echo"".$ip_address;?>"  name="ip" id="ip" required disabled/>
            </form-control>
            <form-control class="gr5-2">
                <label><pre>MAC Address: </pre></label>
                <input type="text" value="<?php echo"".$mac_address;?>" name="mac" id="mac" required disabled/>
            </form-control>
            <form-control class="gr5-3">
                <label><pre>SERIAL #: </pre></label>
                <input type="text" value="<?php echo"".$serial;?>"  name="serial" id="serial" required disabled/>
            </form-control>
            <form-control class="gr5-4">
                <label><pre>ONU Model: </pre></label>
                <select id="onu_model" name="onu_model" required>
                    <option value="" hidden>SELECT ONU MODEL</option>
                    <?php
                    include '../include/db.inc.php';
                        $sql = "SELECT * FROM onu_tbl";

                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                               echo"<option ";
                                if($onu_model == $row['code']){echo"selected";}
                               echo" id='".$row['code']."'  value='".$row['code']."'>".$row['dec_']."</option>";
                            }
                        }
                        mysqli_free_result($result);
                        $con->close();

                    ?>
                </select>
            </form-control>
            <form-control class="gr5-1">
                <label><pre>Box #: </pre></label>
                <input type="text" value="<?php echo"".$box;?>" name="boxn" id="boxn" required disabled/>
            </form-control>
            <form-control class="gr5-2">
                <label><pre>Card #: </pre></label>
                <input type="text" value="<?php echo"".$card;?>" name="cardn" id="cardn" required disabled/>
            </form-control>
            <form-control class="gr4-4">
                <label><pre>Wire: </pre></label>
                <select name="wr_type" required>
                    <option value="" hidden>SELECT WIRE</option>
                    <option <?php if($wr_type == 'FBR'){echo"selected";}?> value="fbr">FIBER WIRE</option>
                    <option <?php if($wr_type == 'COAX'){echo"selected";}?> value="coax">COAXIAL WIRE</option>
                </select>
            </form-control>
            <form-control class="gr4-5">
                <label><pre>Wire Start: </pre></label>
                <input type="number" value="<?php echo"".$wr_start;?>" name="wrStr" required/>
            </form-control>
            <form-control class="gr4-6">
                <label><pre>Wire End: </pre></label>
                <input type="number"  value="<?php echo"".$wr_end;?>" name="wrEnd" required/>
            </form-control>
            <form-control class="gr4-1">
                <label><pre>NAP #: </pre></label>
                <input type="text"  value="<?php echo"".$nap;?>" name="nap" id="nap" required disabled/>
            </form-control>
            <form-control class="gr4-2">
                <label><pre>Slot #: </pre></label>
                <input type="number" value="<?php echo"".$slot;?>" name="slot" id="slot" required disabled/>
            </form-control>
            <form-control class="gr4-3">
                <label><pre>Layer: </pre></label>
                <input type="text" value="<?php echo"".$layer;?>" name="layer" id="layer" required disabled/>
            </form-control>
            <form-control class="gr4-4">
                <label><pre>LCP #: </pre></label>
                <input type="text" value="<?php echo"".$lcp;?>" name="lcp" id="lcp" required disabled/>
            </form-control>
            <form-control class="gr4-5">
                <label><pre>OLT #: </pre></label>
                <input type="number" value="<?php echo"".$olt;?>" name="olt" id="olt" required disabled/>
            </form-control>
            <form-control class="gr4-6">
                <label><pre>GPON #: </pre></label>
                <input type="text" value="<?php echo"".$gpon;?>" name="gpon" id="gpon" required disabled/>
            </form-control>
            <br/>
            <span class="header1 gr1">History</span>
            <div class="table-responsive gr1 historyTBL">
            <table id="history_list" class="stripe cell-border row-border hover compact" style="width:100%">
                <thead class="thead">
                    <tr>
                        <th>#</th>
                        <th>Description</th>
                        <th>Remarks</th>
                        <th>User</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($resu->num_rows > 0) {
                    while ($row3 = $resu->fetch_assoc()) {
                       echo"
                       <tr>
                        <th>".$row3['uid_']."</th>
                        <th>".$row3['history']."</th>
                        <th>".$row3['remarks']."</th>
                        <th>".$row3['user_id']."</th>
                        <th>".$row3['date']."</th>
                        </tr>
                       ";
                    }
                }else{

                }
            mysqli_free_result($resu);
                ?>
                </tbody>
            </table>
        </div>
        </form>
    </div>
</section>
<script>

$(document).ready(function() {
    var t = $('#history_list').DataTable({
        stateSave: true,
        responsive: true,
        dom: 'Blfrtip',
        buttons: {
            "dom": {
                "button": {
                    "tag": "button",
                    "className": "exportBtn _btn"
                }
            },
            "buttons": ['excelHtml5', 'print']
        },
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, 'All']
        ],
        "language": {
            processing: '<br/><br/><br/><br/>'
        },
        scrollY: "320px",
        scrollCollapse: true,
        columnDefs: [{
            "className": "dt-center",
            "targets": "_all"

        }, {
            searchable: false,
            orderable: false,
            targets: [0, 11],
        }, ],
        order: [
            [1, 'asc']
        ],
        processing: true,
        serverSide: true,
        ajax: "../include/fetchHistoryTbl.inc.php",

    });

    t.on('order.dt search.dt', function() {
        let i = 1;
        t.cells(null, 0, {
            search: 'applied',
            order: 'applied'
        }).every(function(cell) {
            this.data(i++);
        });
    }).draw();
});

function selectInst(el) {
    $('#plan_type').val('').trigger('change');
    if (el.value == 'catv' || el.value == 'fbr_catv') {
        $('#plan_type').prop('disabled', 'disabled');
        $('#boxn').prop('disabled', false);
        $('#cardn').prop('disabled', false);
        $('#ip').prop('disabled', 'disabled');
        $('#mac').prop('disabled', 'disabled');
        $('#serial').prop('disabled', 'disabled');
        $('#onu_model').prop('disabled', 'disabled');
        $('#nap').prop('disabled', 'disabled');
        $('#slot').prop('disabled', 'disabled');
        $('#layer').prop('disabled', 'disabled');
        $('#lcp').prop('disabled', 'disabled');
        $('#olt').prop('disabled', 'disabled');
        $('#gpon').prop('disabled', 'disabled');
    $('#ip').val('').trigger('change');
    $('#mac').val('').trigger('change');
    $('#serial').val('').trigger('change');
    $('#nap').val('').trigger('change');
    $('#slot').val('').trigger('change');
    $('#layer').val('').trigger('change');
    $('#lcp').val('').trigger('change');
    $('#lcp').val('').trigger('change');
    $('#gpon').val('').trigger('change');

        document.getElementById("bundle-1").style.display = "none";
        document.getElementById("bundle-2").style.display = "none";
        document.getElementById("bundle-3").style.display = "none";
        document.getElementById("bundle-4").style.display = "none";
        document.getElementById("bundle-5").style.display = "none";
        document.getElementById("bundle-6").style.display = "none";
        document.getElementById("inetOnly-1").style.display = "none";
        document.getElementById("inetOnly-2").style.display = "none";
        document.getElementById("inetOnly-3").style.display = "none";

    }
    if (el.value == 'netonly' || el.value == 'fbr_netonly') {
        $('#plan_type').prop('disabled', false);
        document.getElementById("bundle-1").style.display = "none";
        document.getElementById("bundle-2").style.display = "none";
        document.getElementById("bundle-3").style.display = "none";
        document.getElementById("bundle-4").style.display = "none";
        document.getElementById("bundle-5").style.display = "none";
        document.getElementById("bundle-6").style.display = "none";
        document.getElementById("inetOnly-1").style.display = "flex";
        document.getElementById("inetOnly-2").style.display = "flex";
        document.getElementById("inetOnly-3").style.display = "flex";
        $('#boxn').prop('disabled', 'disabled');
        $('#cardn').prop('disabled', 'disabled');
        $('#ip').prop('disabled',  false);
        $('#mac').prop('disabled',  false);
        $('#serial').prop('disabled',  false);
        $('#onu_model').prop('disabled', false);
        $('#nap').prop('disabled',  false);
        $('#slot').prop('disabled',  false);
        $('#layer').prop('disabled',  false);
        $('#lcp').prop('disabled',  false);
        $('#olt').prop('disabled',  false);
        $('#gpon').prop('disabled', false);
    $('#boxn').val('').trigger('change');
    $('#cardn').val('').trigger('change');
    }
    if (el.value == 'catvnet' || el.value == 'fbr_catvnet') {
        $('#plan_type').prop('disabled', false);
        document.getElementById("bundle-1").style.display = "flex";
        document.getElementById("bundle-2").style.display = "flex";
        document.getElementById("bundle-3").style.display = "flex";
        document.getElementById("bundle-4").style.display = "flex";
        document.getElementById("bundle-5").style.display = "flex";
        document.getElementById("bundle-6").style.display = "flex";
        document.getElementById("inetOnly-1").style.display = "none";
        document.getElementById("inetOnly-2").style.display = "none";
        document.getElementById("inetOnly-3").style.display = "none";
        $('#boxn').prop('disabled', false);
        $('#cardn').prop('disabled', false);
        $('#ip').prop('disabled',  false);
        $('#mac').prop('disabled',  false);
        $('#serial').prop('disabled',  false);
        $('#onu_model').prop('disabled', false);
        $('#nap').prop('disabled',  false);
        $('#slot').prop('disabled',  false);
        $('#layer').prop('disabled',  false);
        $('#lcp').prop('disabled',  false);
        $('#olt').prop('disabled',  false);
        $('#gpon').prop('disabled', false);
    }

}

function selectSubs(el) {
    $('#install_type').val('').trigger('change');

    if (el.value == 'new') {
        document.getElementById("newsub-1").style.display = "flex";
        document.getElementById("newsub-2").style.display = "flex";
        document.getElementById("newsub-3").style.display = "flex";
        document.getElementById("existc-1").style.display = "none";
        document.getElementById("exist-1").style.display = "none";
        document.getElementById("exist-2").style.display = "none";
    }
    if (el.value == 'cable') {
        document.getElementById("newsub-1").style.display = "none";
        document.getElementById("newsub-2").style.display = "none";
        document.getElementById("newsub-3").style.display = "none";
        document.getElementById("existc-1").style.display = "flex";
        document.getElementById("exist-1").style.display = "flex";
        document.getElementById("exist-2").style.display = "flex";
    }
    if (el.value == 'docsis') {
        document.getElementById("newsub-1").style.display = "none";
        document.getElementById("newsub-2").style.display = "none";
        document.getElementById("newsub-3").style.display = "none";
        document.getElementById("existc-1").style.display = "none";
        document.getElementById("exist-1").style.display = "flex";
        document.getElementById("exist-2").style.display = "flex";
    }
        $('#plan_type').prop('disabled', false);
        document.getElementById("bundle-1").style.display = "none";
        document.getElementById("bundle-2").style.display = "none";
        document.getElementById("bundle-3").style.display = "none";
        document.getElementById("bundle-4").style.display = "none";
        document.getElementById("bundle-5").style.display = "none";
        document.getElementById("bundle-6").style.display = "none";
        document.getElementById("inetOnly-1").style.display = "none";
        document.getElementById("inetOnly-2").style.display = "none";
        document.getElementById("inetOnly-3").style.display = "none";
}

function selectOpt(el) {
    $('#brgySel').val('').trigger('change');
    if (el.value == 'BALANGA CITY') {
        for (var a = 1; a <= 25; a++) {
            document.getElementById("bal-" + a).classList.remove("opt_brgy");
        }
        for (var b = 1; b <= 23; b++) {
            document.getElementById("ori-" + b).classList.add("opt_brgy");
        }
        for (var c = 1; c <= 19; c++) {
            document.getElementById("ori-" + c).classList.add("opt_brgy");
        }
    }
    if (el.value == 'PILAR') {
        for (var a = 1; a <= 25; a++) {
            document.getElementById("bal-" + a).classList.add("opt_brgy");
        }
        for (var b = 1; b <= 23; b++) {
            document.getElementById("ori-" + b).classList.add("opt_brgy");
        }
        for (var c = 1; c <= 19; c++) {
            document.getElementById("pil-" + c).classList.remove("opt_brgy");
        }
    }
    if (el.value == 'ORION') {
        for (var a = 1; a <= 25; a++) {
            document.getElementById("bal-" + a).classList.add("opt_brgy");
        }
        for (var b = 1; b <= 23; b++) {
            document.getElementById("ori-" + b).classList.remove("opt_brgy");
        }
        for (var c = 1; c <= 19; c++) {
            document.getElementById("pil-" + c).classList.add("opt_brgy");
        }
    }
}
    function showSubs(a){
        document.getElementById("subDoc").style.display ="flex";
        sessionStorage.setItem('subs_id',a);
    }

    function hideSubs(){
        window.location.href='../pages/dashboard.php'
    }
</script>
<?php
include_once '../themes/footer.php';
