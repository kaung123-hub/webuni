<hr>
<footer>
    <div class="community">
        <div class="community-text">
            <h1>Join Our Community Now!</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi veniam voluptate expedita hic aperiam
                incidunt eius beatae laboriosam exercitationem recusandae. Lorem, ipsum dolor sit amet consectetur
                adipisicing elit. Veniam, molestias?</p>
            <div class="register">
                <a href="../register.php">Register Now</a>
            </div>
        </div>
    </div>

    <div class="policy">
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit.</li>
                <li>Lorem ipsum dolor sit.</li>
            </ul>
        </div>
        <div class="engeneering">
            <h4>Engeneering</h4>
            <ul>
                <li>Lorem, ipsum dolor.</li>
                <li>Lorem ipsum dolor sit.</li>
                <li>Lorem ipsum dolor sit.</li>
                <li>Lorem ipsum dolor sit.</li>
                <li>Lorem, ipsum dolor.</li>
            </ul>
        </div>
        <div class="graphic">
            <h4>Graphic Design</h4>
            <ul>
                <li>Lorem, ipsum dolor.</li>
                <li>Lorem ipsum dolor sit.</li>
                <li>Lorem ipsum dolor sit.</li>
                <li>Lorem ipsum dolor sit.</li>
                <li>Lorem, ipsum dolor.</li>
            </ul>
        </div>
        <div class="development">
            <h4>Development</h4>
            <ul>
                <li>Lorem, ipsum dolor.</li>
                <li>Lorem ipsum dolor sit.</li>
                <li>Lorem ipsum dolor sit.</li>
                <li>Lorem ipsum dolor sit.</li>
                <li>Lorem, ipsum dolor.</li>
            </ul>
        </div>
        <div class="newsletter">
            <h4>Newsletter</h4>
            <form action="" method="POST">
                <input type="email" name="email" placeholder="E-mail">
                <input type="submit" name="submit" value="Subscribe">
            </form>
            <i>We don't spam</i>
        </div>
    </div>
    <div class="footer">
        <h5 class="first-footer">Copyright &copy;2021 All rights reserverd | This template is made by <span>AIMT</span>
        </h5>
        <h5 class="second-footer">Terms & Conditions| Register | Privacy</h5>
    </div>
</footer>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
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