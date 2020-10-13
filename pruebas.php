<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/conexion/db.php');

try {
    $claseCon = new DB();
    $con = $claseCon->connect();
    $sentencia = $con->prepare("select * from promocion_postulacion where COD_ESTUDIANTE=? and COD_PROMOCION_LABORAL=?");
    $respuesta = $sentencia->execute([5,2]);
    $entro=false;
    print_r($respuesta);
    print("rrr");
    $aa=count($sentencia->fetchall());
    print_r($aa);
    if ($respuesta == 1) {
        echo ("todo salio muy bien");
    }
} catch (\Throwable $th) {
    print("ERROR EN LA INTEGRIDAD DE LA BASE DE DATOS");
    print($th);
}




?>


