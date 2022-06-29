<?php include_once "../styles/addSubs.style.php" ?>
<section id="addBlock" class="add_sub_block">
    <div class="add_sub">
        <div class="add_head">
            <h2><i class="fas fa-plus-circle"></i>Add Subscriber</h2>
            <i class="fas fa-times" onclick="hideAdd()"></i>
        </div>
        <form class="form_add" method="POST" id='formAdd' action="../include/addSubs.inc.php">
            <span class="header1 gr1">
                <h2>Personal Information</h2>
                <button type="submit" name="submit" class='_btn addFormBtn'><i class="fas fa-save"></i>Save</button>
            </span>
            <form-control class="gr2-1">
                <label>
                    <pre>Last Name: </pre>
                </label>
                <input type="text" placeholder="Last Name" name="lname" required />
            </form-control>
            <form-control class="gr2-2">
                <label>
                    <pre>First Name: </pre>
                </label>
                <input type="text" placeholder="First Name" name="fname" required />
            </form-control>
            <form-control class="gr2-3">
                <label>
                    <pre>Middle Name: </pre>
                </label>
                <input type="text" placeholder="Middle Name" name="mname" />
            </form-control>
            <form-control class="gr2-1">
                <label>
                    <pre>Municipality: </pre>
                </label>
                <select onchange="selectOpt(this)" name="mun" required>
                    <option value="" hidden>Select Municipality</option>
                    <option value="BALANGA CITY">Balanga City</option>
                    <option value="PILAR">Pilar</option>
                    <option value="ORION">Orion</option>
                </select>
            </form-control>
            <form-control class="gr2-2">
                <label>
                    <pre>Barangay: </pre>
                </label>
                <select id='brgySel' name="brgy" required>
                    <option value="" hidden>Select Barangay</option>
                    <?php
                    include '../data/address.php';
                    foreach ($brgy as $val) {
                        echo "<option id='" . $val[0] . "' class='opt_brgy' value='" . $val[1] . "'>" . $val[1] . "</option>";
                    }
                    ?>
                </select>
            </form-control>
            <form-control class="gr2-3">
                <label>
                    <pre>Address: </pre>
                </label>
                <input type="text" placeholder="Address" name="addr" required />
            </form-control>
            <form-control class="gr2-1">
                <label>
                    <pre>Contact: </pre>
                </label>
                <input type="text" placeholder="Mobile Number" pattern="[0-9]{4}[-][0-9]{3}[-][0-9]{4}" name="cnum"
                    required />
            </form-control>
            <form-control class="gr2-2">
                <label>
                    <pre>Email Add: </pre>
                </label>
                <input class="email" type="email" placeholder="Email Address" name="email" />
            </form-control>

            <br /><br />
            <span class="header1 gr1 bt_5">
                <h2>Account Information</h2>
            </span>
            <form-control class="gr2-1">
                <label>
                    <pre>Subscriber: </pre>
                </label>
                <select onchange="selectSubs(this)" name="subs" required>
                    <option value="" hidden>SELECT SUBSCRIBER TYPE</option>
                    <option value="new">NEW INSTALL</option>
                    <option value="cable">EXISTING CABLE</option>
                    <option value="docsis">EXISTING DOCSIS</option>
                </select>
            </form-control>
            <form-control class="gr2-2">
                <label>
                    <pre>Installation: </pre>
                </label>
                <select id="install_type" onchange="selectInst(this)" name="install" required>
                    <option value="" hidden>SELECT INSTALLATION TYPE</option>
                    <option style="display:none" id='newsub-1' value="catv">CABLE ONLY</option>
                    <option style="display:none" id='newsub-2' value="netonly">INTERNET ONLY</option>
                    <option style="display:none" id='newsub-3' value="catvnet">CABLE AND INTERNET</option>
                    <option style="display:none" id='existc-1' value="fbr_catv">UPGRADE TO FIBER CATV</option>
                    <option style="display:none" id='exist-1' value="fbr_catvnet">UPGRADE TO FIBER </option>
                    <option style="display:none" id='exist-2' value="fbr_netonly">UPGRADE TO FIBER DISCO-CABLE</option>
                </select>
            </form-control>
            <form-control class="gr2-3">
                <label>
                    <pre>Plan/Bundle: </pre>
                </label>
                <select id="plan_type" name="plan" required>
                    <option value="" hidden>SELECT PLAN/BUNDLE</option>
                    <?php
                    include '../include/db.inc.php';
                    $sql = "SELECT * FROM package_tbl";

                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option id='" . $row['code'] . "' style='display:none' value='" . $row['code'] . "'>" . $row['desc_'] . "</option>";
                        }
                    }
                    mysqli_free_result($result);
                    $con->close();

                    ?>
                </select>
            </form-control>
            <form-control class="gr2-1">
                <label>
                    <pre>Lineman: </pre>
                </label>
                <input type="text" placeholder="LINEMAN" name="lineman" required />
            </form-control>

            <span class="header1 gr1 bt_5">
                <h2>Equipment Information</h2>
            </span>
            <form-control class="gr5-1">
                <label>
                    <pre>IP: </pre>
                </label>
                <input type="text" placeholder="IP ADDRESS" name="ip" id="ip" required disabled />
            </form-control>
            <form-control class="gr5-2">
                <label>
                    <pre>MAC: </pre>
                </label>
                <input type="text" placeholder="MAC ADDRESS" name="mac" id="mac" required disabled />
            </form-control>
            <form-control class="gr5-3">
                <label>
                    <pre>SERIAL: </pre>
                </label>
                <input type="text" placeholder="SERIAL NUMBER" name="serial" id="serial" required disabled />
            </form-control>
            <form-control class="gr5-4">
                <label>
                    <pre>ONU Model: </pre>
                </label>
                <select id="onu_model" name="onu_model" required disabled>
                    <option value="" hidden>SELECT ONU MODEL</option>
                    <?php
                    include '../include/db.inc.php';
                    $sql = "SELECT * FROM onu_tbl";

                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option id='" . $row['code'] . "'  value='" . $row['code'] . "'>" . $row['dec_'] . "</option>";
                        }
                    }
                    mysqli_free_result($result);
                    $con->close();

                    ?>
                </select>
            </form-control>
            <form-control class="gr5-1">
                <label>
                    <pre>Box: </pre>
                </label>
                <input type="text" placeholder="BOX NUMBER" name="boxn" id="boxn" required disabled />
            </form-control>
            <form-control class="gr5-2">
                <label>
                    <pre>Card: </pre>
                </label>
                <input type="text" placeholder="CARD NUMBER" name="cardn" id="cardn" required disabled />
            </form-control>
            <form-control class="gr4-4">
                <label>
                    <pre>Wire: </pre>
                </label>
                <select name="wr_type" required>
                    <option value="" hidden>type</option>
                    <option value="fbr">FIBER</option>
                    <option value="coax">COAXIAL</option>
                </select>
            </form-control>
            <form-control class="gr4-5">
                <label>
                    <pre>Start: </pre>
                </label>
                <input type="number" placeholder="WIRE START" name="wrStr" required />
            </form-control>
            <form-control class="gr4-6">
                <label>
                    <pre>End: </pre>
                </label>
                <input type="number" placeholder="WIRE END" name="wrEnd" required />
            </form-control>
            <form-control class="gr4-1">
                <label>
                    <pre>NAP: </pre>
                </label>
                <input type="text" placeholder="NAP" name="nap" id="nap" required disabled />
            </form-control>
            <form-control class="gr4-2">
                <label>
                    <pre>Slot: </pre>
                </label>
                <input type="number" placeholder="SLOT" name="slot" id="slot" required disabled />
            </form-control>
            <form-control class="gr4-3">
                <label>
                    <pre>Layer: </pre>
                </label>
                <input type="text" placeholder="LAYER" name="layer" id="layer" required disabled />
            </form-control>
            <form-control class="gr4-4">
                <label>
                    <pre>LCP: </pre>
                </label>
                <input type="text" placeholder="LCP" name="lcp" id="lcp" required disabled />
            </form-control>
            <form-control class="gr4-5">
                <label>
                    <pre>OLT: </pre>
                </label>
                <input type="number" placeholder="OLT" name="olt" id="olt" required disabled />
            </form-control>
            <form-control class="gr4-6">
                <label>
                    <pre>GPON: </pre>
                </label>
                <input type="text" placeholder="GPON" name="gpon" id="gpon" required disabled />
            </form-control>
        </form>
    </div>
</section>
<script>
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
        $('#ip').prop('disabled', false);
        $('#mac').prop('disabled', false);
        $('#serial').prop('disabled', false);
        $('#onu_model').prop('disabled', false);
        $('#nap').prop('disabled', false);
        $('#slot').prop('disabled', false);
        $('#layer').prop('disabled', false);
        $('#lcp').prop('disabled', false);
        $('#olt').prop('disabled', false);
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
        $('#ip').prop('disabled', false);
        $('#mac').prop('disabled', false);
        $('#serial').prop('disabled', false);
        $('#onu_model').prop('disabled', false);
        $('#nap').prop('disabled', false);
        $('#slot').prop('disabled', false);
        $('#layer').prop('disabled', false);
        $('#lcp').prop('disabled', false);
        $('#olt').prop('disabled', false);
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

function hideAdd() {
    document.getElementById("addBlock").classList.remove("hidAdd");
    document.getElementById("formAdd").reset();

}

function showAdd() {
    document.getElementById("addBlock").classList.add("hidAdd");
}
</script>