-- Dump de la base de datos proyectos_alumnos (entrega 306)

create database if not exists proyectos_alumnos default character set utf8mb4;
create user if not exists proyectos_alumnos identified by '12345';
grant all on proyectos_alumnos.* to proyectos_alumnos;
use proyectos_alumnos;

-- Se borran primero los proyectos porque dependen de alumnos
drop table if exists proyectos;
drop table if exists alumnos;

-- Estructura de la tabla alumnos
CREATE TABLE alumnos (
  id_alumno int(11) not null auto_increment primary key,
  dni VARCHAR(15) not null unique,
  nombre VARCHAR(50) not null,
  apellido1 VARCHAR(50) not null,
  apellido2 VARCHAR(50) not null,
  email VARCHAR(100) not null,
  telefono VARCHAR(20) not null,
  ciclo VARCHAR(50) not null
) engine=innodb default charset=utf8mb4;

-- Estructura de la tabla proyectos
-- logotipo: imagen guardada en la base de datos (BLOB)
-- pdf_proyecto: ruta del pdf guardado en public/storage/pdf
-- alumno: clave foránea al alumno que realiza el proyecto
CREATE TABLE proyectos (
  id_proyecto int(11) not null auto_increment primary key,
  titulo VARCHAR(100) not null,
  descripcion TEXT not null,
  periodo ENUM('diciembre', 'mayo') not null,
  curso VARCHAR(9) not null,
  fecha_presentacion DATE not null,
  nota DECIMAL(4,2) null,
  logotipo MEDIUMBLOB not null,
  pdf_proyecto VARCHAR(255) not null,
  alumno int(11) not null,
  constraint fk_proyectos_alumno foreign key (alumno) references alumnos(id_alumno)
) engine=innodb default charset=utf8mb4;

-- Datos de la tabla alumnos
INSERT INTO alumnos (id_alumno, dni, nombre, apellido1, apellido2, email, telefono, ciclo) VALUES
(1, '12345678A', 'Lucía', 'Martínez', 'Serrano', 'lucia.martinez@ejemplo.es', '611223344', 'DAW'),
(2, '23456789B', 'Marcos', 'Herrera', 'Castro', 'marcos.herrera@ejemplo.es', '622334455', 'DAM'),
(3, '34567890C', 'Alba', 'Domínguez', 'Ramos', 'alba.dominguez@ejemplo.es', '633445566', 'ASIR'),
(4, '45678901D', 'Javier', 'Nieto', 'Vega', 'javier.nieto@ejemplo.es', '644556677', 'DAW'),
(5, '56789012E', 'Carmen', 'Prieto', 'Molina', 'carmen.prieto@ejemplo.es', '655667788', 'DAM');
