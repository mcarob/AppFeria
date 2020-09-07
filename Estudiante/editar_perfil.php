<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorUsuario.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorEstudiantes.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');



$datos=array(
    $_POST["cod_estudiante"],
    $_POST["cedula"],       
    $_POST["correo"],
    $_POST["cod_usuario"],
    $_POST["nombres"],
    $_POST["apellidos"],
    $_POST["programa"],
    $_POST["semestre"],

    
    $_POST["cod_usuario"],
    $_POST["conPassword"]
       
);

$conEstudiante= new ControladorEstudiantes();
$estudiante=new Estudiante($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7]);
echo($conEstudiante->actualizarPerfil($estudiante));


$conUsuario=new ControladorUsuario();

echo($conUsuario->actualizarUsuario($datos[8],$datos[9]));




?>