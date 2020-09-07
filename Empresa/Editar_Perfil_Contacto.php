<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorContactoEmpresa.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ContactoEmpresa.php');



$datos=array(
    $_POST["codContacto"],
    $_POST["nomContacto"],
    $_POST["apellidoContacto"],    
    $_POST["telefonoContacto"],
    $_POST["cargoContacto"],
    $_POST["correoContacto"]
    
);




$controlador = new ControladorContactoEmpresa();
$contactoEmpresa=new ContactoEmpresa($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5]);

echo($controlador->actualizarContactoEmpresa($contactoEmpresa));



?>