<div class="content_view">
    <div class="subs_header">
        <h3>Package List</h3>
        <!-- <button class="_btn" onclick="showAdd()">Add Record</button> -->
    </div>
    <div class="table-responsive">
        <table id="onu_list" class="stripe cell-border row-border hover compact" style="width:100%">
            <thead class="thead">
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Descriptions</th>
                    <th>Monthly</th>
                    <th>Operations</th>
                </tr>
            </thead>
        </table>
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
    var t = $('#onu_list').DataTable({
        // stateSave: true, 
        responsive: true,
        info: "true",
        dom: 'Bfrtip',
        buttons: {
            "dom": {
                "button": {
                    "tag": "button",
                    "className": "exportBtn _btn"
                }
            },
            "buttons": ['excelHtml5', 'print']
        },
        pageLength: -1,
        "language": {
            processing: '<br/><br/><br/><br/>'
        },
        scrollCollapse: true,
        columnDefs: [{
            "className": "dt-center",
            "targets": "_all"

        }, {
            searchable: false,
            orderable: false,
            targets: [0, 4],
        }, ],
        order: [
            [1, 'asc']
        ],
        processing: true,
        serverSide: true,
        ajax: "../include/planfetch.inc.php",

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
</script>