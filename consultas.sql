/* 1. Desplegar cada profesional, y el número de inventos que tiene asignados ordenados de
mayor a menor.*/
select p.nombre profesional, count(ai.cod_invento) inv_asignados from asg_invento ai inner join profesional p on  ai.cod_profesional = p.cod_profesional
group by ai.cod_profesional order by count(ai.cod_invento) desc;

/* 2. Desplegar los países de cada continente y el número de preguntas que han contestado de
cualquier encuesta. Si hay países que no han contestado ninguna encuesta, igual debe
aparecer su nombre el la lista */
select c.continente, p.pais, count(pr.cod_respuesta) num_respuestas from pais_respuesta pr right join pais p on pr.cod_pais = p.cod_pais right join region r 
on p.cod_region = r.cod_region right join continente c on r.cod_continente = c.cod_continente group by pr.cod_pais order by count(pr.cod_respuesta) desc;

/* 3. Desplegar todos los países que no tengan ningún inventor y que no tengan ninguna frontera
con otro país ordenados por su área.*/
select p.pais, p.area_km2 from pais p left join inventor i on p.cod_pais = i.cod_pais left join frontera f on p.cod_pais = f.cod_pais 
where i.cod_pais is null and f.cod_pais is null order by area_km2;

/* 4. Desplegar el nombre de cada jefe seguido de todos sus subalternos, para todos los
profesionales ordenados por el jefe alfabéticamente.*/

/* 5. Desplegar todos los profesionales, y su salario cuyo salario es mayor al promedio del
salario de los profesionales en su misma área.  group by pa.cod_area */
select pr.nombre, pr.salario, a.area from profesional pr left join profe_area pa 
on pr.cod_profesional = pa.cod_profesional inner join area a on pa.cod_area = a.cod_area ;

/* 6. Desplegar los nombres de los países que han contestado encuestas, ordenados del país que
más aciertos ha tenido hasta el que menos aciertos ha tenido.*/
select p.pais, count(pr.cod_respuesta) aciertos from pais_respuesta pr inner join resp_corr rc on pr.cod_respuesta = rc.cod_respuesta 
inner join pais p on pr.cod_pais = p.cod_pais group by pr.cod_pais order by count(pr.cod_respuesta) desc;

/* 7. Desplegar los inventos documentados por todos los profesionales expertos en Óptica.*/
select inv.nombre invento, prf.nombre profesional, a.area from profe_area pa inner join area a on pa.cod_area = a.cod_area and a.area = 'Optica' 
inner join profesional prf on pa.cod_profesional = prf.cod_profesional inner join asg_invento ai on ai.cod_profesional = prf.cod_profesional
inner join invento inv on ai.cod_invento = inv.cod_invento order by inv.nombre;

/* 8. Desplegar la suma del área de todos los países agrupados por la inicial de su nombre.*/
select substring(pais, 1, 1) letra, sum(area_km2) area from pais group by substring(pais, 1, 1);

/* 9. Desplegar todos los inventores y sus inventos cuyo nombre del inventor inicie con las
letras BE.*/
select inv.nombre inventor, i.nombre invento from inventado mi right join inventor inv on mi.cod_inventor = inv.cod_inventor 
inner join invento i on mi.cod_invento = i.cod_invento where inv.nombre like 'Be%';

/* 10. Desplegar el nombre de todos los inventores que Inicien con B y terminen con r o con n que
tengan inventos del siglo 19*/
select inv.nombre inventor, i.nombre invento, i.anio_invento from inventado mi right join inventor inv on mi.cod_inventor = inv.cod_inventor 
inner join invento i on mi.cod_invento = i.cod_invento where i.anio_invento like '18%' and (inv.nombre like 'B%r' or inv.nombre like 'B%n');

/* 11. Desplegar el nombre del país y el área de todos los países que tienen mas de siete
fronteras ordenarlos por el de mayor área,*/
select p.pais, p.area_km2, count(es_frontera) num_front from frontera f inner join pais p on f.cod_pais = p.cod_pais 
group by f.cod_pais having count(es_frontera) > 7 order by p.area_km2 desc;

/* 12. Desplegar todos los inventos de cuatro letras que inicien con L*/
select nombre invento from invento where nombre like 'L___';

/* 13. Desplegar el nombre del profesional, su salario, su comisión y el total de salario (sueldo
mas comisión) de todos los profesionales con comisión mayor que el 25% de su salario.*/
select nombre, salario, comision, (salario + comision) total from profesional where comision > (0.25 * salario);

/* 14. Desplegar cada encuesta y el número de países que las han contestado, ordenadas de mayor
a menor.*/
select e.encuesta, count(pr.cod_pais) resp_pais from pais_respuesta pr inner join respuesta r on pr.cod_respuesta = r.cod_respuesta inner join pregunta p 
on r.cod_pregunta = p.cod_pregunta inner join encuesta e on p.cod_encuesta = e.cod_encuesta group by e.cod_encuesta;

/* 15. Desplegar los países cuya población sea mayor a la población de los países
centroamericanos juntos.*/
/*select sum(poblacion) from pais p inner join region r on p.cod_region = r.cod_region and r.region = 'Centro America';*/
select p.pais, p.poblacion from pais p where p.poblacion > (
select sum(poblacion) from pais p inner join region r on p.cod_region = r.cod_region and r.region = 'Centro America');

/* 16.** Desplegar todos los Jefes de cada profesional que no este en el mismo departamento que el
del profesional que atiende al inventor Pasteur.*/

/* 17. Desplegar el nombre de todos los inventos inventados el mismo año que BENZ invento
algún invento.*/
select nombre, anio_invento from invento where anio_invento = (
select ii.anio_invento from inventado i inner join inventor inv on i.cod_inventor = inv.cod_inventor 
inner join invento ii on i.cod_invento = ii.cod_invento where inv.nombre = 'Benz');

/* 18.** Desplegar los nombres y el número de habitantes de todas las islas que tiene un área
mayor o igual al área de Japón*/
select p.pais, p.poblacion from pais p left join frontera f on p.cod_pais = f.cod_pais where f.cod_pais is null and p.area_km2 >= (
select area_km2 from pais where pais = 'Japon' );

/* 19.** Desplegar todos los países con el nombre de cada país con el cual tiene una frontera.*/
select distinct p.pais, pp.pais frontera from frontera f inner join pais p on f.cod_pais = p.cod_pais inner join pais pp on f.es_frontera = pp.cod_pais;

/* 20. Desplegar el nombre del profesional su salario y su comisión de los empleados cuyo salario
es mayor que el doble de su comisión.*/
select nombre, salario, comision from profesional where salario > (2 * comision);