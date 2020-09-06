<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionLaboral.php');


$datos=array(
    
    $_POST["perfil"],
   
    $_POST["lunes"],
    $_POST["martes"],
    $_POST["miercoles"],
    $_POST["jueves"],
    $_POST["viernes"],
    $_POST["sabado"],
    $_POST["domingo"],

    $_POST["remuneracion"],
    $_POST["ranRemuneracion"],
    $_POST["beneficioExtra"],
    $_POST["cargo"],
    $_POST["fechaInicio"],
    $_POST["descripcion"],
    $_POST["codEmpresa"],
    $_POST["fechaPublicacion"],
    $_POST["ciudad"],    
    $_POST["titulo"],
    $_POST["numVacantes"],
    
    
);
$horarios=$datos[1].";".$datos[2].";".$datos[3].";".$datos[4].";".$datos[5].";".$datos[6].";".$datos[7];



$controlador = new ControladorPromocion();
$promocion=new PromocionLaboral(0,$datos[0],null,
                                $horarios,$datos[8],
                                $datos[9],$datos[10],$datos[11],
                                $datos[12],$datos[13],$datos[14],
                                $datos[15],$datos[16],$datos[17],
                                $datos[18],1);

echo($controlador->agregarPromocion($promocion));



?>