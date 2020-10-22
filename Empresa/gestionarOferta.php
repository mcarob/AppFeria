<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');

$cPromocionLab = new ControladorPromocion();


if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'cambiar':
           $r=$cPromocionLab->cambiarEstadoVacante($_GET['codigo']);
            if($r){
                header("location:Ofertas.php");
           }else{
            header("location:Ofertas.php");
           }
        break;
              
        case 'eliminar':
            $r=$cPromocionLab->eliminarVacante($_GET['codigo']);
             if($r){
                 header("location:Ofertas.php");
            }else{
                header("location:Ofertas.php");
            }
         break;
    }

}

?>