<?php 
    require_once("backend/onStartupInfo.php");
?>
<?php
  $GLOBALS["man"] = "woody";
  $GLOBALS["woman"] = "jessie";
  $GLOBALS["mobile"] = "";
  require_once("backend/database.class.php");
?>
<?php
  function isMobileDevice() { 
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo 
  |fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i" 
  , $_SERVER["HTTP_USER_AGENT"]); 
  } 

  if(isMobileDevice()){
    $GLOBALS["mobile"] = "-m";
  }
?>

<?php

function checkPost($pass) {
  if (isset($pass)) {
    $sql = 'SELECT * FROM dishes WHERE lunch = :lunch';
        
    $stmt = DbConnection::getDatabaseConnection()->prepare($sql);

    $stmt->bindParam(':lunch', $lunchParam, PDO::PARAM_STR);
    $lunchParam = $pass;

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $result = json_decode(json_encode($row));

    if ($result) {
      if ($pass == $result->lunch) {
        setcookie('cake', $result->id, time() + (86400 * 30), "/"); // 86400 = 1 day
        return true;
      }
    }
  }
}

function checkCookie($pass) {
  if (isset($pass)) {
    $sql = 'SELECT * FROM dishes WHERE id = :lunch';
        
    $stmt = DbConnection::getDatabaseConnection()->prepare($sql);

    $stmt->bindParam(':lunch', $lunchParam, PDO::PARAM_STR);
    $lunchParam = $pass;

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $result = json_decode(json_encode($row));

    if ($result) {
      if ($pass == $result->id) {
        return true;
      }
    }
  }
}

include("access/access.php");

?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php if($access) { echo "Wooding"; } else { echo "Gate"; } ?></title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="heart.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body <?php if(isMobileDevice() && $access) { echo 'onclick="hideMenu()"'; } ?>>
  <?php 
    if ($access) { include("app.component.php"); } 
    else { include("pages/gate/gate.php"); }
  ?>
  </body>

  </html>