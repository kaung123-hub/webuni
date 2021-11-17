<?php
if (count($errors) > 0) {
    foreach ($errors as $error) {
        echo "<div class='errordis' id='errord'>
            <strong>$error</strong>
            <button id='dismissbtn'>X</button>    
        </div>";
    }
}
