<?php session_start(); ?>
<?php 
$conn = include "conexion/conexion.php";

if(isset($_GET['fecha'])){
    $fecha_consultar = $_GET['fecha'];
}else{
    date_default_timezone_set('US/Central');  
    $fecha_consultar = date("Y-m-d");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tiempo Maya - Cuenta Larga</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/cuentaLarga.css?v=<?php echo (rand()); ?>" />
</head>
<body>
    <?php include "NavBar.php" ?>
    <div>
        <section id="inicio" class="inicio">
            <div id="inicioContainer" class="inicio-container">
                <div id='formulario'>
                    <div class="container">
                        <h2>"Cuenta Larga" Maya a Gregoriano</h2>
                        <div class="section">
                            <h2>Calendario Gregoriano</h2>
                            <label for="day">Día:</label>
                            <input type="number" id="day" min="1" max="31" value="2" maxlength="2">
                            <label for="month">Mes:</label>
                            <input type="number" id="month" min="1" max="12" value="4" maxlength="2">
                            <label for="year">Año:</label>
                            <input type="number" id="year" value="2019" maxlength="4">
                            <label for="hour">Hora (HH:MM:SS):</label>
                            <input type="text" id="hour" value="0:20:20" oninput="formatHour(this)" maxlength="8">
                            <button onclick="convertGregorian()">Convertir</button>
                            <div>
                                <label for="day-of-week">Día correspondiente:</label>
                                <span id="day-of-week"></span>
                            </div>
                        </div>
                        <div class="section">
                            <h2>Días Julianos</h2>
                            <input type="number" id="julian-day" value="2458575.51412037">
                            <button onclick="convertJulian()">Convertir</button>
                        </div>
                        <div class="section">
                            <h2>Cuenta Larga Maya</h2>
                            <div class="table-container">
                                <table>
                                    <tr>
                                        <th>Correlación</th>
                                        <th>Baktun</th>
                                        <th>Katun</th>
                                        <th>Tun</th>
                                        <th>Uinal</th>
                                        <th>Kin</th>
                                        <th>Tzolkin</th>
                                        <th>Haab</th>
                                    </tr>
                                    <tr>
                                        <td>GMT (584.283)</td>
                                        <td id="gmt-baktun"></td>
                                        <td id="gmt-katun"></td>
                                        <td id="gmt-tun"></td>
                                        <td id="gmt-uinal"></td>
                                        <td id="gmt-kin"></td>
                                        <td id="gmt-tzolkin"></td>
                                        <td id="gmt-haab"></td>
                                    </tr>
                                    <tr>
                                        <td>WF (660.208)</td>
                                        <td id="wf-baktun"></td>
                                        <td id="wf-katun"></td>
                                        <td id="wf-tun"></td>
                                        <td id="wf-uinal"></td>
                                        <td id="wf-kin"></td>
                                        <td id="wf-tzolkin"></td>
                                        <td id="wf-haab"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
    <br>
    <br>
<br>
            </div>
        </section> 
    </div>
    <?php
    $stringPrint = "<section class='inicio'> <div class='container'> <div class='section-header'><h3 class='section-title'> Informacion </h3> </div>";
    $stringPrint .= "</div> </section> <hr>";
    echo $stringPrint;
    ?>
    <?php include "blocks/bloquesJs1.html" ?>
    <script src="js/cuentaLarga.js"></script>
    <script src="js/cambioFondo.js"></script>
</body>
</html>
