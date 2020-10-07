<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPostulaciones.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionPostulacion.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Legalizar.php');

$controlador = new ControladorPostulacion;
$controladorLaboral = new ControladorPromocion();
if (isset($_GET["action"])) {
    $var = $_GET["action"];
    $datos=array(    
        $_POST["ciudad"],
        $_POST["cod_empresa"],
    );
    $codEmpresa = $datos[1];
    echo ($controlador->legalizarC($var,0,$codEmpresa,$datos[0] ));
}

?>

