<?php
include("components/header2.php");
include("db.php");
$id = $_GET['id'];
// echo $id;
// exit();
$coursecat = "SELECT * FROM course_categories WHERE id='$id'";
$res = mysqli_query($conn, $coursecat);
if ($res) :
    while ($data = mysqli_fetch_assoc($res)) :
?>
        <div class="create-course-categories">
            <form action="updatecoursecategories.php" method="POST" id="form1" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                <div>
                    <input type="text" name="course-title" id="course-title" placeholder="Enter Your Course Category Name" value="<?php echo $data['name'] ?>">
                    <p></p><br>
                </div>
                <label>Categories Photo</label><br><br>
                <img src="image/<?php echo $data['course_image'] ?>" alt="" style="width: 100px; height:100px;">
                <input type="file" name="course-category-image" accept="image/*" value="image/<?php echo $data['course_image'] ?>">
                <textarea name="course-description" id="course-description" minlength="30" cols="30" rows="10" placeholder="Enter Course Description" required><?php echo $data['description'] ?></textarea>
                <input type="submit" name="submit" value="Update">

            </form>
        </div>

<?php
    endwhile;
endif;
?>
<script src="js/errorbtn.js"></script>

</body>

</html>