DROP DATABASE IF EXISTS noticias2023;
CREATE DATABASE noticias2023;
USE noticias2023;

CREATE TABLE noticia(
idnoticia int,
titular varchar(255),
textoCorto varchar(800),
textoLargo longtext,
portada boolean,
seccion int,
fecha datetime,
foto varchar(255),
autor int,
PRIMARY KEY (idnoticia)
);

CREATE TABLE seccion(
 id int,
 nombre varchar(100),
 PRIMARY KEY(id)
);

CREATE TABLE autor(
  id int,
  nombre varchar(100),
  foto varchar(100),
  fechaNacimiento date,
  correo varchar(100),
  PRIMARY KEY (ID)
);

ALTER TABLE noticia
ADD CONSTRAINT fkNoticiaSeccion FOREIGN KEY (seccion) REFERENCES seccion(id),
ADD CONSTRAINT fkNoticiaAutor FOREIGN KEY(autor) REFERENCES autor(id);









