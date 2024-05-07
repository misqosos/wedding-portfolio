
<style type="text/css">
    <?php
        include("questionnaire-page.component.css")
    ?>
</style>
<?php
    $personName = $_POST["personName"];
    $pathToForm = "forms/$personName-form.html";

    include("questionnaire-page-template-wo-css.php");
    include("components/home-button.html")
?>

