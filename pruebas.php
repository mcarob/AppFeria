<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');


try {
    $claseCon = new DB();
$con = $claseCon->connect();
$sentencia = $con->prepare("CALL MOSTRAR_SALIDA(?)");
$a=($sentencia->execute(['3']));
echo $a;
} catch (\Throwable $th) {
    print_r("ERROR EN LA INTEGRIDAD DE LA BASE DE DATOS");
    print_r($th);
}




?>
