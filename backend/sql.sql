
CREATE DATABASE IF NOT EXISTS wedding;

CREATE TABLE IF NOT EXISTS wedding.person(
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  personName VARCHAR(200),
  make VARCHAR(200),
  dob DATE,
  meetingPlace VARCHAR(200),
  age DECIMAL(10, 0),
  hobbies VARCHAR(200),
  owner VARCHAR(200),
  height INT(10),
  favSport VARCHAR(200),
  hasSeenParentsFirst BOOLEAN,
  playedOtherMovie BOOLEAN,
  favColor VARCHAR(200),
  hairColor VARCHAR(200),
  shop VARCHAR(200),
  isAllCorrect BOOLEAN,
  PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS wedding.dishes (
  id VARCHAR(200),
  lunch VARCHAR(200)
);

INSERT INTO wedding.dishes () VALUES (
  'dAs1321#$fS12',
  'spolocnost'
);

CREATE TABLE IF NOT EXISTS wedding.visits (
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

CREATE TABLE IF NOT EXISTS wedding.preserve_permissions (
  permission_id int(10) UNSIGNED NOT NULL,
  FOREIGN KEY (permission_id) REFERENCES wedding.person (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO wedding.preserve_permissions (permission_id) VALUES
(1),
(2);

