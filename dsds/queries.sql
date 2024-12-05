DROP DATABASE IF EXISTS wedding;
CREATE DATABASE wedding;

DROP TABLE IF EXISTS wedding.person;
CREATE TABLE wedding.person(
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

DROP TABLE IF EXISTS wedding.dishes;
CREATE TABLE wedding.dishes (
  id VARCHAR(200) PRIMARY KEY,
  lunch VARCHAR(200)
);

INSERT INTO wedding.dishes () VALUES (
  'dAs1321#$fS12',
  'spolocnost'
);

DROP TABLE IF EXISTS wedding.visits;
CREATE TABLE wedding.visits (
  name VARCHAR(200) PRIMARY KEY,
  timestamp DATETIME
);

INSERT INTO wedding.person (personName, make, dob, shop, age, hobbies, hairColor, height, favColor, playedOtherMovie, isAllCorrect) VALUES (
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

INSERT INTO wedding.person (personName, make, dob, meetingPlace, age, hobbies, owner, height, favSport, hasSeenParentsFirst, isAllCorrect) VALUES (
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

DROP TABLE IF EXISTS wedding.preserve_permissions;
CREATE TABLE wedding.preserve_permissions (
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO wedding.preserve_permissions (`permission_id`) VALUES
(1),
(2);

ALTER TABLE wedding.preserve_permissions
  ADD PRIMARY KEY (`permission_id`);

ALTER TABLE wedding.preserve_permissions
  MODIFY `permission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE wedding.preserve_permissions
  ADD CONSTRAINT `preserve_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES wedding.person (`id`);

DELIMITER $$

CREATE DEFINER=`root`@`localhost` EVENT `age_update_jessie` ON SCHEDULE EVERY 1 YEAR STARTS '2024-07-19 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN 

UPDATE wedding.person 
SET age = ( TRUNCATE( (DATEDIFF(CURDATE(), '1996-07-19')/365.25), 0)) 
WHERE id = 1; END$$

CREATE DEFINER=`root`@`localhost` EVENT `age_update_woody` ON SCHEDULE EVERY 1 YEAR STARTS '2024-07-26 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN 

UPDATE wedding.person 
SET age = ( TRUNCATE( (DATEDIFF(CURDATE(), '1996-07-26')/365.25), 0)) 
WHERE id = 2; END$$

DELIMITER ;