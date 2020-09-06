<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/controladorPostulaciones.php');

$cPromocionLab = new ControladorPostulacion();


if (isset($_GET['action'])) {
    echo("entro a 8");
    echo($_GET['action']);
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
            
            echo $r=$cPromocionLab->cambiarEstado($_GET['codigo'],4);
            
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