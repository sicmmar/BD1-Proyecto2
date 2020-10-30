use PROYECTO2;

create table tmp_1(
	invento varchar(150) null,
    inventor varchar(150) null,
    profesional_asg_al_invento varchar(150) null,
    prof_es_jefe_del_area varchar(95) null,
    fecha_contrato date null,
    salario int null,
    comision int null default 0,
    area_invest_prof varchar(95) null,
    ranking int null,
    anio_invento int null,
    pais_invento varchar(150) null,
    pais_inventor varchar(150) null,
    region_pais varchar(150) null,
    capital varchar(150) null,
    poblacion_pais int null,
    area_km2 int null,
    frontera_con varchar(150) null,
    norte character null,
    sur character null,
    este character null,
    oeste character null
);

create table tmp_2(
	nombre_encuesta varchar(150) null,
    pregunta varchar(700) null,
    respuesta_posible varchar(300) null,
    respuesta_correcta varchar(300) null,
    pais varchar(150) null,
    respuesta_pais character null
);

create table tmp_3(
	nombre_region varchar(150) null,
    region_padre varchar(150) null
);

LOAD DATA LOCAL INFILE '/tmp/Datos/CargaP-III.csv'
INTO table tmp_3
FIELDS terminated by ';' ENCLOSED BY '"'
lines TERMINATED BY '\n'
ignore 1 rows;

select count(*) from tmp_1;

LOAD DATA LOCAL INFILE '/tmp/Datos/CargaP-II.csv'
INTO table tmp_2
FIELDS terminated by ';' ENCLOSED BY '"'
lines TERMINATED BY '\n'
ignore 1 rows;

select * from tmp_2;

LOAD DATA LOCAL INFILE '/tmp/Datos/CargaP-I.csv'
INTO table tmp_1
FIELDS terminated by ';' ENCLOSED BY '"'
lines TERMINATED BY '\n'
ignore 1 rows
(invento,inventor,profesional_asg_al_invento,prof_es_jefe_del_area,@fecha_contrato,salario,comision,area_invest_prof,ranking,anio_invento,pais_invento,pais_inventor,region_pais,capital,
poblacion_pais,area_km2,frontera_con,norte,sur,este,oeste)
SET fecha_contrato = STR_TO_DATE(@fecha_contrato, '%d-%b-%Y');

select * from tmp_1;