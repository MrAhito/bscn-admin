<style>

    .p_info{
        display:flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        height: fit-content;
    }
    .info_container{
        padding: 0;
        border-radius: 8px;
        display: flex;
        overflow: hidden;
        align-items: baseline;
        margin-right: 25px;
        justify-content: center;
    }
    .info_container>pre{
        background: linear-gradient(to left top, var(--secondary), var(--tertiary2));
        margin: 0;
        font-weight: 600;
        padding: 7px 5px 7px 10px;
        font-size: .8em;
        color: var(--primary);
    }
    .info_container > span{
        font-size: .8em;
        margin: 0;
        padding: 5px 10px;
        width: 150px;
        border-bottom: 2px solid var(--secondary);
        display: flex;
        height: fit-content;
    }
    .gr1{
        font-size: .9em;
    }
</style>
    <div class="info_sub ">
        <div class="add_head inf_head">
            <h2><i class="fas fa-info-circle"></i> Subscriber</h2>
        </div>
        <div class="form_add inf_" id='formAdd'>
            <span class="header1 gr1">Personal Information 
                <button type="submit" name="submit" class='_btn addFormBtn'><i class="fas fa-edit"></i>
                Edit Subscriber's Info</button></span>
            <div class="p_info">
                <div class="info_container">
                    <pre>First Name: </pre>
                    <span><?php echo"".$fname ?></span>
                </div>

                <div class="info_container">
                    <pre>Middle Name: </pre>
                    <span><?php echo"".$mname ?></span>
                </div>

                <div class="info_container">
                    <pre>Last Name: </pre>
                    <span><?php echo"".$lname ?></span>
                </div>

            </div>
           
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
        </div>
    </div>
    
<script src="https://kit.fontawesome.com/1eec2efa50.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/jqc-1.12.4/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.min.js">
</script>
<script>
$(document).ready(function() {
    var t = $('#history_list').DataTable({
        stateSave: true,
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
            [10, 25, 50, 100, 1000, -1],
            [10, 25, 50, 100, 1000, 'All']
        ],
        "language": {
            processing: '<br/><br/><br/><br/>',
        },
        scrollY: "320px",
        scrollCollapse: true,
        columnDefs: [{
            "className": "dt-center",
            "targets": "_all"

        }
        // , {
        //     searchable: false,
        //     orderable: false,
        //     targets: [0, 11],
        // }, ],
        // order: [
        //     [1, 'asc']
        ]
    });

    // t.on('order.dt search.dt', function() {
    //     let i = 1;
    //     t.cells(null, 0, {
    //         search: 'applied',
    //         order: 'applied'
    //     }).every(function(cell) {
    //         this.data(i++);
    //     });
    // }).draw();
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