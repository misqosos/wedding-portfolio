DROP TABLE IF EXISTS `person`;
CREATE TABLE `person`(
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `personName` VARCHAR(200),
  `surname` VARCHAR(200),
  `dob` DATE,
  `meetingPlace` VARCHAR(200),
  `age` DECIMAL(10, 0),
  `hobbies` VARCHAR(200),
  `car` VARCHAR(200),
  `height` INT(10),
  `favSport` VARCHAR(200),
  `hasSeenParentsFirst` BOOLEAN,
  `sentFirstMessage` BOOLEAN,
  `favColor` VARCHAR(200),
  `hairColor` VARCHAR(200),
  `email` VARCHAR(200),
  `isAllCorrect` BOOLEAN,
  PRIMARY KEY(`id`)
);

CREATE TABLE `dishes`(
  id VARCHAR(200) PRIMARY KEY,
  lunch VARCHAR(200)
);

INSERT INTO person (personName, surname, dob, email, age, hobbies, hairColor, height, favColor, sentFirstMessage, isAllCorrect) VALUES (
  'jessie',
  'Fedorková',
  "1996-07-19",
  "dominika.fedorkova1@gmail.com",
  27,
  '["Pečenie", "Túry", "Rozprávanie", "woody"]',
  "Blond",
  163,
  "Žltá",
  0,
  1
);

INSERT INTO person (personName, surname, dob, meetingPlace, age, hobbies, car, height, favSport, hasSeenParentsFirst, isAllCorrect) VALUES (
  'woody',
  'Drotár',
  "1996-07-26",
  "Zoznamka",
  27,
  '["Šport", "Hudba", "Chodiť pešo", "jessie"]',
  "Ford C-Max",
  193,
  "Hokej",
  1,
  1
);