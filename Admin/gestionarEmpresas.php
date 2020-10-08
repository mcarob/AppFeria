<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');

$cEmpresa= new ControladorEmpresa();


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
         case 'rechazar':
             echo ($cEmpresa->rechazar($_GET['codigo']));
        break;
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