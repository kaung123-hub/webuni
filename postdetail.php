<?php
include("db.php");
include("components/header2.php");
$uid = $_SESSION['id'];
$id = $_GET['id'];
// echo $id;
// exit();
$qry = "SELECT * FROM news WHERE id ='$id'";
$res = mysqli_query($conn, $qry);
$data = mysqli_fetch_assoc($res);
?>
<div class="content">
    <div class="ad"></div>
    <div class="blog-label">
        <div class="blog">
            <div class="post">
                <div class="post-header">
                    <img src="image/beach hut.png" alt="post-image">
                </div>
                <div class="post-body">
                    <h2><?php
                        echo $data['name']
                        ?></h2>
                    <div class="post-label">
                        <div class="profile-img">
                            <img src="image/<?php echo $data['post_photo'] ?>" alt="profile image">
                        </div>
                        <div class="profile-label">
                            <?php
                            $uuid = $data['user_id'];
                            $uqry = "SELECT * FROM users WHERE id = '$uuid'";
                            $ures = mysqli_query($conn, $uqry);
                            $udata = mysqli_fetch_assoc($ures);
                            ?>
                            <p><?php echo $udata['name'] ?> | <?php echo $udata['position'] ?> | June 12,2018 </p>
                        </div>
                    </div>
                    <p class="post-paragraph"><?php echo $data['description'] ?></p>
                </div>
                <div class="post-footer">
                    <a href="blog.php">Back >></a>
                </div>
                <form action="comment-action.php" method="POST">
                    <input type="hidden" name="postid" value="<?php echo $id ?>">
                    <input type="hidden" name="userid" value="<?php echo $uid ?>">
                    <input type="text" name="comment" placeholder="Enter comment" required>
                    <input type="submit" value="Ment">
                </form>
                <div class="comment">
                    <?php
                    $cqry = "SELECT * FROM comments WHERE post_id = '$id' ORDER BY id DESC LIMIT 20";
                    $cres = mysqli_query($conn, $cqry);
                    while ($cdata = mysqli_fetch_assoc($cres)) :
                        $cid = $cdata['id'];
                        $userid = $cdata['user_id'];
                        $userqry = "SELECT * FROM users WHERE id = '$userid'";
                        $userres = mysqli_query($conn, $userqry);
                        $userdata = mysqli_fetch_assoc($userres);
                    ?>
                    <div class="contain">
                        <div class="user">
                            <img src="photo/<?php echo $userdata['photo'] ?>" alt="user image">
                        </div>
                        <div class="ccontent">
                            <label for="name"><?php echo $userdata['name'] ?></label>
                            <p><?php
                                    echo $cdata['content']
                                    ?></p>
                        </div>
                    </div>
                    <div class="clink">
                        <a
                            href="commentreply.php?id=<?php echo $cdata['id'] ?>&userid=<?php echo $uid ?>&pid=<?php echo $id ?>">Reply</a>
                        <?php
                            if ($uid == $cdata['user_id']) :
                            ?>
                        <a href="commentedit.php?id=<?php echo $cdata['id'] ?>&pid=<?php echo $id ?>">Edit</a>
                        <a
                            href="commentdelete.php?id=<?php echo $cdata['id'] ?>&pid=<?php echo $id ?>">Delete</a><br><br>
                        <?php
                            endif;
                            $rqry = "SELECT * FROM replys WHERE comment_id = '$cid' ORDER BY id DESC LIMIT 5";
                            $rres = mysqli_query($conn, $rqry);
                            while ($rdata = mysqli_fetch_assoc($rres)) :
                                $uuid = $rdata['user_id'];
                                $uuqry = "SELECT * FROM users WHERE id = '$uuid'";
                                $uures = mysqli_query($conn, $uuqry);
                                $uudata = mysqli_fetch_assoc($uures);
                            ?>
                        <div class="contain">
                            <div class="user">
                                <img src="photo/<?php echo $uudata['photo'] ?>" alt="user image">
                            </div>
                            <div class="ccontent">
                                <label for="name"><?php echo $uudata['name'] ?></label>
                                <p><?php
                                            echo $rdata['content']
                                            ?></p>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            ?>
                    </div>
                    <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script>
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