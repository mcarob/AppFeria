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
    //FALTA TRAER EL COD ESTUDIANTE
    $_POST["telefono"],
    $_POST["direccion"],
    $_POST["ciudad"],
    $_POST["perfil"]
);
print_r($datosPersonales);
echo '\n---------> Informacion refericias\n Referencia 1 \n';



//Trae todos los datos necesarios para la tabla referencia_hoja
$datosReferencia1=array(
    //FALTA EL CODIGO HOJA DE VIDA
    $_POST["nombreR1"],
    $_POST["cargoR1"],
    $_POST["empresaR1"],
    $_POST["telefonoR1"],
    $_POST["correoR1"]
);

print_r($datosReferencia1);


echo '\n Referencia 2 \n';
$datosReferencia2=array(
    //FALTA EL CODIGO HOJA DE VIDA
    $_POST["nombreR2"],
    $_POST["cargoR2"],
    $_POST["empresaR2"],
    $_POST["telefonoR2"],
    $_POST["correoR2"]
);
print_r($datosReferencia2);





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




//-----------------------Tercera parte del formulario-----------------------------

echo '\n ---------> Informacion experiencias academicas\n ';
//Cantidad de experiencias academicas
$numeroExperienciasAcademicas=$_POST["numExAcademicas"];
//Este arreglo contiene todas las experiencias academicas
$arregloExperienciasAcademicas=array();
foreach(range(1,$numeroExperienciasAcademicas) as $numero)
{   
   array_push($arregloExperienciasAcademicas,$_POST["experienciaAcademica".$numero]);  
}
print_r($arregloExperienciasAcademicas);
echo ' ---------> Informacion experiencias profesionales';



//Cantidad de experiencias academicas
$numeroExperienciasProfesionales=$_POST["numExProfesionales"];
//Este arreglo contiene todas las experiencias academicas
$arregloExperienciasProfesionales=array();
foreach(range(1,$numeroExperienciasProfesionales) as $numero)
{   
   array_push($arregloExperienciasProfesionales,$_POST["experienciaProfesional".$numero]);  
}

print_r($arregloExperienciasProfesionales);
echo '\n';
  




//  $academica=$_POST["numAcademica"];
//  if($academica==0)
//  {
//      if(isset($_POST["academica"]))
//      {
//          $arreglo=$_POST["academica"];
//      }    
//  }else
//  {     
//  }





?>