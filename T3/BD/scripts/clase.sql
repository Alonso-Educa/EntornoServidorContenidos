create database clase;
create user clase identified by 'claseMala';
use clase;
grant all on clase.* to clase;
--
CREATE TABLE alumno (
  nombre VARCHAR(75) not null,
  ape1 VARCHAR(75) not null,
  ape2 VARCHAR(75),
  dni CHAR(9) primary key
) engine =innodb;
-- motores de mysql:
-- innodb = mas lento y constante, soporta mejor fallos
-- myisam = mas rapido y peor para fallos

CREATE TABLE modulo (
  nombre VARCHAR(75) not null,
  n_horas int not null,
  codigo int NOT NULL AUTO_INCREMENT primary key
) engine =innodb;

create table cursa (
codigo int not null,
foreign key (codigo) references modulo (codigo),
index (codigo),
dni char(9) not null,
index (dni),
foreign key (dni) references alumno (dni),
primary key (codigo,dni)
)engine=innodb;

-- Inserción de alumnos de prueba
INSERT INTO alumno (nombre, ape1, ape2, dni) VALUES
('Lucía', 'Martínez', 'Gómez', '12345678A'),
('Carlos', 'Sánchez', 'Ruiz', '23456789B'),
('Elena', 'Fernández', 'López', '34567890C'),
('Javier', 'Moreno', NULL, '45678901D'),
('Sofía', 'Navarro', 'Torres', '56789012E');

-- Inserción de módulos de Desarrollo de Aplicaciones Web (DAW)
INSERT INTO modulo (nombre, n_horas) VALUES
('Sistemas informáticos', 192),
('Bases de datos', 192),
('Programación', 256),
('Lenguajes de marcas y sistemas de gestión de información', 128),
('Entornos de desarrollo', 96),
('Desarrollo web en entorno cliente', 140),
('Desarrollo web en entorno servidor', 180),
('Despliegue de aplicaciones web', 90),
('Diseño de interfaces web', 120);

-- Inserción de matrículas (relación alumno - módulo)
INSERT INTO cursa (codigo, dni) VALUES
(1, '12345678A'),
(2, '12345678A'),
(3, '12345678A'),
(4, '12345678A'),
(5, '12345678A'),
(1, '23456789B'),
(2, '23456789B'),
(3, '23456789B'),
(6, '34567890C'),
(7, '34567890C'),
(8, '34567890C'),
(9, '34567890C'),
(6, '45678901D'),
(7, '45678901D'),
(3, '56789012E'),
(6, '56789012E'),
(9, '56789012E');