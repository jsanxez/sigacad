/*drop table actitudinal;
drop table notas;
drop table matriculas;
drop table carreras_cursos;
drop table docentes_cursos;
drop table estudiantes;
drop table docentes;
drop table carreras;
drop table cursos;*/
-- drop table administradores;
/*
create database borrame;
use borrame;*/
create table administradores (

  dni char(8) not null,
  username varchar(45) not null,
  password varchar(45) not null,

  primary key (dni)

)
  engine=innoDB;


create table institutos (

  codigo_mod   char(7)     not null,
  nombre       varchar(45) not null,
  departamento varchar(45) not null,
  provincia    varchar(45) not null,
  distrito     varchar(45) not null,
  direccion    varchar(45),

  primary key (codigo_mod)

)
  engine = innoDB;


create table carreras (

  codigo_mod char(7)     not null,
  codigo     varchar(8)  not null,
  nombre     varchar(45) not null,

  primary key (codigo),

  constraint fk_carr_inst foreign key (codigo_mod)
  references institutos (codigo_mod)

)
  engine = innoDB;


create table cursos (

  ciclo     int(1)      not null,
  codigo    varchar(8)  not null,
  nombre    varchar(45) not null,
  creditos  int(2)      not null,
  unidades  int(2)      not null,
  horas_sem int(1)      not null,

  primary key (codigo)

)
  engine = innoDb;

-- drop table estudiantes;
create table estudiantes (

  dni          char(8)     not null,
  p_nombre     varchar(45) not null,
  s_nombre     varchar(45) not null,
  apellido_p   varchar(45) not null,
  apellido_m   varchar(45) not null,
  genero       char(1)     not null,
  fecha_nac    date        not null,
  discapacidad char(2)     not null,
  telefono     varchar(9)  not null,
  correo       varchar(45),
  direccion    varchar(45),
  observacion  varchar(150),
  password     varchar(150),

  primary key (dni)

)
  engine = innoDB;


create table docentes (

  dni          char(8)     not null,
  p_nombre     varchar(45) not null,
  s_nombre     varchar(45) not null,
  apellido_p   varchar(45) not null,
  apellido_m   varchar(45) not null,
  titulo_prof  varchar(45) not null,
  genero       char(1)     not null,
  fecha_nac    date        not null,
  telefono     varchar(9)  not null,
  correo       varchar(45),
  direccion    varchar(45),
  password     varchar(150),

  primary key (dni)

)
  engine=innoDB;


create table docentes_cursos (

  dni_docente char(8) not null,
  codigo_curso varchar(8) not null,

  primary key (dni_docente, codigo_curso),

  constraint fk_doccur_doc foreign key (dni_docente)
    references docentes (dni),
  constraint fk_doccur_cur foreign key (codigo_curso)
    references  cursos (codigo)

)
  engine=innoDB;


create table carreras_cursos (

  codigo_carrera varchar(8) not null,
  codigo_curso   varchar(8) not null,

  primary key (codigo_carrera, codigo_curso),

  constraint fk_carcur_car foreign key (codigo_carrera)
  references carreras (codigo),
  constraint fk_carcur_cur foreign key (codigo_curso)
  references cursos (codigo)

)
  engine = innoDB;

-- drop table matriculas;
create table matriculas (

  dni_estudiante char(8)    not null,
  cod_curso      varchar(8) not null,

  primary key (dni_estudiante, cod_curso),

  constraint fk_mtr_est foreign key (dni_estudiante)
  references estudiantes (dni),
  constraint fk_mtr_cur foreign key (cod_curso)
  references cursos (codigo)

)
  engine = innoDB;


create table notas (

  dni_estudiante char(8) not null,
  codigo_curso varchar(8) not null,
  unidad int(2) not null,
  cc int(2) not null,
  cp int(2) not null,
  ca int(2) not null,
  promedio int(2) not null,

  primary key (dni_estudiante, codigo_curso, unidad),

  constraint fk_not_mtr foreign key (dni_estudiante, codigo_curso)
    references matriculas(dni_estudiante, cod_curso)

)
  engine=innoDB;

create table actitudinal (

  dni_estudiante char(8) not null,
  codigo_curso varchar(8) not null,
  unidad int(2) not null,
  participacion int(2),
  presencia_per int(2),
  respeto int(2),
  puntualidad int(2),
  responsabilidad int(2),
  promedio int(2),
  obs varchar(45),

  primary key (dni_estudiante, codigo_curso, unidad),

  constraint act_notas_fk foreign key (dni_estudiante, codigo_curso, unidad)
    references notas (dni_estudiante, codigo_curso, unidad)

)
  engine=innoDB;
