-- Base de FileHub
-- Versión 1.1
-- Desarollado por Sergio Mateos


DROP DATABASE IF EXISTS filehub;
CREATE DATABASE IF NOT EXISTS filehub;

USE filehub;

-- Creación de la tabla "users" que contedrá los usuarios que pueden acceder al sitio web

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol VARCHAR(50) NOT NULL
);

-- Creación de la tabla "spaces" que contedrá los espacios de almacenamiento de cada usuario

DROP TABLE IF EXISTS spaces;
CREATE TABLE spaces (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(255) NOT NULL,
    num_files INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id)
);

-- Creación de la tabla "shared_files" que contedrá información de los ficheros compartidos por los usuarios

DROP TABLE IF EXISTS shared_files;
CREATE TABLE shared_files (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    url VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id)
);

-- Creación de la tabla "recover_pass" que contedrá un token único para cada intento de recuperación de contraseña
DROP TABLE IF EXISTS recover_pass;
CREATE TABLE recover_pass (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(255) NOT NULL
);
