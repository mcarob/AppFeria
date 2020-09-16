<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorHojaVida.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/HojaDeVida.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorReferencia.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ReferenciaHoja.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorAcademicaHoja.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/AcademicaHoja.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorFormacionComp.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/FormacionComplementaria.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorProcesosFormativos.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ProcesosFormativos.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorExperienciaHoja.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ExperienciaHoja.php');

//--------------------------Primera parte del formulario------------------------------

echo '---------> Informacion personal\n';
//Trae todos los datos necesarios para la tabla hoja_vida
$datosPersonales=array(
    //FALTA EL CODIGO HOJA DE VIDA
    $_POST["codigoEstudiante"],
    $_POST["telefono"],
    $_POST["direccion"],
    $_POST["ciudad"],
    $_POST["perfil"]
);
print_r($datosPersonales);
echo '\n---------> Informacion refericias\n Referencia 1 \n';
$controladorHoja=new ControladorHojaVida();
$hoja=new HojaDeVida($datosPersonales[0],$datosPersonales[1],$datosPersonales[2],
$datosPersonales[3],$datosPersonales[4]);
$controladorHoja->agregarHojaDeVida($hoja);

$codigoHoja=$controladorHoja->darIdHoja($datos[0]);



$controladorReferencia=new ControladorReferenica();
//Trae todos los datos necesarios para la tabla referencia_hoja
$datosReferencia1=array(
    //FALTA EL CODIGO HOJA DE VIDA
    $_POST["nombreR1"],
    $_POST["cargoR1"],
    $_POST["empresaR1"],
    $_POST["telefonoR1"],
    $_POST["correoR1"]
);

$lleno1=1;
foreach($datosReferencia1 as $lleno1)
{
    if($lleno1==null)
    {
        $lleno1=0;
    }
}

print_r($datosReferencia1);

if($lleno1==1)
{
    $referenica1=new ReferenciaHoja($codigoHoja,$datosReferencia1[0],
    $datosReferencia1[1],$datosReferencia1[2],$datosReferencia1[3],$datosReferencia1[4]);
    $controladorReferencia->insertarReferencia($referencia1);
}

echo '\n Referencia 2 \n';
$datosReferencia2=array(
    $_POST["nombreR2"],
    $_POST["cargoR2"],
    $_POST["empresaR2"],
    $_POST["telefonoR2"],
    $_POST["correoR2"]
);
print_r($datosReferencia2);

$lleno2=1;
foreach($datosReferencia2 as $lleno2)
{
    if($lleno1==null)
    {
        $lleno1=0;
    }
}
if($lleno2==1)
{
    $referenica2=new ReferenciaHoja($codigoHoja,$datosReferencia1[0],
    $datosReferencia1[1],$datosReferencia1[2],$datosReferencia1[3],$datosReferencia1[4]);
    $controladorReferencia->insertarReferencia($referencia2);
}



//-----------------------Segunda parte del fomrulario-----------------------------

echo '\n ---------> Informacion formaciones academicas\n ';

//Cantidad de formaciones academicas
$numeroAcademicas=$_POST["numAcademica"];
//Este arreglo contiene todas las formaciones academicas
$arregloAcademicas=array();
foreach(range(1,$numeroAcademicas) as $numero)
{       
    array_push($arregloAcademicas,$_POST["academica".$numero]);       
}
print_r($arregloAcademicas);
echo '\n';

$controladorAcademica=new ControladorAcademicaHoja();
for ($i=0; $i< sizeof($arregloAcademicas) ;$i++)
{
    $infoA=$arregloAcademicas[$i];
    $academica=new AcademicaHoja($codigoHoja,$infoA[0],$infoA[2],$infoA[3],$infoA[4],$infoA[1]);
    $controladorAcademica->insertarHojaAcademica($academica);
}

 echo '\n ---------> Informacion formaciones complementarias\n';

//Cantidad de formaciones complementarias
$numeroComplementarias=$_POST["numComplementaria"];
//Este arreglo contiene todas las formaciones complementarias
$arregloComplementarias=array();
foreach(range(1,$numeroComplementarias) as $numero)
{   
   array_push($arregloComplementarias,$_POST["complementaria".$numero]);  
}
print_r($arregloComplementarias);
echo '\n';


$controladorComplementaria=new ControladorFormacionComp();
for ($i=0; $i< sizeof($arregloComplementarias) ;$i++)
{
    $infoC=$arregloComplementarias[$i];
    $complementaria=new FormacionComplementaria($codigoHoja,$infoC[1],$infoC[0],$infoC[3],$infoC[2]);
    $controladorComplementaria->agregarComplementaria($complementaria);
}


// //-----------------------Tercera parte del formulario-----------------------------

echo '\n ---------> Informacion experiencias academicas\n ';
//Cantidad de experiencias academicas
$numeroExperienciasAcademicas=$_POST["numExAcademicas"];
// //Este arreglo contiene todas las experiencias academicas
$arregloExperienciasAcademicas=array();
foreach(range(1,$numeroExperienciasAcademicas) as $numero)
{   
   array_push($arregloExperienciasAcademicas,$_POST["experienciaAcademica".$numero]);  
}
print_r($arregloExperienciasAcademicas);

$controladorFormativo=new ControladorProcesosFormativos();
for ($i=0; $i< sizeof($arregloExperienciasAcademicas) ;$i++)
{
    $infoPF=$arregloExperienciasAcademicas[$i];
    $formativo=new ProcesosFormativos($codigoHoja,$infoPF[0],$infoPF[3],$infoPF[2],$infoPF[1]);
    $controladorFormativo->insertarProcesoFormativo($formativo);
}


echo ' ---------> Informacion experiencias laborales';



// //Cantidad de experiencias academicas
$numeroExperienciasProfesionales=$_POST["numExProfesionales"];
// //Este arreglo contiene todas las experiencias academicas
$arregloExperienciasProfesionales=array();
foreach(range(1,$numeroExperienciasProfesionales) as $numero)
{   
   array_push($arregloExperienciasProfesionales,$_POST["experienciaProfesional".$numero]);  
}
$controladorlaboral=new ControladorExperiencia();
for ($i=0; $i< sizeof($arregloExperienciasProfesionales) ;$i++)
{
    $infoPL=$arregloExperienciasProfesionales[$i];
    $laboral=new ProcesosFormativos($codigoHoja,$infoPL[0],$infoPL[1],$infoPL[2],$infoPL[3],
    $infoPL[4]);
    $controladorlaboral->agregarExperiencia($laboral);
}

?>