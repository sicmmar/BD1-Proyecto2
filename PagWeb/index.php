<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Inicio</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <img style="width:1070px;height:460px;"  src="i1.png" >
                    <h2 class="card-title">Banco de Datos</h2>

                    <form>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Selecciona los datos que deseas ver </label>
                            <div class="col-sm-7">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Datos
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#area">Área</a>
                                        <a class="dropdown-item" data-target="#ai" data-toggle="modal">Inventos asignados a Profesionales</a>
                                        <a class="dropdown-item" data-target="#continente" data-toggle="modal">Continentes</a>
                                        <a class="dropdown-item" data-target="#encuesta" data-toggle="modal">Encuestas</a>
                                        <a class="dropdown-item" data-target="#frontera" data-toggle="modal">Fronteras</a>
                                        <a class="dropdown-item" data-target="#inventado" data-toggle="modal">Inventados</a>
                                        <a class="dropdown-item" data-target="#inventos" data-toggle="modal">Inventos</a>
                                        <a class="dropdown-item" data-target="#inventor" data-toggle="modal">Inventores</a>
                                        <a class="dropdown-item" data-target="#pais" data-toggle="modal">Países</a>
                                        <a class="dropdown-item" data-target="#resp_pais" data-toggle="modal">Inventores</a>
                                        <a class="dropdown-item" data-target="#pregunta" data-toggle="modal">Preguntas</a>
                                        <a class="dropdown-item" data-target="#profesional" data-toggle="modal">Profesionales</a>
                                        <a class="dropdown-item" data-target="#prof_area" data-toggle="modal">Profesional por en Áreas</a>
                                        <a class="dropdown-item" data-target="#region" data-toggle="modal">Regiones</a>
                                        <a class="dropdown-item" data-target="#respuesta" data-toggle="modal">Respuestas </a>
                                        <a class="dropdown-item" data-target="#resp_corr" data-toggle="modal">Respuestas Correctas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        $modal1 = "class='modal fade' tabindex='-1' role='dialog' aria-hidden='true' aria-labelledby='exampleModalLongTitle'";
                        $modal2 = "<div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-body'>";
                        // Include config file
                        require_once "db.php";
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM area;";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo "<div ". $modal1 ." id='area'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Area</th>";
                                            echo "<th>Ranking</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['cod_area'] . "</td>";
                                            echo "<td>" . $row['area'] . "</td>";
                                            echo "<td>" . $row['ranking'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }
                        $ai = "SELECT p.nombre as pn, i.nombre as inn from asg_invento ai inner join profesional p on ai.cod_profesional = p.cod_profesional inner join invento i on ai.cod_invento = i.cod_invento;";
                        
                        if($result = mysqli_query($link, $ai)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                echo "<div ". $modal1 ." id='ai'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>#</th>";
                                            echo "<th>Profesional</th>";
                                            echo "<th>Invento</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['pn'] . "</td>";
                                            echo "<td>" . $row['inn'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }
                        $cont = "SELECT * from continente;";
                        
                        if($result = mysqli_query($link, $cont)){
                            if(mysqli_num_rows($result) > 0){
                                //$i = 0;
                                echo "<div ". $modal1 ." id='continente'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Continente</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        //$i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $row['cod_continente'] . "</td>";
                                            echo "<td>" . $row['continente'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }
                        $enc = "SELECT * from encuesta;";
                        
                        if($result = mysqli_query($link, $enc)){
                            if(mysqli_num_rows($result) > 0){
                                //$i = 0;
                                echo "<div ". $modal1 ." id='encuesta'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Encuesta</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        //$i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $row['cod_encuesta'] . "</td>";
                                            echo "<td>" . $row['encuesta'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }

                        $front = "SELECT f.cod_frontera as cdf, p.pais as pais_p, pp.pais as front, f.norte as n, f.sur as s, f.este as e, f.oeste as o FROM frontera f inner join pais p on f.cod_pais = p.cod_pais inner join pais pp on f.es_frontera = pp.cod_pais;";
                        if($result = mysqli_query($link, $front)){
                            if(mysqli_num_rows($result) > 0){
                                //$i = 0;
                                echo "<div ". $modal1 ." id='frontera'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Pais</th>";
                                            echo "<th>Frontera con</th>";
                                            echo "<th>Norte</th>";
                                            echo "<th>Sur</th>";
                                            echo "<th>Este</th>";
                                            echo "<th>Oeste</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        //$i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $row['cdf'] . "</td>";
                                            echo "<td>" . $row['pais_p'] . "</td>";
                                            echo "<td>" . $row['front'] . "</td>";
                                            echo "<td>" . $row['n'] . "</td>";
                                            echo "<td>" . $row['s'] . "</td>";
                                            echo "<td>" . $row['e'] . "</td>";
                                            echo "<td>" . $row['o'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }
                        
                        $indos = "SELECT ii.nombre as invto, iii.nombre as intor FROM inventado i inner join invento ii on i.cod_invento = ii.cod_invento inner join inventor iii on i.cod_inventor = iii.cod_inventor;";
                        if($result = mysqli_query($link, $indos)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                echo "<div ". $modal1 ." id='inventado'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Invento</th>";
                                            echo "<th>Inventado por</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['invto'] . "</td>";
                                            echo "<td>" . $row['intor'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }
                        
                        $invto = "SELECT i.cod_invento as ci, i.nombre as ni, i.anio_invento as ai, p.pais as pi FROM invento i inner join pais p on i.cod_pais = p.cod_pais;";
                        if($result = mysqli_query($link, $invto)){
                            if(mysqli_num_rows($result) > 0){
                                //$i = 0;
                                echo "<div ". $modal1 ." id='inventos'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Invento</th>";
                                            echo "<th>Año de Invención</th>";
                                            echo "<th>País de Invención</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        //$i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $row['ci'] . "</td>";
                                            echo "<td>" . $row['ni'] . "</td>";
                                            echo "<td>" . $row['ai'] . "</td>";
                                            echo "<td>" . $row['pi'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }
                        
                        $invtor = "SELECT i.cod_inventor as cir, i.nombre as nir, p.pais as pir FROM inventor i inner join pais p on i.cod_pais = p.cod_pais;";
                        if($result = mysqli_query($link, $invtor)){
                            if(mysqli_num_rows($result) > 0){
                                //$i = 0;
                                echo "<div ". $modal1 ." id='inventor'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Inventor</th>";
                                            echo "<th>País de Inventor</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        //$i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $row['cir'] . "</td>";
                                            echo "<td>" . $row['nir'] . "</td>";
                                            echo "<td>" . $row['pir'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }
                        
                        $paiss = "SELECT cod_pais, pais, capital, poblacion, area_km2 FROM pais;";
                        if($result = mysqli_query($link, $paiss)){
                            if(mysqli_num_rows($result) > 0){
                                //$i = 0;
                                echo "<div ". $modal1 ." id='pais'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>País</th>";
                                            echo "<th>Capital</th>";
                                            echo "<th>Población</th>";
                                            echo "<th>Área en Km2</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        //$i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $row['cod_pais'] . "</td>";
                                            echo "<td>" . $row['pais'] . "</td>";
                                            echo "<td>" . $row['capital'] . "</td>";
                                            echo "<td>" . $row['poblacion'] . "</td>";
                                            echo "<td>" . $row['area_km2'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }
                        
                        $pais_resp = "SELECT p.pais as papr, r.respuesta as rpr FROM pais_respuesta pr inner join pais p on pr.cod_pais = p.cod_pais inner join respuesta r on pr.cod_respuesta = r.cod_respuesta;";
                        if($result = mysqli_query($link, $pais_resp)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                echo "<div ". $modal1 ." id='resp_pais'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>País</th>";
                                            echo "<th>Respuesta de país</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['papr'] . "</td>";
                                            echo "<td>" . $row['rpr'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }
                        
                        $pregunt = "SELECT p.cod_pregunta as codp, p.pregunta as preg, e.encuesta as pec FROM pregunta p inner join encuesta e on p.cod_encuesta = e.cod_encuesta;";
                        if($result = mysqli_query($link, $pregunt)){
                            if(mysqli_num_rows($result) > 0){
                                //$i = 0;
                                echo "<div ". $modal1 ." id='pregunta'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Pregunta</th>";
                                            echo "<th>Encuesta</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        //$i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $row['codp'] . "</td>";
                                            echo "<td>" . $row['preg'] . "</td>";
                                            echo "<td>" . $row['pec'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }
                        
                        $prof = "SELECT * from profesional;";
                        if($result = mysqli_query($link, $prof)){
                            if(mysqli_num_rows($result) > 0){
                                //$i = 0;
                                echo "<div ". $modal1 ." id='profesional'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Profesional</th>";
                                            echo "<th>Fecha Contratado</th>";
                                            echo "<th>Salario</th>";
                                            echo "<th>Comisión</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        //$i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $row['cod_profesional'] . "</td>";
                                            echo "<td>" . $row['nombre'] . "</td>";
                                            echo "<td>" . $row['fecha_contrato'] . "</td>";
                                            echo "<td>" . $row['salario'] . "</td>";
                                            echo "<td>" . $row['comision'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }

                        $prof_ar = "SELECT a.area as paa, p.nombre as pap FROM profe_area pa inner join area a on pa.cod_area = a.cod_area inner join profesional p on pa.cod_profesional = p.cod_profesional;";
                        if($result = mysqli_query($link, $prof_ar)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                echo "<div ". $modal1 ." id='prof_area'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Área</th>";
                                            echo "<th>Profesional</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['paa'] . "</td>";
                                            echo "<td>" . $row['pap'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }

                        $reg = "SELECT r.cod_region as cr, r.region as reg, c.continente as rc FROM region r inner join continente c on r.cod_continente = c.cod_continente;";
                        if($result = mysqli_query($link, $reg)){
                            if(mysqli_num_rows($result) > 0){
                                //$i = 0;
                                echo "<div ". $modal1 ." id='region'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Región</th>";
                                            echo "<th>Continente</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        //$i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $row['cr'] . "</td>";
                                            echo "<td>" . $row['reg'] . "</td>";
                                            echo "<td>" . $row['rc'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }
                        
                        $resp = "SELECT r.cod_respuesta as crs, r.respuesta as resp, p.pregunta as rpreg FROM respuesta r inner join pregunta p on r.cod_pregunta = p.cod_pregunta;";
                        if($result = mysqli_query($link, $resp)){
                            if(mysqli_num_rows($result) > 0){
                                //$i = 0;
                                echo "<div ". $modal1 ." id='respuesta'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Respuesta</th>";
                                            echo "<th>Pregunta</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        //$i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $row['crs'] . "</td>";
                                            echo "<td>" . $row['resp'] . "</td>";
                                            echo "<td>" . $row['rpreg'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }

                        $resp_crr = "SELECT p.pregunta as rcpreg, r.respuesta as rcr FROM resp_corr rc inner join respuesta r on rc.cod_respuesta = r.cod_respuesta inner join pregunta p on rc.cod_pregunta = p.cod_pregunta;";
                        if($result = mysqli_query($link, $resp_crr)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                echo "<div ". $modal1 ." id='resp_corr'>" . $modal2;
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Pregunta</th>";
                                            echo "<th>Respuesta Correcta</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['rcpreg'] . "</td>";
                                            echo "<td>" . $row['rcr'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "</div></div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }  
                        }

                        // Close connection
                        //mysqli_close($link);
                    ?>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <img style="width:1070px;height:460px;"  src="i2.png" >
                    <h2 class="card-title">Consultar</h2>
                    <nav aria-label="...">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c1">1</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c2">2</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c3">3</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c4">4</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c5">5</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c6">6</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c7">7</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c8">8</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c9">9</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c10">10</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c11">11</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c12">12</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c13">13</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c14">14</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c15">15</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c16">16</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c17">17</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c18">18</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c19">19</a></li>
                                <li class="page-item"><a class="page-link" data-toggle="collapse" aria-expanded="false" href="#c20">20</a></li>
                            </ul>
                        </nav>
                    <?php
                        // Include config file
                        //require_once "db.php";
                        
                        $cAct = 0;
                        $cons = "class='collapse'><div class='card'><div class='card-header'>";

                        // Attempt select query execution
                        $cc1 = "SELECT p.nombre as profesional, count(ai.cod_invento) as inv_asignados from asg_invento ai inner join profesional p on  ai.cod_profesional = p.cod_profesional group by ai.cod_profesional order by count(ai.cod_invento) desc;";
                        if($result = mysqli_query($link, $cc1)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 1;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "1. Desplegar cada profesional, y el número de inventos que tiene asignados ordenados de mayor a menor</div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Profesional</th>";
                                            echo "<th>Número de Inventos Asignados</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['profesional'] . "</td>";
                                            echo "<td>" . $row['inv_asignados'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc2 = "SELECT c.continente as cont, p.pais as pai, count(pr.cod_respuesta) as numr from pais_respuesta pr right join pais p on pr.cod_pais = p.cod_pais right join region r 
                        on p.cod_region = r.cod_region right join continente c on r.cod_continente = c.cod_continente group by pr.cod_pais order by count(pr.cod_respuesta) desc;";
                        if($result = mysqli_query($link, $cc2)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 2;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "2. Desplegar los países de cada continente y el número de preguntas que han contestado de
                                cualquier encuesta. Si hay países que no han contestado ninguna encuesta, igual debe
                                aparecer su nombre el la lista</div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Continente</th>";
                                            echo "<th>País</th>";
                                            echo "<th>Número de Respuestas</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['cont'] . "</td>";
                                            echo "<td>" . $row['pai'] . "</td>";
                                            echo "<td>" . $row['numr'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc3 = "SELECT p.pais as p, p.area_km2 as ar from pais p left join inventor i on p.cod_pais = i.cod_pais left join frontera f on p.cod_pais = f.cod_pais 
                        where i.cod_pais is null and f.cod_pais is null order by area_km2 desc;";
                        if($result = mysqli_query($link, $cc3)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 3;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "3. Desplegar todos los países que no tengan ningún inventor y que no tengan ninguna frontera
                                con otro país ordenados por su área</div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>País</th>";
                                            echo "<th>Área en Km<sup>2</sup></th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['p'] . "</td>";
                                            echo "<td>" . $row['ar'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc5 = "SELECT pr.nombre as n, pr.salario as s, a.area as a, avg(pr.salario) as ps from profesional pr left join profe_area pa 
                        on pr.cod_profesional = pa.cod_profesional inner join area a on pa.cod_area = a.cod_area group by pa.cod_area having pr.salario > avg(pr.salario);";
                        if($result = mysqli_query($link, $cc5)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 5;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "5.  Desplegar todos los profesionales, y su salario cuyo salario es mayor al promedio del
                                salario de los profesionales en su misma área. </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Profesional</th>";
                                            echo "<th>Salario</th>";
                                            echo "<th>Área</th>";
                                            echo "<th>Salario Promedio del Área</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['n'] . "</td>";
                                            echo "<td>" . $row['s'] . "</td>";
                                            echo "<td>" . $row['a'] . "</td>";
                                            echo "<td>" . $row['ps'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }
                        
                        $cc6 = "SELECT p.pais as p, count(pr.cod_respuesta) as ac from pais_respuesta pr inner join resp_corr rc on pr.cod_respuesta = rc.cod_respuesta 
                        inner join pais p on pr.cod_pais = p.cod_pais group by pr.cod_pais order by count(pr.cod_respuesta) desc;";
                        if($result = mysqli_query($link, $cc6)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 6;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "6. Desplegar los nombres de los países que han contestado encuestas, ordenados del país que
                                más aciertos ha tenido hasta el que menos aciertos ha tenido. </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>País</th>";
                                            echo "<th>Aciertos</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['p'] . "</td>";
                                            echo "<td>" . $row['ac'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc7 = "SELECT inv.nombre as invento, prf.nombre as profesional, a.area as ar from profe_area pa inner join area a on pa.cod_area = a.cod_area and a.area = 'Optica' 
                        inner join profesional prf on pa.cod_profesional = prf.cod_profesional inner join asg_invento ai on ai.cod_profesional = prf.cod_profesional
                        inner join invento inv on ai.cod_invento = inv.cod_invento order by inv.nombre;";
                        if($result = mysqli_query($link, $cc7)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 7;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "7. Desplegar los inventos documentados por todos los profesionales expertos en Óptica. </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Invento</th>";
                                            echo "<th>Profesional</th>";
                                            echo "<th>Área</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['invento'] . "</td>";
                                            echo "<td>" . $row['profesional'] . "</td>";
                                            echo "<td>" . $row['ar'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc8 = "SELECT substring(pais, 1, 1) as letra, sum(area_km2) as area from pais group by substring(pais, 1, 1);";
                        if($result = mysqli_query($link, $cc8)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 8;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "8. Desplegar la suma del área de todos los países agrupados por la inicial de su nombre. </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Letra</th>";
                                            echo "<th>Área en Total</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['letra'] . "</td>";
                                            echo "<td>" . $row['area'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc9 = "SELECT inv.nombre as inventor, i.nombre as invento from inventado mi right join inventor inv on mi.cod_inventor = inv.cod_inventor 
                        inner join invento i on mi.cod_invento = i.cod_invento where inv.nombre like 'Be%';";
                        if($result = mysqli_query($link, $cc9)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 9;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "9. Desplegar todos los inventores y sus inventos cuyo nombre del inventor inicie con las
                                letras BE. </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Inventor</th>";
                                            echo "<th>Invento</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['inventor'] . "</td>";
                                            echo "<td>" . $row['invento'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc10 = "SELECT inv.nombre as inventor, i.nombre as invento, i.anio_invento as ai from inventado mi right join inventor inv on mi.cod_inventor = inv.cod_inventor 
                        inner join invento i on mi.cod_invento = i.cod_invento where i.anio_invento like '18%' and (inv.nombre like 'B%r' or inv.nombre like 'B%n');";
                        if($result = mysqli_query($link, $cc10)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 10;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "10. Desplegar el nombre de todos los inventores que Inicien con B y terminen con r o con n que
                                tengan inventos del siglo 19 </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Inventor</th>";
                                            echo "<th>Invento</th>";
                                            echo "<th>Año de Invención</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['inventor'] . "</td>";
                                            echo "<td>" . $row['invento'] . "</td>";
                                            echo "<td>" . $row['ai'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }
                        
                        $cc11 = "SELECT p.pais as p, p.area_km2 as ar, count(es_frontera) as num_front from frontera f inner join pais p on f.cod_pais = p.cod_pais 
                        group by f.cod_pais having count(es_frontera) > 7 order by p.area_km2 desc;";
                        if($result = mysqli_query($link, $cc11)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 11;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "11. Desplegar el nombre del país y el área de todos los países que tienen mas de siete
                                fronteras ordenarlos por el de mayor área. </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>País </th>";
                                            echo "<th>Área en Km<sup>2</sup></th>";
                                            echo "<th>Cantidad de Fronteras</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['p'] . "</td>";
                                            echo "<td>" . $row['ar'] . "</td>";
                                            echo "<td>" . $row['num_front'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc12 = "SELECT nombre invento from invento where nombre like 'L___';";
                        if($result = mysqli_query($link, $cc12)){
                            if(mysqli_num_rows($result) >= 0){
                                $i = 0;
                                $cAct = 12;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "12. Desplegar todos los inventos de cuatro letras que inicien con L </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Invento</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['invento'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc13 = "SELECT nombre, salario, comision, (salario + comision) as total from profesional where comision > (0.25 * salario);";
                        if($result = mysqli_query($link, $cc13)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 13;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "13. Desplegar el nombre del profesional, su salario, su comisión y el total de salario (sueldo
                                mas comisión) de todos los profesionales con comisión mayor que el 25% de su salario. </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Profesional</th>";
                                            echo "<th>Salario</th>";
                                            echo "<th>Comisión</th>";
                                            echo "<th>Total de Salario (comisión + salario)</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['nombre'] . "</td>";
                                            echo "<td>" . $row['salario'] . "</td>";
                                            echo "<td>" . $row['comision'] . "</td>";
                                            echo "<td>" . $row['total'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc14 = "SELECT e.encuesta as ec, count(pr.cod_pais) as resp_pais from pais_respuesta pr inner join respuesta r on pr.cod_respuesta = r.cod_respuesta inner join pregunta p 
                        on r.cod_pregunta = p.cod_pregunta inner join encuesta e on p.cod_encuesta = e.cod_encuesta group by e.cod_encuesta;";
                        if($result = mysqli_query($link, $cc14)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 14;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "14. Desplegar cada encuesta y el número de países que las han contestado, ordenadas de mayor
                                a menor. </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Encuesta</th>";
                                            echo "<th>Número de respuesta de países</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['ec'] . "</td>";
                                            echo "<td>" . $row['resp_pais'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc15 = "SELECT p.pais as pa, p.poblacion as po from pais p where p.poblacion > (
                        SELECT sum(poblacion) from pais p inner join region r on p.cod_region = r.cod_region and r.region = 'Centro America');";
                        if($result = mysqli_query($link, $cc15)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 15;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "15. Desplegar los países cuya población sea mayor a la población de los países
                                centroamericanos juntos. </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>País</th>";
                                            echo "<th>Población</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['pa'] . "</td>";
                                            echo "<td>" . $row['po'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc17 = "SELECT nombre, anio_invento from invento where anio_invento = (
                            SELECT ii.anio_invento from inventado i inner join inventor inv on i.cod_inventor = inv.cod_inventor 
                            inner join invento ii on i.cod_invento = ii.cod_invento where inv.nombre = 'Benz');";
                        if($result = mysqli_query($link, $cc17)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 17;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "17. Desplegar el nombre de todos los inventos inventados el mismo año que BENZ invento
                                algún invento. </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Invento</th>";
                                            echo "<th>Año de invención</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['nombre'] . "</td>";
                                            echo "<td>" . $row['anio_invento'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc18 = "SELECT p.pais as pa, p.poblacion as po from pais p left join frontera f on p.cod_pais = f.cod_pais where f.cod_pais is null and p.area_km2 >= (
                            SELECT area_km2 from pais where pais = 'Japon' );";
                        if($result = mysqli_query($link, $cc18)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 18;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "18.** Desplegar los nombres y el número de habitantes de todas las islas que tiene un área
                                mayor o igual al área de Japón </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Isla</th>";
                                            echo "<th>Población</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['pa'] . "</td>";
                                            echo "<td>" . $row['po'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc19 = "SELECT distinct p.pais as pa, pp.pais as frontera from frontera f inner join pais p on f.cod_pais = p.cod_pais inner join pais pp on f.es_frontera = pp.cod_pais;";
                        if($result = mysqli_query($link, $cc19)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 19;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "19.** Desplegar todos los países con el nombre de cada país con el cual tiene una frontera. </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>País</th>";
                                            echo "<th>Es Frontera Con</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['pa'] . "</td>";
                                            echo "<td>" . $row['frontera'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        $cc20 = "SELECT nombre, salario, comision from profesional where salario > (2 * comision);";
                        if($result = mysqli_query($link, $cc20)){
                            if(mysqli_num_rows($result) > 0){
                                $i = 0;
                                $cAct = 20;
                                echo "<div id='c". $cAct ."' ". $cons;
                                echo "20. Desplegar el nombre del profesional su salario y su comisión de los empleados cuyo salario
                                es mayor que el doble de su comisión. </div><div class='card-body'>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Profesional</th>";
                                            echo "<th>Salario</th>";
                                            echo "<th>Comisión</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        $i = $i + 1;
                                        echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['nombre'] . "</td>";
                                            echo "<td>" . $row['salario'] . "</td>";
                                            echo "<td>" . $row['comision'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo "<div class='alert alert-success' role='alert'> Se muestran ";
                                echo "<strong>" . mysqli_num_rows($result) . "</strong> resultados.</div>";
                                echo "</div></div></div>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        }

                        // Close connection
                        mysqli_close($link);
                    ?> 
                </div> 
            </div> 
            <div class="card">
                <div class="card-body">
                    <img style="width:1070px;height:200px;"  src="i3.png" >
                </div> 
            </div>   
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


