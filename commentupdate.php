<?php
include("db.php");
$id = $_POST['id'];
$pid = $_POST['pid'];
$text = $_POST['reply'];
$qry = "UPDATE comments SET content = '$text' WHERE id = '$id'";
mysqli_query($conn, $qry);
header("location:postdetail.php?id=$pid");