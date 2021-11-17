<?php
include("db.php");
$id = $_GET['id'];
$qry = "DELETE FROM news WHERE id = '$id'";
// echo $qry;
// exit();
mysqli_query($conn, $qry);
header("location:admin/admin.php");