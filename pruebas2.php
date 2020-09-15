<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/conexion/db.php');


try {
    $claseCon = new DB();
    $con = $claseCon->connect();
    $respuesta3="";
    $sentencia = $con->prepare("call agregarHojaVida(?,@res)");

    $sentencia->execute([10]);
    $row = $con->query("SELECT @res as re12")->fetch();
    print_r($row['re12']);

} catch (\Throwable $th) {
    print("ERROR");
    print($th);
}
?>


