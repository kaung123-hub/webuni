<?php
include("db.php");
$errors = [];
if (isset($_POST['submit'])) {
    $temail = mysqli_real_escape_string($conn, $_POST['email']);
    $tposition = mysqli_real_escape_string($conn, $_POST['position']);
    // echo $temail;
    // echo $tposition;
    // exit();
    $techeck = "SELECT * FROM users WHERE email = '$temail'";
    // echo $echeck;
    // exit();
    $tres_echeck = mysqli_query($conn, $techeck);
    $tdata = mysqli_fetch_assoc($tres_echeck);
    // echo $tdata['name'];
    // exit();
    if ($tdata) {
        if (count($errors) == 0) {
            $tqry = "UPDATE users SET position = '$tposition' WHERE email = '$temail'";
            // echo $qry;
            // exit();
            $tres = mysqli_query($conn, $tqry);
            if ($tres) {
                // echo "success";
                // exit();
                header("location:index.php");
            } else {
                $errors['database_error'] = "Data Insert error Found";
            }
        }
    } else {
        $errors['register'] = "Email not found.Please register first to sign up!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/error.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <header>
        <div class="container">
            <?php
            include("components/nav.php");
            ?>
            <div class="h-box">
                <div class="text">
                    <h1>Get The Best Free Online Courses</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde modi voluptas eveniet placeat eaque
                        rerum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="signup">
                    <form action="" method="POST">
                        <input type="text" name="name" placeholder="Name">
                        <input type="email" name="email" placeholder="Email">
                        <input type="submit" name="submit" value="Sign Up Now">
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="course-categories">
        <div class="course-text">
            <h1>Our Course Categories</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium dicta tempore natus eaque culpa
                officia sequi<br> sapiente earum ex asperiores veniam veritatis, illum velit, error ad, et vitae?
                Veritatis, provident?</p>
        </div>
    </div>
    <?php
    $qry = "SELECT * FROM course_categories LIMIT 9";
    $res = mysqli_query($conn, $qry);
    if ($res) :
        while ($data = mysqli_fetch_assoc($res)) :
    ?>
    <div class="card-group">
        <div class="card">
            <div class="card-header">
                <img src="./image/<?php
                                            echo $data['course_image'];
                                            ?>" alt="course-category-image">
            </div>
            <div class="card-body">
                <h3><?php
                            echo $data['name'];
                            ?></h3>
                <p><?php
                            $des = $data['description'];
                            $des = substr($des, 0, 50) . " ...";
                            echo $des;
                            ?></p>
                <a href="coursecategorydetail.php?id=<?php echo $data['id'] ?>">See More >></a>
            </div>
            <div class="card-footer">
                <?php
                        $ii = 0;
                        $ccid = $data['id'];
                        $ccqry = "SELECT * FROM courses WHERE category_id ='$ccid'";
                        // echo $ccqry;
                        $ccres = mysqli_query($conn, $ccqry);
                        while ($ccresult = mysqli_fetch_assoc($ccres)) :
                            $ii += 1;
                            $ccresult++;
                        endwhile;
                        ?>
                <i><?php
                            echo $ii;
                            ?></i> Courses
            </div>
        </div>
    </div>
    <?php
        endwhile;
    endif;
    ?>

    <div class=" search">
        <h1>Search your course</h1>
        <form action="" method="POST">
            <input type="text" name="course" placeholder="Course">
            <input type="text" name="category" placeholder="Category">
            <input type="submit" name="submit" value="Search Course">
        </form>
    </div>

    <div class="feature-course">
        <div class="feature-title">
            <h1>Featured Courses</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta saepe dicta numquam perferendis
                sint
                labore
                exercitationem quod distinctio corrupti cum?<br>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            </p>
            <ul>
                <li><button onclick="show()">ALL</button></li>
                <?php
                $ccategory = "SELECT * FROM course_categories";
                $ccategoryres = mysqli_query($conn, $ccategory);
                while ($ccategorydata = mysqli_fetch_assoc($ccategoryres)) :
                ?>
                <?php
                    $arr = [];
                    array_push($arr, $ccategorydata['name']);
                    ?>
                <li><button onclick="show1(<?php echo $arr ?>)"><?php echo $ccategorydata['name'] ?></button></li>
                <?php
                endwhile;
                ?>
            </ul>
        </div>
    </div>

    <div class=" feature-box" id="allcourses">
        <?php
        $allcourse = "SELECT * FROM courses LIMIT 12";
        $allcourseres = mysqli_query($conn, $allcourse);
        while ($allcoursedata = mysqli_fetch_assoc($allcourseres)) :
        ?>
        <div class="feature-card">
            <div class="feature-card-header">
                <div class="feature-img">
                    <img src="./photo/<?php echo $allcoursedata['course_photo'] ?>" alt="feature-image">
                </div>
                <!-- <div class="feature-img-label">
                    <h4>Price: $<i>5</i></h4>
                </div> -->
            </div>
            <div class="feature-card-body">
                <h3><?php echo $allcoursedata['name'] ?></h3>
                <p class="first"><?php
                                        $ttdes = $allcoursedata['description'];
                                        $ttdes = substr($ttdes, 0, 50) . "...";
                                        echo $ttdes;
                                        ?></p>
                <a href="coursedetail.php?id=<?php echo $allcoursedata['id'] ?>">See More >></a>
                <!-- <p><i>120</i> Students</p> -->
            </div>
            <hr>
            <div class="feature-card-footer">
                <?php
                    $ttid = $allcoursedata['teacher_id'];
                    $ttqry = "SELECT * FROM users WHERE id = '$ttid'";
                    $ttres = mysqli_query($conn, $ttqry);
                    $ttdata = mysqli_fetch_assoc($ttres);
                    ?>
                <div class="footer-img">
                    <img src="./photo/<?php echo $ttdata['photo'] ?>" alt="footer-img">
                </div>
                <h5><?php echo $ttdata['name'] ?>, <span><?php echo $ttdata['position'] ?></span>
                </h5>
            </div>
        </div>
        <?php
        endwhile;
        ?>
    </div>
    <?php
    $coursecategory = "SELECT * FROM course_categories";
    $coursecategoryres = mysqli_query($conn, $coursecategory);
    while ($coursecategorydata = mysqli_fetch_assoc($coursecategoryres)) :
    ?>
    <div class="feature-box" id="<?php echo $coursecategorydata['name'] ?>">
        <?php
            $coursecategoryid = $coursecategorydata['id'];
            $courseqry = "SELECT * FROM courses WHERE category_id = '$coursecategoryid'";
            $courseres = mysqli_query($conn, $courseqry);
            while ($coursedata = mysqli_fetch_assoc($courseres)) :
            ?>
        <div class="feature-card">
            <div class="feature-card-header">
                <div class="feature-img">
                    <img src="./photo/<?php echo $coursedata['course_photo'] ?>" alt="feature-image">
                </div>
                <!-- <div class="feature-img-label">
                    <h4>Price: $<i>5</i></h4>
                </div> -->
            </div>
            <div class="feature-card-body">
                <h3><?php echo $coursedata['name'] ?></h3>
                <p class="first"><?php
                                            $ttdes = $coursedata['description'];
                                            $ttdes = substr($ttdes, 0, 50) . "...";
                                            echo $ttdes;
                                            ?></p>
                <a href="coursedetail.php?id=<?php echo $coursedata['id'] ?>">See More >></a>
                <!-- <p><i>120</i> Students</p> -->
            </div>
            <hr>
            <div class="feature-card-footer">
                <?php
                        $ttid = $coursedata['teacher_id'];
                        $ttqry = "SELECT * FROM users WHERE id = '$ttid'";
                        $ttres = mysqli_query($conn, $ttqry);
                        $ttdata = mysqli_fetch_assoc($ttres);
                        ?>
                <div class="footer-img">
                    <img src="./photo/<?php echo $ttdata['photo'] ?>" alt="footer-img">
                </div>
                <h5><?php echo $ttdata['name'] ?>, <span><?php echo $ttdata['position'] ?></span>
                </h5>
            </div>
        </div>
        <?php
            endwhile;
            ?>
    </div>
    <?php
    endwhile;
    ?>

    <div class="teacher-signup">
        <div class="signup-box">
            <div class="teacher-signup-box">
                <div class="teacher-text">
                    <h1>Sign up to become a teacher</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum officia consectetur
                        distinctio
                        nihil molestiae fugit deleniti! Atque impedit corporis magni! Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Laudantium, provident?</p>
                </div>
                <div class="teacher-form">
                    <?php
                    include("error.php");
                    ?>
                    <form action="index.php" method="POST">
                        <input type="email" name="email" placeholder="Your E-mail" required><br>
                        <input type="text" name="position" placeholder="Your Position" required>
                        <input type="submit" name="submit" value="Sign Up">
                    </form>
                </div>
            </div>
        </div>
        <div class="teacher-imgbox">
            <img src="./image/mountain2.png" alt="teacher-image">
        </div>
    </div>

    <?php
    include("components/footer.php")
    ?>
    <script src="js/errorbtn.js"></script>

</body>

</html>