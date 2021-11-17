<?php
include("../db.php");
session_start();
$errors = [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>
    <?php
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 0 || $_SESSION['role'] == 2) {
            $user_id = $_SESSION['id'];
    ?>
            <div class="all">
                <div class="sidebar">
                    <div class="logo">
                        <h1>WebSchool</h1>
                        <h6>Learn From the Best</h6>
                    </div>
                    <div class="main">
                        <ul>
                            <li><button onclick="show()">Courses Category</button></li>
                            <li>
                                <button onclick="show4()">Courses</button>
                            </li>
                            <li><button onclick="show1()">Posts</button></li>
                            <?php
                            if ($_SESSION['role'] == 0) {
                            ?>
                                <li><button onclick="show2()">Teachers</button></li>
                                <li><button onclick="show3()">Members</button></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="content">
                    <div class="navi">
                        <div class="dashb">
                            <div><a href="../index.php">
                                    << </a><span>Dashboard</span></div>
                        </div>
                        <?php
                        if (isset($_SESSION['name'])) {
                        ?>
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn">
                                    <?php
                                    echo $_SESSION['name'];
                                    ?>
                                </button>
                                <div id="myDropdown" class="dropdown-content">
                                    <a href="../logout.php">Logout</a>
                                </div>
                            <?php
                        }
                            ?>

                            <!-- <div class="search">
                    <form action="" method="POST">
                        <input type="text" name="" value="" placeholder="Search Anything">
                        <input type="submit" name="submit" value="Search">
                    </form>
                </div> -->
                            </div>
                    </div>
                    <div id="admincontent">
                        <h1 style="margin: 30px;">Welcome From Admin Dashboard</h1>
                        <div class="firstpage">
                            <div class="cat-info">
                                <?php
                                $i = 0;
                                $ccinfoqry = "SELECT * FROM course_categories";
                                $ccinfores = mysqli_query($conn, $ccinfoqry);
                                while ($ccdata = mysqli_fetch_assoc($ccinfores)) {
                                    $i += 1;
                                    $ccdata++;
                                }
                                ?>
                                <h3>Course Categories</h3><br>
                                <p>
                                    <?php
                                    echo $i;
                                    ?>
                                </p>
                            </div>
                            <div class="course-info">
                                <?php
                                $i1 = 0;
                                $cinfoqry = "SELECT * FROM courses";
                                $cinfores = mysqli_query($conn, $cinfoqry);
                                while ($cdata = mysqli_fetch_assoc($cinfores)) {
                                    $i1 += 1;
                                    $cdata++;
                                }
                                ?>
                                <h3>Courses</h3><br>
                                <p>
                                    <?php
                                    echo $i1;
                                    ?>
                                </p>
                            </div>
                            <div class="post-info">
                                <?php
                                $i2 = 0;
                                $pinfoqry = "SELECT * FROM news";
                                $pinfores = mysqli_query($conn, $pinfoqry);
                                while ($pdata = mysqli_fetch_assoc($pinfores)) {
                                    $i2 += 1;
                                    $pdata++;
                                }
                                ?>
                                <h3>Posts</h3><br>
                                <p>
                                    <?php
                                    echo $i2;
                                    ?>
                                </p>
                            </div>
                            <div class="teacher-info">
                                <?php
                                $i3 = 0;
                                $tinfoqry = "SELECT * FROM users WHERE role= '2' AND status = '1'";
                                $tinfores = mysqli_query($conn, $tinfoqry);
                                while ($ttdata = mysqli_fetch_assoc($tinfores)) {
                                    $i3 += 1;
                                    $ttdata++;
                                }
                                ?>
                                <h3>Teachers</h3><br>
                                <p>
                                    <?php
                                    echo $i3;
                                    ?>
                                </p>
                            </div>
                            <div class="member-info">
                                <?php
                                $i4 = 0;
                                $minfoqry = "SELECT * FROM users WHERE role= '1' AND status = '1'";
                                $minfores = mysqli_query($conn, $minfoqry);
                                while ($mmdata = mysqli_fetch_assoc($minfores)) {
                                    $i4 += 1;
                                    $mmdata++;
                                }
                                ?>
                                <h3>Members</h3><br>
                                <p>
                                    <?php
                                    echo $i4;
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="secondpage">
                            <div class="pteacher-info">
                                <?php
                                $i3 = 0;
                                $tinfoqry = "SELECT * FROM users WHERE role= '2' AND status = '0'";
                                $tinfores = mysqli_query($conn, $tinfoqry);
                                while ($ttdata = mysqli_fetch_assoc($tinfores)) {
                                    $i3 += 1;
                                    $ttdata++;
                                }
                                ?>
                                <h3>Teachers Pending</h3><br>
                                <p>
                                    <?php
                                    echo $i3;
                                    ?>
                                </p>
                            </div>
                            <div class="pmember-info">
                                <?php
                                $i4 = 0;
                                $minfoqry = "SELECT * FROM users WHERE role= '1' AND status = '0'";
                                $minfores = mysqli_query($conn, $minfoqry);
                                while ($mmdata = mysqli_fetch_assoc($minfores)) {
                                    $i4 += 1;
                                    $mmdata++;
                                }
                                ?>
                                <h3>Members Pending</h3><br>
                                <p>
                                    <?php
                                    echo $i4;
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="coursecategories" class="course-category">
                        <?php
                        $course_category = "SELECT * FROM course_categories";
                        $res_category = mysqli_query($conn, $course_category);

                        if ($res_category) {
                            while ($data = mysqli_fetch_assoc($res_category)) :
                        ?>
                                <div class="card-group">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="../image/<?php
                                                                echo $data['course_image']
                                                                ?>" alt="course-category-image">
                                        </div>
                                        <div class="card-body">
                                            <h3><?php echo $data['name']; ?></h3>
                                            <p><?php
                                                $res = $data['description'];
                                                $res = substr($res, 0, 50) . " ...";
                                                echo $res;
                                                ?></p>
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
                                            <span><?php echo $ii ?> courses</span><br><br>
                                            <a href="../coursecategorydetail.php?id=<?php echo $data['id'] ?>">See More >></a>
                                        </div>
                                        <div class=" card-footer">
                                            <a href="../editcoursecategories.php?id=<?php echo $data['id'] ?>" class=" edit">Edit</a>
                                            <a href="../deletecoursecategories.php?id=<?php echo $data['id'] ?>" class="delete">Delete</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        } else {
                            echo (`<h1>No Course Categories<h1>`);
                        }
                        ?>
                        <div class="create">
                            <a href="../createcoursecategories.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                    </div>


                    <div id="courses" class="course">
                        <?php
                        $courseqry = "SELECT * FROM courses";
                        $res_course = mysqli_query($conn, $courseqry);
                        if ($res_course) :
                            while ($course_data = mysqli_fetch_assoc($res_course)) :
                                $tid = $course_data['teacher_id'];
                                $teacherQry = "SELECT * FROM users WHERE id = '$tid'";
                                $teacherres = mysqli_query($conn, $teacherQry);
                                $teacherdata = mysqli_fetch_assoc($teacherres);
                                $cid = $course_data['category_id'];
                                $cqry = "SELECT * FROM course_categories WHERE id = '$cid'";
                                // echo $cqry;
                                // exit();
                                $cres = mysqli_query($conn, $cqry);
                                $cdata = mysqli_fetch_assoc($cres);
                                // echo $cdata['name'];
                        ?>
                                <div class="card-group">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="../image/<?php
                                                                echo $course_data['course_photo']
                                                                ?>" alt="course-image">
                                        </div>
                                        <div class="card-body">
                                            <h3><?php
                                                echo $course_data['name'];
                                                ?></h3>(<?php echo $cdata['name'] ?>)
                                            <h4>Teacher => <?php
                                                            echo $teacherdata['name'];
                                                            ?></h4>
                                            <p><?php
                                                $tres = $course_data['description'];
                                                $tres = substr($tres, 0, 50) . " ...";
                                                echo $res;
                                                ?></p>
                                            <a href="../coursedetail.php?id=<?php echo $course_data['id'] ?>">See More >></a>

                                        </div>
                                        <div class="card-footer">
                                            <a href="../editcourse.php?id=<?php echo $course_data['id'] ?>" class="edit">Edit</a>
                                            <a href="../deletecourse.php?id=<?php echo $course_data['id'] ?>" class="delete">Delete</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                        <div class="create">
                            <a href="../createcourses.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div id="posts" class="post">
                        <?php
                        $postqry = "SELECT * FROM news";
                        $postres = mysqli_query($conn, $postqry);
                        while ($postdata = mysqli_fetch_assoc($postres)) :
                            $uid = $course_data['user_id'];
                            $uQry = "SELECT * FROM users WHERE id = '$uid'";
                            $ures = mysqli_query($conn, $uQry);
                            $udata = mysqli_fetch_assoc($ures);
                        ?>
                            <div class="card-group">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="../image/<?php echo $postdata['post_photo'] ?>" alt="post-image">
                                    </div>
                                    <div class="card-body">
                                        <h3><?php echo $postdata['name'] ?></h3>
                                        <p><?php
                                            $pdes = $postdata['description'];
                                            $pdes = substr($pdes, 0, 50) . "...";
                                            echo $pdes;
                                            ?></p>
                                        <a href="../postdetail.php?id=<?php echo $postdata['id'] ?>">See More >></a>
                                    </div>
                                    <div class="card-footer">
                                        <a href="../editpost.php?id=<?php echo $postdata['id'] ?>" class="edit">Edit</a>
                                        <a href="../deletepost.php?id=<?php echo $postdata['id'] ?>" class="delete">Delete</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        ?>
                        <div class="create">
                            <a href="../createposts.php?id=<?php echo $user_id ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div id="teachers" class="teacher">
                        <?php
                        $tqry = "SELECT * FROM users WHERE role='2'";
                        $tres = mysqli_query($conn, $tqry);
                        if ($tres) :
                            while ($tdata = mysqli_fetch_assoc($tres)) :
                        ?>
                                <div class="card-group">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="../photo/<?php
                                                                echo $tdata['photo'];
                                                                ?>" alt="teacher-image">
                                        </div>
                                        <div class="card-body">
                                            <h3><?php
                                                echo $tdata['name'];
                                                ?></h3>
                                            <span>(<?php echo $tdata['position'] ?>)</span>
                                            <p><?php
                                                echo $tdata['phone'];
                                                ?></p>
                                            <p><?php
                                                $address = $tdata['address'];
                                                $address = substr($address, 0, 50) . " ...";
                                                echo $address;
                                                ?></p>
                                        </div>
                                        <div class="card-footer">
                                            <?php
                                            if ($tdata['status'] == 0) {
                                            ?>
                                                <a href="../approve.php?id=<?php echo $tdata['id'] ?>" class="approve">Approve</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="../ban.php?id=<?php echo $tdata['id'] ?>" class="ban">Ban</a>

                                            <?php
                                            }
                                            ?>
                                            <a href="../teacherdetail.php?id=<?php echo $tdata['id'] ?>" class="view">View</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <div id="members" class="member">
                        <?php
                        $mqry = "SELECT * FROM users WHERE role='1'";
                        $mres = mysqli_query($conn, $mqry);
                        if ($mres) :
                            while ($mdata = mysqli_fetch_assoc($mres)) :
                        ?>
                                <div class="card-group">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="../image/<?php
                                                                echo $mdata['photo']
                                                                ?>" alt="course-image">
                                        </div>
                                        <div class="card-body">
                                            <h3><?php
                                                echo $mdata['name'];
                                                ?></h3>
                                            <p><?php
                                                echo $mdata['phone'];
                                                ?></p>
                                            <p><?php
                                                $address = $mdata['address'];
                                                $address = substr($address, 0, 50) . " ...";
                                                echo $address;
                                                ?></p>
                                        </div>
                                        <div class="card-footer">
                                            <?php
                                            if ($mdata['status'] == 0) {
                                            ?>
                                                <a href="../approve.php?id=<?php echo $mdata['id'] ?>" class="approve">Approve</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="../ban.php?id=<?php echo $mdata['id'] ?>" class="ban">Ban</a>

                                            <?php
                                            }
                                            ?>
                                            <a href="../memberdetail.php?id=<?php echo $mdata['id'] ?>" class="view">View</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
        <?php
        } else {
            header("location:../index.php");
        }
    } else {
        header("location:../index.php");
    }
        ?>
</body>
<script>
    function show() {
        admincontent.style.display = "none";
        coursecategories.style.display = "block";
        courses.style.display = "none";
        posts.style.display = "none";
        teachers.style.display = "none";
        members.style.display = "none";
    }

    function show4() {
        admincontent.style.display = "none";
        coursecategories.style.display = "none";
        posts.style.display = "none";
        teachers.style.display = "none";
        members.style.display = "none";
        courses.style.display = "block";
    }

    function show1() {
        admincontent.style.display = "none";
        posts.style.display = "block";
        coursecategories.style.display = "none";
        teachers.style.display = "none";
        members.style.display = "none";
        courses.style.display = "none";
    }

    function show2() {
        admincontent.style.display = "none";
        teachers.style.display = "block";
        coursecategories.style.display = "none";
        posts.style.display = "none";
        members.style.display = "none";
        courses.style.display = "none";
    }

    function show3() {
        admincontent.style.display = "none";
        members.style.display = "block";
        coursecategories.style.display = "none";
        posts.style.display = "none";
        teachers.style.display = "none";
        courses.style.display = "none";
    }

    /*toggle between hiding and showing the dropdown content */

    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

</html>