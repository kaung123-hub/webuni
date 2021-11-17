<?php
session_start();
session_destroy();
// echo "success";
// exit();
header("location:index.php");