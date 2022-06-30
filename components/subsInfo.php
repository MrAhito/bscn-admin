<?php include '../styles/subsInfo.style.php'; ?>
<div class="info_sub ">
    <div class="add_head inf_head">
        <a href="../include/optRoutes.inc.php?route=''&id=''"><i class="fas fa-arrow-left"></i> Subscribers List</a>
    </div>
    <form class="form_add inf_" id='formAdd' method="POST" action="../include/subsUpdate.inc.php">
        <section class="form_section">
            <span class="header1 gr1">
                <h2>Personal Information</h2>
                <div class="divEdit sinBtn showInfBtn ">
                    <button id="editBtn" type="button" onclick="editableInputs()" class='_btn subsInfBtn'><i
                            class="fas fa-edit"></i>Edit</button>
                </div>
                <div class="divEdit douBtn">
                    <button id="cancelBtn" type="button" onclick="cancelInputs()" class='_btn subsInfBtn canc'><i
                            class="fas fa-ban"></i>Cancel</button>
                    <button id="saveBtn" type="submit" name="submit" class='_btn subsInfBtn'><i
                            class="fas fa-save"></i>Save</button>
                </div>
            </span>
            <div class="forms_">
                <form-control class="group ">
                    <label>
                        <pre>Last Name: </pre>
                    </label>
                    <input type="text" value="<?php echo "" . $lname; ?>" name="lname" id="lname" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>First Name: </pre>
                    </label>
                    <input type="text" value="<?php echo "" . $fname; ?>" name="fname" id="fname" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Middle Name: </pre>
                    </label>
                    <input type="text" value="<?php echo "" . $mname; ?>" name="mname" id="mname" />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Municipality: </pre>
                    </label>
                    <select onchange="selectOpt(this)" name="mun" id="mun" required>
                        <option value="" hidden>Municipality/City</option>
                        <option <?php if ($mun == "Balanga City") {
                                    echo "selected";
                                } ?> value="Balanga City">Balanga City</option>
                        <option <?php if ($mun == "Pilar") {
                                    echo "selected";
                                } ?> value="Pilar">Pilar</option>
                        <option <?php if ($mun == "Orion") {
                                    echo "selected";
                                } ?> value="Orion">Orion</option>
                    </select>
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Barangay: </pre>
                    </label>
                    <select id='brgySel' name="brgy" id="brgy" required>
                        <option value="" hidden>Barangay</option>
                        <?php
                        include '../data/address.php';
                        foreach ($brgy as $val) {
                            echo "<option ";
                            if ($brgy_ == $val[1]) {
                                echo "selected";
                            }
                            echo " id='" . $val[0] . "' class='opt_brgy' value='" . $val[1] . "'>" . $val[1] . "</option>";
                        }
                        ?>
                    </select>
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Address: </pre>
                    </label>
                    <input type="text" value="<?php if ($addr == '') {
                                                    echo "" . $address;
                                                } else {
                                                    echo "" . $addr;
                                                } ?>" id="addr" name="addr" required />
                </form-control>

                <form-control class="group">
                    <label>
                        <pre>Contact #: </pre>
                    </label>
                    <input type="text" value="<?php echo "" . $contact_; ?>" pattern="[0-9]{4}[-][0-9]{3}[-][0-9]{4}"
                        name="cnum" id="cnum" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Email Address: </pre>
                    </label>
                    <input class="email" type="text" value="<?php echo "" . $email; ?>" name="email" id="email" />
                </form-control>
            </div>
        </section>
        <section class="form_section">
            <span class="header1 gr1">
                <h2>Account Information</h2>
            </span>
            <div class="forms_">

                <form-control class="group">
                    <label>
                        <pre>Subscriber: </pre>
                    </label>
                    <select onchange="selectSubs(this)" name="subs" id="subs" required>
                        <option value="" hidden>SELECT SUBSCRIBER TYPE</option>
                        <option <?php if ($subs_type == "new") {
                                    echo "selected";
                                } ?> value="new">NEW INSTALL</option>
                        <option <?php if ($subs_type == "cable") {
                                    echo "selected";
                                } ?> value="cable">EXISTING CABLE</option>
                        <option <?php if ($subs_type == "docsis") {
                                    echo "selected";
                                } ?> value="docsis">EXISTING DOCSIS</option>
                    </select>
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Installation: </pre>
                    </label>
                    <select id="install_type" onchange="selectInst(this)" name="install" required>
                        <option value="" hidden>SELECT INSTALLATION TYPE</option>
                        <option <?php if ($install_type == "catv") {
                                    echo "selected";
                                } ?> style="display:none" id='newsub-1' value="catv">CABLE ONLY</option>
                        <option <?php if ($install_type == "netonly") {
                                    echo "selected";
                                } ?> style="display:none" id='newsub-2' value="netonly">INTERNET ONLY</option>
                        <option <?php if ($install_type == "catvnet") {
                                    echo "selected";
                                } ?> style="display:none" id='newsub-3' value="catvnet">CABLE AND INTERNET</option>
                        <option <?php if ($install_type == "fbr_catv") {
                                    echo "selected";
                                } ?> style="display:none" id='existc-1' value="fbr_catv">UPGRADE TO FIBER CATV</option>
                        <option <?php if ($install_type == "fbr_catvnet") {
                                    echo "selected";
                                } ?> style="display:none" id='exist-1' value="fbr_catvnet">UPGRADE TO FIBER </option>
                        <option <?php if ($install_type == "fbr_netonly") {
                                    echo "selected";
                                } ?> style="display:none" id='exist-2' value="fbr_netonly">UPGRADE TO FIBER DISCO-CABLE
                        </option>
                    </select>
                </form-control>
                <form-control class="group">
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
                                echo "<option ";
                                if ($plan == $row['code']) {
                                    echo "selected ";
                                }
                                echo "id='" . $row['code'] . "' style='display:none' value='" . $row['code'] . "'>" . $row['desc_'] . "</option>";
                            }
                        }
                        mysqli_free_result($result);
                        $con->close();

                        ?>
                    </select>
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Lineman: </pre>
                    </label>
                    <input type="text" value="<?php echo "" . $lineman; ?>" name="lineman" id="lineman" />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Date Disconnected: </pre>
                    </label>
                    <input type="date" value="<?php echo "" . $disco; ?>" name="disco" id="disco" />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Date Reconnected: </pre>
                    </label>
                    <input type="date" value="<?php echo "" . $recon; ?>" name="recon" id="recon" />
                </form-control>
            </div>
        </section>

        <section class="full_sect">
            <span class="header1 gr1">
                <h2 class="gr1">Equipment Information</h2>
            </span>
            <div class="forms_">
                <form-control class="group">
                    <label>
                        <pre>ONU Model: </pre>
                    </label>
                    <select id="onu_model" name="onu_model" required>
                        <option value="" hidden>SELECT ONU MODEL</option>
                        <?php
                        include '../include/db.inc.php';
                        $sql = "SELECT * FROM onu_tbl";

                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option ";
                                if ($onu_model == $row['code']) {
                                    echo "selected";
                                }
                                echo " id='" . $row['code'] . "'  value='" . $row['code'] . "'>" . $row['dec_'] . "</option>";
                            }
                        }
                        mysqli_free_result($result);
                        $con->close();

                        ?>
                    </select>
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>IP Address: </pre>
                    </label>
                    <input type="text" value="<?php echo "" . $ip_address; ?>" name="ip" id="ip" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>MAC Address: </pre>
                    </label>
                    <input type="text" value="<?php echo "" . $mac_address; ?>" name="mac" id="mac" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>SERIAL #: </pre>
                    </label>
                    <input type="text" value="<?php echo "" . $serial; ?>" name="serial" id="serial" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Box #: </pre>
                    </label>
                    <input type="number" value="<?php echo "" . $box; ?>" name="boxn" id="boxn" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Card #: </pre>
                    </label>
                    <input type="number" value="<?php echo "" . $card; ?>" name="cardn" id="cardn" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Wire: </pre>
                    </label>
                    <select name="wr_type" required>
                        <option value="" hidden>SELECT WIRE</option>
                        <option <?php if ($wr_type == 'fbr') {
                                    echo "selected";
                                } ?> value="fbr">FIBER WIRE</option>
                        <option <?php if ($wr_type == 'coax') {
                                    echo "selected";
                                } ?> value="coax">COAXIAL WIRE</option>
                    </select>
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Wire Start: </pre>
                    </label>
                    <input type="number" value="<?php echo "" . $wr_start; ?>" name="wrStr" id="wrStr" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Wire End: </pre>
                    </label>
                    <input type="number" value="<?php echo "" . $wr_end; ?>" name="wrEnd" id="wrEnd" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>NAP #: </pre>
                    </label>
                    <input type="text" value="<?php echo "" . $nap; ?>" name="nap" id="nap" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Slot #: </pre>
                    </label>
                    <input type="number" value="<?php echo "" . $slot; ?>" name="slot" id="slot" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>Layer: </pre>
                    </label>
                    <input type="text" value="<?php echo "" . $layer; ?>" name="layer" id="layer" />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>LCP #: </pre>
                    </label>
                    <input type="text" value="<?php echo "" . $lcp; ?>" name="lcp" id="lcp" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>OLT #: </pre>
                    </label>
                    <input type="number" value="<?php echo "" . $olt; ?>" name="olt" id="olt" required />
                </form-control>
                <form-control class="group">
                    <label>
                        <pre>GPON #: </pre>
                    </label>
                    <input type="text" value="<?php echo "" . $gpon; ?>" name="gpon" id="gpon" required />
                </form-control>
            </div>
        </section>
        <section class="full_sect">
            <span class="header1 gr1">
                <h2>History</h2>
            </span>
            <br />
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
                                echo "
                       <tr>
                        <th>" . $row3['uid_'] . "</th>
                        <th>" . $row3['history'] . "</th>
                        <th>" . $row3['remarks'] . "</th>
                        <th>" . $row3['user_id'] . "</th>
                        <th>" . $row3['date'] . "</th>
                        </tr>
                       ";
                            }
                        } else {
                        }
                        mysqli_free_result($resu);
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </form>
</div>
<?php include '../js/subsInfo.js.php';