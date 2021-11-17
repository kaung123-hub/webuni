<?php
include("components/header2.php");
include("db.php");
$id = $_GET['id'];
$qry = "SELECT * FROM courses WHERE id = '$id'";
// echo $id;
// exit();
$res = mysqli_query($conn, $qry);
$data = mysqli_fetch_assoc($res);
$ccid = $data['category_id'];
$ccqry = "SELECT * FROM course_categories WHERE id = '$ccid'";
$ccres = mysqli_query($conn, $ccqry);
$ccdata = mysqli_fetch_assoc($ccres);
$tid = $data['teacher_id'];
// echo $tid;
// exit();
$tqry = "SELECT * FROM users WHERE id = '$tid'";
$tres = mysqli_query($conn, $tqry);
$tdata = mysqli_fetch_assoc($tres);
?>
<div class="course-detail">
    <form>
        <img src="image/<?php
                        echo $data['course_photo']
                        ?>" alt="" style="width: 100%; height:300px;">
        <h1 style="margin-top:50px;"><?php
                                        echo $data['name'];
                                        ?></h1>
        <span>(<?php
                echo $ccdata['name'];
                ?>)</span>
        <p style="margin-top:30px;"><?php
                                    echo $data['description'];
                                    ?></p>
        <div class="teacher">
            <div class="t-image">
                <img src="photo/<?php echo $tdata['photo'] ?>" alt="teacher-image">
            </div>
            <p><?php echo $tdata['name'] ?> , <span><?php echo $tdata['position'] ?></span></p>
        </div>
        <a href="admin/admin.php">Back >></a>
    </form>
</div>

</body>

</html>