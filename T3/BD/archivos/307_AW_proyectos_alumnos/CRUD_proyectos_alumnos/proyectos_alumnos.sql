-- Dump de la base de datos proyectos_alumnos (alumnos, tutores y proyectos, con datos de ejemplo)

create database if not exists proyectos_alumnos default character set utf8mb4;
create user if not exists proyectos_alumnos identified by '12345';
grant all on proyectos_alumnos.* to proyectos_alumnos;
use proyectos_alumnos;

-- Se borran primero las tablas que dependen de otras
drop table if exists proyectos;
drop table if exists tutores;
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

-- Estructura de la tabla tutores
-- eliminado: borrado lógico (0 = activo, 1 = eliminado)
CREATE TABLE tutores (
  id_tutor int(11) not null auto_increment primary key,
  dni VARCHAR(15) not null unique,
  nombre VARCHAR(50) not null,
  apellido1 VARCHAR(50) not null,
  apellido2 VARCHAR(50) not null,
  email VARCHAR(100) not null,
  telefono VARCHAR(20) not null,
  eliminado TINYINT(1) not null default 0
) engine=innodb default charset=utf8mb4;

-- Estructura de la tabla proyectos
-- logotipo: imagen guardada en la base de datos (BLOB)
-- pdf_proyecto: ruta del pdf guardado en public/storage/pdf
-- alumno y tutor: claves foráneas (un proyecto lo realiza un alumno y lo lleva un tutor)
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
  tutor int(11) not null,
  constraint fk_proyectos_alumno foreign key (alumno) references alumnos(id_alumno),
  constraint fk_proyectos_tutor foreign key (tutor) references tutores(id_tutor)
) engine=innodb default charset=utf8mb4;

-- Datos de la tabla alumnos
INSERT INTO alumnos (id_alumno, dni, nombre, apellido1, apellido2, email, telefono, ciclo) VALUES
(1, '12345678A', 'Lucía', 'Martínez', 'Serrano', 'lucia.martinez@ejemplo.es', '611223344', 'DAW'),
(2, '23456789B', 'Marcos', 'Herrera', 'Castro', 'marcos.herrera@ejemplo.es', '622334455', 'DAM'),
(3, '34567890C', 'Alba', 'Domínguez', 'Ramos', 'alba.dominguez@ejemplo.es', '633445566', 'ASIR'),
(4, '45678901D', 'Javier', 'Nieto', 'Vega', 'javier.nieto@ejemplo.es', '644556677', 'DAW'),
(5, '56789012E', 'Carmen', 'Prieto', 'Molina', 'carmen.prieto@ejemplo.es', '655667788', 'DAM');

-- Datos de la tabla tutores (el tutor 4 está eliminado y no se muestra en la aplicación)
INSERT INTO tutores (id_tutor, dni, nombre, apellido1, apellido2, email, telefono, eliminado) VALUES
(1, '67890123F', 'Rosa', 'Iglesias', 'Campos', 'rosa.iglesias@ejemplo.es', '666111222', 0),
(2, '78901234G', 'Miguel', 'Soto', 'Fuentes', 'miguel.soto@ejemplo.es', '677222333', 0),
(3, '89012345H', 'Elena', 'Cabrera', 'Marín', 'elena.cabrera@ejemplo.es', '688333444', 0),
(4, '90123456J', 'Pablo', 'Rubio', 'León', 'pablo.rubio@ejemplo.es', '699444555', 1);

-- Datos de la tabla proyectos (logotipo: imagen de 1 píxel de ejemplo)
INSERT INTO proyectos (id_proyecto, titulo, descripcion, periodo, curso, fecha_presentacion, nota, logotipo, pdf_proyecto, alumno, tutor) VALUES
(1, 'Tienda online de productos locales', 'Aplicación web de comercio electrónico para pequeños productores de la zona.', 'diciembre', '2024_2025', '2024-12-12', 8.50, UNHEX('89504E470D0A1A0A0000000D4948445200000001000000010802000000907753DE0000000C49444154789C63D0AB35020001BA00DEC48ABF880000000049454E44AE426082'), 'CRUD_proyectos_alumnos/public/storage/pdf/ejemplo.pdf', 1, 1),
(2, 'App móvil de rutas senderistas', 'Aplicación para consultar y compartir rutas de senderismo con mapa.', 'mayo', '2024_2025', '2025-05-20', 7.25, UNHEX('89504E470D0A1A0A0000000D4948445200000001000000010802000000907753DE0000000C49444154789C63D0AB35020001BA00DEC48ABF880000000049454E44AE426082'), 'CRUD_proyectos_alumnos/public/storage/pdf/ejemplo.pdf', 2, 2),
(3, 'Monitorización de una red doméstica', 'Despliegue de un sistema de monitorización para una red de pequeña oficina.', 'mayo', '2024_2025', '2025-05-22', 9.00, UNHEX('89504E470D0A1A0A0000000D4948445200000001000000010802000000907753DE0000000C49444154789C63D0AB35020001BA00DEC48ABF880000000049454E44AE426082'), 'CRUD_proyectos_alumnos/public/storage/pdf/ejemplo.pdf', 3, 3),
(4, 'Gestor de reservas para un gimnasio', 'Aplicación web para reservar clases y gestionar los aforos.', 'diciembre', '2025_2026', '2025-12-11', 8.00, UNHEX('89504E470D0A1A0A0000000D4948445200000001000000010802000000907753DE0000000C49444154789C63D0AB35020001BA00DEC48ABF880000000049454E44AE426082'), 'CRUD_proyectos_alumnos/public/storage/pdf/ejemplo.pdf', 4, 1),
(5, 'Videojuego educativo de matemáticas', 'Juego para practicar operaciones básicas en educación primaria.', 'diciembre', '2025_2026', '2025-12-15', NULL, UNHEX('89504E470D0A1A0A0000000D4948445200000001000000010802000000907753DE0000000C49444154789C63D0AB35020001BA00DEC48ABF880000000049454E44AE426082'), 'CRUD_proyectos_alumnos/public/storage/pdf/ejemplo.pdf', 5, 2),
(6, 'Portal de empleo para jóvenes', 'Web donde las empresas publican ofertas y los jóvenes envían su currículum.', 'mayo', '2025_2026', '2026-05-19', 7.75, UNHEX('89504E470D0A1A0A0000000D4948445200000001000000010802000000907753DE0000000C49444154789C63D0AB35020001BA00DEC48ABF880000000049454E44AE426082'), 'CRUD_proyectos_alumnos/public/storage/pdf/ejemplo.pdf', 1, 3),
(7, 'Copias de seguridad automáticas', 'Sistema de copias de seguridad programadas para un servidor Linux.', 'mayo', '2025_2026', '2026-05-21', NULL, UNHEX('89504E470D0A1A0A0000000D4948445200000001000000010802000000907753DE0000000C49444154789C63D0AB35020001BA00DEC48ABF880000000049454E44AE426082'), 'CRUD_proyectos_alumnos/public/storage/pdf/ejemplo.pdf', 3, 1);
