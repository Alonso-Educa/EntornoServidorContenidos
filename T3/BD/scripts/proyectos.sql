create database proyectos_alumnos;
create user proyectos_alumnos identified by '12345';
use proyectos_alumnos;
grant all on proyectos_alumnos.* to proyectos_alumnos;
--

CREATE TABLE alumnos (
  id_alumno int(11) not null auto_increment primary key,
  dni VARCHAR(15) not null,
  nombre VARCHAR(50) not null,
  apellido1 VARCHAR(50) not null,
  apellido2 VARCHAR(50) not null,
  email VARCHAR(100) not null,
  telefono VARCHAR(20) not null,
  ciclo VARCHAR(50) not null
) engine =innodb;

-- Inserción de registros en la tabla alumnos
INSERT INTO alumnos (dni, nombre, apellido1, apellido2, email, telefono, ciclo) VALUES
('12345678A', 'Lucía', 'Martínez', 'Serrano', 'lucia.martinez@ejemplo.es', '611223344', 'DAW'),
('23456789B', 'Marcos', 'Herrera', 'Castro', 'marcos.herrera@ejemplo.es', '622334455', 'DAM'),
('34567890C', 'Alba', 'Domínguez', 'Ramos', 'alba.dominguez@ejemplo.es', '633445566', 'ASIR'),
('45678901D', 'Javier', 'Nieto', 'Vega', 'javier.nieto@ejemplo.es', '644556677', 'DAW'),
('56789012E', 'Carmen', 'Prieto', 'Molina', 'carmen.prieto@ejemplo.es', '655667788', 'DAM');