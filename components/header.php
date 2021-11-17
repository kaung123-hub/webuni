<header>
    <div class="container">
        <?php
        include("./components/nav.php");
        ?>
        <!-- <div class="current">
            <h3>Home / <span>Blog</span></h3>
        </div> -->

        <div class="search-course">
            <div class="search-course-title">
                <h3>Search your course</h3>
            </div>
            <div class="search-course-box">
                <form action="" method="POST">
                    <input type="text" name="course" placeholder="Course">
                    <input type="text" name="category" placeholder="Category">
                    <input type="submit" name="submit" value="Search Course">
                </form>
            </div>
        </div>

    </div>
</header>