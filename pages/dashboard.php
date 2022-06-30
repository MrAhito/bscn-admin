<?php
session_start();
if (!isset($_SESSION['code'])) {
    header("location: log-in.php");
    exit();
}
// unset($_SESSION['__id']);
include_once '../themes/header.php';
// include_once '../styles/dahboard.style.php';
?>
<style>
.graphs_div {
    position: absolute;
    top: 50px;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
    display: flex;
    padding: 10px 0;
    align-content: flex-start;
    flex-wrap: wrap;
}

.right_div {
    display: flex;
    width: 85%;
    flex-wrap: wrap;
    align-content: flex-start;
    justify-content: space-around;
}

.dayinstall_graph {
    margin: 10px;
    border: 1px solid var(--shadow);
    display: flex;
    width: 45%;
    height: 40%;
}

.dayChart {
    display: flex;
    width: 100%;
}

.planChart {
    width: 33vw;
    display: flex;
    align-items: center;
    padding: 0 42px;
}
</style>
<section class="section_dash">
    <?php
    include_once '../components/navBar.php';
    ?>
    <div class="graphs_div">
        <div class="right_div">
            <div class="dayinstall_graph">
                <canvas id="dayChart" class="dayChart"></canvas>
            </div>
            <div class="dayinstall_graph">
                <canvas id="monChart" class="dayChart"></canvas>
            </div>
            <div class="dayinstall_graph planChart">
                <canvas id="planChart"></canvas>
            </div>
            <div class="dayinstall_graph">

            </div>
        </div>
    </div>

</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>

<?php
// run the query
include '../include/db.inc.php';

$sql = "SELECT plan FROM subs_info_tbl";
$sql2 = "SELECT date_installed FROM subs_info_tbl";
$result = $con->query($sql);
$result2 = $con->query($sql2);

// fetch all results into an array
$response = array();
$dates = array();
while ($row = $result->fetch_assoc())
    $response[] = $row;
while ($daterow = $result2->fetch_assoc())
    $dates[] = $daterow;

// save the JSON encoded array
$jsonData = json_encode($response);
$jsonDates = json_encode($dates);

?>
<script>
var PlanperSubs = <?= $jsonData . ";" ?>
var DatesSubs = <?= $jsonDates . ";" ?>

var bundle1 = 0;
var bundle2 = 0;
var bundle3 = 0;
var bundle4 = 0;
var bundle5 = 0;
var bundle6 = 0;
var net1 = 0;
var net2 = 0;
var net3 = 0;

var getLength = function(obj) {
    var i = 0,
        key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) {
            i++;
        }
    }
    return i;
};
// Plans
for (var i = 0; i < getLength(PlanperSubs); i++) {
    if (PlanperSubs[i]['plan'] == '1000' || PlanperSubs[i]['plan'] == 'bundle-1') {
        bundle1++;
    } else if (PlanperSubs[i]['plan'] == '1250' || PlanperSubs[i]['plan'] == 'bundle-2') {
        bundle2++;
    } else if (PlanperSubs[i]['plan'] == '1400' || PlanperSubs[i]['plan'] == 'bundle-3') {
        bundle3++;
    } else if (PlanperSubs[i]['plan'] == '1850' || PlanperSubs[i]['plan'] == 'bundle-4') {
        bundle4++;
    } else if (PlanperSubs[i]['plan'] == '2600' || PlanperSubs[i]['plan'] == 'bundle-5') {
        bundle5++;
    } else if (PlanperSubs[i]['plan'] == '3100' || PlanperSubs[i]['plan'] == 'bundle-6') {
        bundle6++;
    } else if (PlanperSubs[i]['plan'] == '1500' || PlanperSubs[i]['plan'] == 'inetOnly-1') {
        net1++;
    } else if (PlanperSubs[i]['plan'] == '2250' || PlanperSubs[i]['plan'] == 'inetOnly-2') {
        net2++;
    } else if (PlanperSubs[i]['plan'] == '2750' || PlanperSubs[i]['plan'] == 'inetOnly-3') {
        net3++;
    } else if (PlanperSubs[i]['plan'] == '3250') {
        net3++;
    }
}

// Dates
function getDaysInCurrentMonth() {
    const date = new Date();

    return new Date(
        date.getFullYear(),
        date.getMonth(),
        0
    ).getDate();
}
const date = new Date();

newDate = new Date(
    date.getFullYear(),
    date.getMonth(), 0
);
const Year = date.getFullYear();
const Monthsa = date.getMonth();
const monthName = newDate.toLocaleString("default", {
    month: "long"
});

var dayLabels = [];
var dayValues = [];
var monthValues = [];
const months = getDaysInCurrentMonth();


for (var i = 1; i <= months; i++) {
    dayLabels.push(i.toString());
}

// ?Daily
count = 0;
for (var i = 1; i <= months; i++) {

    for (var a = 0; a < getLength(DatesSubs); a++) {
        if (i < 10) {
            if (DatesSubs[a]['date_installed'] == Year.toString() + '-0' + Monthsa.toString() + '-0' + i) {
                count++;
            }
        } else {
            if (DatesSubs[a]['date_installed'] == Year.toString() + '-0' + Monthsa.toString() + '-' + i) {
                count++;
            }
        }
    }
    dayValues.push(count.toString());
    count = 0;

}

// ?Monthly
countM = 0;
for (var c = 1; c <= 12; c++) {
    for (var a = 0; a < getLength(DatesSubs); a++) {
        // console.log(DatesSubs[a]['date_installed'].substring(0, 7));
        if (c < 10) {
            if (DatesSubs[a]['date_installed'].substring(0, 7) == Year.toString() + '-0' + c) {
                countM++;
            }
        } else {
            if (DatesSubs[a]['date_installed'].substring(0, 7) == Year.toString() + '-' + c) {
                countM++;
            }

        }
    }
    monthValues.push(countM.toString());
    countM = 0;
}




var day = document.getElementById('dayChart');
var mydayChart = new Chart(day, {
    type: 'line',
    data: {
        labels: dayLabels,
        datasets: [{
            label: 'Daily # of Install (' + monthName + ')',
            data: dayValues,
            // [22, 19, 31, 15, 12, 31, 12, 11, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3,
            //     12, 19, 3, 5, 2, 3, 6, 6
            // ]
            backgroundColor: [
                'rgba(69, 67, 114, 1)'
            ],
            borderColor: [
                'rgba(0,0,0, 1)'
            ],
            borderWidth: 2
        }]
    },
    devicePixelRatio: 10,
});
var month = document.getElementById('monChart');
var mymonthChart = new Chart(month, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Monthly # of Install(' + Year + ')',
            data: monthValues,
            //  [22, 19, 31, 15, 12, 31, 12, 11, 3, 5, 2, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(69, 67, 114, 1)'
            ],
            borderColor: [
                'rgba(0,0,0, 1)'
            ],
            borderWidth: 2
        }]
    },
    devicePixelRatio: 10,
});
var plan = document.getElementById('planChart');
var myplanChart = new Chart(plan, {
    type: 'doughnut',
    data: {
        labels: ['Plan1000 = ' + bundle1, 'Plan1250 = ' + bundle2, 'Plan1400 = ' + bundle3,
            'Plan1500+CATV = ' + bundle4, 'Plan1500 = ' + net1, 'Plan2250+CATV = ' + bundle5,
            'Plan2250 = ' + net2, 'Plan2750+CATV = ' + bundle6, 'Plan2750 = ' + net3
        ],
        datasets: [{
            data: [bundle1, bundle2, bundle3, bundle4, net1, bundle5, net2, bundle6, net3],
            backgroundColor: [
                'red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet', 'skyblue',
                'gray'
            ],
            borderJoinStyle: 'miter',
            borderColor: [
                'rgba(0,0,0, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        plugins: {
            legend: {
                position: "left"
            },
        },
    },
});
</script>
<?php
include_once '../themes/footer.php';
?>