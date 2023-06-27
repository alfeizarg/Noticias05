﻿--
-- Script was generated by Devart dbForge Studio 2020 for MySQL, Version 9.0.897.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 26/06/2023 9:37:23
-- Server version: 8.0.30
-- Client version: 4.1
--

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

DROP DATABASE IF EXISTS noticias2023;

CREATE DATABASE noticias2023
CHARACTER SET utf8mb4
COLLATE utf8mb4_0900_ai_ci;

--
-- Set default database
--
USE noticias2023;

--
-- Create table `seccion`
--
CREATE TABLE seccion (
  id int NOT NULL,
  nombre varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_0900_ai_ci;

--
-- Create table `autor`
--
CREATE TABLE autor (
  id int NOT NULL,
  nombre varchar(100) DEFAULT NULL,
  foto varchar(100) DEFAULT NULL,
  fechaNacimiento date DEFAULT NULL,
  correo varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_0900_ai_ci;

--
-- Create table `noticia`
--
CREATE TABLE noticia (
  idnoticia int NOT NULL,
  titular varchar(255) DEFAULT NULL,
  textoCorto varchar(800) DEFAULT NULL,
  textoLargo longtext DEFAULT NULL,
  portada tinyint(1) DEFAULT NULL,
  seccion int DEFAULT NULL,
  fecha datetime DEFAULT NULL,
  foto varchar(255) DEFAULT NULL,
  autor int DEFAULT NULL,
  PRIMARY KEY (idnoticia)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_0900_ai_ci;

--
-- Create foreign key
--
ALTER TABLE noticia
ADD CONSTRAINT fkNoticiaAutor FOREIGN KEY (autor)
REFERENCES autor (id);

--
-- Create foreign key
--
ALTER TABLE noticia
ADD CONSTRAINT fkNoticiaSeccion FOREIGN KEY (seccion)
REFERENCES seccion (id);

-- 
-- Dumping data for table seccion
--
INSERT INTO seccion VALUES
(1, 'Actualidad'),
(2, 'Deportes'),
(3, 'Cultura');

-- 
-- Dumping data for table autor
--
INSERT INTO autor VALUES
(1, 'Jose', '', '2022-12-12', 'adda@sg.es'),
(2, 'Pablo', '', '2022-12-12', 'addass@sg.es'),
(3, 'José Manuel', '3alf25-12-2022-15-14.jpg', '1960-12-12', 'info@alfeizar.net'),
(4, 'Manuel Sanchez', '4alf25-12-2022-15-14.jpg', '1960-05-04', 'JOSE@garcia.es');

-- 
-- Dumping data for table noticia
--
INSERT INTO noticia VALUES
(1, 'Sidenor se compromete a garantizar el empleo en Reinosa hasta 2025 y abordar un plan industrial ', 'Sidenor se compromete ', 'Sidenor se compromete a garantizar el empleo en Reinosa hasta 2025 y abordar un plan industrial Sidenor se compromete a garantizar el empleo en Reinosa hasta 2025 y abordar un plan industrial Sidenor se compromete a garantizar el empleo en Reinosa hasta 2025 y abordar un plan industrial Sidenor se compromete a garantizar el empleo en Reinosa hasta 2025 y abordar un plan industrial ', 0, 1, '2023-06-16 00:00:00', NULL, 1),
(2, 'La popular González Revuelta presidirá el Parlamento, cuya Mesa será plural', 'La popular González Revuelta presidirá el Parlamento,', 'La nueva legislatura arranca este jueves: los 35 diputados jurarán o prometerán sus cargos y se formará el órgano de dirección de la Cámara La nueva legislatura arranca este jueves: los 35 diputados jurarán o prometerán sus cargos y se formará el órgano de dirección de la Cámara', 1, 2, '2023-06-23 00:00:00', '2Calleja y Mila03-kTYB-U200571862490j1H-758x531@Diario Montanes.jpg', 2),
(5, 'Gema Igual refuerza aún más las funciones de César Díaz en el Gobierno', 'Gema Igual refuerza ', 'La regidora de Santander le nombra ''macroconcejal'' de Urbanismo, Fomento, Vivienda y Movilidad Sostenible, además de primer teniente de alcalde y portavoz. Margarita Rojo y Daniel Portilla serán segunda y tercer tenientes de alcalde', 1, 1, NULL, '5450_1000.jpg', 3);

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;