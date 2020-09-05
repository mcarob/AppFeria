<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/controladorAdministrador.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/controladorUsuario_Administrador.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Administrador.php');



$datos=array(
    $_POST["codAdministrador"],
    $_POST["codUsuario"],
    $_POST["nomAdministrador"],
    $_POST["apellidoAdministrador"],
    $_POST["correoAdministrador"]
  
    
);




$controlador = new ControladorAdministrador();
$administrador=new Administrador($datos[0], $datos[1], $datos[2], $datos[3], $datos[4]);

echo($controlador->actualizarAdministrador($administrador));



?>