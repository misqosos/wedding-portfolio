<?php
    include ("../database.class.php")
?>

<?php
    class Person {
        private $id;
        private $personName;
        private $make;
        private $dob;
        private $shop;
        private $age;
        private $hobbies;
        private $hairColor;
        private $height;
        private $favColor;
        private $playedOtherMovie;
        private $hasSeenParentsFirst;
        private $owner;
        private $favSport;
        private $isAllCorrect;

        public function __construct() {}

        function postPerson($person){
            $sql = 'INSERT INTO person (
                personName,
                make, 
                dob, 
                shop, 
                age, 
                hobbies, 
                hairColor, 
                height, 
                favColor, 
                playedOtherMovie, 
                hasSeenParentsFirst, 
                favSport, 
                owner, 
                isAllCorrect) 
                    VALUES 
                    (
                        :personName,
                        :make,
                        :dob,
                        :shop,
                        :age,
                        :hobbies,
                        :hairColor,
                        :height,
                        :favColor,
                        :playedOtherMovie,
                        :hasSeenParentsFirst,
                        :favSport,
                        :owner,
                        :isAllCorrect
                    )';
            
            $stmt = DbConnection::getDatabaseConnection()->prepare($sql); 
            
            $stmt->bindParam(':personName', $this->personName, PDO::PARAM_STR);
            $stmt->bindParam(':make', $this->make, PDO::PARAM_STR);
            $stmt->bindParam(':dob', $this->dob, PDO::PARAM_STR);
            $stmt->bindParam(':shop', $this->shop, PDO::PARAM_STR);
            $stmt->bindParam(':age', $this->age, PDO::PARAM_INT);
            $stmt->bindParam(':hobbies', $this->hobbies, PDO::PARAM_STR);
            $stmt->bindParam(':hairColor', $this->hairColor, PDO::PARAM_STR);
            $stmt->bindParam(':height', $this->height, PDO::PARAM_INT);
            $stmt->bindParam(':favColor', $this->favColor, PDO::PARAM_STR);
            $stmt->bindParam(':playedOtherMovie', $this->playedOtherMovie, PDO::PARAM_BOOL);
            $stmt->bindParam(':hasSeenParentsFirst', $this->hasSeenParentsFirst, PDO::PARAM_BOOL);
            $stmt->bindParam(':favSport', $this->favSport, PDO::PARAM_STR);
            $stmt->bindParam(':owner', $this->owner, PDO::PARAM_STR);
            $stmt->bindParam(':isAllCorrect', $this->isAllCorrect, PDO::PARAM_BOOL);
            
            $this->personName =  $person->personName;
            $this->make =  $person->make;
            $this->dob =  $person->dob[2]."-".$person->dob[1]."-".$person->dob[0] ?: "0000-00-00";
            $this->shop =  $person->shop;
            $this->age =  $person->age;
            $this->hobbies =  json_encode($person->hobbies);
            $this->hairColor =  $person->hairColor;
            $this->height =  $person->height;
            $this->favColor =  $person->favColor;
            $this->playedOtherMovie =  $person->playedOtherMovie;
            $this->isAllCorrect =  $person->isAllCorrect;
            $this->hasSeenParentsFirst =  $person->hasSeenParentsFirst;
            $this->favSport =  $person->favSport;
            $this->owner =  $person->owner;

            $stmt->execute();

            return $this->getPostedRecord($this->personName);
    
            if($stmt->num_rows() > 0)
            {
                return $arr_json = array('status' => 200);
            }else{
                return $arr_json = array('status' => 400);
            }
        } 

        function getCorrectPerson($name){
            $sql = 'SELECT * FROM person WHERE personName = :personName AND isAllCorrect = 1 ORDER BY id ASC LIMIT 1';
            
            $stmt = DbConnection::getDatabaseConnection()->prepare($sql);

            $stmt->bindParam(':personName', $nameParam, PDO::PARAM_STR);
            $nameParam = $name;

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return json_encode($row);
        }

        function getPostedRecord($name){
            $sql = 'SELECT * FROM person WHERE personName = :personName ORDER BY id DESC LIMIT 1';
            
            $stmt = DbConnection::getDatabaseConnection()->prepare($sql);

            $stmt->bindParam(':personName', $nameParam, PDO::PARAM_STR);
            $nameParam = $name;

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            return json_encode($row);
        }


    }
?>