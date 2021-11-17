<?php
include("components/header2.php");
include("db.php");
$email = $_SESSION['femail'];
$e_check = "SELECT * FROM users WHERE email = '$email'";
$e_res = mysqli_query($conn, $e_check);
$f_res = mysqli_fetch_assoc($e_res);
if ($f_res) {
    $f_email = $f_res['email'];
}
// print_r($f_res);
// exit();
$errors = [];
if (isset($_POST['submit'])) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    if ($password === $password2) {
        $password = md5($password);
        $qry = "UPDATE users SET password = '$password' WHERE email = '$email'";
        // echo $qry;
        // exit();
        mysqli_query($conn, $qry);
        header("location:login.php");
    } else {
        $errors['password'] = "Password Doesn't Match!";
    }
}
?>
<div class="forget">
    <div class="f-form">
        <form action="newpass.php" method="POST">
            <?php
            include("error.php");
            ?>
            <div>
                <input type="password" name="password" id="password" placeholder="Enter New Password" required>
                <p></p>
            </div>
            <div>
                <input type="password" name="password2" id="password2" placeholder="Retype Password" required>
                <p></p>
            </div>
            <input type="submit" name="submit" value="Submit"><br>
        </form>
    </div>
</div>
<!-- <script src="js/newpass.js"></script> -->
<!-- <script src="js/errorbtn.js"></script> -->
</body>

</html>