<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorHojaVida.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/HojaDeVida.php');


//RECOLECCION DE VARIAS FORMACIONES ACADMICAS, (FORMULARIO FORMACIONES) 
$formacionAcademica=array(
    $_POST["academica"]
   );
$institucion=array(
   $_POST["finAca"]);

$InicioAca=array(
    $_POST["inicioAca"] 
);  

$FinAca=array(
    $_POST["finAca"]
);
//RECOLECCION DE VARIAS FORMACIONES COMPLEMENTARIAS, (FORMULARIO FORMACIONES) 
$formacionComplementaria=array(
    $_POST["complementaria"]
   );
$institucion=array(
   $_POST["finAca"]);

$InicioAca=array(
    $_POST["inicioAca"] 
);  

$FinAca=array(
    $_POST["finAca"]
);

//RECOLECCION DE DATOS DE FORMACIONES
// $datosFormacion=array(

//DATOS FORMACION ACADEMICA    

//  $_POST["perfil"],
// $formacionAcademica,
// $institucion,
// $InicioAca,
// $FinAca,


//DATOS FORMACION COMPLEMENTARIA

// $_POST["complementaria"],
// $_POST["nombreCurso"],
// $_POST["nombreCurso"],
// $_POST["inicioComp"],
// $_POST["finComp"],
// );



// $datosPersonales=array(
//     $_POST["nombre"],
//     $_POST["apellidos"],
//     $_POST["cedula"],
//     $_POST["telefono"],
//     $_POST["ciudad"],
//     $_POST["direccion"],
//     $_POST["correo"],
    
//     $_POST["nombreR1"],
//     $_POST["cargoR1"],
//     $_POST["telefonoR1"],

//     $_POST["nombreR2"],
//     $_POST["cargoR2"],
//     $_POST["telefonoR2"]
    
    
// );

// $datosExperiencia=array(
//     $_POST["proyecto"],
//     $_POST["materia"],
//     $_POST["periodo"],
//     $_POST["descProy"],

//     $_POST["cargoPro"],
//     $_POST["empresa"],
//     $_POST["inicioLab"],
//     $_POST["finLab"],
//     $_POST["desCargo"]
// );
// echo("EXPERIENCIA");
// print_r($datosExperiencia);
// echo("PERSONAL");
// print_r($datosPersonales);
// echo("FORMACION");
// print_r($datosFormacion);

?>