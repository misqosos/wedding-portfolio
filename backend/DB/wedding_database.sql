DROP TABLE IF EXISTS `person`;
CREATE TABLE `person`(
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `personName` VARCHAR(200),
  `make` VARCHAR(200),
  `dob` DATE,
  `meetingPlace` VARCHAR(200),
  `age` DECIMAL(10, 0),
  `hobbies` VARCHAR(200),
  `owner` VARCHAR(200),
  `height` INT(10),
  `favSport` VARCHAR(200),
  `hasSeenParentsFirst` BOOLEAN,
  `playedOtherMovie` BOOLEAN,
  `favColor` VARCHAR(200),
  `hairColor` VARCHAR(200),
  `shop` VARCHAR(200),
  `isAllCorrect` BOOLEAN,
  PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `dishes`;
CREATE TABLE `dishes`(
  id VARCHAR(200) PRIMARY KEY,
  lunch VARCHAR(200)
);

INSERT INTO person (personName, make, dob, shop, age, hobbies, hairColor, height, favColor, playedOtherMovie, isAllCorrect) VALUES (
  'jessie',
  'Drevo',
  "1999-11-24",
  "Hračkárstvo snov",
  24,
  '["Hranie", "Woody", "Dobrodružstvo"]',
  "Červená",
  10,
  "Žltá",
  0,
  1
);

INSERT INTO person (personName, make, dob, meetingPlace, age, hobbies, owner, height, favSport, hasSeenParentsFirst, isAllCorrect) VALUES (
  'woody',
  'Drevo',
  "1995-11-22",
  "E-shop",
  28,
  '["Pivo s Buzzlightyearom", "Hranie", "Dobrodružstvo", "Jessie"]',
  "Andy",
  15,
  "Futbal",
  1,
  1
);