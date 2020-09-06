<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');

$cPromocionLab = new ControladorPromocion();


if (isset($_GET['action'])) {

    echo($_GET['action']);
    switch ($_GET['action']) {
        case 'cambiar':
           $r=$cPromocionLab->cambiarEstadoVacante($_GET['codigo']);
            if($r){
                header("location:Ofertas.php");
           }else{
            echo ($r);
           }
        break;
              
        case 'eliminar':
            $r=$cPromocionLab->eliminarVacante($_GET['codigo']);
             if($r){
                 header("location:Ofertas.php");
            }else{
             echo ($r);
            }
         break;
    }

}

?>