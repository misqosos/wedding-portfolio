<?php
    if ($_SERVER["REQUEST_URI"] == '/home') {
        include("invitation-header/invitation-header.component.php");
        include("countdown/countdown.component.php");
        include("photo-upload/upload.php");
        include("motivation-redirection/motivation-redirection.php");
        include("questionnaire-redirection/questionnaire-redirection.component.php");
    }
?>