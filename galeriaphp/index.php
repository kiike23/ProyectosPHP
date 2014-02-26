<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/agregarNuevaFila.js"></script>
        <script type="text/javascript" src="js/modificarEstiloInputFile.js"></script>
        <script type="text/javascript" src="js/cambiarOpacidadImagenes.js"></script>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		
        <!-- Lightbox -->
        <script type="text/javascript" src="lightbox/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="lightbox/js/jquery-ui-1.8.18.custom.min.js"></script>
        <script type="text/javascript" src="lightbox/js/jquery.smooth-scroll.min.js"></script>
        <script type="text/javascript" src="lightbox/js/lightbox.js"></script>
        <link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css" />
        
        <title>Galería imagenes</title>
    </head>
    <body>
        
        <div class="galeria">
            <h1>Mi galería de imágenes</h1>
            <?php
                require 'config.php';
                require 'GestorArchivos.php'; 
                
                $conexion = new mysqli($servidor, $usuarioBD, $passwordBD, $baseDatos);
                
                $consulta = "SELECT archivo, directorio FROM galeriaimagenes ORDER BY archivo"; # ordenar por nombre de archivo
                $resultado = $conexion->query($consulta);

            ?>
        </div>
        
        <div class="menu">
            <nav class="horizontal-menu">
                <ul>
                    <li><a href="index.php">Inicio galeria</a></li>
                    <li><a href="Cargarimagenes.php">Cargar Imágenes</a></li>
                    <li><a href="Galeria.php">Galeria</a></li>
                </ul>
            </nav>
        </div>
        <div class="galeria">
        <?php
        // Muestra las imagenes de la galeria.
                while($filas = $resultado->fetch_array(MYSQLI_ASSOC)) {
                    // Se comprueba que existan las imagenes
                    if (file_exists("imagenes/".$filas["directorio"]."/".$filas["archivo"])){
                        echo'<a href="imagenes/'.$filas['directorio'].'/'.$filas['archivo'].'" rel="lightbox[galeria]" title="'.$filas['archivo'].'"><img src="imagenes/'.$filas['directorio'].'/'.$filas['archivo'].'"/></a>';
                    }                    
                }
        ?>
        </div>
        <!-- Muestra el estilo modificado para el input file y cambia la opacidad de las imagenes de la galeria     -->
        <body>


    </body>
</html>