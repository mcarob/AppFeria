<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorPostulaciones.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionPostulacion.php');


$datos=array(
    
    $_POST["codigooo"],
    $_POST["ofertaa"]
    
    
);

$controlador = new ControladorPostulacion;
$promocion=new PromocionPostulacion(0, $datos[1], $datos[0], 1,null, null,null);
echo ($controlador->agregarPostulacion($promocion));



?>