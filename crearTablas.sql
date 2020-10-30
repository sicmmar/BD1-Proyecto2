create table area (
    cod_area                     INTEGER NOT NULL,
    area                         varchar(150) NOT NULL,
    profesional_cod_profesional  INTEGER NOT NULL
);

ALTER TABLE area ADD CONSTRAINT area_pk PRIMARY KEY ( cod_area );

create table asg_invento (
    profesional_cod_profesional  INTEGER NOT NULL,
    invento_cod_invento          INTEGER NOT NULL
);

ALTER TABLE asg_invento ADD CONSTRAINT asg_invento_pk PRIMARY KEY ( profesional_cod_profesional,
                                                                    invento_cod_invento );

create table continente (
    cod_continente  INTEGER NOT NULL,
    continente      varchar(100) NOT NULL
);

ALTER TABLE continente ADD CONSTRAINT continente_pk PRIMARY KEY ( cod_continente );

create table encuesta (
    cod_encuesta  INTEGER NOT NULL,
    encuesta      varchar(150) NOT NULL
);

ALTER TABLE encuesta ADD CONSTRAINT encuesta_pk PRIMARY KEY ( cod_encuesta );

create table frontera (
    norte           CHAR(1),
    sur             CHAR(1),
    este            CHAR(1),
    oeste           CHAR(1),
    pais_cod_pais   INTEGER NOT NULL,
    pais_cod_pais1  INTEGER NOT NULL
);

ALTER TABLE frontera ADD CONSTRAINT frontera_pk PRIMARY KEY ( pais_cod_pais,
                                                              pais_cod_pais1 );

create table inventado (
    invento_cod_invento    INTEGER NOT NULL,
    inventor_cod_inventor  INTEGER NOT NULL
);

ALTER TABLE inventado ADD CONSTRAINT inventado_pk PRIMARY KEY ( invento_cod_invento,
                                                                inventor_cod_inventor );

create table invento (
    cod_invento    INTEGER NOT NULL,
    nombre         varchar(150) NOT NULL,
    anio_invento   INTEGER NOT NULL,
    rankinkg       INTEGER NOT NULL,
    pais_cod_pais  INTEGER
);

ALTER TABLE invento ADD CONSTRAINT invento_pk PRIMARY KEY ( cod_invento );

create table inventor (
    cod_inventor   INTEGER NOT NULL,
    nombre         varchar(150) NOT NULL,
    pais_cod_pais  INTEGER
);

ALTER TABLE inventor ADD CONSTRAINT inventor_pk PRIMARY KEY ( cod_inventor );

create table pais (
    cod_pais           INTEGER NOT NULL,
    pais               varchar(150) NOT NULL,
    capital            varchar(150) NOT NULL,
    poblacion          INTEGER NOT NULL,
    area_km2           INTEGER NOT NULL,
    region_cod_region  INTEGER NOT NULL
);

ALTER TABLE pais ADD CONSTRAINT pais_pk PRIMARY KEY ( cod_pais );

create table pais_respuesta (
    pais_cod_pais            INTEGER NOT NULL,
    respuesta_cod_respuesta  INTEGER NOT NULL
);

ALTER TABLE pais_respuesta ADD CONSTRAINT pais_respuesta_pk PRIMARY KEY ( pais_cod_pais,
                                                                          respuesta_cod_respuesta );

create table pregunta (
    cod_pregunta           INTEGER NOT NULL,
    pregunta               varchar(500) NOT NULL,
    encuesta_cod_encuesta  INTEGER NOT NULL
);

ALTER TABLE pregunta ADD CONSTRAINT pregunta_pk PRIMARY KEY ( cod_pregunta );

create table profe_area (
    area_cod_area                INTEGER NOT NULL,
    profesional_cod_profesional  INTEGER NOT NULL
);

ALTER TABLE profe_area ADD CONSTRAINT profe_area_pk PRIMARY KEY ( area_cod_area,
                                                                  profesional_cod_profesional );

create table profesional (
    cod_profesional  INTEGER NOT NULL,
    fecha_contrato   DATE NOT NULL,
    salario          INTEGER NOT NULL,
    comision         INTEGER
);

ALTER TABLE profesional ADD CONSTRAINT profesional_pk PRIMARY KEY ( cod_profesional );

create table region (
    cod_region                 INTEGER NOT NULL,
    region                     varchar(150) NOT NULL,
    continente_cod_continente  INTEGER NOT NULL
);

ALTER TABLE region ADD CONSTRAINT region_pk PRIMARY KEY ( cod_region );

create table resp_corr (
    cod_resp_corr            INTEGER NOT NULL,
    pregunta_cod_pregunta    INTEGER NOT NULL,
    respuesta_cod_respuesta  INTEGER NOT NULL
);

ALTER TABLE resp_corr ADD CONSTRAINT resp_corr_pk PRIMARY KEY ( respuesta_cod_respuesta );

create table respuesta (
    cod_respuesta          INTEGER NOT NULL,
    respuesta              varchar(500) NOT NULL,
    pregunta_cod_pregunta  INTEGER NOT NULL
);

ALTER TABLE respuesta ADD CONSTRAINT respuesta_pk PRIMARY KEY ( cod_respuesta );

ALTER TABLE area
    ADD CONSTRAINT area_profesional_fk FOREIGN KEY ( profesional_cod_profesional )
        REFERENCES profesional ( cod_profesional );

ALTER TABLE asg_invento
    ADD CONSTRAINT asg_invento_invento_fk FOREIGN KEY ( invento_cod_invento )
        REFERENCES invento ( cod_invento );

ALTER TABLE asg_invento
    ADD CONSTRAINT asg_invento_profesional_fk FOREIGN KEY ( profesional_cod_profesional )
        REFERENCES profesional ( cod_profesional );

ALTER TABLE frontera
    ADD CONSTRAINT frontera_pais_fk FOREIGN KEY ( pais_cod_pais )
        REFERENCES pais ( cod_pais );

ALTER TABLE frontera
    ADD CONSTRAINT frontera_pais_fkv2 FOREIGN KEY ( pais_cod_pais1 )
        REFERENCES pais ( cod_pais );

ALTER TABLE inventado
    ADD CONSTRAINT inventado_invento_fk FOREIGN KEY ( invento_cod_invento )
        REFERENCES invento ( cod_invento );

ALTER TABLE inventado
    ADD CONSTRAINT inventado_inventor_fk FOREIGN KEY ( inventor_cod_inventor )
        REFERENCES inventor ( cod_inventor );

ALTER TABLE invento
    ADD CONSTRAINT invento_pais_fk FOREIGN KEY ( pais_cod_pais )
        REFERENCES pais ( cod_pais );

ALTER TABLE inventor
    ADD CONSTRAINT inventor_pais_fk FOREIGN KEY ( pais_cod_pais )
        REFERENCES pais ( cod_pais );

ALTER TABLE pais
    ADD CONSTRAINT pais_region_fk FOREIGN KEY ( region_cod_region )
        REFERENCES region ( cod_region );

ALTER TABLE pais_respuesta
    ADD CONSTRAINT pais_respuesta_pais_fk FOREIGN KEY ( pais_cod_pais )
        REFERENCES pais ( cod_pais );

ALTER TABLE pais_respuesta
    ADD CONSTRAINT pais_respuesta_respuesta_fk FOREIGN KEY ( respuesta_cod_respuesta )
        REFERENCES respuesta ( cod_respuesta );

ALTER TABLE pregunta
    ADD CONSTRAINT pregunta_encuesta_fk FOREIGN KEY ( encuesta_cod_encuesta )
        REFERENCES encuesta ( cod_encuesta );

ALTER TABLE profe_area
    ADD CONSTRAINT profe_area_area_fk FOREIGN KEY ( area_cod_area )
        REFERENCES area ( cod_area );

ALTER TABLE profe_area
    ADD CONSTRAINT profe_area_profesional_fk FOREIGN KEY ( profesional_cod_profesional )
        REFERENCES profesional ( cod_profesional );

ALTER TABLE region
    ADD CONSTRAINT region_continente_fk FOREIGN KEY ( continente_cod_continente )
        REFERENCES continente ( cod_continente );

ALTER TABLE resp_corr
    ADD CONSTRAINT resp_corr_pregunta_fk FOREIGN KEY ( pregunta_cod_pregunta )
        REFERENCES pregunta ( cod_pregunta );

ALTER TABLE resp_corr
    ADD CONSTRAINT resp_corr_respuesta_fk FOREIGN KEY ( respuesta_cod_respuesta )
        REFERENCES respuesta ( cod_respuesta );

ALTER TABLE respuesta
    ADD CONSTRAINT respuesta_pregunta_fk FOREIGN KEY ( pregunta_cod_pregunta )
        REFERENCES pregunta ( cod_pregunta );