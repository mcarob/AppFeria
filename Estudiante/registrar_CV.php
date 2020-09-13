<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorHojaVida.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/HojaDeVida.php');



//--------------INICIO FORMULARIO DATOS PERSONALES------------------------//

//RECOLECCION DE DATOS DE PERSONALES (FORMULARIO DATOS PERSONALES)
$datosPersonales=array(

    $_POST["nombre"],
    $_POST["apellidos"],
    $_POST["cedula"],
    $_POST["telefono"],
    $_POST["ciudad"],
    $_POST["direccion"],
    $_POST["correo"],
    
    $_POST["nombreR1"],
    $_POST["cargoR1"],
    $_POST["telefonoR1"],

    $_POST["nombreR2"],
    $_POST["cargoR2"],
    $_POST["telefonoR2"]
    
    
);

//--------------INICIO FORMULARIO FORMACIONES-----------------------------//

//RECOLECCION DE VARIAS FORMACIONES ACADEMICAS, (FORMULARIO FORMACIONES) 
$formacionAcademica=array(
    $_POST["academica"]
   );
$instituciones=array(
   $_POST["institucion"]);

$IniciosAca=array(
    $_POST["inicioAca"] 
);  

$FinesAca=array(
    $_POST["finAca"]
);

//RECOLECCION DE VARIAS FORMACIONES COMPLEMENTARIAS, (FORMULARIO FORMACIONES) 
$formacionComplementaria=array(
    $_POST["complementaria"]
);
$cursos=array(
   $_POST["nombreCurso"]);

$iniciosCom=array(
    $_POST["inicioComp"] 
);  

$finesCom=array(
    $_POST["finComp"]
);

//RECOLECCION DE DATOS DE FORMACIONES (FORMULARIO FORMACIONES)
$datosFormacion=array(
//---datos formacion academica    

$_POST["perfil"],
$formacionAcademica,
$instituciones,
$IniciosAca,
$FinesAca,

//---datos formacion complementaria

$formacionComplementaria,
$cursos,
$iniciosCom,
$finesCom
);

//----------------INICIO FORMULARIO EXPERIENCIAS----------------//

//Recoleccion de varias experiencias academicas
$proyectos=array(
    $_POST["proyecto"]
);
$materias=array(
    $_POST["materia"]
);
$periodos=array(
    $_POST["periodo"]
);
$descProyectos=array(
    $_POST["periodo"]
);

//Recoleccion de varias experiencias profesionales
$cargos=array(
    $_POST["cargoPro"]
);
$empresas=array(
    $_POST["empresa"]
);
$iniciosLab=array(
    $_POST["inicioLab"]
);
$finesLab=array(
    $_POST["finLab"]
);
$descCargos=array(
    $_POST["desCargo"]
);

$datosExperiencia=array(
//----Datos experiencia academica    
    $proyectos,
    $materias,
    $periodos,
    $descProyectos,

//---Datos experiencia profesional
    $cargos,
    $empresas,
    $iniciosLab,
    $finesLab,
    $descCargos
);
echo("---------------PERSONAL-----------");
print_r($datosPersonales);

echo("-----------FORMACION-----------------");
print_r($datosFormacion);


echo("-------------EXPERIENCIA-------------");
print_r($datosExperiencia);

?>