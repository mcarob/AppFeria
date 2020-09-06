<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');



$datos=array(
    $_POST["codEmpresa"],
    $_POST["nitEmpresa"],
    $_POST["razonSocial"],
    $_POST["camaraComercio"],
    $_POST["descripcionEmpresa"],
    $_POST["codUsuario"],
    $_POST["contactoEmpresa"],
    $_POST["logoEmpresa"],
    $_POST["telefonEmpresa"],
    $_POST["correoEmpresa"]
  
    
);




$controlador = new ControladorEmpresa();
$empresa=new Empresa($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8], $datos[9]);

echo($controlador->actualizarEmpresa($empresa));



?>