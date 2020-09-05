<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionLaboral.php');



$datos=array(
    $_POST["codigo"],
    $_POST["perfil"],

    $_POST["lunes"],
    $_POST["martes"],
    $_POST["miercoles"],
    $_POST["jueves"],
    $_POST["viernes"],
    $_POST["sabado"],
    $_POST["domingo"],

    
    $_POST["compensacion"],
    $_POST["rango"],
    $_POST["beneficios"],
    $_POST["cargo"],
    $_POST["inicio"],
    $_POST["descripcion"],
    $_POST["empresa"],
    $_POST["fecha"],
    $_POST["ciudad"],
    $_POST["titulo"],
    $_POST["vacantes"],
    $_POST["estado"]
    
);

$horarios=$datos[2].";".$datos[3].";".$datos[4].";".$datos[5].";".$datos[6].";".$datos[7].";".$datos[8];


$controlador = new ControladorPromocion();
$vacante=new PromocionLaboral($datos[0],$datos[1],null,
                                $horarios,$datos[9],$datos[10],
                                $datos[11],$datos[12],$datos[13],
                                $datos[14],$datos[15],$datos[16],
                                $datos[17],$datos[18],$datos[19],
                                $datos[20]);

echo($controlador->actualizarVacante($vacante));



?>