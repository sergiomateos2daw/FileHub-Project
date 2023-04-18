-- Base de FileHub
-- Versión 1.1
-- Desarollado por Sergio Mateos

------ UPDATE ------
-- Añadida la tabla "spaces"
--------------------

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

DROP TABLE IF EXISTS recover_pass;
CREATE TABLE recover_pass (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    token VARCHAR(255) NOT NULL
);

-- Insertar registros para pruebas
INSERT INTO spaces (id_user, name, description, num_files) VALUES
(1, 'Vacaciones en la playa', 'Fotos de mis vacaciones en la playa', 20),
(1, 'Documentos importantes', 'Documentos importantes para el trabajo', 5),
(1, 'Proyecto de diseño', 'Archivos de diseño para el proyecto X', 15),
(1, 'Música favorita', 'Mi colección de música favorita', 100),
(1, 'Fotos familiares', 'Fotos de mi familia y amigos', 50),
(1, 'Proyectos personales', 'Proyectos personales que estoy trabajando', 10),
(1, 'Presentaciones', 'Presentaciones de mi trabajo y estudios', 8),
(1, 'Videos de viajes', 'Videos de mis viajes alrededor del mundo', 25),
(1, 'Archivos de programación', 'Archivos de programación para el trabajo', 30),
(1, 'Libros electrónicos', 'Mis libros electrónicos favoritos', 12),
(1, 'Compras en línea', 'Comprobantes de mis compras en línea', 40),
(1, 'Diseño gráfico', 'Proyectos de diseño gráfico', 23),
(1, 'Tareas del hogar', 'Instrucciones y recetas para tareas del hogar', 18),
(1, 'Proyectos de programación', 'Proyectos de programación personal', 28),
(1, 'Recursos educativos', 'Recursos para mi trabajo como profesor', 32),
(1, 'Facturas y pagos', 'Facturas y comprobantes de pagos', 15),
(1, 'Fotos de paisajes', 'Fotos de paisajes hermosos', 55),
(1, 'Proyectos de fotografía', 'Proyectos de fotografía personal', 13),
(1, 'Materiales de estudio', 'Materiales para estudiar para exámenes', 25),
(1, 'Videos tutoriales', 'Videos tutoriales para mejorar habilidades', 37),
(1, 'Bocetos de arte', 'Bocetos y proyectos de arte', 19),
(1, 'Documentos personales', 'Documentos personales importantes', 8),
(1, 'Fotos de mascotas', 'Fotos de mis mascotas favoritas', 45),
(1, 'Libros de cocina', 'Mis recetas y libros de cocina', 10),
(1, 'Proyectos de escritura', 'Proyectos de escritura personal', 17),
(1, 'Materiales de investigación', 'Materiales de investigación para tesis', 30),
(1, 'Videos de música', 'Videos de mis artistas favoritos', 23),
(1, 'Fotos de eventos', 'Fotos de eventos importantes', 60),
(1, 'Proyectos de animación', 'Proyectos de animación personal', 14);