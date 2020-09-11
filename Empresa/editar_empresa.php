<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorUsuario.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');


$datos=array( 
    $_POST["codigo_empresa"],
    $_POST["razonSocial"],
    $_POST["telefonEmpresa"],
    $_POST["descripcionEmpresa"]
);

$conUsuario=new ControladorUsuario();
$validacion=$conUsuario->validarContra($_POST["codUsuario"],$_POST["conPassword1"]);

if(count($validacion)>0)
{    
    if($_POST["logo"] != null)
    {
        if (((($_FILES['logo']['type']) == 'image/png') || (($_FILES['logo']['type']) == 'image/jpeg'))) 
        {
                try 
                {
                    $datalogo = ($_FILES['logo']['tmp_name']);
                        
                    if (($datalogo == null)) 
                    {
                     echo ("Error al cargar el archivo");
                    } else 
                    {
                     $archilogo = file_get_contents($datalogo);
                    }
                }catch (Exception $e) 
                {
                  echo ("Error al cargar el logo, verificar");
                }
                if (isset($archilogo))
                {
                $conEmpresa=new ControladorEmpresa();
                echo($conEmpresa->actualizarEmpresa($datos[0],$datos[0],$datos[0],$datos[0],$archilogo));
                }
        }else{
            echo("formato incorrecto");
        }  
    }
}   
else
{
        echo("Debe ingresar la contraseña actual para realizar cambios");
}


?>