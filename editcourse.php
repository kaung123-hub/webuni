<?php
include("components/header2.php");
include("db.php");
$errors = [];
$id = $_GET['id'];
$qry = "SELECT * FROM courses WHERE id = '$id'";
$res = mysqli_query($conn, $qry);
$data = mysqli_fetch_assoc($res)
?>
<div class="create-course">
    <form action="updatecourse.php" method="POST" id="form1" enctype="multipart/form-data">
        <?php
        include("error.php");
        ?>
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        <div>
            <input type="text" name="course-title" id="course-title" placeholder="Enter Course Name"
                value="<?php echo $data['name'] ?>">
            <p></p><br>
        </div>
        <select name="category_id" id="" class="form-control mb-3" required>
            <option value="0">Choose Course Category</option>
            <?php
            $cats = mysqli_query($conn, "SELECT id,name FROM course_categories");

            while ($cat_data = mysqli_fetch_assoc($cats)) :
            ?>
            <option value="<?php echo $cat_data['id']; ?>"
                <?php if ($cat_data['id'] == $data['category_id']) echo "selected" ?>>

                <?php echo $cat_data['name']; ?>
            </option>
            <?php
            endwhile
            ?>
        </select>
        <label>Course photo</label><br><br>
        <img src="photo/<?php echo $data['course_photo'] ?>" style="width: 100px; height: 100px;" alt="">
        <input type="file" name="course-image" accept="image/*">
        <textarea name="course-description" id="course-description" minlength="30" cols="30" rows="10"
            placeholder="Enter Course Description"><?php
                                                                                                                                echo $data['description'];
                                                                                                                                ?></textarea>
        <select name="teacher-id" id="" class="form-control mb-3" required>
            <option value="0">Choose Teacher</option>
            <?php
            $teachers = mysqli_query($conn, "SELECT id,name FROM users WHERE role = '2'");

            while ($teacher_data = mysqli_fetch_assoc($teachers)) :
            ?>
            <option value="<?php echo $teacher_data['id']; ?>" <?php
                                                                    if ($teacher_data['id'] == $data['teacher_id']) echo "selected"
                                                                    ?>>
                <?php echo $teacher_data['name']; ?>
            </option>
            <?php
            endwhile
            ?>
        </select>
        <input type="submit" name="submit" value="Update">

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