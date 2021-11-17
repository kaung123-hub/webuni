<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/contact.css">
</head>
<?php
include("./components/header.php");
?>

<div class="content">
    <div class="contact">
        <div class="contact-box">
            <h1>Get in Touch</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, voluptates voluptatem. Animi tenetur
                ipsum
                voluptas.</p>
            <form action="contact.php" method="POST">
                <input type="text" name="name" placeholder="Your Name">
                <input type="text" name="email" placeholder="Your Email">
                <input type="text" name="subject" placeholder="Subject">
                <textarea cols="30" rows="10" name="message" placeholder="Message"></textarea>
                <input type="submit" name="submit" value="Sent Message">
            </form>
        </div>
        <div class="label">
            <h1>Contact Info</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit explicabo molestias expedita ullam quaerat
                vero. In ducimus incidunt quia aspernatur.</p>
            <h4>Direct Line</h4>
            <span>+53345795332453</span>
            <ul>
                <li>
                    Lorem ipsum dolor sit amet consectetur
                    adipisicing
                    elit.
                </li>
                <li>+53345795332453</li>
                <li>youremail@gmail.com</li>
            </ul>
            <div class="icons">
                <a href="https://www.facebook.com"><img src="./image/fb-logo.png" alt="facebook icon"></a>
                <a href="https://www.twitter.com"><img src="./image/twitter.png" alt="twitter icon"></a>
                <a href="https://www.instagram.com"><img src="./image/instagram.png" alt="instagram icon"></a>
                <a href="https://www.mail.com"><img src="./image/mail.png" alt="mail icon"></a>
            </div>
        </div>
    </div>
    <div class="google-map">
        <iframe class="map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1910.0254103359946!2d96.16205652490619!3d16.77414699859339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ed6e755476e9%3A0x4a493e5d3773c058!2sTaw%20Win!5e0!3m2!1smy!2smm!4v1635129897362!5m2!1smy!2smm"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<?php
include("./components/footer.php")
?>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries&v=weekly" async>
</script>
<!-- <script src="js/map.js"></script> -->

<body>

</body>

</html>