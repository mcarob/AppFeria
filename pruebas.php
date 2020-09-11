<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/conexion/db.php');


try {
    $claseCon = new DB();
    $con = $claseCon->connect();
    $sentencia = $con->prepare("call borrar_registro_empresa(?)");
    $respuesta = $sentencia->execute(['miguelcaro@outlook.com']);
    print_r($respuesta);
    if ($respuesta == 1) {
        echo ("todo salio muy bien");
    }
} catch (\Throwable $th) {
    print("ERROR EN LA INTEGRIDAD DE LA BASE DE DATOS");
    print($th);
}




?>


