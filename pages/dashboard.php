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
<section class="section_dash">
    <?php
    include_once '../components/navBar.php';
    ?>
    
</section>
<?php
include_once '../themes/footer.php';
?>