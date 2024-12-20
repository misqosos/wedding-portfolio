<?php

if (!isset($_COOKIE["startupSqlExecuted"])) {
    echo "Creating database, please wait...";
    require_once("startup.php");
} else { 
    if (!isset($_COOKIE["dbInfoed"])) {
        echo '<p style="display:block;" id="dbInfo">Database created</p>';
        setcookie("dbInfoed", true, time() + (86400 * 30), "/");
    }
}

?>

<script>
    let timeout = setTimeout(function (){
        let dbInfo = document.getElementById("dbInfo");
        if (dbInfo) {
            dbInfo.style.display = "none";
        }
    }, 3000)
</script>