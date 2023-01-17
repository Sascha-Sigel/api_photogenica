CREATE DATABASE IF NOT EXISTS photogenica_db;
use photogenica_db;

CREATE TABLE IF NOT EXISTS TPlaces (
      PlaceId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    PlaceDescr VARCHAR(100),
    PlaceNumLikes INT UNSIGNED,
    PlaceLatitude DECIMAL(10, 8),
    PlaceLongitude DECIMAL(10, 8),
      UserId INT UNSIGNED
);

CREATE TABLE IF NOT EXISTS TUsers (
      UserId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    UserName varchar(15),
    UserEMail varchar(64),
    UserHash char(255) -- SHA-256
);

CREATE TABLE IF NOT EXISTS TFavorites (
      UserId INT UNSIGNED,
    PlaceId INT UNSIGNED
);

CREATE TABLE IF NOT EXISTS TImages (
      ImageId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ImageBlob BLOB,
    UserId INT UNSIGNED
);

INSERT INTO TUsers VALUES(NULL, "Max Muster", "max@gmail.com", "9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08");
INSERT INTO TPlaces VALUES(NULL, "Kantonsschule Frauenfeld", 16, 47.555199, 8.903114, 1);
