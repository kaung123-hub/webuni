<?php
include("db.php");
$id = $_GET['id'];
// echo $id;
// exit();
$qry = "DELETE FROM courses WHERE id ='$id'";
mysqli_query($conn, $qry);
header("location:admin/admin.php");