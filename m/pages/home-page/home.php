<?php
    if ($_SERVER["REQUEST_URI"] == '/m/home') {
        include("invitation-header/invitation-header.component.php");
        include("countdown/countdown.component.php");
        include("questionnaire-redirection/questionnaire-redirection.component.php");
    }
?>