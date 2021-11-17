<?php
include("db.php");
$updateid = $_POST['id'];
$updatecatname = mysqli_real_escape_string($conn, $_POST['course-title']);
$updatecatphoto = $_FILES['course-category-image']['name'];
$tmp = $_FILES['course-category-image']['tmp_name'];
// move_uploaded_file($tmp,"image/$updatecatphoto");
$updatedescription = mysqli_real_escape_string($conn, $_POST['course-description']);
// echo $updateid;
// echo $updatecatname;
// echo $updatecatphoto;
// echo $tmp;
// echo $updatedescription;
// exit();
if ($updatecatphoto) {
    move_uploaded_file($tmp, "image/$updatecatphoto");
    $qry = "UPDATE course_categories SET name='$updatecatname',course_image='$updatecatphoto',description='$updatedescription' updated_date = now() WHERE id='$updateid'";
} else {
    $qry = "UPDATE course_categories SET name='$updatecatname',description='$updatedescription' updated_date = now() WHERE id='$updateid'";
}
// echo $qry;
// exit();
mysqli_query($conn, $qry);
header("location:admin/admin.php");
