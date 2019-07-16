-- consultas:
select * from administradores;
select * from docentes;

select * from docentes_cursos;

insert into docentes values ('00000078', 'prueba', 'prueba', 'pruba', 'prueba', 'profe', 'M', '1994/02/02', '98754641', '','los nogales', '');

insert into docentes_cursos values ('00000078', 'GA11');

select dni, password from administradores where dni='70669128';
select dni, p_nombre, apellido_p, password from docentes where dni='70669128';

insert into administradores values ('70669128', 'jsanchez', '');

select dni, password from administradores where dni='70669128' and password='root';
select dni, password from docentes where dni='70669128' and password='pass';
select dni, password from estudiantes where dni='70669128' and password='root';
select * from administradores where dni='jsanchez' or username='jsanchez';

select dni, password from administradores where password='pass' and (dni='70669128' xor username='70669128');
select dni, password from administradores where (dni='70669128' xor username='70669128') and (password='pass');

select * from administradores;
select * from docentes;
select * from estudiantes;


select * from docentes where dni='32145680' and not length(password) = 0;
-- fin vertedero ----

-- --------------------------------------------------------------------
-- cursos y la carrera a la que pertenecen:
select c.codigo, c.nombre, c.creditos, c.unidades, c.horas_sem, r.nombre as carrera, c.ciclo
from cursos c join carreras r join carreras_cursos cc
on (c.codigo=cc.codigo_curso and cc.codigo_carrera=r.codigo);

-- select * from cursos;
select * from cursos;
select * from cursos where codigo='GA22';
select * from carreras_cursos where codigo_curso='GA22';
select * from carreras_cursos;


update cursos set ciclo=1 where codigo='AM21';

update cursos set ciclo=1,codigo='AM21',nombre='Arte en Madera Podrida',creditos=5,unidades=3,horas_sem=5 where codigo='AM21';

select * from carreras;

insert into carreras values ('1284486', 'CH04', 'Ciencias y humanidades');


delete from carreras_cursos where codigo_carrera='CH04';
delete from carreras where codigo='CH04';

insert into carreras_cursos values ('CH04', 'CH11');

select codigo, nombre from carreras;

select * from carreras_cursos where codigo_carrera='CH04';

select * from estudiantes;

select * from administradores;

-- ---------------------------------------------------------------------------------------------------------------------
-- ---------------------------------------------------------------------------------------------------------------------

select * from administradores;
select * from docentes;
select * from docentes_cursos;
select * from cursos;
select * from carreras_cursos;
select * from carreras;
select * from estudiantes;

-- Estudiantes y las carreras que estudian:
select distinct e.dni, e.p_nombre, e.apellido_p,e.apellido_m, e.genero, c.ciclo, r.nombre as carrera
from estudiantes e join matriculas m join cursos c join carreras_cursos cc join carreras r
on (e.dni=m.dni_estudiante and m.cod_curso=c.codigo and c.codigo=cc.codigo_curso and cc.codigo_carrera=r.codigo);

-- Estudiante y carrera que estudia:
select distinct r.nombre as carrera
from estudiantes e join matriculas m join cursos c join carreras_cursos cc join carreras r
on (e.dni=m.dni_estudiante and m.cod_curso=c.codigo and c.codigo=cc.codigo_curso and cc.codigo_carrera=r.codigo)
where e.dni='65498720';

-- docentes y cursos que dictan:
select c.nombre, d.p_nombre, d.apellido_p
from cursos c join docentes_cursos dc join docentes d
on (c.codigo=dc.codigo_curso and dc.dni_docente=d.dni);

-- carreras y sus respectivos cursos:
select r.nombre as carrera, c.nombre as curso, c.ciclo
from carreras r join carreras_cursos cc join cursos c
on (r.codigo=cc.codigo_carrera and cc.codigo_curso=c.codigo);

-- datos curso y carrera a la que pertenece:
select c.codigo, c.nombre as curso, c.creditos, c.unidades, c.horas_sem, r.nombre as carrera, c.ciclo
from cursos c join carreras_cursos cc join carreras r
on (c.codigo=cc.codigo_curso and cc.codigo_carrera=r.codigo)
where r.codigo='CH04';

-- carrera y cursos asignados a los docentes:
select r.nombre as carrera, c.nombre as curso, c.ciclo, d.p_nombre, d.apellido_p
from carreras r join carreras_cursos cc join cursos c join docentes d join docentes_cursos dc
on (r.codigo=cc.codigo_carrera and cc.codigo_curso=c.codigo and d.dni=dc.dni_docente and dc.codigo_curso=c.codigo);

-- carrera y cursos asignados a los docentes filtrado:
select r.nombre as carrera, c.codigo, c.nombre as curso, c.ciclo, d.p_nombre, d.apellido_p
from carreras r join carreras_cursos cc join cursos c join docentes d join docentes_cursos dc
on (r.codigo=cc.codigo_carrera and cc.codigo_curso=c.codigo and d.dni=dc.dni_docente and dc.codigo_curso=c.codigo)
where r.codigo='CC01' and c.codigo='CC12';

-- Mostrar docente a cargo de un curso y carrera ya filtrados:
select d.dni, d.p_nombre as nombre, d.apellido_p, d.apellido_m, d.titulo_prof
from carreras r join carreras_cursos cc join cursos c join docentes d join docentes_cursos dc
on (r.codigo=cc.codigo_carrera and cc.codigo_curso=c.codigo and d.dni=dc.dni_docente and dc.codigo_curso=c.codigo)
where r.codigo='CC01' and c.codigo='CC12';

-- Cursos asignados a un docente:
select r.nombre as carrera, c.codigo, c.nombre as curso, c.ciclo, d.p_nombre, d.apellido_p
from carreras r join carreras_cursos cc join cursos c join docentes d join docentes_cursos dc
on (r.codigo=cc.codigo_carrera and cc.codigo_curso=c.codigo and d.dni=dc.dni_docente and dc.codigo_curso=c.codigo)
where d.dni='32165498' and c.codigo not like ('FI11') or d.dni='98745632' and c.codigo not like ('FI11');

-- Notas de estudiantes:
select e.dni, e.p_nombre, e.apellido_p, c.codigo, c.nombre, n.unidad, n.cc, n.cp, n.ca
from estudiantes e join matriculas m join cursos c join notas n
on (e.dni=m.dni_estudiante and m.cod_curso=c.codigo and m.dni_estudiante=n.dni_estudiante and m.cod_curso=n.codigo_curso);

-- Notas de un estudiante filtrado:
select c.nombre as curso, c.creditos, n.unidad, n.cc, n.cp, n.ca
from estudiantes e join matriculas m join cursos c join notas n
on (e.dni=m.dni_estudiante and m.cod_curso=c.codigo and m.dni_estudiante=n.dni_estudiante and m.cod_curso=n.codigo_curso)
where e.dni='65498720';

-- avance academico:
select c.codigo, c.nombre as curso, c.creditos, d.p_nombre, d.apellido_p, d.apellido_m, n.unidad, n.cc, n.cp, n.ca
from estudiantes e join matriculas m join cursos c join notas n join docentes d join docentes_cursos dc
            on (e.dni = m.dni_estudiante and m.cod_curso = c.codigo and m.dni_estudiante = n.dni_estudiante and
                m.cod_curso = n.codigo_curso and d.dni = dc.dni_docente and dc.codigo_curso = c.codigo)
where e.dni = '65498720';

-- Avance academico detallado:
select c.codigo, c.nombre as curso, c.creditos, d.p_nombre, d.apellido_p, d.apellido_m, c.creditos,
                                   max(case when unidad=1 then cc end) Unidad11,
                                   max(case when unidad=1 then cp end) Unidad12,
                                   max(case when unidad=1 then ca end) Unidad13,
                                   max(case when unidad=1 then promedio end) Promedio1,
                                   max(case when unidad=2 then cc end) Unidad21,
                                   max(case when unidad=2 then cp end) Unidad22,
                                   max(case when unidad=2 then ca end) Unidad23,
                                   max(case when unidad=2 then promedio end) Promedio2,
                                   max(case when unidad=3 then cc end) Unidad31,
                                   max(case when unidad=3 then cp end) Unidad32,
                                   max(case when unidad=3 then ca end) Unidad33,
                                   max(case when unidad=3 then promedio end) Promedio3,
                                   max(case when unidad=4 then cc end) Unidad41,
                                   max(case when unidad=4 then cp end) Unidad42,
                                   max(case when unidad=4 then ca end) Unidad43,
                                   max(case when unidad=4 then promedio end) Promedio4
from estudiantes e join matriculas m join cursos c join notas n join docentes d join docentes_cursos dc
            on (e.dni = m.dni_estudiante and m.cod_curso = c.codigo and m.dni_estudiante = n.dni_estudiante and
                m.cod_curso = n.codigo_curso and d.dni = dc.dni_docente and dc.codigo_curso = c.codigo)
where e.dni = '98874517'
group by n.codigo_curso;

-- Ficha de matricula:
select * from matriculas where dni_estudiante='98874517';
select c.codigo, c.nombre as curso, c.ciclo, c.creditos, d.p_nombre, d.apellido_p, d.apellido_m
from estudiantes e join matriculas m join cursos c join docentes d join docentes_cursos dc
on (e.dni=m.dni_estudiante and m.cod_curso=c.codigo and d.dni=dc.dni_docente and dc.codigo_curso=c.codigo)
where e.dni='98874517';

-- Constancia de notas:
select c.codigo, c.nombre as curso, c.ciclo, c.creditos, round(avg(n.promedio)) as promedio
from estudiantes e join matriculas m join cursos c join notas n
on (e.dni=m.dni_estudiante and m.cod_curso=c.codigo and m.dni_estudiante=n.dni_estudiante and m.cod_curso=n.codigo_curso)
where e.dni='98874517'
group by c.codigo;



select nombre, creditos from cursos;

insert into docentes_cursos values ('65487321', 'CC11');
insert into docentes_cursos values ('98876542', 'CC13');

select dni_estudiante, codigo_curso, unidad, cc, cp, ca, promedio, avg(promedio)
from notas
where dni_estudiante='65498720'
group by codigo_curso;

select * from notas where dni_estudiante='65498720';


-- Nota de los estudiantes agrupado por curso:
select dni_estudiante, codigo_curso,max(case when unidad=1 then cc end) Unidad1,
                                   max(case when unidad=1 then cp end) Unidad1,
                                   max(case when unidad=1 then ca end) Unidad1,
                                   max(case when unidad=1 then promedio end) Promedio,
                                   max(case when unidad=2 then cc end) Unidad2,
                                   max(case when unidad=2 then cp end) Unidad2,
                                   max(case when unidad=2 then ca end) Unidad2,
                                   max(case when unidad=2 then promedio end) Promedio,
                                   max(case when unidad=3 then cc end) Unidad3,
                                   max(case when unidad=3 then cp end) Unidad3,
                                   max(case when unidad=3 then ca end) Unidad3,
                                   max(case when unidad=3 then promedio end) Promedio,
                                   max(case when unidad=4 then cc end) Unidad4,
                                   max(case when unidad=4 then cp end) Unidad4,
                                   max(case when unidad=4 then ca end) Unidad4,
                                   max(case when unidad=4 then promedio end) Promedio
from notas

group by codigo_curso;

--------------------------------------------------------------------------------------
   dni    | curso|  unidad 1   | P| unidad 2  | P|  unidad 3    | P|  unidad 4    | P|
--------------------------------------------------------------------------------------
65498720	| CC11 |  15	18	12 |15|	16	16 16	|16|  14	14	14	|14|				      |  |
65498720	| CC12 |  15	18	12 |15|	16	16 16	|16|  14	16	14	|13|				      |  |
65498720	| CC13 |  15	15	12 |14|	16	16 16	|16|  14	16	14	|13|	14	16	14	|13|
98874517	| GA11 |  14	16	14 |14|	14	16 14	|15|	14	16	10	|13|				      |  |
98874517	| GA12 |  14	16	14 |14|	14	16 14	|15|	14	16	10	|13|				      |  |
98874517	| GA13 |  11	10	14 |19|	14	16 05 |15|	14	17	10	|13|	08	16	09	|19|



select * from actitudinal;
-- ---------
delete from carreras_cursos where codigo_curso='CC41';
select * from carreras_cursos where codigo_carrera='CH04';
select * from cursos where codigo like ('CH%');
select * from carreras where codigo='CH04';

--
insert into carreras values ('1284486', 'CH04', 'Ciencias y humanidades');
insert into cursos values (1, 'CH11', 'literatura',3, 3, 3);
insert into carreras_cursos values ('CH04', 'CH11');
--
select * from docentes_cursos;
select * from docentes_cursos where codigo_curso='GA12';
select * from docentes_cursos where dni_docente='32165487';
select codigo, nombre from carreras;
select * from estudiantes;
select * from docentes;
select * from matriculas where dni_estudiante='10000008';

update docentes set titulo_prof='Físico matemático' where dni='32165487'

insert docentes_cursos values ('32165498', 'CH12');
insert docentes_cursos values ('32165498', 'FI11');
insert docentes_cursos values ('98745632', 'FI11');
insert docentes_cursos values ('98745632', 'FI12');
insert docentes_cursos values ('32165498', 'GA12');

select * from estudiantes where isempty(password);

select * from administradores where dni='';
select * from;

select * from administradores where username='admin' and not length(password) = 0;