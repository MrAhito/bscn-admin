<?php
session_start();

if (isset($_SESSION['code'])) {
    header("location: ../index.php");
}
include_once '../themes/header.php';
include_once '../styles/log_in.style.php';

?>


<section class="section_logIn">
    <section class="headr_log">
        <img src="../img/logo 1.jpeg" />
        <h2>LOGIN</h2>
    </section>
    <h6 class="error_log">
        <?php
        if (isset($_GET["error"])) {
            if ($_GET['error'] === "emptyinput") {
                echo 'Please fill all fields';
            } else if ($_GET['error'] === "nouser") {
                echo 'User does not exist';
            } else if ($_GET['error'] === "wrongpass") {
                echo 'Incorrect password';
            }
        }
        ?>
    </h6>
    <form class="form_logIn" action="../include/login.inc.php" method="POST">
        <input type="text" name="uname" placeholder="Username..." />
        <input type="password" name="upass" placeholder="Password..." />
        <button type="submit" name="submit">LOGIN</button>
    </form>
</section>

<?php
include_once '../themes/footer.php';
?>