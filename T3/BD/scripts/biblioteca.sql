create database biblioteca;
create user biblioteca identified by '12345';
use biblioteca;
grant all on biblioteca.* to biblioteca;
--
CREATE TABLE libro (
  isbn VARCHAR(8) not null primary key,
  titulo VARCHAR(255) not null,
  autor VARCHAR(50) not null,
  tematica VARCHAR(11) not null,
  fecha date not null,
  n_paginas int(5) not null,
  posicion VARCHAR(255) not null,
  ejemplar VARCHAR(5) not null,
  prestado bit not null,
  foreign key (posicion) references ordenacion (posicion),
) engine =innodb;

CREATE TABLE ordenacion (
  posicion VARCHAR(8) not null primary key,
  planta int(3) not null,
  seccion int(3) not null,
  estanteria int(3) not null,
  descripcion VARCHAR(255) not null
) engine =innodb;


-- Inserción de ubicaciones en la tabla ordenacion
INSERT INTO ordenacion (posicion, planta, seccion, estanteria, descripcion) VALUES
('P1-S1-E1', 1, 1, 1, 'Planta 1, Sección 1, Estantería 1 - Literatura Clásica'),
('P1-S2-E4', 1, 2, 4, 'Planta 1, Sección 2, Estantería 4 - Fantasía y Ciencia Ficción'),
('P1-S4-E5', 1, 4, 5, 'Planta 1, Sección 4, Estantería 5 - Novela Negra y Terror'),
('P2-S1-E2', 2, 1, 2, 'Planta 2, Sección 1, Estantería 2 - Historia Universal'),
('P2-S3-E1', 2, 3, 1, 'Planta 2, Sección 3, Estantería 1 - Divulgación Científica');

-- Inserción de registros en la tabla libro
INSERT INTO libro (isbn, titulo, autor, tematica, fecha, n_paginas, posicion, ejemplar, prestado) VALUES
('84013211', 'Don Quijote de la Mancha', 'Miguel de Cervantes', 'Novela', '1605-01-16', 1345, 'P1-S1-E1', 'EJ-01', 0),
('84450714', 'El Señor de los Anillos', 'J.R.R. Tolkien', 'Fantasía', '1954-07-29', 1272, 'P1-S2-E4', 'EJ-01', 1),
('84975922', 'Cien años de soledad', 'Gabriel García Márquez', 'Novela', '1967-05-30', 471, 'P1-S1-E1', 'EJ-02', 0),
('84999242', 'Sapiens: De animales a dioses', 'Yuval Noah Harari', 'Historia', '2011-01-01', 496, 'P2-S1-E2', 'EJ-01', 1),
('84206513', 'Breve historia del tiempo', 'Stephen Hawking', 'Ciencia', '1988-04-01', 256, 'P2-S3-E1', 'EJ-01', 0),
('84975937', 'El resplandor', 'Stephen King', 'Terror', '1977-01-28', 688, 'P1-S4-E5', 'EJ-01', 0),
('84339738', '1984', 'George Orwell', 'Distopía', '1949-06-08', 326, 'P1-S2-E4', 'EJ-03', 1);