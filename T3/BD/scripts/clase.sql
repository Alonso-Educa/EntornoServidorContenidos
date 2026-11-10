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