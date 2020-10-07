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
    //actualizar cuando trae un logo
    if($_FILES["logo"]["size"]!=0)
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
                echo($conEmpresa->actualizarEmpresa($datos[0],$datos[1],$datos[2],$datos[3],$archilogo));
                }
        }else{
            echo("El formato del logo insertado es incorrecto");
            
        }
    }
    //actualizar cuando no trae logo ni pdf
    else if($_FILES["logo"]["size"]==0 and $_FILES["camaracomercioE"]["size"]==0)
    {
        $conEmpresa=new ControladorEmpresa();
        echo($conEmpresa->actualizarEmpresaSinLogo($datos[0],$datos[1],$datos[2],$datos[3]));
    }//actualizar en caso de que ya este verificada y no trae logo
    else if($_FILES["logo"]["size"]==0)
    {
        $conEmpresa=new ControladorEmpresa();
        echo($conEmpresa->actualizarEmpresaSinLogo($datos[0],$datos[1],$datos[2],$datos[3]));
    }
    //actualizar solo con camara de comercio y sin logo
    else if (isset($_FILES['camaracomercioE'])) {
        if (($_FILES['camaracomercioE']['type']) == 'application/pdf') 
        {    
                try {
                    $datacomercio = $_FILES['camaracomercioE']['tmp_name'];
                    if (($datacomercio == null)) 
                    {
                        echo ("Error al cargar el archivo Camara de comercio ");
                    } else 
                    {
                        $archicomercio = file_get_contents($datacomercio);
                    }
                } catch (Exception $e) {
                    echo ("Error el archivo de la camara de comercio, verificar");
                }
            
                if (isset($archicomercio))
                {
                
                $conEmpresa=new ControladorEmpresa();
                echo($conEmpresa->actualizarEmpresaSoloCamara($datos[0],$datos[1],$datos[2],$datos[3],$archicomercio));
                }

        }else{
            echo("El formato de la camara de comercio es incorrecto");
            
        }
    }
    
    
}   
else
{
        echo("Debe ingresar la contraseña actual para realizar cambios");
}


?>