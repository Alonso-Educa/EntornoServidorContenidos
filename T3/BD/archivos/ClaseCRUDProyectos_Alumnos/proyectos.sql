-- borrar datos si existen
drop database if exists proyectos_alumnos;
drop user if exists 'proyectos_alumnos'@'localhost';
drop user if exists 'proyectos_alumnos'@'%';

-- crear datos si no existen
create database if not exists proyectos_alumnos;
create user if not exists 'proyectos_alumnos'@'localhost' identified by 'proyectos_alumnos';
use proyectos_alumnos;
grant all on proyectos_alumnos.* to 'proyectos_alumnos'@'localhost';

create table alumnos (
  id_alumno int not null auto_increment primary key,
  dni varchar(9) not null unique,
  nombre varchar(50),
  apellido1 varchar(50),
  apellido2 varchar(50),
  email varchar(50),
  telefono int,
  ciclo varchar(50)
) engine = innodb;

-- Inserción de registros en la tabla alumnos
insert into alumnos (dni, nombre, apellido1, apellido2, email, telefono, ciclo) values
('12345678A', 'Lucía', 'Martínez', 'Serrano', 'lucia.martinez@ejemplo.es', '611223344', 'DAW'),
('23456789B', 'Marcos', 'Herrera', 'Castro', 'marcos.herrera@ejemplo.es', '622334455', 'DAM'),
('34567890C', 'Alba', 'Domínguez', 'Ramos', 'alba.dominguez@ejemplo.es', '633445566', 'ASIR'),
('45678901D', 'Javier', 'Nieto', 'Vega', 'javier.nieto@ejemplo.es', '644556677', 'DAW'),
('56789012E', 'Carmen', 'Prieto', 'Molina', 'carmen.prieto@ejemplo.es', '655667788', 'DAM');