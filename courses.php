<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="./css/course.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/nav.css">
</head>

<body>
    <?php
    include("components/header.php");
    include("db.php");
    ?>

    <div class="content">
        <div class="course-link">
            <?php
            $ccqry = "SELECT * FROM course_categories";
            $ccres = mysqli_query($conn, $ccqry);
            ?>
            <ul>
                <li><a href="">All</a></li>
                <?php
                while ($ccdata = mysqli_fetch_assoc($ccres)) :
                ?>
                <li><a href=""><?php echo $ccdata['name'] ?></a></li>
                <?php
                endwhile;
                ?>
            </ul>
        </div>

        <div class="course-card">
            <?php
            $cqry = "SELECT * FROM courses";
            $cres = mysqli_query($conn, $cqry);
            while ($cdata = mysqli_fetch_assoc($cres)) :
            ?>
            <div class="card">
                <div class="card-header">
                    <div class="img-box">
                        <img src="./photo/<?php echo $cdata['course_photo'] ?>" alt="course image">
                    </div>
                    <!-- <div class="price">
                        <p>Price: $15</p>
                    </div> -->
                </div>
                <div class="card-body">
                    <h3><?php echo $cdata['name'] ?></h3>
                    <p><?php echo $cdata['description'] ?></p>
                    <!-- <p class="last">120 Students</p> -->
                    <p><a href="coursedetail.php?id=<?php echo $cdata['id'] ?>">See More >></a></p>
                </div>
                <hr>
                <div class="card-footer">
                    <?php
                        $tid = $cdata['teacher_id'];
                        $tqry = "SELECT * FROM users WHERE id = '$tid'";
                        $tres = mysqli_query($conn, $tqry);
                        $tdata = mysqli_fetch_assoc($tres);
                        ?>
                    <div class="footer-box">
                        <div class="image-box">
                            <img src="photo/<?php echo $tdata['photo'] ?>" alt="Teacher Image">
                        </div>
                        <div class="label">
                            <p><?php echo $tdata['name'] ?>, <span><?php echo $tdata['position'] ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            endwhile;
            ?>
        </div>

        <!-- <div class="detail">
            <div class="detail-img-box">
                <img src="./image/mountain.png" alt="Detail Image">
            </div>
            <div class="detail-content-box">
                <div class="detail-content">
                    <p class="detail-title">Featured Course</p>
                    <h2>HTML5 & CSS For Beginners</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi sed dolorem dolores hic quaerat,
                        repellat placeat delectus. Excepturi ab possimus voluptas quas, earum blanditiis sapiente unde
                        ducimus dolore quaerat quod, placeat harum ipsa? Architecto, accusantium.</p>
                    <span>120 Students</span>
                    <div class="detail-footer">
                        <div class="detail-footer-box">
                            <div class="detail-image-box">
                                <img src="./image/beach hut.png" alt="Teacher Image">
                            </div>
                            <div class="detail-label">
                                <p>William Parker,
                                    <span>Developer</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail">
            <div class="detail-content-box">
                <div class="detail-content">
                    <p class="detail-title">Featured Course</p>
                    <h2>HTML5 & CSS For Beginners</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi sed dolorem dolores hic quaerat,
                        repellat placeat delectus. Excepturi ab possimus voluptas quas, earum blanditiis sapiente unde
                        ducimus dolore quaerat quod, placeat harum ipsa? Architecto, accusantium.</p>
                    <span>120 Students</span>
                    <div class="detail-footer">
                        <div class="detail-footer-box">
                            <div class="detail-image-box">
                                <img src="./image/beach hut.png" alt="Teacher Image">
                            </div>
                            <div class="detail-label">
                                <p>William Parker,
                                    <span>Developer</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-img-box">
                <img src="./image/mountain.png" alt="Detail Image">
            </div>
        </div> -->

    </div>
    <?php
    include("components/footer.php");
    ?>
</body>

</html>