<?php
include("db.php");
$errors = [];
$id = $_GET['id'];
$pid = $_GET['pid'];
// echo $id;
$qry = "SELECT * FROM comments WHERE id = '$id'";
$res = mysqli_query($conn, $qry);
$data = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/error.css">
    <link rel="stylesheet" href="./css/commentreply.css">
</head>

<body>
    <header>
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
        </div>
    </header>
    <div class="reply">
        <div class="r-form">
            <form action="commentupdate.php" method="POST">
                <?php
                include("error.php");
                ?>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="pid" value="<?php echo $pid ?>">
                <input type="text" name="reply" value="<?php echo $data['content'] ?>">
                <input type="submit" name="submit" value="Update"><br>
            </form>
        </div>
    </div>
    <!-- <script src="js/login_validation.js"></script> -->
    <script src="js/errorbtn.js"></script>
</body>

</html>