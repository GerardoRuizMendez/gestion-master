
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <link rel="stylesheet" type="text/css" href="build/css/datatables.min.css">
    
    <title>ULA</title>
</head>

<body>
    <?php 
        include("php/conexion.php");
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

    <p class="lidera">lidera tu futuro</p>



    <main class="contenedor cuadro formulario sombra referenciado">
        <h1>Pagos</h1>
        
            <div>
                <table id="tablita" width="" class="display">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th >No. Control</th>
                            <th>Alumno</th>
                            <th WIDTH="800">Servicios</th>
                            <th>Costo</th>
                            <th>Estado</th>
                            <!--th>Archivo</th-->
                            <th WIDTH="500">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php
                        $conexion=$base->query("SELECT * FROM pago p inner join alumnos a ON p.id_alumno=a.id_alumno 
                        inner join servicios c ON c.id_servicio=p.id_servicio");
                        while($r=$conexion->fetch(PDO::FETCH_ASSOC)){
                        $archivo="Archivo no subido";
                        if($r["archivo"]=="si"){
                            $archivo="Archivo subido correctamente";
                        }
                    ?>
                    
                        <tr>
                            
                            <td><?php echo $r["folio"]; ?></td>
                            <td><?php echo $r["id_alumno"];?></td>
                            <td><?php echo $r["nombre"]; ?></td>
                            <td><?php echo $r["servicio"]; ?></td>
                            <td>$<?php echo $r["costo"]; ?></td>
                            <td id="estado"><?php echo $r["estado"]; ?></td>
                            <td>
                                <form action="mensaje.php">
                                    <input type="hidden" name="folio" value="<?php echo $r["folio"]; ?>">
                                    <input type="hidden" name="id" value="<?php echo $r["id_alumno"]; ?>">
                                    <input type="hidden" name="estado" value="<?php echo $r["estado"]; ?>">
                                    <input type="hidden" name="nombre" value="<?php echo $r["nombre"]; ?>">
                
                                    <input type="submit" name="aceptar" value="Aceptar">
                                    <input type="submit" name="rechazar" value="Rechazar">
                                </form>
                            </td>
                        </tr>
                    
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        


        
    </main>

    <footer class="footer">
        <p class="copyright">Todos los derechos Reservados 2022 &copy;</p>
    </footer>

    
    <script src="build/js/jquery-3.6.0.min.js"></script>
    
    <script src="build/js/bundle.js"></script>
    <script type="text/javascript" charset="utf8" src="build/js/datatables.min.js"></script>
</body>

    <script>
        $(document).ready( function () {
            $('#tablita').DataTable({
                language:{
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        } );
    </script>

</html>