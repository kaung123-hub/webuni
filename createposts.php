<?php
include("components/header2.php");
include("db.php");
$errors = [];
if (isset($_GET['id'])) :
    $uid = $_GET['id'];
endif;
// echo $user_id;
// exit();
if (isset($_POST['submit'])) {
    // echo ("success");
    // exit();
    $postName = mysqli_real_escape_string($conn, $_POST['post-title']);
    $postName = strtoupper($postName);
    $id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $photo = mysqli_real_escape_string($conn, $_FILES['post-image']['name']);
    $tmp_photo = $_FILES['post-image']['tmp_name'];
    if ($photo) {
        move_uploaded_file($tmp_photo, "image/$photo");
    }
    $text = mysqli_real_escape_string($conn, $_POST['post-description']);
    // echo $postName;
    // echo $photo;
    // echo $text;
    // exit();
    // $postName_check = "SELECT * FROM course_categories WHERE name = '$postName'";
    // $res = mysqli_query($conn, $postName_check);
    // if (mysqli_num_rows($res) > 0) {
    //     $errors['post_name'] = "Posts Name is already exist!";
    // }
    if (count($errors) == 0) {
        echo $id;
        $qry = "INSERT INTO news(name,post_photo,description,user_id,created_date,updated_date) 
        VALUES ('$postName','$photo','$text','$id',now(),now())";
        // echo $qry;
        // exit();
        $result = mysqli_query($conn, $qry);
        if ($result) {
            header("location:admin/admin.php");
        } else {
            $errors['db_error'] = "Data insert error found!";
        }
    }
}
?>
<div class="create-course-categories">
    <form action="createposts.php" method="POST" id="form1" enctype="multipart/form-data">
        <?php
        include("error.php");
        ?>
        <input type="hidden" name="user_id" value="<?php echo $uid ?>">
        <div>
            <input type="text" name="post-title" id="course-title" placeholder="Enter Post Title" required>
            <p></p><br>
        </div>
        <label>Enter Post photo</label><br>
        <input type="file" name="post-image" accept="image/*" required>
        <textarea name="post-description" id="course-description" minlength="30" cols="30" rows="10" placeholder="Enter Post Description" required></textarea>
        <input type="submit" name="submit" value="Create">

    </form>
</div>
<script>
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
<script src="js/errorbtn.js"></script>

</body>

</html>