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
    
    $_POST["perfil"],
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


$controlador = new ControladorPromocion();
$promocion=new PromocionLaboral(0,$datos[0],null,
                                 $horarios,0,
                                 $datos[2],$datos[3],$datos[4],
                                 $datos[5],$datos[6],$datos[7],
                                 $datos[8],$datos[9],$datos[10],
                                 $datos[11],1);

echo($controlador->agregarPromocion($promocion));



?>