<?php
include("components/header2.php");
include("db.php");
$errors = [];
if (isset($_POST['submit'])) {
    // echo "hello";
    // exit();
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $photo = mysqli_real_escape_string($conn, $_FILES['profile-image']['name']);
    $tmp_photo = $_FILES['profile-image']['tmp_name'];
    if ($photo) {
        move_uploaded_file($tmp_photo, "photo/$photo");
    }
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $f_nrc_image = mysqli_real_escape_string($conn, $_FILES['nrc-f-image']['name']);
    $tmp_f_nrc = $_FILES['nrc-f-image']['tmp_name'];
    if ($f_nrc_image) {
        move_uploaded_file($tmp_f_nrc, "nrc-image/$f_nrc_image");
    }
    $b_nrc_image = mysqli_real_escape_string($conn, $_FILES['nrc-b-image']['name']);
    $tmp_b_nrc = $_FILES['nrc-b-image']['tmp_name'];
    if ($b_nrc_image) {
        move_uploaded_file($tmp_b_nrc, "nrc-image/$b_nrc_image");
    }
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $e_check = "SELECT * FROM users WHERE email='$email'";
    $res_e_check = mysqli_query($conn, $e_check);
    // echo ($gender);
    // exit();
    if (mysqli_num_rows($res_e_check) > 0) {
        $errors['email'] = "Email already exist!";
        // echo "email already exist";
        // exit();
    }
    // if (strlen($name) < 5) {
    //     $errors['nlength'] = "Name must be at least 5 characters";
    // }
    // if (strlen($password) < 8) {
    //     $errors['plength'] = "Password must be at least 8 characters";
    // }
    if ($password != $password2) {
        $errors['password'] = "Password do not match!";
    }
    $password_hash = md5($password);
    if (count($errors) == 0) {
        $qry = "INSERT INTO users(name, photo, email, password, gender, nrc_f_image, nrc_b_image, phone, address,role, created_date, updated_date) 
        VALUES ('$name','$photo','$email','$password_hash','$gender','$f_nrc_image','$b_nrc_image','$phone','$address','1',now(),now())";
        // echo ($qry);
        // exit();
        $result = mysqli_query($conn, $qry);
        if ($result) {
            header("location:login.php");
        } else {
            $errors['db_error'] = "Data insert error found!";
        }
    }
}
?>

<div class="register">
    <form action="register.php" method="POST" id="form1" enctype="multipart/form-data">
        <?php
        include("error.php");
        ?>
        <div>
            <input type="text" name="name" id="name" placeholder="Enter Your Name" required>
            <p></p><br>
        </div>
        <label>Enter Your photo</label><br>
        <input type="file" name="profile-image" accept="image/*">
        <div>
            <input type="email" name="email" id="email" placeholder="Enter Your Email" required>
            <p></p><br>
        </div>
        <div>
            <input type="password" name="password" id="password" placeholder="Enter Password" required>
            <p></p><br>
        </div>
        <div>
            <input type="password" name="password2" id="password2" placeholder="Retype Password" required>
            <p></p><br>
        </div>
        <h4>Select Gender</h4>
        <input type="radio" name="gender" value="male" required>Male<br>
        <input type="radio" name="gender" value="female" required>Female<br>
        <label>NRC Front Image</label><br>
        <input type="file" name="nrc-f-image" accept="image/*" required>
        <label>NRC Back Image</label><br>
        <input type="file" name="nrc-b-image" accept="image/*" required>
        <input type="text" name="phone" id="phone" placeholder="Enter Your Phone Number" required>
        <textarea name="address" id="address" cols="30" rows="10" placeholder="Enter Address" required></textarea>
        <input type="submit" name="submit" value="Register">
    </form>
</div>
<!-- <script src="js/register_validation.js"></script> -->
<script src="js/errorbtn.js"></script>
</body>

</html>