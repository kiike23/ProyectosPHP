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
        <h1>Subida de imágenes</h1>
         <div class="menu">
            <nav class="horizontal-menu">
                <ul>
                    <li><a href="index.php">Inicio galeria</a></li>
                    <li><a href="Cargarimagenes.php">Cargar Imágenes</a></li>
                    <li><a href="Galeria.php">Galeria</a></li>
                </ul>
            </nav>
        </div>
        <?php
                require 'config.php';
                require 'GestorArchivos.php'; 
                
                $conexion = new mysqli($servidor, $usuarioBD, $passwordBD, $baseDatos);
                
                $consulta = "SELECT archivo, directorio FROM galeriaimagenes ORDER BY archivo"; # ordenar por nombre de archivo
                $resultado = $conexion->query($consulta);
            ?>

                <div id="subirImagenes">
                    
            <!-- Para poder subir archivos con PHP hay que poner enctype="multipart/form-data" para que no se encripte ningun caracter y el archivo no se modifique/estropee -->
            <form action="#" method="POST" enctype="multipart/form-data">
                <table id="formularioSubida" border="0">
                    <thead>
                        <th>Elige los archivos que quieras subir</th>
                    </thead>
                    <tr>
                        <td>
                            <div class="inputImagenModificado">
                                <input class="inputImagenOculto" name="imagen1" type="file">
                                <div class="inputParaMostrar">
                                    <input>
                                    <img src="imagenes/button_select3.gif">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            <input type="button" id="botonAnnadir" onClick="agregarFila('formularioSubida','botonAnnadir')" value="Añadir archivo" style="width:138px;">        
                            <input type="submit" name="botonSubir" value="Subir"> 
                        </td>
                    </tr>
                </table>
            </form>
            
            <?php
                // Subir todas las imagenes
                if(isset($_POST['botonSubir'])){
                    subirImagenes('prueba',$conexion);
                }
            ?>
            <br />
        </div> 
    </body>

</html>