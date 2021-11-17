<?php
include("db.php");
$id = $_GET['id'];
$qry = "DELETE FROM course_categories WHERE id = '$id'";
$cqry = "DELETE FROM courses WHERE category_id ='$id'";
// echo $cqry;
// exit();
mysqli_query($conn, $qry);
mysqli_query($conn, $cqry);
header("location:admin/admin.php");