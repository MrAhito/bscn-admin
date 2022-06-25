<?php include_once '../styles/navBar.style.php'; ?>

<nav class="nav_bar">
    <div class="ic_nav">
        <img class="ic_img" src="../img/logo 1.jpeg" />
        <span class="ic_txt">BSCNI - Monitoring</span>
    </div>
    <ul class="header_nav">
        <li><a href="../pages/dashboard.php">Home</a></li>
        <li>
            <ul class="elements" id="elemnt_">
                <li><a href="../include/optRoutes.inc.php?route=''&id=''"><i class="fas fa-users"></i>Subscribers</a></li>
                <li><a><i class="fas fa-map"></i>Plans</a></li>
                <li><a><i class="fas fa-hdd"></i>ONUs</a></li>
            </ul>
            <a class="a_elements" onclick="showEl()">Elements <i class="fas fa-caret-down"></i></a>
        </li>
        <li><a>Users</a></li>
    </ul>
    <div class="user_nav">
        <span class="user_name"><?php echo "" . $_SESSION['name'] ?></span>
        <i class="fas fa-user userIC" onclick="myFunction()"></i>
        <div class="userDrop" id="myDropdown">
            <a href="#"><i class="fas fa-user"></i>Account</a>
            <a href="../include/logout.inc.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
        </div>
    </div>
</nav>

<script>
function myFunction() {
    $("#myDropdown").addClass("show");
}

function showEl() {
    $("#elemnt_").addClass("elShow");
}
</script>