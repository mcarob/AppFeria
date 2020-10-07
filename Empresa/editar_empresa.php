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
    // con logo 0---->1   LISTO
    if($_FILES["logo"]["size"]!=0 and $_FILES["camaracomercioE"]["size"]==0)
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

    // con pdf   0---->1	LISTO
    else if($_FILES["logo"]["size"]==0 and $_FILES["camaracomercioE"]["size"]!=0)
    {
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
                $comercio = ($_FILES['camaracomercioE']['tmp_name']);
                $pname = rand(1000,10000)."-".$_FILES["camaracomercioE"]["name"];
                $tname = $_FILES["camaracomercioE"]["tmp_name"];
                $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/archivos/camaraComercio';
                $seMovio=move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                $conEmpresa=new ControladorEmpresa();
                echo($conEmpresa->actualizarEmpresaSoloCamara($datos[0],$datos[1],$datos[2],$datos[3],$pname));
                }

        }else{
            echo("El formato de la camara de comercio es incorrecto");
            
        }
    }
    // con pdf - logo >1-->1	
    else if ($_FILES['camaracomercioE']["size"]!=0 and $_FILES["logo"]["size"]!=0)
    {
        if (($_FILES['camaracomercioE']['type']) == 'application/pdf' and ((($_FILES['logo']['type']) == 'image/png') || (($_FILES['logo']['type']) == 'image/jpeg'))) 
        {    
                try {
                    $datacomercio = $_FILES['camaracomercioE']['tmp_name'];
                    $datalogo = ($_FILES['logo']['tmp_name']);
                    if (($datacomercio == null)) 
                    {
                        echo ("Error al cargar la camara de comercio");
                    }else if(($datalogo==null)){
                        echo ("Error al cargar el logo");
                    } else 
                    {
                        $archilogo = file_get_contents($datalogo);
                        $archicomercio = file_get_contents($datacomercio);
                    }
                } catch (Exception $e) {
                    echo ("Error en los archivos, verificar");
                }
            
                if (isset($archicomercio) and isset($archilogo))
                {
                    $comercio = ($_FILES['camaracomercioE']['tmp_name']);
                    $pname = rand(1000,10000)."-".$_FILES["camaracomercioE"]["name"];
                    $tname = $_FILES["camaracomercioE"]["tmp_name"];
                    $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/archivos/camaraComercio';
                    $seMovio=move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                    $conEmpresa=new ControladorEmpresa();
                    echo($conEmpresa->actualizarEmpresaCamaraYLogo($datos[0],$datos[1],$datos[2],$datos[3],$pname,$archilogo));
                }

        }else{
            echo("Por favor revise que los formatos sean correctos, camara de comercio(PDF), logo (PNG o JPG)");            
        }
    }
    // sin pdf - logo 0--0
     else if($_FILES["logo"]["size"]==0 and $_FILES["camaracomercioE"]["size"]==0)
     {
         $conEmpresa=new ControladorEmpresa();
         echo($conEmpresa->actualizarEmpresaSinLogoYCamara($datos[0],$datos[1],$datos[2],$datos[3]));
     }
}   
else
{
        echo("Debe ingresar la contraseña actual para realizar cambios");
}


?>