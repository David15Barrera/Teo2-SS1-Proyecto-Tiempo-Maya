<?php session_start(); ?>
<?php

$conn = include '../conexion/conexion.php';
$pagina = $_GET['pagina'];
$informacion = $conn->query("SELECT htmlCodigo, seccion, nombre FROM tiempo_maya.pagina WHERE categoria='$pagina' ORDER BY orden;");
$secciones = $conn->query("SELECT seccion 
FROM tiempo_maya.pagina WHERE categoria='$pagina' GROUP BY seccion
ORDER BY (
    SELECT MIN(orden) 
    FROM tiempo_maya.pagina AS p 
    WHERE p.seccion = pagina.seccion
);");
$elementos = $conn->query("SELECT nombre FROM tiempo_maya.pagina WHERE categoria='$pagina' AND nombre!='Informacion' AND seccion!='Informacion' order by orden;");




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiempo Maya - <?php echo $pagina ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "../blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="../css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="../css/paginaModelo.css?v=<?php echo (rand()); ?>" />


</head>
<?php include "../NavBar2.php" ?>

<body>
    <section id="inicio" class="inicio">
        <div id="inicioContainer" class="inicio-container">

            <?php echo "<h1>" . $pagina . " </h1>";
            foreach ($secciones as $seccion) {
                echo " <a href='#" . $seccion['seccion'] . "' class='btn-get-started'>" . $seccion['seccion'] . "</a>";
            }
            ?>
        </div>
    </section>

    <?php


    foreach ($secciones as $seccion) {
        $stringPrint = "<section id='" . $seccion['seccion'] . " class='inicio''> <div class='container'> <div class='section-header'><h3 class='section-title'>" . $seccion['seccion'] . " </h3> </div>";
        foreach ($informacion as $info) {
            if ($seccion['seccion'] == $info['seccion']) {
                if ($info['seccion'] != "Informacion") {

                    $stringPrint .= "<h2><a href='paginaModeloElemento.php?elemento=" . $info['nombre'] . "'/>" . $info['nombre'] . " </a></h2>";
                }
                $stringPrint .= "<hr>";
                $stringPrint .= $info['htmlCodigo'];

                foreach ($elementos as $elemento) {
                    if ($elemento['nombre'] != 'Uayeb' && $elemento['nombre'] == $info['nombre']) {
                        $tabla = strtolower($elemento['nombre']);
                        $elementosEl = $conn->query("SELECT nombre FROM tiempo_maya." . $tabla . ";");
                        
                        // Inicia el contenedor de la cuadrícula
                        $stringPrint .= "<div class='grid-container'>";
                        
                        foreach ($elementosEl as $el) {
                            if ($el['nombre'] == "Informacion") {
                                // Si es información, simplemente agregue un enlace sin imagen
                                $stringPrint .= "<a href='#'>" . $el['nombre'] . "</a>";
                            } else {
                                // Genera la ruta de la imagen basada en el nombre del elemento
                                $nombreImagen = str_replace(array("'", "´"), "", $el['nombre']);
                                $posiblesExtensiones = array("jpg", "jpeg", "png"); // Lista de posibles extensiones de archivo
                                
                                $imagenEncontrada = false;

                                foreach ($posiblesExtensiones as $extension) {
                                    $rutaImagen = "../img/". $info['nombre'] . "/" . strtolower($nombreImagen) . "." . $extension;
                                    
                                    // Verifica si la imagen existe
                                    if (file_exists($rutaImagen)) {
                                        // Muestra la imagen
                                        $stringPrint .= "<div class='grid-item'>";
                                        $stringPrint .= "<a href='paginaModeloElemento.php?elemento=" . $info['nombre'] . "#" . $el['nombre'] . "'>";
                                        $stringPrint .= "<img src='" . $rutaImagen . "' alt='" . $el['nombre'] . "'>";
                                        $stringPrint .= "<div class='nombre'>" . $el['nombre'] . "</div>";
                                        $stringPrint .= "</a>";
                                        $stringPrint .= "</div>";
                                        break; // Rompe el bucle una vez que se encuentre la imagen
                                    } 
                                }
                                // Si la imagen no existe, muestra un mensaje de error
                                if (!file_exists($rutaImagen)) {
                                    $stringPrint .= "<div class='grid-item'>";
                                    $stringPrint .= "<p>No se pudo encontrar la imagen correspondiente para " . $el['nombre'] . "</p>";
                                    $stringPrint .= "</div>";
                                }
                            }
                        }
                        
                        // Cierra el contenedor de la cuadrícula
                        $stringPrint .= "</div>";
                        $stringPrint .= "<br>";
                        $stringPrint .= "<br>";
                    }
                }
                
            
           }
        }
        $stringPrint .= "</div> </section> <hr>";
        echo $stringPrint;
    }

    ?>





    <?php include "../blocks/bloquesJs.html" ?>
    <script src="../js/cambioFondoModels.js"></script>



</body>

</html>