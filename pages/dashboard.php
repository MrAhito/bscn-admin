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
<link rel="stylesheet" type="text/css" href="path/to/chartjs/dist/Chart.min.css">
<style>
    .graphs_div{
        position: absolute;
        top: 50px;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        padding: 10px;
        flex-wrap: wrap;
    }
    .right_div{
        display: flex;
        width: 85%;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-around;
    }
    .dayinstall_graph{
        margin: 10px;
        border: 1px solid red;
        display: flex;
        width: 48%;
        height: 45%;
    }
    .dayChart{
        display: flex;
        width: 100%;
    }
    .planChart  {
        padding: 0 195px;
        width: 20vw;
        border: 1px solid red;
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
        <div class="dayinstall_graph planChart" >
        <canvas id="planChart"></canvas>
        </div>
        <div class="dayinstall_graph">

        </div>
        </div>
    </div>

</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>

<script>
var day = document.getElementById('dayChart');
var mydayChart = new Chart(day, {
    type: 'line',
    data: {
        labels: ['1', '2', '3', '4', '5', '6','7', '8', '9', '10', '11', '12','13', '14', '15', '16', '17', '18','19', '20', '21', '22', '23', '24','25', '26', '27', '28', '28', '29','30','31'],
        datasets: [{
            label: '# of Installs/Day',
            data: [22, 19, 31, 15, 12, 31, 12, 11, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3, 6, 6],
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
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
var month = document.getElementById('monChart');
var mymonthChart = new Chart(month, {
    type: 'line',
    data: {
        labels:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: '# of Installs/Month',
            data: [22, 19, 31, 15, 12, 31, 12, 11, 3, 5, 2, 3, 5, 2, 3],
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
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
var plan = document.getElementById('planChart');
var myplanChart = new Chart(plan, {
    type: 'doughnut',
    data: {
        labels:['Plan 1000', 'Plan 1250', 'Plan 1400', 'Plan 1500+CATV', 'Plan 1500', 'Plan 2250+CATV', 'Plan 2250', 'Plan 2750+CATV', 'Plan 2750'],
        datasets: [{
            data: [22, 19, 31, 15, 12, 31, 12, 11, 3],
            backgroundColor: [
                'rgba(69, 67, 114, 1)'
            ],
            borderColor: [
                'rgba(0,0,0, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
    },
});
</script>
<?php
include_once '../themes/footer.php';
?>