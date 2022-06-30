
<?php
session_start();

// if(!isset($_SESSION['__id']) || !isset($_SESSION['code'])){
//     header("location: log-in.php");
//     exit();
// }
include_once '../themes/header.php';
include_once '../styles/subscriber.style.php';
// include_once '../styles/subscriber.style.php';
?>
<section class="section_subs">
<?php 

include_once '../components/navBar.php';
if(isset($_SESSION['view'])){


if($_SESSION['view'] == 'info'){
    include_once '../styles/addSubs.style.php';
    include_once '../include/fetchSubsdata.inc.php';
    include_once '../components/remarks.php';
    include_once '../components/subsInfo.php';
}else if($_SESSION['view'] == 'onu'){
    include_once '../components/onu.php';
}else if($_SESSION['view'] == 'plans'){
    include_once '../components/plans.php';
}else{
    include_once '../styles/addSubs.style.php';
    include_once '../components/subsList.php';
    include "../components/addSubs.php";
}
}else{
    include_once '../styles/addSubs.style.php';
    include_once '../components/subsList.php';
    include "../components/addSubs.php";
}

?>



</section>
<?php
include_once '../themes/footer.php';
