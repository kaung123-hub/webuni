<?php
include("db.php");
session_start();
$errors = [];
if (isset($_POST['submit'])) {
    // echo ("hello");
    // exit();
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // echo ($password);
    // exit();
    $password_verify = md5($password);
    if (count($errors) == 0) {
        $qry = "SELECT * FROM users WHERE email='$email'";
        // echo ($qry);
        $result = mysqli_query($conn, $qry);
        $fetch_res = mysqli_fetch_assoc($result);
        if ($fetch_res) {
            $f_email = $fetch_res['email'];
            $f_pass = $fetch_res['password'];
        } else {
            $errors['data'] = "data not exist";
        }
        if ($email === "admin@gmail.com" && $password === "12345678") {
            $_SESSION['name'] = "Admin";
            $_SESSION['role'] = 0;
            $_SESSION['id'] = 6;
            $_SESSION['admin'] = true;
            header("location:admin/admin.php");
        } else if (isset($f_email)) {
            if ($email === $f_email && $password_verify === $f_pass) {
                $_SESSION['name'] = $fetch_res['name'];
                $_SESSION['id'] = $fetch_res['id'];
                $_SESSION['role'] = $fetch_res['role'];
                $_SESSION['status'] = $fetch_res['status'];
                header("location:index.php");
            } else if ($email !== $f_email) {
                $errors['email'] = "Email not found!";
            } else {
                $errors['password'] = "Password not match";
            }
        }
    } else {
        $errors['login'] = "Login Fail!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/error.css">
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
    <div class="login">
        <div class="l-form">
            <form action="login.php" method="POST">
                <?php
                include("error.php");
                ?>
                <div>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email" required>
                    <p></p>
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required>
                    <p></p>
                </div>
                <input type="submit" name="submit" value="Login"><br>
            </form>
            <a href="./forget.php">Forget Password</a>
            <a href="./register.php">Register</a>
        </div>
    </div>
    <!-- <script src="js/login_validation.js"></script> -->
    <script src="js/errorbtn.js"></script>
</body>

</html>