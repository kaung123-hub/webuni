<?php
include("components/header2.php");
include("db.php");
$id = $_GET['id'];
$qry = "SELECT * FROM course_categories WHERE id = '$id'";
$cqry = "SELECT * FROM courses WHERE category_id = '$id'";
$res = mysqli_query($conn, $qry);
$cres = mysqli_query($conn, $cqry);
$data = mysqli_fetch_assoc($res);
?>
<div class="course-categories-detail">
    <form>
        <img src="image/<?php
                            echo $data['course_image']
                            ?>" alt="">
        <h1><?php
                echo $data['name'];
                ?></h1>
        <p><?php
                echo $data['description'];
                ?></p>
        <h3>Courses</h3>

        <div class="cname">
            <?php
                while ($cdata = mysqli_fetch_assoc($cres)) :
                    $tid = $cdata['teacher_id'];
                    // echo $tid;
                    $tqry = "SELECT * FROM users WHERE id = '$tid'";
                    $tres = mysqli_query($conn, $tqry);
                    $tdata = mysqli_fetch_assoc($tres);
                ?>
            <div class="border">
                <p><?php echo $cdata['name'] ?> (<?php echo $tdata['name'] ?>)</p>
                <a href="coursedetail.php?id=<?php echo $cdata['id'] ?>">See Detail>></a>
            </div>
            <?php
                endwhile;
                ?>
        </div>
        <a href="admin/admin.php">Back >></a>

    </form>
</div>

</body>

</html>