
<style type="text/css">
    <?php
        include("questionnaire-page.component.css")
    ?>
</style>
<?php
    $personName = $_POST["personName"];
    $pathToForm = "../pages/questionnaire-page/forms/$personName-form.html";

    include("../pages/questionnaire-page/questionnaire-page-template-wo-css.php");
    include("../components/home-button-m.html");
?>
