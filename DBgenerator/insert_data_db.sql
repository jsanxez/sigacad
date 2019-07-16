# use borrame;
-- select * from administradores;
insert into administradores values ('12345678', 'admin', 'admin');
insert into administradores values ('70669128', 'jsanchez', 'root');
insert into administradores values ('32145687', 'juan', '');

-- select * from institutos;
insert into institutos values ('1284486', 'TODAS LAS ARTES', 'Apurimac', 'Andahuaylas', 'Andahuaylas', 'Av. Los pinos 442');


-- select * from carreras;
insert into carreras values ('1284486', 'CC01', 'Construcción Civil');
insert into carreras values ('1284486', 'GA02', 'Gastronomía');
insert into carreras values ('1284486', 'AM03', 'Construcción de Arte en Madera');

-- select * from docentes;
insert into docentes  values ('32145680', 'Jorge', 'Pablo', 'Apaza', 'gutierrez', 'Ingeniero Civil', 'M', '1984-10-15', '322165487', 'jorge@gmail.com', '', '');
insert into docentes  values ('32145687', 'Juan', '', 'Oreo', 'Cerro', 'Ingeniero de Sistemas', 'M', '1984-10-15', '12365487', 'oreo@gmail.com', '', '');
insert into docentes  values ('32165487', 'Jaime', '', 'Pelaez', 'Peralta', 'Físico y Matemático', 'M', '1987-11-11', '3215487', 'jaime@gmail.com', '', '');
insert into docentes  values ('66549800', 'Martha', '', 'Comilla', 'Valverde', 'Gastrónoma', 'F', '1978-12-15', '654987', 'martha@gmail.com', '', '');
insert into docentes  values ('65487321', 'Mónica', '', 'Saragoza', 'Contreras', 'Economista', 'F', '1982-10-18', '32165487', 'msaragoza@gmail.com', '', '');
insert into docentes  values ('98876542', 'Pablo', '', 'Gómez', 'Albertín', 'Artista plástico', 'M', '1990-08-29', '9865421', 'pablo@gmail.com', '', '');

-- select * from cursos;
insert into cursos values (1,	'CC11',	'Técnicas de Comunicación',	3,	3,	5);
insert into cursos values (1,	'CC12',	'Lógica y Funciones',	4,	3,	6);
insert into cursos values (1,	'CC13',	'Cultura Física y Deporte',	2,	3,	6);
insert into cursos values (1,	'CC14',	'Informática e Internet',	4,	3,	7);
insert into cursos values (1,	'CC15',	'Topografía General',	5,	3,	6);
insert into cursos values (1,	'CC16',	'Dibujo Topográfico Asistido por Computador',	4	,10,	6);
insert into cursos values (1,	'CC17',	'Topografía Para Catastro Urbano Rural',	5,	3,	9);

insert into cursos values (2,	'CC21',	'Dibujo técnico por computadora 2D', 3, 3, 5);
insert into cursos values (2,	'CC22',	'introduccion a la construccion', 4, 3, 6);
insert into cursos values (2,	'CC23',	'fisica para la construccion',	2,	3,	6);
insert into cursos values (2,	'CC24',	'tecnologia de los materiales',	4,	3,	7);
insert into cursos values (2,	'CC25',	'habilidades comunicativas I',	5,	3,	6);
insert into cursos values (2,	'CC26',	'desarrollo personal I',	4	,10,	6);
insert into cursos values (2,	'CC27',	'matematica I',	5,	3,	9);

insert into cursos values (1,	'GA11',	'Sistema Micros',	1,	5,	2);
insert into cursos values (1,	'GA12',	'Lenguaje',	1,	5,	2);
insert into cursos values (1,	'GA13',	'Sanidad e Higiene',	3,	4,	4);
insert into cursos values (1,	'GA14',	'Técnicas de Cocina Básica',	3,	4,	6);
insert into cursos values (1,	'GA15',	'Convivencia y Protocolo',	2,	5,	4);
insert into cursos values (1,	'GA16',	'Ténicas de Pastelería y Panadería',	6,	5,	6);
insert into cursos values (1,	'GA17',	'Economía I ',	3,	5,	3);

insert into cursos values (1, 'AM11',	'Responsabilidad Social',	2,	3,	3);
insert into cursos values (1, 'AM12',	'Dibujo Geométrico',	4,	6,	6);
insert into cursos values (1, 'AM13',	'Historia del Arte',	4,	6,	6);
insert into cursos values (1, 'AM14',	'Anatomía Artística',	6,	6,	6);
insert into cursos values (1, 'AM15',	'Composición',	5,	8,	6);
insert into cursos values (1, 'AM16',	'Dibujo I ',	5,	8,	3);
insert into cursos values (1, 'AM17',	'Antropología Social',	2,	6,	2);

-- select * from docentes_cursos;
insert into docentes_cursos values ('32145687', 'CC14');
insert into docentes_cursos values ('32145687', 'CC16');
insert into docentes_cursos values ('32145687', 'CC21');

insert into docentes_cursos values ('32145680', 'CC15');
insert into docentes_cursos values ('32145680', 'CC17');
insert into docentes_cursos values ('32145680', 'CC22');
insert into docentes_cursos values ('32145680', 'CC24');

insert into docentes_cursos values ('32165487', 'AM12');
insert into docentes_cursos values ('32165487', 'CC12');
insert into docentes_cursos values ('32165487', 'CC23');
insert into docentes_cursos values ('32165487', 'CC27');

insert into docentes_cursos values ('66549800', 'GA13');
insert into docentes_cursos values ('66549800', 'GA14');
insert into docentes_cursos values ('66549800', 'GA16');

insert into docentes_cursos values ('65487321', 'GA11');
insert into docentes_cursos values ('65487321', 'GA17');

insert into docentes_cursos values ('98876542', 'AM13');
insert into docentes_cursos values ('98876542', 'AM14');
insert into docentes_cursos values ('98876542', 'AM15');
insert into docentes_cursos values ('98876542', 'AM16');


-- select * from carreras_cursos;
insert into carreras_cursos values ('CC01', 'CC11');
insert into carreras_cursos values ('CC01', 'CC12');
insert into carreras_cursos values ('CC01', 'CC13');
insert into carreras_cursos values ('CC01', 'CC14');
insert into carreras_cursos values ('CC01', 'CC15');
insert into carreras_cursos values ('CC01', 'CC16');
insert into carreras_cursos values ('CC01', 'CC17');

-- 2 ciclo:
insert into carreras_cursos values ('CC01', 'CC21');
insert into carreras_cursos values ('CC01', 'CC22');
insert into carreras_cursos values ('CC01', 'CC23');
insert into carreras_cursos values ('CC01', 'CC24');
insert into carreras_cursos values ('CC01', 'CC25');
insert into carreras_cursos values ('CC01', 'CC26');
insert into carreras_cursos values ('CC01', 'CC27');

insert into carreras_cursos values ('GA02', 'GA11');
insert into carreras_cursos values ('GA02', 'GA12');
insert into carreras_cursos values ('GA02', 'GA13');
insert into carreras_cursos values ('GA02', 'GA14');
insert into carreras_cursos values ('GA02', 'GA15');
insert into carreras_cursos values ('GA02', 'GA16');
insert into carreras_cursos values ('GA02', 'GA17');

insert into carreras_cursos values ('AM03', 'AM11');
insert into carreras_cursos values ('AM03', 'AM12');
insert into carreras_cursos values ('AM03', 'AM13');
insert into carreras_cursos values ('AM03', 'AM14');
insert into carreras_cursos values ('AM03', 'AM15');
insert into carreras_cursos values ('AM03', 'AM16');
insert into carreras_cursos values ('AM03', 'AM17');

-- select * from estudiantes;
insert into estudiantes values ('65498720', 'Jehú', '', 'Sáenz', 'Torres', 'M', '1986-03-15', 'NO', '32165487', 'jehu@gmail.com', '', '', '');
insert into estudiantes values ('70645815', 'Alejandro', '', 'Rosales', 'García', 'M', '1998-12-09', 'NO', '8975487', 'alejo@gmail.com', '', '', '');
insert into estudiantes values ('70652030', 'Rodrigo', '', 'Portocarrero', 'gómez', 'M', '1996-12-04', 'NO', '9875887', 'rod@gmail.com', '', '', '');
insert into estudiantes values ('65498721', 'Paola', '', 'Monarte', 'Caballero', 'F', '1997-12-02', 'NO', '98755421', 'paola@gmail.com', '', '', '');
insert into estudiantes values ('32116548', 'Mirtha', 'Julisa', 'Altamirano', 'Solano', 'F', '1999-09-18', 'NO', '32165487', 'mirtha@gmail.com', '', '', '');
insert into estudiantes values ('98874517', 'Ana', 'Rosa', 'Mortadella', 'Durán', 'F', '1992-01-15', 'NO', '654987', 'ana@gmail.com', '', '', '');
insert into estudiantes values ('84643210', 'Mauricio', '', 'Caballero', 'Fuentes', 'M', '1995-01-15', 'NO', '3216578', 'mauricio@gmail.com', '', '', '');

-- select * from matriculas;

insert into matriculas values ('65498720', 'CC11');
insert into matriculas values ('65498720', 'CC12');
insert into matriculas values ('65498720', 'CC13');
insert into matriculas values ('65498720', 'CC14');
insert into matriculas values ('65498720', 'CC15');
insert into matriculas values ('65498720', 'CC16');
insert into matriculas values ('65498720', 'CC17');

insert into matriculas values ('70652030', 'CC11');
insert into matriculas values ('70652030', 'CC12');
insert into matriculas values ('70652030', 'CC13');
insert into matriculas values ('70652030', 'CC14');
insert into matriculas values ('70652030', 'CC15');
insert into matriculas values ('70652030', 'CC16');
insert into matriculas values ('70652030', 'CC17');

insert into matriculas values ('70645815', 'CC21');
insert into matriculas values ('70645815', 'CC22');
insert into matriculas values ('70645815', 'CC23');
insert into matriculas values ('70645815', 'CC24');
insert into matriculas values ('70645815', 'CC25');
insert into matriculas values ('70645815', 'CC26');
insert into matriculas values ('70645815', 'CC27');

insert into matriculas values ('32116548', 'GA11');
insert into matriculas values ('32116548', 'GA12');
insert into matriculas values ('32116548', 'GA13');
insert into matriculas values ('32116548', 'GA14');
insert into matriculas values ('32116548', 'GA15');
insert into matriculas values ('32116548', 'GA16');
insert into matriculas values ('32116548', 'GA17');

insert into matriculas values ('65498721', 'GA11');
insert into matriculas values ('65498721', 'GA12');
insert into matriculas values ('65498721', 'GA13');
insert into matriculas values ('65498721', 'GA14');
insert into matriculas values ('65498721', 'GA15');
insert into matriculas values ('65498721', 'GA16');
insert into matriculas values ('65498721', 'GA17');

insert into matriculas values ('98874517', 'GA11');
insert into matriculas values ('98874517', 'GA12');
insert into matriculas values ('98874517', 'GA13');
insert into matriculas values ('98874517', 'GA14');
insert into matriculas values ('98874517', 'GA15');
insert into matriculas values ('98874517', 'GA16');
insert into matriculas values ('98874517', 'GA17');

insert into matriculas values ('84643210', 'AM11');
insert into matriculas values ('84643210', 'AM12');
insert into matriculas values ('84643210', 'AM13');
insert into matriculas values ('84643210', 'AM14');
insert into matriculas values ('84643210', 'AM15');
insert into matriculas values ('84643210', 'AM16');
insert into matriculas values ('84643210', 'AM17');
/*-- insertar de manera rapida:
 insert into matriculas (dni_estudiante, cod_curso)
 select e.dni, cc.codigo_curso
from estudiantes e join carreras_cursos cc
where e.dni="36587456" and cc.codigo_curso like ('AM1%');

-- ------
 select * from matriculas where dni_estudiante='36587456';
select e.dni, cc.codigo_curso
from estudiantes e join carreras_cursos cc
where e.dni="36587456" and cc.codigo_curso like ('CC%');

select * from estudiantes where p_nombre='lola';*/



-- select * from notas;
insert into notas values ('65498720', 'CC11', 1, 15, 18, 12, 15);
insert into notas values ('65498720', 'CC11', 2, 16, 16, 16, 16);
insert into notas values ('65498720', 'CC11', 3, 14, 14, 14, 14);

insert into notas values ('65498720', 'CC12', 1, 15, 18, 12, 15);
insert into notas values ('65498720', 'CC12', 2, 16, 16, 16, 16);
insert into notas values ('65498720', 'CC12', 3, 14, 16, 14, 13);

insert into notas values ('65498720', 'CC13', 1, 15, 15, 12, 14);
insert into notas values ('65498720', 'CC13', 2, 16, 16, 16, 16);
insert into notas values ('65498720', 'CC13', 3, 14, 16, 14, 13);
insert into notas values ('65498720', 'CC13', 4, 14, 16, 14, 13);

insert into notas values ('98874517', 'GA11', 1, 14, 16, 14, 14);
insert into notas values ('98874517', 'GA11', 2, 14, 16, 14, 15);
insert into notas values ('98874517', 'GA11', 3, 14, 16, 10, 13);

insert into notas values ('98874517', 'GA12', 1, 14, 16, 14, 14);
insert into notas values ('98874517', 'GA12', 2, 14, 16, 14, 15);
insert into notas values ('98874517', 'GA12', 3, 14, 16, 10, 13);

insert into notas values ('98874517', 'GA13', 1, 11, 10, 14, 19);
insert into notas values ('98874517', 'GA13', 2, 14, 16, 5, 15);
insert into notas values ('98874517', 'GA13', 3, 14, 17, 10, 13);
insert into notas values ('98874517', 'GA13', 4, 8, 16, 9, 19);

delete from notas where codigo_curso='GA13';
-- select * from actitudinal;
insert into actitudinal values ('65498720', 'CC11', 1, 15, 15, 15,12,11,13,'');
insert into actitudinal values ('65498720', 'CC11', 2, 11, 15, 12,12,11,13,'');
insert into actitudinal values ('65498720', 'CC11', 3, 15, 15, 15,12,11,13,'');
insert into actitudinal values ('65498720', 'CC12', 1, 15, 15, 15,12,11,13,'poco puntual');
insert into actitudinal values ('65498720', 'CC12', 2, 18, 11, 12,12,11,12,'poco puntual');
insert into actitudinal values ('65498720', 'CC12', 3, 15, 15, 15,12,11,13,'poco puntual');

insert into actitudinal values ('98874517', 'GA11', 1, 15, 15, 15,12,11,13,'');
insert into actitudinal values ('98874517', 'GA11', 2, 15, 15, 15,12,11,13,'');
insert into actitudinal values ('98874517', 'GA11', 3, 15, 15, 15,12,11,13,'');
insert into actitudinal values ('98874517', 'GA12', 1, 15, 15, 15,12,11,13,'');
insert into actitudinal values ('98874517', 'GA12', 2, 15, 15, 15,12,11,13,'');
insert into actitudinal values ('98874517', 'GA12', 3, 15, 15, 15,12,11,13,'');

/*select * from notas where dni_estudiante ="98874517";
select * from actitudinal where dni_estudiante="98874517";*/

