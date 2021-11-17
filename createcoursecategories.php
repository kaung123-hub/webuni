<?php
include("components/header2.php");
include("db.php");
$errors = [];
if (isset($_POST['submit'])) {
    // echo ("success");
    // exit();
    $courseCategoryName = mysqli_real_escape_string($conn, $_POST['course-title']);
    $courseCategoryName = strtoupper($courseCategoryName);
    $photo = mysqli_real_escape_string($conn, $_FILES['course-category-image']['name']);
    $tmp_photo = $_FILES['course-category-image']['tmp_name'];
    if ($photo) {
        move_uploaded_file($tmp_photo, "image/$photo");
    }
    $text = mysqli_real_escape_string($conn, $_POST['course-description']);
    // echo $courseCategoryName;
    // echo $photo;
    // echo $text;
    // exit();
    $categoryName_check = "SELECT * FROM course_categories WHERE name = '$courseCategoryName'";
    $res = mysqli_query($conn, $categoryName_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['categry_name'] = "Category Name is already exist!";
    }
    if (count($errors) == 0) {
        $qry = "INSERT INTO course_categories(name,course_image,description,created_date,updated_date) 
        VALUES ('$courseCategoryName','$photo','$text',now(),now())";
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
    <form action="createcoursecategories.php" method="POST" id="form1" enctype="multipart/form-data">
        <?php
        include("error.php");
        ?>
        <div>
            <input type="text" name="course-title" id="course-title" placeholder="Enter Your Course Category Name" required>
            <p></p><br>
        </div>
        <label>Enter Course Category photo</label><br>
        <input type="file" name="course-category-image" accept="image/*">
        <textarea name="course-description" id="course-description" minlength="30" cols="30" rows="10" placeholder="Enter Course Description" required></textarea>
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