<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPostulaciones.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionPostulacion.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Legalizar.php');

$controlador = new ControladorPostulacion;

if (isset($_GET["action"])) {
    $var = $_GET["action"];
    $datos=array(    
        $_POST["ciudad"],
        $_POST["cod_empresa"],
    );
    $codEmpresa = $datos[1];
    $legal = new Legalizar(0,$codEmpresa,$var,'now()',$datos[0]);
    echo ($controlador->agregarLegalizacion($legal));
}

?>

