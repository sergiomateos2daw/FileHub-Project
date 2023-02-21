-- Base de FileHub
-- Versión 1.0
-- Desarollado por Sergio Mateos

DROP DATABASE IF EXISTS filehub;
CREATE DATABASE IF NOT EXISTS filehub;

USE filehub;

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users(

	id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) UNIQUE,
    email VARCHAR(50) UNIQUE,
    password CHAR(60),
    rol varchar(20)
);