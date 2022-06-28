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
        scrollY: "150px",
        scrollCollapse: true,
        columnDefs: [{
            "className": "dt-center",
            "targets": "_all"

        }]
    });


    $("#mun").change(function() {
        var values = $("#mun option:selected");
        if (values.text() == 'Balanga City') {
            $('#mun option[value="Pilar"]').attr("selected", false);
            $('#mun option[value="Orion"]').attr("selected", false);
            $('#mun option[value=""]').attr("selected", false);
        } else if (values.text() == 'Pilar') {
            $('#mun option[value="Balanga City"]').attr("selected", false);
            $('#mun option[value="Orion"]').attr("selected", false);
            $('#mun option[value=""]').attr("selected", false);
        } else if (values.text() == 'Orion') {
            $('#mun option[value="Balanga City"]').attr("selected", false);
            $('#mun option[value="Pilar"]').attr("selected", false);
            $('#mun option[value=""]').attr("selected", false);
        } else {
            $('#mun option[value="Orion"]').attr("selected", false);
            $('#mun option[value="Balanga City"]').attr("selected", false);
            $('#mun option[value="Pilar"]').attr("selected", false);
        }
    });

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
    if (el.value == 'Balanga City') {
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
    if (el.value == 'Pilar') {
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
    if (el.value == 'Orion') {
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

function editableInputs() {
    $('.form_add').children("form-control").children("input").addClass("editInput");
    $('.form_add').children("form-control").children("select").addClass("editInput");
    $('.sinBtn').removeClass('showInfBtn');
    $('.douBtn').addClass('showInfBtn');
}

function cancelInputs() {
    $('.form_add').children("form-control").children("input").removeClass("editInput");
    $('.form_add').children("form-control").children("select").removeClass("editInput");
    $('.douBtn').removeClass('showInfBtn');
    $('.sinBtn').addClass('showInfBtn');
    // Resetting Form
    $('#lname').val(<?php echo "'" . $lname . "'" ?>);
    $('#fname').val(<?php echo "'" . $fname . "'" ?>);
    $('#mname').val(<?php echo "'" . $mname . "'" ?>);
    if (<?php echo "'" . $addr . "'" ?> == ' ') {
        $('#addr').val(<?php echo "'" . $addr . "'" ?>);
    } else {
        $('#addr').val(<?php echo "'" . $address . "'" ?>);
    }
    $('#cnum').val(<?php echo "'" . $contact_ . "'" ?>);
    $('#email').val(<?php echo "'" . $email . "'" ?>);
    $('#lineman').val(<?php echo "'" . $lineman . "'" ?>);
    $('#ip').val(<?php echo "'" . $ip_address . "'" ?>);
    $('#mac').val(<?php echo "'" . $mac_address . "'" ?>);
    $('#serial').val(<?php echo "'" . $serial . "'" ?>);
    $('#boxn').val(<?php echo "'" . $box . "'" ?>);
    $('#cardn').val(<?php echo "'" . $card . "'" ?>);
    $('#wrStr').val(<?php echo "'" . $wr_start . "'" ?>);
    $('#wrEnd').val(<?php echo "'" . $wr_end . "'" ?>);
    $('#nap').val(<?php echo "'" . $nap . "'" ?>);
    $('#slot').val(<?php echo "'" . $slot . "'" ?>);
    $('#olt').val(<?php echo "'" . $olt . "'" ?>);
    $('#lcp').val(<?php echo "'" . $lcp . "'" ?>);
    $('#layer').val(<?php echo "'" . $layer . "'" ?>);
    $('#gpon').val(<?php echo "'" . $gpon . "'" ?>);

    if (<?php echo "'" . $mun . "'" ?> == 'Balanga City') {
        $('#mun option[value="Balanga City"]').attr("selected", "selected");
    } else if (<?php echo "'" . $mun . "'" ?> == 'Pilar') {
        $('#mun option[value="Pilar"]').attr("selected", "selected");
    } else if (<?php echo "'" . $mun . "'" ?> == 'Orion') {
        $('#mun option[value="Orion"]').attr("selected", "selected");
    } else {
        $('#mun option[value=""]').attr("selected", "selected");
    }
}
    </script>