create database pruebas;
create user pruebas identified by '12345';
use pruebas;
grant all on pruebas.* to pruebas;
--

CREATE TABLE persona (
  id_persona int(11) not null auto_increment primary key,
  nombre VARCHAR(50) not null,
  apellidos VARCHAR(50) not null,
  telefono int(9) not null
) engine =innodb;

-- Inserción de registros en la tabla persona
INSERT INTO persona (id_persona, nombre, apellidos, telefono) VALUES
(1, 'Laura', 'Gómez Martín', 612345678),
(2, 'Carlos', 'Ruiz Pérez', 623456789),
(3, 'Sofía', 'López Sánchez', 634567890),
(4, 'David', 'Fernández Díaz', 645678901),
(5, 'Elena', 'Morales Navarro', 656789012),
(6, 'Pepe', 'García López', 678901234);

-- nueva tabla para las imagenes
CREATE TABLE proyecto (
  id int auto_increment primary key,
  titulo varchar(50) not null,
  logotipo mediumblob
) engine=innodb;