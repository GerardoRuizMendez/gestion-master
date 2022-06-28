
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>ULA</title>
</head>

<body>
    <?php 
        include("php/conexion.php");
        $texto="";
        if(isset($_GET["texto"])){
            $texto=$_GET["texto"];
        }
        $boton="Aceptar";
        if(isset($_GET["rechazar"])){
            $boton="Rechazar";
        }
        //$r=$conexion->fetch(PDO::FETCH_ASSOC);
    ?>
    <header class="header">
        <div class="contenedor contenido-header">

            <div class="barra">
                <a href="/index.php">
                    <img src="build/img/logo.png" alt="Logo">
                </a>

                <nav class="navegacion">
                    <a href="iniciarSesion.php"></a>
                </nav>
            </div>

            
        </div>
    </header>

    <p class="lidera">¡Lidera tu futuro!</p>

    <main class="contenedor cuadro formulario sombra referenciado">
        <h1>Introduce tu mensaje para el alumno:</h1>
        <form action="php/acciones_aceptar.php" style="margin-bottom: 3rem;">
            <fieldset>
                <legend>Mensaje</legend>
                <input type="hidden" name="id" id="" value="<?php echo $_GET["id"] ?>">
                <input type="hidden" name="estado" value="<?php echo $_GET["estado"] ?>">
                <input type="hidden" name="folio" value="<?php echo $_GET["folio"] ?>">
                <input type="hidden" name="nombre" value="<?php echo $_GET["nombre"] ?>">
                <input type="text" name="mensaje" placeholder="Mensaje" id="">
                <input type="submit" value="<?php echo $boton ?>" name="<?php echo $boton ?>">
            </fieldset>
        </form>
        
    </main>

    <footer class="footer">
        <p class="copyright">Todos los derechos Reservados 2022 &copy; 8SA</p>
    </footer>

    <script src="build/js/bundle.js"></script>
</body>

</html>