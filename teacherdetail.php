<?php
include("components/header2.php");
include("db.php");
$id = $_GET['id'];
$qry = "SELECT * FROM users WHERE id = '$id'";
$res = mysqli_query($conn, $qry);
$data = mysqli_fetch_assoc($res);
?>
<div class="member-detail">
    <form>
        <img src="image/<?php
                        echo $data['photo']
                        ?>" alt="" class="profile">

        <p><span>Name :</span> <?php
                                echo $data['name'];
                                ?></p>
        <p><span>Position :</span> <?php
                                    echo $data['position'];
                                    ?></p>
        <p><span>Email :</span> <?php
                                echo $data['email'];
                                ?></p>
        <p><span>Phone :</span><?php
                                echo $data['phone'];
                                ?></p>
        <p><span>Gender :</span><?php
                                echo $data['gender'];
                                ?></p>
        <p>
            <label for="">Nrc Front Image</label><br>
            <img src="nrc-image/<?php echo $data['nrc_f_image'] ?>" class="nrc" alt="">
        </p>
        <p>
            <label for="">Nrc Back Image</label><br>
            <img src="nrc-image/<?php echo $data['nrc_b_image'] ?>" class="nrc" alt="">
        </p>
        <p><span>Address :</span><?php
                                    echo $data['address'];
                                    ?></p>

        <a href="admin/admin.php">Back >></a>

    </form>
</div>

</body>

</html>