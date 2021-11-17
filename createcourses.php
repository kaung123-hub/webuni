<?php
include("components/header2.php");
include("db.php");
$errors = [];
if (isset($_POST['submit'])) {
    $courseName = mysqli_real_escape_string($conn, $_POST['course-title']);
    $courseName = strtoupper($courseName);
    $courseCategory = mysqli_real_escape_string($conn, $_POST['category_id']);
    $coursephoto = mysqli_real_escape_string($conn, $_FILES['course-image']['name']);
    $tmp = $_FILES['course-image']['tmp_name'];
    if ($coursephoto) {
        move_uploaded_file($tmp, "photo/$coursephoto");
    }
    $coursedes = mysqli_real_escape_string($conn, $_POST['course-description']);
    $teacher = mysqli_real_escape_string($conn, $_POST['teacher-id']);
    // echo $courseName, "<br>";
    // echo $courseCategory, "<br>";
    // echo $coursephoto, "<br>";
    // echo $tmp, "<br>";
    // echo $coursedes, "<br>";
    // echo $teacher, "<br>";
    // exit();
    if (count($errors) == 0) {
        $qry = "INSERT INTO courses (name,category_id,description,course_photo,teacher_id,created_date,updated_date)
         VALUES ('$courseName','$courseCategory','$coursedes','$coursephoto','$teacher',now(),now())";
        // echo $qry;
        // exit();
        $res = mysqli_query($conn, $qry);
        if ($res) {
            header("location:admin/admin.php");
        } else {
            $errors['data-error'] = "Database insert error found";
        }
    }
}
?>
<div class="create-course">
    <form action="createcourses.php" method="POST" id="form1" enctype="multipart/form-data">
        <?php
        include("error.php");
        ?>
        <div>
            <input type="text" name="course-title" id="course-title" placeholder="Enter Your Course Name" required>
            <p></p><br>
        </div>
        <select name="category_id" id="" class="form-control mb-3">
            <option value="0">Choose Course Category</option>
            <?php
            $cats = mysqli_query($conn, "SELECT id,name FROM course_categories");

            while ($cat_data = mysqli_fetch_assoc($cats)) :
            ?>
            <option value="<?php echo $cat_data['id']; ?>">
                <?php echo $cat_data['name']; ?>
            </option>
            <?php
            endwhile
            ?>
        </select>
        <label>Enter Course photo</label><br>
        <input type="file" name="course-image" accept="image/*">
        <textarea name="course-description" id="course-description" minlength="30" cols="30" rows="10"
            placeholder="Enter Course Description" required></textarea>
        <select name="teacher-id" id="" class="form-control mb-3">
            <option value="0">Choose Teacher</option>
            <?php
            $teachers = mysqli_query($conn, "SELECT id,name FROM users WHERE role = '2'");

            while ($teacher_data = mysqli_fetch_assoc($teachers)) :
            ?>
            <option value="<?php echo $teacher_data['id']; ?>">
                <?php echo $teacher_data['name']; ?>
            </option>
            <?php
            endwhile
            ?>
        </select>
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