<?php 
session_start();

$conn = include "conexion/conexion.php";

if(isset($_GET['fecha'])){
    $fecha_consultar = $_GET['fecha'];
}else{
    date_default_timezone_set('US/Central');  
    $fecha_consultar = date("Y-m-d");
}

// Consultar la información de la tabla `pagina`
$query = "SELECT htmlCodigo FROM pagina WHERE nombre = 'Numeracion Maya'";
$query2 = "SELECT htmlCodigo FROM pagina WHERE nombre='funcion'";

$result = $conn->query($query);
$result2 = $conn->query($query2);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $htmlCodigo = $row['htmlCodigo'];
}

if ($result2 && $result2->num_rows > 0) {
    $row2 = $result2->fetch_assoc();
    $htmlCodigoPasos = $row2['htmlCodigo'];
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
    <link rel="stylesheet" href="css/numeros.css?v=<?php echo (rand()); ?>" />
</head>
<body>
    <?php include "NavBar.php" ?>
    <div>
        <section id="inicio" class="inicio">
            <div id="inicioContainer" class="inicio-container"> <br><br><br><br>
            <?php echo "<h1> Numeración Maya </h1>";?> <br>
            <a href='#informacion' class='btn-get-started'>Informacion</a>
            <a href='#calculadora' class='btn-get-started'>Calculadora</a>
            <a href='#funcionamiento' class='btn-get-started'>Funcionamiento</a>
                <br><br><br><br>
            </div>
        </section> 
    </div>
    <?php
        $stringPrint = "<section class='inicio' id='informacion'> <div class='container'> <div class='section-header'><h3 class='section-title'> Informacion </h3> </div>";
        $stringPrint .= "</div> </section> <hr>";
        $stringPrint .= "<div class='recuperado'>" . $htmlCodigo . "</div>";  // Aquí se inserta el contenido de la tabla `pagina` con la clase CSS;  // Aquí se inserta el contenido de la tabla `pagina`

    echo $stringPrint;
    ?>
        <div class="container-conver" id="calculadora">
            <h1>Convertidor de Números a Sistema Maya</h1>
            <input type="number" id="inputNumber" placeholder="Ingresa un número (0-99999)" min="0" max="99999">
            <button onclick="convertToMaya()">Convertir</button>
            <div id="mayaNumber" class="maya-number"></div>
        </div>
       
       <br>
        <section id="funcionamiento">
            <div class="container">
                <div class="row about-container">
                    <div class="section-header">
                        <h3 class="section-title">¿Como funciona?</h3>
                    </div>
                    <div class="content-step">
                        <?php
                        // Corrección: asigna directamente el contenido de $htmlCodigoPasos a $stringPrint
                        $stringPrint =  $htmlCodigoPasos ;
                        echo $stringPrint;
                        ?>
                    </div>
                </div>
            </div>
        </section>


    <?php include "blocks/bloquesJs1.html" ?>
    <script src="js/numeracion.js"></script>
    <script src="js/cambioFondo.js"></script>
</body>
</html>
