<?php
include("db.php");
$id = $_POST['postid'];
$uid = $_POST['userid'];
// echo $id;
// echo $uid;
// exit();
$comment = mysqli_real_escape_string($conn, $_POST['comment']);
$qry = "INSERT INTO comments(content,post_id,user_id,created_date,updated_date) VALUES ('$comment','$id','$uid',now(),now())";
mysqli_query($conn, $qry);
header("location:postdetail.php?id=$id");