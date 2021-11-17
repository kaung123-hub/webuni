<?php
session_start();
$admin = isset($_SESSION['admin']);
// echo $_SESSION['name'];
?>
<div class="nav">
    <div class="logo">
        <h1>WebSchool</h1>
        <h6>Learn From the Best</h6>
    </div>
    <div class="nav-list">
        <ul>
            <li>
                <a href="/aimt_project/index.php">Home</a>
            </li>
            <li>
                <a href="../aimt_project/contact.php">About Us</a>
            </li>
            <li>
                <a href="/aimt_project/courses.php">Courses</a>
                <!-- <ul class="sub">
                                <li><a href="">Html</a></li>
                                <li><a href="">Css</a></li>
                                <li><a href="">Javascript</a></li>
                                <li><a href="">Jquery</a></li>
                                <li><a href="">Boostrap</a></li>
                                <li><a href="">Php</a></li>
                                <li><a href="">Laravel</a></li>
                            </ul> -->
            </li>
            <li>
                <a href="../aimt_project/blog.php">News</a>
            </li>
            <li>
                <a href="../aimt_project/contact.php">Contact</a>
            </li>
        </ul>
    </div>
    <div class="nav-link">
        <?php
        if (isset($_SESSION['name'])) {
        ?>
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">
                <?php
                    echo $_SESSION['name'];
                    ?>
            </button>
            <div id="myDropdown" class="dropdown-content">
                <?php
                    // echo $_SESSION['role'];
                    if ($_SESSION['role'] == 0 || $_SESSION['role'] == 2 && $_SESSION['status'] == 1) {
                    ?>
                <a href="./admin/admin.php">Admin Page</a>
                <?php
                    }
                    ?>
                <a href="./logout.php">Logout</a>
            </div>
        </div>
        <?php
        } else {
        ?>
        <a href="../aimt_project/login.php">Login</a>
        <?php
        }
        ?>
    </div>
</div>