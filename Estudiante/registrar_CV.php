<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorHojaVida.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/HojaDeVida.php');



$datosFormacion=array(
$POST["perfil"],

$POST["academica"],
$POST["institucion"],
$POST["inicioAca"],
$POST["finAca"],


$POST["complementaria"],
$POST["nombreCurso"],
$POST["nombreCurso"],
$POST["inicioComp"],
$POST["finComp"],
);



$datosPersonales=array(
    $POST["nombre"],
    $POST["apellidos"],
    $POST["cedula"],
    $POST["telefono"],
    $POST["ciudad"],
    $POST["direccion"],
    $POST["correo"],
    
    $POST["nombreR1"],
    $POST["cargoR1"],
    $POST["telefonoR1"],

    $POST["nombreR2"],
    $POST["cargoR2"],
    $POST["telefonoR2"]
    
    
);

$datosExperiencia=array(
    $POST["proyecto"],
    $POST["materia"],
    $POST["periodo"],
    $POST["descProy"],

    $POST["cargoPro"],
    $POST["empresa"],
    $POST["inicioLab"],
    $POST["finLab"],
    $POST["desCargo"]
);
echo("EXPERIENCIA");
print_r($datosExperiencia);
echo("PERSONAL");
print_r($datosPersonales);
echo("FORMACION");
print_r($datosFormacion);

?>