
<style type="text/css">
    <?php
        include("questionnaire-page.component".$GLOBALS["mobile"].".css")
    ?>
</style>
<?php
    $personName = $_POST["personName"];
    $pathToForm = "forms/$personName-form.html";

    include("questionnaire-page-template-wo-css.php");
    include("components/home-button".$GLOBALS["mobile"].".html")
?>

