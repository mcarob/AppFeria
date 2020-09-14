<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/controladorEmpresa.php');

$cEmpresa= new ControladorEmpresa();


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        // case 'rechazar':
        //     $datos=array(
        //         $_POST["motivo"],
        //         $_POST["select"]
        //     );
        //     echo ($cPromocionLab->registrarMotivo($_GET['codigo'], $datos[0], $datos[1]));
        // break;
        case 'notificar':
            $datos=array(
                $_POST["mensaje"],
                $_POST["desde"]
            );
            echo ($r=$cEmpresa->editarNotificacion($datos[1],$_GET['codigo'],$datos[0]));
            
        break;
            
          
    }

}

?>