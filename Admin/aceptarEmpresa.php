<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');

$objeto = new ControladorEmpresa();

if(isset($_GET["action"]))
{
    $var=$_GET["action"];
    echo $objeto->validarEmpresa($var);
    header("location:ValidarEmpresa.php");
}



?>
