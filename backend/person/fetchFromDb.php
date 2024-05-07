<?php
    include ("person.class.php");
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $personName = file_get_contents('php://input');

        $objectToPost = new Person();
        echo $objectToPost->getCorrectPerson($personName);
    }
?>