<?php
session_start();

if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4)) {
    header("location: index.php");
}

if (isset($_GET['action'])) {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');

    $control= new ControladorEmpresa();
    $blob=$control->darBlobCamara($_GET['action']); 
    $ddd=($blob[0]['CAMARA_COMERCIO_PDF']);
    $filePath=$_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/archivos/camaraComercio/'.$ddd;
    if (!file_exists($filePath)) {
        echo "The file $filePath does not exist";
        die();
    }
    $filename="Test.pdf";
    header('Content-type:application/pdf');
    header('Content-disposition: inline; filename="'.$filename.'"');
    header('content-Transfer-Encoding:binary');
    header('Accept-Ranges:bytes');
    readfile($filePath);
?>
    
    
<?php

    
}

?>

