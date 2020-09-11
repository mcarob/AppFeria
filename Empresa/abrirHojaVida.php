<?php
session_start();


if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 3)) {
    header("location: ../index.php");
}

if (isset($_GET['action'])) {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEstudiantes.php');

    $control= new ControladorEstudiantes();
    $blob=$control->darEstudiante($_GET['action']); 
   
    $filePath=$_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/archivos/HojadeVida/'.$ddd;
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

