insert into profesional (nombre, fecha_contrato, salario, comision)
select distinct profesional_asg_al_invento, fecha_contrato, salario, comision from tmp_1 where fecha_contrato > 0;


insert into continente (continente) select distinct nombre_region from tmp_3 where region_padre = '';


insert into encuesta (encuesta) select distinct nombre_encuesta from tmp_2;


insert into area (area) select distinct area_invest_prof from tmp_1 where area_invest_prof <> '' group by area_invest_prof;


insert into region (region, cod_continente)
select t.nombre_region, c.cod_continente from tmp_3 t inner join continente c on t.region_padre = c.continente
where t.region_padre <> '';


insert into pais (pais, capital, poblacion, area_km2, cod_region)
select distinct t.pais_inventor, t.capital, t.poblacion_pais, t.area_km2, r.cod_region from tmp_1 t left join region r on t.region_pais = r.region 
where r.cod_region is not null;
insert into pais (pais, capital, poblacion, area_km2, cod_continente)
select distinct t.pais_inventor, t.capital, t.poblacion_pais, t.area_km2, c.cod_continente from tmp_1 t left join continente c on t.region_pais = c.continente
where c.cod_continente is not null;


insert into frontera (cod_pais, es_frontera, norte, sur, este, oeste)
select distinct p.cod_pais, f.cod_pais as frontera, t.norte, t.sur, t.este, t.oeste from tmp_1 t inner join pais p on t.pais_inventor = p.pais
inner join pais f on t.frontera_con = f.pais where frontera_con <> '';


insert into pregunta ( pregunta, cod_encuesta )
select distinct t.pregunta, e.cod_encuesta from tmp_2 t left join encuesta e on t.nombre_encuesta = e.encuesta;


insert into respuesta ( cod_pregunta, respuesta )
select distinct p.cod_pregunta, t.respuesta_posible from tmp_2 t left join pregunta p on t.pregunta = p.pregunta;


insert into pais_respuesta ( cod_pais, cod_respuesta )
select pa.cod_pais, r.cod_respuesta from tmp_2 t inner join pais pa on t.pais = pa.pais inner join pregunta p on t.pregunta = p.pregunta 
inner join respuesta r on t.respuesta_pais = substring( r.respuesta,1,1 ) and r.cod_pregunta = p.cod_pregunta
group by t.pregunta, t.pais;


insert into resp_corr ( cod_pregunta, cod_respuesta ) select distinct p.cod_pregunta, r.cod_respuesta from tmp_2 t inner join pregunta p on t.pregunta = p.pregunta
inner join respuesta r on t.respuesta_correcta = r.respuesta where t.respuesta_correcta <> '' group by t.pregunta;


insert into invento ( nombre, anio_invento, ranking, cod_pais ) select distinct t.invento, t.anio_invento, t.ranking, p.cod_pais from tmp_1 t inner join pais p 
on t.pais_invento = p.pais where t.invento <> '' group by t.invento;


insert into inventor ( nombre, cod_pais )
select distinct t.inventor, p.cod_pais from tmp_1 t inner join pais p on t.pais_inventor = p.pais where t.inventor <> '';


insert into inventado ( cod_invento, cod_inventor )
select distinct i.cod_invento, p.cod_inventor from tmp_1 t inner join invento i on t.invento = i.nombre inner join inventor p on t.inventor = p.nombre;


insert into asg_invento ( cod_profesional, cod_invento ) select distinct p.cod_profesional, i.cod_invento from tmp_1 t inner join invento i 
on t.invento = i.nombre inner join profesional p on t.profesional_asg_al_invento = p.nombre;



insert into profe_area ( cod_profesional, cod_area ) select distinct p.cod_profesional, a.cod_area from tmp_1 t inner join profesional p 
on t.profesional_asg_al_invento = p.nombre inner join area a on t.area_invest_prof = a.area;

