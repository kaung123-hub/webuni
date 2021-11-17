<?php
include("db.php");
$id = $_POST['id'];
$name = mysqli_real_escape_string($conn, $_POST['course-title']);
$catid = mysqli_real_escape_string($conn, $_POST['category_id']);
$coursephoto = mysqli_real_escape_string($conn, $_FILES['course-image']['name']);
$tmp = $_FILES['course-image']['tmp_name'];
$description = mysqli_real_escape_string($conn, $_POST['course-description']);
$tid = mysqli_real_escape_string($conn, $_POST['teacher-id']);
// echo $id, "<br>";
// echo $name, "<br>";
// echo $catid, "<br>";
// echo $coursephoto, "<br>";
// echo $tmp, "<br>";
// echo $description, "<br>";
// echo $tid, "<br>";

if ($coursephoto) {
    move_uploaded_file($tmp, "photo/$coursephoto");
    $qry = "UPDATE courses SET name='$name',category_id='$catid',description='$description',course_photo='$coursephoto',teacher_id = '$tid',updated_date=now() WHERE id ='$id'";
    // echo $qry;
    // exit();
} else {
    $qry = "UPDATE courses SET name='$name',category_id='$catid',description='$description',teacher_id = '$tid',updated_date=now() WHERE id ='$id'";
    // echo $qry;
    // exit();
}
mysqli_query($conn, $qry);
header("location:admin/admin.php");