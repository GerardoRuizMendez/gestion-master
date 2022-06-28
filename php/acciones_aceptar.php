<?php
    include("conexion.php");
    $estado="pagado correctamente";
    
    if(isset($_GET["Aceptar"])){
        echo "no";
        $conexion=$base->query("UPDATE pago SET estado='Pagado' WHERE folio=" . $_GET["folio"]);
    }
    if(isset($_GET["Rechazar"])){
        $estado="rechazado";
        $conexion=$base->query("UPDATE pago SET estado='Rechazado' WHERE folio=" . $_GET["folio"]);
    }

    $correo=$_GET["folio"] . "@itoaxaca.edu.mx";
    $mensaje="";

    $mensaje=$mensaje . "---URGENTE---\n";
    $mensaje=$mensaje . "Solicitud del alumno " . $_GET["nombre"] . " ha sido actualizada\n";
    $mensaje=$mensaje . "Se informa que tu pago ha sido " . $estado . "\n\n";
    $mensaje=$mensaje . "Para cualquier duda o aclaración solicita ayuda a tu coordinadora de carrera\n";
    $mensaje=$mensaje . "O llama al número: ";
    $mensaje=$mensaje . "9513790941\n\n";
    $mensaje=$mensaje . "Observaciones por parte del administrador:\n";
    $mensaje=$mensaje . $_GET["mensaje"];

    mail($correo,"Correo de confirmacion",$mensaje);
    header("Location:/aceptar.php");
?>