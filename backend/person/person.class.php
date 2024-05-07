<?php
    include ("../database.class.php")
?>

<?php
    class Person {
        private $id;
        private $personName;
        private $surname;
        private $dob;
        private $email;
        private $age;
        private $hobbies;
        private $hairColor;
        private $height;
        private $favColor;
        private $sentFirstMessage;
        private $hasSeenParentsFirst;
        private $car;
        private $favSport;
        private $isAllCorrect;

        public function __construct() {}

        function postPerson($person){
            $sql = 'INSERT INTO wedding.person (
                personName,
                surname, 
                dob, 
                email, 
                age, 
                hobbies, 
                hairColor, 
                height, 
                favColor, 
                sentFirstMessage, 
                hasSeenParentsFirst, 
                favSport, 
                car, 
                isAllCorrect) 
                    VALUES 
                    (
                        :personName,
                        :surname,
                        :dob,
                        :email,
                        :age,
                        :hobbies,
                        :hairColor,
                        :height,
                        :favColor,
                        :sentFirstMessage,
                        :hasSeenParentsFirst,
                        :favSport,
                        :car,
                        :isAllCorrect
                    )';
            
            $stmt = DbConnection::getDatabaseConnection()->prepare($sql); 
            
            $stmt->bindParam(':personName', $this->personName, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $this->surname, PDO::PARAM_STR);
            $stmt->bindParam(':dob', $this->dob, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':age', $this->age, PDO::PARAM_INT);
            $stmt->bindParam(':hobbies', $this->hobbies, PDO::PARAM_STR);
            $stmt->bindParam(':hairColor', $this->hairColor, PDO::PARAM_STR);
            $stmt->bindParam(':height', $this->height, PDO::PARAM_INT);
            $stmt->bindParam(':favColor', $this->favColor, PDO::PARAM_STR);
            $stmt->bindParam(':sentFirstMessage', $this->sentFirstMessage, PDO::PARAM_BOOL);
            $stmt->bindParam(':hasSeenParentsFirst', $this->hasSeenParentsFirst, PDO::PARAM_BOOL);
            $stmt->bindParam(':favSport', $this->favSport, PDO::PARAM_STR);
            $stmt->bindParam(':car', $this->car, PDO::PARAM_STR);
            $stmt->bindParam(':isAllCorrect', $this->isAllCorrect, PDO::PARAM_BOOL);
            
            $this->personName =  $person->personName;
            $this->surname =  $person->surname;
            // hodnoty dob normalne chodia
            $this->dob =  $person->dob[0]."-".$person->dob[1]."-".$person->dob[2];
            $this->email =  $person->email;
            $this->age =  $person->age;
            $this->hobbies =  json_encode($person->hobbies);
            $this->hairColor =  $person->hairColor;
            $this->height =  $person->height;
            $this->favColor =  $person->favColor;
            $this->sentFirstMessage =  $person->sentFirstMessage;
            $this->isAllCorrect =  $person->isAllCorrect;
            $this->hasSeenParentsFirst =  $person->hasSeenParentsFirst;
            $this->favSport =  $person->favSport;
            $this->car =  $person->car;

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
            $sql = 'SELECT * FROM d40089_wedding.person WHERE personName = :personName AND isAllCorrect = 1 ORDER BY id ASC LIMIT 1';
            
            $stmt = DbConnection::getDatabaseConnection()->prepare($sql);

            $stmt->bindParam(':personName', $nameParam, PDO::PARAM_STR);
            $nameParam = $name;

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return json_encode($row);
        }

        function getPostedRecord($name){
            $sql = 'SELECT * FROM d40089_wedding.person WHERE personName = :personName ORDER BY id DESC LIMIT 1';
            
            $stmt = DbConnection::getDatabaseConnection()->prepare($sql);

            $stmt->bindParam(':personName', $nameParam, PDO::PARAM_STR);
            $nameParam = $name;

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            return json_encode($row);
        }


    }
?>