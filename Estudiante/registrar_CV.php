<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorHojaVida.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/HojaDeVida.php');

// $i=2;
// $variable=$_POST["academica"];
// $variable2=$_POST["academica".$i];
// print_r($variable);
// print_r($variable2);
 print_r($_POST);
 $academica=$_POST["numAcademica"];

 if($academica==0)
 {
     if(isset($_POST["academica"]))
     {

         $arreglo=$_POST["academica"];
         

     }
    
 }else
 {
    $arreglo=array();
     foreach(range(0,$academica) as $numero)
     {
        array_push($arreglo,$_POST["academica"+$numero]);
        
     }
 }
 print_r($arreglo);




?>