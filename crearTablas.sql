create table profesional (
    cod_profesional int not null auto_increment,
    nombre varchar(150) not null,
    fecha_contrato date not null,
    salario int not null,
    comision int,
    constraint primary key ( cod_profesional )
);/* 12 */
/* drop table profesional; */

create table continente (
    cod_continente int not null auto_increment,
    continente varchar(100) not null,
    constraint primary key ( cod_continente )
); /* 5 */
/* drop table continente; */

create table encuesta (
    cod_encuesta int not null auto_increment,
    encuesta varchar(150) not null,
    constraint primary key ( cod_encuesta )
); /* 2 */
/* drop table encuesta; */

create table area (
    cod_area int not null auto_increment,
    area varchar(150) not null,
    cod_profesional  int null,
    constraint primary key ( cod_area ),
    constraint area_profesional_fk foreign key ( cod_profesional ) references profesional ( cod_profesional )
); /* 8 */
/* drop table area; */

create table region (
    cod_region int not null auto_increment,
    region varchar(150) not null,
    cod_continente int not null,
    constraint primary key ( cod_region ),
    constraint region_continente_fk foreign key ( cod_continente ) references continente ( cod_continente )
); /* 16 */
/* drop table region; */

create table pais (
    cod_pais int not null auto_increment,
    pais varchar(150) not null,
    capital varchar(150) not null,
    poblacion int not null,
    area_km2 int not null,
    cod_region int,
    cod_continente int,
    constraint primary key ( cod_pais ),
    constraint pais_region_fk foreign key ( cod_region ) references region ( cod_region ),
    constraint arc_reg check ( ( ( cod_region is not null ) and ( cod_continente is null ) )
	or ( ( cod_continente is not null ) and ( cod_region is null ) ) )
); /* 169 */
/* drop table pais; */

create table frontera (
	cod_frontera int not null auto_increment,
    norte varchar(1),
    sur varchar(1),
    este varchar(1),
    oeste varchar(1),
    cod_pais int not null,
    es_frontera int not null,
    constraint primary key ( cod_frontera ),
    constraint frontera_pais_fk foreign key ( cod_pais ) references pais ( cod_pais ),
    constraint frontera_pais_fk2 foreign key ( es_frontera ) references pais ( cod_pais )
); /* 488 */
/* drop table frontera; */

create table pregunta (
    cod_pregunta int not null auto_increment,
    pregunta varchar(500) not null,
    cod_encuesta  int not null,
    constraint primary key ( cod_pregunta ),
    constraint pregunta_encuesta_fk foreign key ( cod_encuesta ) references encuesta ( cod_encuesta )
); /* 14 */
/* drop table pregunta; */

create table respuesta (
    cod_respuesta int not null auto_increment,
    respuesta varchar(500) not null,
    cod_pregunta int not null,
    constraint primary key ( cod_respuesta ),
    constraint respuesta_pregunta_fk foreign key ( cod_pregunta ) references pregunta ( cod_pregunta )
); /* 53 */
/* drop table respuesta; */

create table pais_respuesta (
	cod_pais_respuesta int not null auto_increment,
    cod_pais int not null,
    cod_respuesta int not null,
    constraint primary key ( cod_pais_respuesta ),
    constraint pais_respuesta_pais_fk foreign key ( cod_pais ) references pais ( cod_pais ),
    constraint pais_respuesta_respuesta_fk foreign key ( cod_respuesta ) references respuesta ( cod_respuesta )
); /* 1412 */
/* drop table pais_respuesta; */

create table resp_corr (
    cod_pregunta int not null,
    cod_respuesta int not null,
    constraint primary key ( cod_respuesta, cod_pregunta ),
    constraint resp_corr_pregunta_fk foreign key ( cod_pregunta ) references pregunta ( cod_pregunta ),
    constraint resp_corr_respuesta_fk foreign key ( cod_respuesta ) references respuesta ( cod_respuesta )
); /* 12 */
/* drop table resp_corr; */

create table invento (
    cod_invento int not null auto_increment,
    nombre varchar(150) not null,
    anio_invento int not null,
    rankinkg int not null,
    cod_pais int,
    constraint primary key ( cod_invento ),
    constraint invento_pais_fk foreign key ( cod_pais )references pais ( cod_pais )
); /* 154 */
/* drop table invento; */

create table inventor (
    cod_inventor int not null auto_increment,
    nombre varchar(150) not null,
    cod_pais int,
    constraint primary key ( cod_inventor ),
    constraint inventor_pais_fk foreign key ( cod_pais ) references pais ( cod_pais )
); /* 145 */
/* drop table inventor; */

create table inventado (
    cod_invento int not null,
    cod_inventor int not null,
    constraint primary key ( cod_invento, cod_inventor ),
    constraint inventado_invento_fk foreign key ( cod_invento ) references invento ( cod_invento ),
    constraint inventado_inventor_fk foreign key ( cod_inventor ) references inventor ( cod_inventor )
); /* 156 */
/* drop table inventado; */

create table asg_invento (
    cod_profesional int not null,
    cod_invento int not null,
    constraint primary key ( cod_profesional, cod_invento ),
    constraint asg_invento_invento_fk foreign key ( cod_invento ) references invento ( cod_invento ),
    constraint asg_invento_profesional_fk foreign key ( cod_profesional ) references profesional ( cod_profesional )
); /* 154 */
/* drop table asg_invento; */

create table profe_area (
    cod_area int not null,
    cod_profesional int not null,
    constraint primary key ( cod_area, cod_profesional ),
    constraint profe_area_area_fk foreign key ( cod_area ) references area ( cod_area ),
    constraint profe_area_profesional_fk foreign key ( cod_profesional ) references profesional ( cod_profesional )
); /* 25 */
/* drop table profe_area */
