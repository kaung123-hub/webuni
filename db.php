<?php
define("db_host", "localhost");
define("db_user", "root");
define("db_pass", "");
define("db_name", "webuni");
$conn = mysqli_connect(db_host, db_user, db_pass, db_name);
if (!$conn) {
    echo "Database not found!" . mysqli_connect_error();
}