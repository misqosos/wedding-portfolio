
<style>
    <?php include("uploads".$GLOBALS["mobile"].".css") ?>
</style>

<?php 
    $copyFromDirectory = "../fotky/";
    $showFromDirectory = "photos/";
    $numOfGalleryColumns = 4;
    if(isMobileDevice()) { $numOfGalleryColumns = 2; }
    include("uploads-wo-css.php");
    if(!isMobileDevice()) { include("components/home-button.html");  }
?>
