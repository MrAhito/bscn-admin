<?php include_once '../styles/navBar.style.php'; ?>
<style>
.elements,
.userDrop {
    position: absolute;
    background-color: var(--shadow);
    z-index: 9;
    display: none;
    flex-direction: column;
    border-radius: 4px;
    top: 42px;
    overflow: hidden;
    padding: 0;
}

.userDrop>a {
    padding: 8px 30px;
    text-decoration: none;
    font-weight: 700;
    color: var(--primary);
    font-size: .65em;
    transition: .3s ease-in-out;
}
.userDrop>a>i {
    font-size: .9em;
    margin-right: 5px;
    margin-left: -5px;
}
.userDrop>a:hover {
    background-color: var(--fontDark);
    transition: .3s ease-in-out;
    color: var(--secondary);
}
.elShow,
.show {
    display: flex;
}


.elements{
    top: 35px;
}
.elements>li{
    display: flex;
}
.elements>li>a{
padding: 6px 25px;
width: 100%;
    color: var(--primary);
font-size: .65em;
}
.elements>li>a>i{
    font-size: .95em;
    margin-right: 5px;
}
.elements>li>a:hover{
    background-color: var(--fontDark);
    color:var(--secondary) !important;
}

</style>

<nav class="nav_bar">
    <div class="ic_nav">
        <img class="ic_img" src="../img/logo 1.jpeg" />
        <span class="ic_txt">BSCNI - Monitoring</span>
    </div>
    <ul class="header_nav">
        <li><a>Home</a></li>
        <li>
            <ul class="elements" id="elemnt_">
                <li><a><i class="fas fa-users"></i>Subscribers</a></li>
                <li><a><i class="fas fa-map"></i>Plans</a></li>
                <li><a><i class="fas fa-hdd"></i>ONUs</a></li>
            </ul>
            <a class="a_elements" onclick="showEl()" >Elements <i class="fas fa-caret-down"></i></a>
        </li>
        <li><a>Users</a></li>
    </ul>
    <div class="user_nav">
        <span class="user_name"><?php echo "" . $_SESSION['name'] ?></span>
        <i class="fas fa-user userIC"  onclick="myFunction()"></i>
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