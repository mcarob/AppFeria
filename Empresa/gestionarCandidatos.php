<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEstudiantes.php');

$cEstudiante= new ControladorEstudiantes();


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'notificar':
            $datos=array(
                $_POST["mensaje"],
                $_POST["desde"],
                $_POST["select"]
            );
            echo ($r=$cEstudiante->editarNotificacion($datos[1],$_GET['codigo'],$datos[0], $datos[2]));
            
        break;
            
          
    }

}

?>