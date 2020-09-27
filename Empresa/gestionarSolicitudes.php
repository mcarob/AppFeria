<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/controladorPostulaciones.php');


$cPromocionLab = new ControladorPostulacion();
$enviar = new enviarCorreo();

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
                $_POST["motivo"],
                $_POST["select"]
            );
            $r=$cPromocionLab->cambiarEstado($_GET['codigo'],4);
            echo ($cPromocionLab->registrarMotivo($_GET['codigo'], $datos[0], $datos[1]));
            
        break;
        case 'formalizar':
            $r=$cPromocionLab->cambiarEstado($_GET['codigo'],7);
            if($r){
                header("location:AdminSolicitudes.php");
           }else{
            echo ($r);
           }
        break;
        case 'aceptarO':
            $r=$cPromocionLab->cambiarEstado($_GET['codigo'],5);
             if($r){
                 header("location:../Estudiante/ListaPostulaciones.php");
            }else{
             echo ($r);
            }
         break;

         case 'rechazarO':
            $r=$cPromocionLab->cambiarEstado($_GET['codigo'],8);
             if($r){
                 header("location:../Estudiante/ListaPostulaciones.php");
            }else{
             echo ($r);
            }
         break;
        
          
    }

}
