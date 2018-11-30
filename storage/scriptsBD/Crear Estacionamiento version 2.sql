drop database if exists estacionamientodb;
create database estacionamientodb;
use estacionamientodb;

CREATE TABLE estatus (
  est_id int,
  est_descripcion varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
alter table estatus add constraint PK_est_id primary key(est_id);

CREATE TABLE secciones (
  sec_id int NOT NULL,
  sec_descripcion varchar(60) NOT NULL,
  sec_status_id int default 1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
alter table secciones add constraint PK_sec_id primary key(sec_id);
alter table secciones add constraint FK_sec_status_id foreign key(sec_status_id) references estatus(est_id);

CREATE TABLE cajones (
  caj_id bigint(45) NOT NULL,
  caj_descripcion varchar(60) NOT NULL,
  caj_seccion_id int NOT NULL,
  caj_status_id int default 1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
alter table cajones add constraint PK_caj_id primary key(caj_id);
alter table cajones add constraint FK_caj_seccion_id foreign key(caj_seccion_id) references secciones(sec_id);
alter table cajones add constraint FK_caj_status_id foreign key(caj_status_id) references estatus(est_id);

CREATE TABLE usuarios (
  usu_matricula bigint(15) NOT NULL,
  usu_nombre varchar(30) not null,
  usu_contrasena varchar(25) NOT NULL,
  usu_tipo bit default 1 NOT NULL /*0 para administrador 1 para usuario*/
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE estadisticasCajones (
  estCaj_id bigint(45) PRIMARY KEY AUTO_INCREMENT,
  estCaj_cajon_id bigint(45) NOT NULL,
  estCaj_fecha date NOT NULL,
  estCaj_hora time NOT NULL,
  estCaj_disponible int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*alter table estadisticasCajones add constraint PK_estCaj_id primary key(estCaj_id);*/
alter table estadisticasCajones add constraint FK_estCaj_cajon_id foreign key(estCaj_cajon_id) references cajones(caj_id);
alter table estadisticasCajones add constraint FK_estCaj_disponible foreign key(estCaj_disponible) references estatus(est_id);


