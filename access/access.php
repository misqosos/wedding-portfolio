<?php 
    $access = false;

    if (!isset($_COOKIE['cake'])) { $access = false; }
        
    if (isset($_POST['pass'])){
        if (checkPost($_POST['pass'])){ $access = true; }
    }

    if (isset($_COOKIE['cake'])) {
        if (checkCookie($_COOKIE['cake'])) { $access = true; } else {
            $access = false;
        }
    }
  ?>