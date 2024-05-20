<?php

use function PHPSTORM_META\type;

session_start(); ?>
<?php

$conn = include '../conexion/conexion.php';
$tabla = $_GET['elemento'];
$table = strtolower($tabla);
$datos = $conn->query("SELECT nombre,significado,htmlCodigo FROM tiempo_maya." . $table . ";");
$elementos = $datos;
$informacion = $conn->query("SELECT htmlCodigo FROM tiempo_maya.pagina WHERE nombre='" . $tabla . "';");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiempo Maya - <?php echo $tabla; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "../blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="../css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="../css/paginaModelo.css?v=<?php echo (rand()); ?>" />
</head>
<?php include "../NavBar2.php" ?>

<body>
    <section id="inicio" class="inicio">
        <div id="inicioContainer" class="inicio-container">
            <?php echo "<h1>" . $tabla . " </h1>"; ?>
            <a href='#informacion' class='btn-get-started'>Informacion</a>
            <a href='#elementos' class='btn-get-started'>Elementos</a>
        </div>
    </section>
    <section id="information">
        <div class="container">
            <div class="row about-container">
                <div class="section-header">
                    <h3 class="section-title">INFORMACION</h3>
                </div>
                <?php foreach($informacion as $info){
                    echo $info['htmlCodigo'];
                }?>
            </div>
        </div>
    </section>
    <hr>
    
    <section id="elementos">
        <div class="container">
            <div class="row about-container">
                <div class="section-header">
                    <h3 class="section-title">Elementos</h3>
                </div>
                <?php foreach($datos as $dato){
                    $stringPrint = "<h4 id='".$dato['nombre']."'>".$dato['nombre']."</h4>";
                    
                    // Genera la ruta de la imagen basada en el nombre del elemento
                    $nombreImagen = str_replace(array("'", "´"), "", $dato['nombre']);
                    $posiblesExtensiones = array("jpg", "jpeg", "png"); // Lista de posibles extensiones de archivo
                    $imagenEncontrada = false;
                    
                    foreach ($posiblesExtensiones as $extension) {
                        $rutaImagen = "../img/" . ucfirst($tabla) . "/" . strtolower($nombreImagen) . "." . $extension;
                        
                        // Verifica si la imagen existe
                        if (file_exists($rutaImagen)) {
                            $stringPrint .= "<img src='" . $rutaImagen . "' alt='" . $dato['nombre'] . "' style='max-width: 20%; height: auto;'>";
                            $imagenEncontrada = true;
                            break; // Rompe el bucle una vez que se encuentre la imagen
                        }
                    }
                    
                    // Si la imagen no existe, muestra un mensaje de error
                    if (!$imagenEncontrada) {
                        $stringPrint .= "<p>No se pudo encontrar la imagen correspondiente para " . $dato['nombre'] . "</p>";
                    }
                    
                    $stringPrint .= "<h5>Significado</h5> <p>".$dato['significado']."</p>";
                    $stringPrint .= "<p>".$dato['htmlCodigo']."</p> <hr>";
                    echo $stringPrint;
                }?>
            </div>
        </div>
    </section>

    <?php include "../blocks/bloquesJs.html" ?>

    <script src="../js/cambioFondoModels.js"></script>
</body>

</html>
