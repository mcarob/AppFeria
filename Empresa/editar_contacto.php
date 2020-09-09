<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorUsuario.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorContactoEmpresa.php');


$datos=array(
    
    $_POST["codContacto"],
    $_POST["nomContacto"],
    $_POST["apellidoContacto"],       
    $_POST["telefonoContacto"],
    $_POST["cargoContacto"],
    $_POST["correoContacto"]
    
    
);

$conUsuario=new ControladorUsuario();
$validacion=$conUsuario->validarContra($_POST["codUsuario"],$_POST["conPassword1"]);
$variable=3;
if($_POST["newPassword"]==$_POST["conPassword"])
{
    $variable=1;
}
if(count($validacion)>0 and $variable==1)
{
$conContacto= new ControladorContactoEmpresa();
$conUsuario=new ControladorUsuario();
$contacto=new ContactoEmpresa($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5]);
echo($conContacto->actualizarContactoEmpresa($contacto));
echo($conUsuario->actualizarUsuario($_POST["codUsuario"],$_POST["conPassword"]));

}else if($variable==3)
{
    echo("Las nueva coontraseña no coincide con la confirmacion");
}
else{
    echo("Por favor ingrese la contraseña actual para realizar cambios");
}





?>