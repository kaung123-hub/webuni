<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <?php
    include("components/header.php");
    include("db.php");
    $qry = "SELECT * FROM news";
    $res = mysqli_query($conn, $qry);
    ?>

    <div class="content">
        <div class="ad"></div>
        <div class="blog-label">
            <div class="blog">
                <?php
                while ($data = mysqli_fetch_assoc($res)) :
                ?>
                <div class="post">
                    <div class="post-header">
                        <img src="image/<?php echo $data['post_photo'] ?>" alt="post-image">
                    </div>
                    <div class="post-body">
                        <h2><?php echo $data['name'] ?></h2>
                        <div class="post-label">
                            <div class="profile-img">
                                <img src="image/nice view.png" alt="profile image">
                            </div>
                            <?php
                                $uid = $data['user_id'];
                                $uqry = "SELECT * FROM users WHERE id='$uid'";
                                $ures = mysqli_query($conn, $uqry);
                                $udata = mysqli_fetch_assoc($ures);
                                ?>
                            <div class="profile-label">
                                <p><?php echo $udata['name'] ?> | <?php echo $udata['position'] ?> | June 12,2018 |
                                    2comments</p>
                            </div>
                        </div>
                        <p class="post-paragraph"><?php echo $data['description'] ?></p>
                    </div>
                    <div class="post-footer">
                        <a href="postdetail.php?id=<?php echo $data['id'] ?>">Read More</a>
                    </div>
                </div>
                <?php
                endwhile;
                ?>
            </div>
            <div class="label">
                <form action="" method="POST">
                    <input type="text" name="search" placeholder="Search Anything">
                    <input type="submit" name="submit" value="search">
                </form>

                <div class="categories">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="">Development</a></li>
                        <li><a href="">Social Media</a></li>
                        <li><a href="">Press</a></li>
                        <li><a href="">Event & Lifestyle</a></li>
                        <li><a href="">Uncategorizes</a></li>
                    </ul>
                </div>
                <div class="archive">
                    <h3>Archieves</h3>
                    <ul>
                        <li><a href="">February 2018</a></li>
                        <li><a href="">March 2018</a></li>
                        <li><a href="">April 2018</a></li>
                        <li><a href="">May 2018</a></li>
                        <li><a href="">June 2018</a></li>
                    </ul>
                </div>
                <div class="archives">
                    <h3>Archieves</h3>
                    <div class="archives-text">
                        <p>education</p>
                        <p>courses</p>
                        <p>development</p>
                        <p>design</p>
                        <p>online courses</p>
                        <p>wp</p>
                        <p>html5</p>
                        <p>music</p>
                    </div>
                </div>
                <div class="ad-box">
                    <img src="image/mountain2.png" alt="ad image">
                </div>
            </div>
        </div>
    </div>
    <?php
    include("components/footer.php");
    ?>
</body>

</html>