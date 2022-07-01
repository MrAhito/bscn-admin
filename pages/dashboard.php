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
    width: 28vw;
    display: flex;
    align-items: center;
    padding: 0 98px;
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

$sql2 = "SELECT date_installed FROM subs_info_tbl";
$result2 = $con->query($sql2);

$dates = array();
while ($daterow = $result2->fetch_assoc())
    $dates[] = $daterow;

mysqli_free_result($result2);
$jsonDates = json_encode($dates);


$bundle1 = 0;
$bundle2 = 0;
$bundle3 = 0;
$bundle4 = 0;
$bundle5 = 0;
$bundle6 = 0;
$net1 = 0;
$net2 = 0;
$net3 = 0;
$net4 = 0;
$others = 0;

$sqlarr = array(
    array('b1', 'SELECT uid_ FROM subs_info_tbl where plan = "bundle-1" OR plan = "1000"'),
    array('b2', 'SELECT uid_ FROM subs_info_tbl where plan = "bundle-2" OR plan = "1250"'),
    array('b3', 'SELECT uid_ FROM subs_info_tbl where plan = "bundle-3" OR plan = "1400"'),
    array('b4', 'SELECT uid_ FROM subs_info_tbl where plan = "bundle-4" OR plan = "1850"'),
    array('b5', 'SELECT uid_ FROM subs_info_tbl where plan = "bundle-5" OR plan = "2600"'),
    array('b6', 'SELECT uid_ FROM subs_info_tbl where plan = "bundle-6" OR plan = "3100"'),
    array('n1', 'SELECT uid_ FROM subs_info_tbl where plan = "inetOnly-1" OR plan = "1500"'),
    array('n2', 'SELECT uid_ FROM subs_info_tbl where plan = "inetOnly-2" OR plan = "2250"'),
    array('n3', 'SELECT uid_ FROM subs_info_tbl where plan = "inetOnly-3" OR plan = "2750"'),
    array('n4', 'SELECT uid_ FROM subs_info_tbl where plan = "3250"'),

);
for($a = 0; $a < count($sqlarr); $a++){ 
    $res = $con->query($sqlarr[$a][1]);
     if ($res){
        $row = mysqli_num_rows($res);
        if ($row){
            if($sqlarr[$a][0] == 'b1'){ $bundle1 = $row;}
            if($sqlarr[$a][0] == 'b2'){ $bundle2 = $row;}
            if($sqlarr[$a][0] == 'b3'){ $bundle3 = $row;}
            if($sqlarr[$a][0] == 'b4'){ $bundle4 = $row;}
            if($sqlarr[$a][0] == 'b5'){ $bundle5 = $row;}
            if($sqlarr[$a][0] == 'b6'){ $bundle6= $row;}
            if($sqlarr[$a][0] == 'n1'){ $net1 = $row;}
            if($sqlarr[$a][0] == 'n2'){ $net2 = $row;}
            if($sqlarr[$a][0] == 'n3'){ $net3 = $row;}
            if($sqlarr[$a][0] == 'n4'){ $net5 = $row;}
        }
        mysqli_free_result($res);
    }
}
$monthVal = array();
$dayVal = array();
$year_ =  date("Y");
$month_ =  date("m")-1;
$numDays_ =  date("t");

// Monthly
for($m = 1; $m <= 12; $m++ ){
    if($m < 10){
        $sqlDate = "SELECT uid_ FROM `subs_info_tbl` WHERE `date_installed` LIKE '%2022-0".$m."%'";
    }else{
        $sqlDate = "SELECT uid_ FROM `subs_info_tbl` WHERE `date_installed` LIKE '%2022-".$m."%'";
    }
    $res = $con->query($sqlDate);
    $row = mysqli_num_rows($res);
    if ($row){
        array_push($monthVal, $row);
    }else{
        array_push($monthVal, 0);
    }
}
$jsonDates = json_encode($monthVal);


for($d = 1; $d <= $numDays_-1; $d++ ){
    if($d < 10){
        $sqlDate = "SELECT uid_ FROM `subs_info_tbl` WHERE `date_installed` LIKE '%2022-0".$month_."-0".$d."%'";
    }else{
        $sqlDate = "SELECT uid_ FROM `subs_info_tbl` WHERE `date_installed` LIKE '%2022-0".$month_."-".$d."%'";
    }

    $res = $con->query($sqlDate);
    $row = mysqli_num_rows($res);
    if ($row){
        array_push($dayVal, $row);
    }else{
        array_push($dayVal, 0);
    }
}
$jsonDays = json_encode($dayVal);

$con->close();

?>
<script>
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

var bundle1 = <?php echo $bundle1;?>;
var bundle2 = <?php echo $bundle2;?>;
var bundle3 = <?php echo $bundle3;?>;
var bundle4 = <?php echo $bundle4;?>;
var bundle5 = <?php echo $bundle5;?>;
var bundle6 = <?php echo $bundle6;?>;
var net1 = <?php echo $net1;?>;
var net2 = <?php echo $net2;?>;
var net3 = <?php echo $net3 + $net4;?>;
monthValues = <?= $jsonDates;?>;
dayValues = <?= $jsonDays;?>;

var day = document.getElementById('dayChart');
var mydayChart = new Chart(day, {
    type: 'bar',
    data: {
        labels: dayLabels,
        datasets: [{
            label: 'Daily # of Install (' + monthName + ')',
            data: 
            dayValues,
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
            data: 
            monthValues,
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
                '#D1C4E9', '#9575CD', '#673AB7', '#512DA8', '#311B92', '#283593', '#3949AB', '#5C6BC0',
                '#7986CB'
            ],
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
            title: {
                display: true,
                text: 'Plan Chart',
                font: {
                        size: 18
                    },
                padding: {
                    top:90,
                    bottom:-90,
                }
            }
        },
    }
});
</script>
<?php
include_once '../themes/footer.php';
?>