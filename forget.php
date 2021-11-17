<?php
include("components/header2.php");
include("db.php");
$errors = [];
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    if ($email) {
        $qry = "SELECT * FROM users WHERE email = '$email'";
        // echo $qry;
        // exit();
        $result = mysqli_query($conn, $qry);
        $fetch_res = mysqli_fetch_assoc($result);
        if ($fetch_res) {
            $f_email = $fetch_res['email'];
        }
        // print_r($fetch_res);
        // exit();
        if ($f_email) {
            if ($email === $f_email) {
                $_SESSION['femail'] = $email;
                header("location:newpass.php");
            } else {
                $errors['f-email'] = "Email doesn't match!";
            }
        } else {
            $errors['f-mail'] = "Email doesn't found!";
        }
    } else {
        $errors['f-email2'] = "Email doesn't exit!";
    }
}
?>
<div class="forget">
    <div class="f-form">
        <form action="forget.php" method="POST">
            <?php
            include("error.php");
            ?>
            <div>
                <input type="email" name="email" id="email" placeholder="Enter Your Email" required>
                <p></p>
            </div>
            <input type="submit" name="submit" value="Submit"><br>
        </form>
    </div>
</div>
<!-- <script src="js/forget.js"></script> -->
</body>

</html>