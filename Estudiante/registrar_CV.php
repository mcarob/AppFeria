<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorHojaVida.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/HojaDeVida.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorReferencia.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/referenciaHoja.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorAcademicaHoja.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/AcademicaHoja.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorFormacionComp.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/FormacionComplementaria.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorProcesosFormativos.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ProcesosFormativos.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorExperienciaHoja.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ExperienciaHoja.php');

//--------------------------Primera parte del formulario------------------------------


//Trae todos los datos necesarios para la tabla hoja_vida
$datosPersonales=array(
    $_POST["codigoEstudiante"],
    $_POST["telefono"],
    $_POST["direccion"],
    $_POST["ciudad"],
    $_POST["perfil"]
);



$controladorHoja=new ControladorHojaDeVida();
$hoja=new HojaDeVida(0,$datosPersonales[0],$datosPersonales[1],$datosPersonales[2],$datosPersonales[3],$datosPersonales[4]);

$codigoHoja=$controladorHoja->agregarHojaDeVida($hoja);

if($codigoHoja!=null)
{
    echo (1);
}


$controladorReferencia=new ControladorReferenica();
//Trae todos los datos necesarios para la tabla referencia_hoja
$datosReferencia1=array(
    $_POST["nombreR1"],
    $_POST["cargoR1"],
    $_POST["empresaR1"],
    $_POST["telefonoR1"],
    $_POST["correoR1"]
);

$lleno1=1;
$contador1=0;
foreach($datosReferencia1 as $lleno)
{
    if($lleno==null || $lleno=="")
    {
        $contador1++;
        $lleno1=0;
    }
}


if($contador1==1 and ($datosReferencia1[2]=="" || $datosReferencia1[2]==null))
{
    $lleno1=1;
}
if($lleno1==1)
{
    $referencia1=new ReferenciaHoja(0,$codigoHoja,$datosReferencia1[0],$datosReferencia1[1],
    $datosReferencia1[2],$datosReferencia1[3],$datosReferencia1[4]);
    $controladorReferencia->insertarReferencia($referencia1);

}





$datosReferencia2=array(
    $_POST["nombreR2"],
    $_POST["cargoR2"],
    $_POST["empresaR2"],
    $_POST["telefonoR2"],
    $_POST["correoR2"]
);

$lleno2=1;
$contador2=0;
foreach($datosReferencia2 as $lleno)
{
    if($lleno==null || $lleno=="" )
    {
        $contador2++;
        $lleno2=0;
    }
}

if($contador2==1 and ($datosReferencia2[2]=="" || $datosReferencia2[2]==null))
{
    $lleno2=1;
}
if($lleno2==1)
{
    $referencia2=new ReferenciaHoja(0,$codigoHoja,$datosReferencia2[0],
    $datosReferencia2[1],$datosReferencia2[2],$datosReferencia2[3],$datosReferencia2[4]);
    
    $controladorReferencia->insertarReferencia($referencia2);
}



//-----------------------Segunda parte del fomrulario-----------------------------




//Cantidad de formaciones academicas
$numeroAcademicas=$_POST["numAcademica"];
//Este arreglo contiene todas las formaciones academicas
if($numeroAcademicas!=0)
{
    $arregloAcademicas=array();
    foreach(range(1,$numeroAcademicas) as $numero)
    {       
        array_push($arregloAcademicas,$_POST["academica".$numero]);       
    }
  

    $controladorAcademica=new ControladorAcademicaHoja();
    for ($i=0; $i< sizeof($arregloAcademicas) ;$i++)
    {
        $infoA=$arregloAcademicas[$i];
        $academica=new AcademicaHoja(0,$codigoHoja,$infoA[0],$infoA[2],$infoA[3],$infoA[4],$infoA[1]);
        
        $controladorAcademica->insertarHojaAcademica($academica);
    }
}



//Cantidad de formaciones complementarias
$numeroComplementarias=$_POST["numComplementaria"];
//Este arreglo contiene todas las formaciones complementarias
if($numeroComplementarias!=0)
{
    $arregloComplementarias=array();
    foreach(range(1,$numeroComplementarias) as $numero)
    {   
    array_push($arregloComplementarias,$_POST["complementaria".$numero]);  
    }
  

    $controladorComplementaria=new ControladorFormacionComp();
    for ($i=0; $i< sizeof($arregloComplementarias) ;$i++)
    {
        $infoC=$arregloComplementarias[$i];
        $complementaria=new FormacionComplementaria(0,$codigoHoja,$infoC[1],$infoC[0],$infoC[3],$infoC[2]);
        $controladorComplementaria->agregarComplementaria($complementaria);
    }
}


// // //-----------------------Tercera parte del formulario-----------------------------



//Cantidad de experiencias academicas
$numeroExperienciasAcademicas=$_POST["numExAcademicas"];
// //Este arreglo contiene todas las experiencias academicas
if($numeroExperienciasAcademicas!=0)
{
    $arregloExperienciasAcademicas=array();
    foreach(range(1,$numeroExperienciasAcademicas) as $numero)
    {   
    array_push($arregloExperienciasAcademicas,$_POST["experienciaAcademica".$numero]);  
    }

    $controladorFormativo=new ControladorProcesosFormativos();
    for ($i=0; $i< sizeof($arregloExperienciasAcademicas) ;$i++)
    {
        $infoPF=$arregloExperienciasAcademicas[$i];
        $formativo=new ProcesosFormativos(0,$codigoHoja,$infoPF[0],$infoPF[3],$infoPF[2],$infoPF[1]);
        $controladorFormativo->insertarProcesoFormativo($formativo);
    }
}


// //Cantidad de experiencias academicas
$numeroExperienciasProfesionales=$_POST["numExProfesionales"];
// //Este arreglo contiene todas las experiencias academicas
if($numeroExperienciasProfesionales!=0)
{
    $arregloExperienciasProfesionales=array();
    foreach(range(1,$numeroExperienciasProfesionales) as $numero)
    {   
    array_push($arregloExperienciasProfesionales,$_POST["experienciaProfesional".$numero]);  
    }
    $controladorlaboral=new ControladorExperiencia();
    for ($i=0; $i< sizeof($arregloExperienciasProfesionales) ;$i++)
    {
        $infoPL=$arregloExperienciasProfesionales[$i];
        $laboral=new ExperienciaHoja(0,$codigoHoja,$infoPL[0],$infoPL[1],$infoPL[2],$infoPL[3],$infoPL[4]);
        $controladorlaboral->agregarExperiencia($laboral);
    }
}

?>