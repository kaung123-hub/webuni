<?php
include("db.php");
$id = $_GET['id'];
// echo $id;
// exit();
$qry = "UPDATE users SET status='0' WHERE id = $id";
mysqli_query($conn, $qry);
header("location:admin/admin.php");