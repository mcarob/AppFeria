<?php
session_start();

if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4)) {
    header("location: index.php");
}

if (isset($_GET['action'])) {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');


    
}



?>