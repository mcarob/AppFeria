<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionLaboral.php');

$horarios="";
if (isset($_POST['lunes'])) {
    $horarios="Lunes;";
}
if(isset($_POST['martes'])){
    $horarios=$horarios."Martes;";
}
if(isset($_POST['miercoles'])){
    $horarios=$horarios."Miercoles;";
}
if(isset($_POST['jueves'])){
    $horarios=$horarios."Jueves;";
}
if(isset($_POST['viernes'])){
    $horarios=$horarios."Viernes;";
}
if(isset($_POST['sabado'])){
    $horarios=$horarios."Sabado;";
}
if(isset($_POST['domingo'])){
    $horarios=$horarios."Domingo;";
}

$horarios=$horarios.$_POST['hora'];

$datos=array(
    $_POST["codigo"],
    $_POST["perfil"],
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



$controlador = new ControladorPromocion();
$vacante=new PromocionLaboral($datos[0],$datos[1],null,
                                $horarios,0,$datos[3],
                                $datos[4],$datos[5],$datos[6],
                                $datos[7],$datos[8],$datos[9],
                                $datos[10],$datos[11],$datos[12],
                                $datos[13]);

echo($controlador->actualizarVacante($vacante));



?>