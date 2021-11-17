<?php
include("components/header2.php");
include("db.php");
$errors = [];
$id = $_GET['id'];
// echo $id;
// exit();
$qry = "SELECT * FROM news WHERE id = '$id'";
$res = mysqli_query($conn, $qry);
$data = mysqli_fetch_assoc($res);
?>
<div class="create-course-categories">
    <form action="updatepost.php" method="POST" id="form1" enctype="multipart/form-data">
        <?php
        include("error.php");
        ?>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div>
            <input type="text" name="post-title" id="course-title" placeholder="Enter Post Title" value="<?php echo $data['name'] ?>">
            <p></p><br>
        </div>
        <label>Post photo</label><br><br>
        <img src="image/<?php echo $data['post_photo'] ?>" alt="Post Image" style="width: 100px; height:100px;"><br>
        <input type="file" name="post-image" accept="image/*">
        <textarea name="post-description" id="course-description" minlength="30" cols="30" rows="10" placeholder="Enter Post Description" required><?php echo $data['description'] ?></textarea>
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