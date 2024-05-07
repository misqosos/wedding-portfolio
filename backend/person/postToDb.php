<?php
    include ("person.class.php");
?>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $json = file_get_contents('php://input');
        $array = json_decode($json);

        $objectToPost = new Person();
        echo $objectToPost->postPerson($array);
    }

?>