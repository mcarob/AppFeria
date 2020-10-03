<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorUsuario.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorAdministrador.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Administrador.php');



$datos=array(
    $_POST["codAdministrador"],
    $_POST["codUsuario"],  
    $_POST["nomAdministrador"],     
    $_POST["apellidoAdministrador"],
    $_POST["correoAdministrador"]    
);


$conUsuario=new ControladorUsuario();
$validacion=$conUsuario->validarContra($datos[1],$_POST["conPassword1"]);


if(count($validacion)>0)
{
    if($_POST["newPassword"]==null and $_POST["conPassword"]==null)
    {
        $conAdministrador= new ControladorAdministrador();
        $administrador=new Administrador($datos[0],$datos[1],$datos[2],$datos[3],$datos[4]);
        echo($conAdministrador->actualizarAdministrador($administrador));
    }
    else if($_POST["newPassword"]!=null or $_POST["conPassword"]!=null)
    {
        if($_POST["newPassword"]==$_POST["conPassword"])
        {
        $conAdministrador= new ControladorAdministrador();
        $administrador=new Administrador($datos[0],$datos[1],$datos[2],$datos[3],$datos[4]);
        $conAdministrador->actualizarAdministrador($administrador);
        $conUsuario=new ControladorUsuario();
        echo($conUsuario->actualizarUsuario($_POST["codUsuario"],$_POST["conPassword"]));
        
        }else{
        echo("La nueva contraseña no coincide con la confirmacion");
        }
    }

}else{
    echo("ingrese por favor la contraseña actual para realizar cambios");
}





?>