<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/conexion/db.php');

print("este");
print($_SERVER['DOCUMENT_ROOT']);
try {
    $claseCon = new DB();
    $con = $claseCon->connect();
    $sentencia = $con->prepare("select * from usuario");
    $respuesta = $sentencia->execute();
    print_r($respuesta);
    print_r($sentencia->fetchall());
    if ($respuesta == 1) {
        echo ("todo salio muy bien");
    }
} catch (\Throwable $th) {
    print("ERROR EN LA INTEGRIDAD DE LA BASE DE DATOS");
    print($th);
}




?>


