<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4)) {
    header("location: ../index.php");
}

#nclude_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/conexion/db.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPostulaciones.php');
#include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEstudiantes.php');
#include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');
echo($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/conexion/db.php');
#$objeto = new ControladorPostulacion();
#$conE = new ControladorEstudiantes();
echo("error 15");
#$conP = new ControladorEmpresa();
#$lista = $objeto->HistorialPost();
echo("error 19");


#include('menuAdmi.php');
#include('Header.php');
?>




<?php


include('Footer.php')

?>