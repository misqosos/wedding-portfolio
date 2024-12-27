<?php

require_once ("database.class.php");

if (!isset($_COOKIE["startupSqlExecuted"])) {
    createDb();
} else { 
    dbCheck();
    if (!isset($_COOKIE["dbInfoed"])) {
        echo '<p style="display:block;" id="dbInfo">Database created</p>';
        setcookie("dbInfoed", true, time() + (86400 * 30), "/");
    }
}

function dbCheck() {
    try {
        $conn = DbConnection::getDatabaseConnection();
    } catch (PDOException $ex) {
        echo "DB was deleted";
        createDb();
    }
}

function createDb (){
    echo "Creating database, please wait...";
    require_once("startup.php");
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