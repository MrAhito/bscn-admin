<?php
session_start();
if (!isset($_SESSION['code'])) {
    header("location: log-in.php");
    exit();
}
unset($_SESSION['__id']);
include_once '../themes/header.php';
include_once '../styles/dahboard.style.php';
?>
<section class="section_dash">
    <?php
    include_once '../components/navBar.php';
    ?>
    <div class="content_view">
        <div class="subs_header">
            <h3>Subscribers List</h3>
            <button class="_btn" onclick="showAdd()">Add Record</button>
        </div>
        <div class="table-responsive">
            <table id="subscribers_list" class="stripe cell-border row-border hover compact" style="width:100%">
                <thead class="thead">
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>IP</th>
                        <th>MAC</th>
                        <th>Date Installed</th>
                        <th>Type</th>
                        <th>Operations</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>
<?php
include "../components/addSubs.php";
include_once '../themes/footer.php';
?>