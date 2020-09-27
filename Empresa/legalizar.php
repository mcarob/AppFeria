<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPostulaciones.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionPostulacion.php');
$controlador = new ControladorPostulacion;

if (isset($_GET["action"])) {
    $var = $_GET["action"];
    $promocion = new PromocionPostulacion(0, 13 , $var, 5, null, null, null);
    echo ($controlador->agregarPostulacion($promocion));
}



?>

