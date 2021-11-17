<?php
include("db.php");
$id = $_GET['id'];
$pid = $_GET['pid'];
$qry = "DELETE FROM comments WHERE id='$id'";
mysqli_query($conn, $qry);
header("location:postdetail.php?id=$pid");