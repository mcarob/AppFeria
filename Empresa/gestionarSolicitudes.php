<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/controladorPostulaciones.php');

$cPromocionLab = new ControladorPostulacion();


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'leer':
           $r=$cPromocionLab->cambiarEstado($_GET['codigo'],2);
            if($r){
                header("location:AdminSolicitudes.php");
           }else{
            echo ($r);
           }
        break;
        case 'Aceptar':
            $r=$cPromocionLab->cambiarEstado($_GET['codigo'],3);
            if($r){
                header("location:AdminSolicitudes.php");
           }else{
            echo ($r);
           }
        break;

        case 'rechazar':
            $datos=array(
                $_POST["motivo"]
            );
            $r=$cPromocionLab->cambiarEstado($_GET['codigo'],4);
            echo ($cPromocionLab->registrarMotivo($_GET['codigo'], $datos[0]));
            
        break;
        case 'formalizar':
            $r=$cPromocionLab->cambiarEstado($_GET['codigo'],5);
            if($r){
                header("location:AdminSolicitudes.php");
           }else{
            echo ($r);
           }
        break;
            
          
    }

}

?>