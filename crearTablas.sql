create table profesional (
    cod_profesional int not null,
    fecha_contrato date not null,
    salario int not null,
    comision int,
    constraint primary key ( cod_profesional )
);

create table continente (
    cod_continente int not null,
    continente varchar(100) not null,
    constraint primary key ( cod_continente )
);

create table encuesta (
    cod_encuesta int not null,
    encuesta varchar(150) not null,
    constraint primary key ( cod_encuesta )
);

create table area (
    cod_area int not null,
    area varchar(150) not null,
    cod_profesional  int not null,
    constraint primary key ( cod_area ),
    constraint area_profesional_fk foreign key ( cod_profesional ) references profesional ( cod_profesional )
);

create table region (
    cod_region int not null,
    region varchar(150) not null,
    cod_continente int not null,
    constraint primary key ( cod_region ),
    constraint region_continente_fk foreign key ( cod_continente ) references continente ( cod_continente )
);

create table pais (
    cod_pais int not null,
    pais varchar(150) not null,
    capital varchar(150) not null,
    poblacion int not null,
    area_km2 int not null,
    cod_region int not null,
    constraint primary key ( cod_pais ),
    constraint pais_region_fk foreign key ( cod_region ) references region ( cod_region )
);

create table frontera (
    norte varchar(1),
    sur varchar(1),
    este varchar(1),
    oeste varchar(1),
    cod_pais int not null,
    es_frontera int not null,
    constraint primary key ( cod_pais, es_frontera ),
    constraint frontera_pais_fk foreign key ( cod_pais ) references pais ( cod_pais ),
    constraint frontera_pais_fk2 foreign key ( es_frontera ) references pais ( cod_pais )
);

create table pregunta (
    cod_pregunta int not null,
    pregunta varchar(500) not null,
    cod_encuesta  int not null,
    constraint primary key ( cod_pregunta ),
    constraint pregunta_encuesta_fk foreign key ( cod_encuesta ) references encuesta ( cod_encuesta )
);

create table respuesta (
    cod_respuesta int not null,
    respuesta varchar(500) not null,
    cod_pregunta int not null,
    constraint primary key ( cod_respuesta ),
    constraint respuesta_pregunta_fk foreign key ( cod_pregunta ) references pregunta ( cod_pregunta )
);

create table pais_respuesta (
    cod_pais int not null,
    cod_respuesta int not null,
    constraint primary key ( cod_pais, cod_respuesta ),
    constraint pais_respuesta_pais_fk foreign key ( cod_pais ) references pais ( cod_pais ),
    constraint pais_respuesta_respuesta_fk foreign key ( cod_respuesta ) references respuesta ( cod_respuesta )
);

create table resp_corr (
    cod_resp_corr int not null,
    cod_pregunta int not null,
    cod_respuesta int not null,
    constraint primary key ( cod_respuesta ),
    constraint resp_corr_pregunta_fk foreign key ( cod_pregunta ) references pregunta ( cod_pregunta ),
    constraint resp_corr_respuesta_fk foreign key ( cod_respuesta ) references respuesta ( cod_respuesta )
);

create table invento (
    cod_invento int not null,
    nombre varchar(150) not null,
    anio_invento int not null,
    rankinkg int not null,
    cod_pais int,
    constraint primary key ( cod_invento ),
    constraint invento_pais_fk foreign key ( cod_pais )references pais ( cod_pais )
);

create table inventor (
    cod_inventor int not null,
    nombre varchar(150) not null,
    cod_pais int,
    constraint primary key ( cod_inventor ),
    constraint inventor_pais_fk foreign key ( cod_pais ) references pais ( cod_pais )

);

create table inventado (
    cod_invento int not null,
    cod_inventor int not null,
    constraint primary key ( cod_invento, cod_inventor ),
    constraint inventado_invento_fk foreign key ( cod_invento ) references invento ( cod_invento ),
    constraint inventado_inventor_fk foreign key ( cod_inventor ) references inventor ( cod_inventor )
);

create table asg_invento (
    cod_profesional int not null,
    cod_invento int not null,
    constraint primary key ( cod_profesional, cod_invento ),
    constraint asg_invento_invento_fk foreign key ( cod_invento ) references invento ( cod_invento ),
    constraint asg_invento_profesional_fk foreign key ( cod_profesional ) references profesional ( cod_profesional )
);

create table profe_area (
    cod_area int not null,
    cod_profesional int not null,
    constraint primary key ( cod_area, cod_profesional ),
    constraint profe_area_area_fk foreign key ( cod_area ) references area ( cod_area ),
    constraint profe_area_profesional_fk foreign key ( cod_profesional ) references profesional ( cod_profesional )
);