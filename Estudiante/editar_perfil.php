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

    
    $_POST["cod_usuario"]       
);

$conUsuario=new ControladorUsuario();
$validacion=$conUsuario->validarContra($datos[3],$_POST["conPassword1"]);
$variable=3;
if($_POST["newPassword"]==$_POST["conPassword"])
{
    $variable=1;
}
if(count($validacion)>0 and $variable==1)
{
$conEstudiante= new ControladorEstudiantes();
$conUsuario=new ControladorUsuario();
$estudiante=new Estudiante($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7]);
echo($conEstudiante->actualizarPerfil($estudiante));
echo($conUsuario->actualizarUsuario($datos[3],$_POST["conPassword"]));

}else if($variable==3)
{
    echo("Las nueva coontraseña no coincide con la confirmacion");
}
else{
    echo("ingrese por favor la contraseña actual para realizar cambios");
}





?>