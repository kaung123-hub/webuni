<?php
include("db.php");
$id = $_POST['id'];
$name = mysqli_real_escape_string($conn, $_POST['post-title']);
$photo = mysqli_real_escape_string($conn, $_FILES['post-image']['name']);
$tmp = $_FILES['post-image']['tmp_name'];
$description = mysqli_real_escape_string($conn, $_POST['post-description']);
// echo $id;
// echo $name . "<br>";
// echo $photo . "<br>";
// echo $tmp . "<br>";
// echo $description . "<br>";
// exit();
if ($photo) {
    move_uploaded_file($tmp, "image/$photo");
    $qry = "UPDATE news SET name='$name', post_photo='$photo', description='$description', updated_date=now() WHERE id='$id'";
} else {
    $qry = "UPDATE news SET name='$name', description='$description', updated_date=now() WHERE id='$id'";
    // echo $qry;
    // exit();
}
mysqli_query($conn, $qry);
header("location:admin/admin.php");