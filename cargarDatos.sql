insert into profesional (nombre, fecha_contrato, salario, comision)
select distinct profesional_asg_al_invento, fecha_contrato, salario, comision from tmp_1 where fecha_contrato > 0;


insert into continente (continente)
select distinct nombre_region from tmp_3 where region_padre = '';


insert into encuesta (encuesta)
select distinct nombre_encuesta from tmp_2;


insert into area (area)
select distinct area_invest_prof from tmp_1 where area_invest_prof <> '' group by area_invest_prof;


insert into region (region, cod_continente)
select t.nombre_region, c.cod_continente from tmp_3 t inner join continente c on t.region_padre = c.continente
where t.region_padre <> '';


insert into pais (pais, capital, poblacion, area_km2, cod_region);



select distinct t.pais_inventor, t.capital, t.poblacion_pais, t.area_km2, r.cod_region from tmp_1 t left join region r on t.region_pais = r.region;