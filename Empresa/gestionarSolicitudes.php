<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPostulaciones.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');


$cPromocionLab = new ControladorPostulacion();
$cPromocionLaboral = new ControladorPromocion();

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
            $codPost = $_GET['codigo'];
            $object = $cPromocionLab->darListaPostulacionesxpost($codPost);
            
            $laboralOb = $cPromocionLaboral->darOferta($object[0][1]);
            $codEmpresa = $laboralOb->getCodEmpresa();
            $codCiudad = $laboralOb->getPromocionCiudad();
            $codEst = $object[0][2];

            $r=$cPromocionLab->legalizarC($codEst,$codPost, $codEmpresa,$codCiudad);
            
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
