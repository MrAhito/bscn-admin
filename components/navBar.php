<?php include_once '../styles/navBar.style.php'; ?>
<style>
.userDrop {
    border: 1px solid var(--shadow);
    position: absolute;
    background-color: var(--primary);
    z-index: 9;
    display: none;
    flex-direction: column;
    border-radius: 10px;
    top: 42px;
    overflow: hidden;
}

.userDrop>a {
    padding: 8px 25px;
    text-decoration: none;
    font-weight: 700;
    color: var(--tertiary);
    font-size: .75em;
    transition: .3s ease-in-out;
}

.userDrop>a>i {
    margin-right: 5px;
    margin-left: -5px;
}

.userDrop>a:hover {
    background-color: var(--fontDark);
    transition: .3s ease-in-out;
}

.show {
    display: flex !important;
}
</style>

<nav class="nav_bar">
    <div class="ic_nav">
        <img class="ic_img" src="../img/logo 1.jpeg" />
        <span class="ic_txt">BSCNI - Monitoring</span>
    </div>
    <div class="user_nav">
        <span class="user_name"><?php echo "" . $_SESSION['name'] ?></span>
        <i class="fas fa-user userIC" onclick="myFunction()"></i>
        <div onclick="myFunction2()" class="userDrop" id="myDropdown">
            <a href="#"><i class="fas fa-user"></i>Account</a>
            <a href="../include/logout.inc.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
        </div>
    </div>
</nav>

<script>
function myFunction() {
    document.getElementById("myDropdown").classList.add("show");
}

 function myFunction2() {
        var myDropdown = document.getElementById("myDropdown");
        if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
        }
}
</script>