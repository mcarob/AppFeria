<?php



if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'empresa':
            $filePath = $_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/archivos/Manuales/Empresa.pdf';
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=documento.pdf");
            readfile($filePath);
            break;
        case 'admi':
            $filePath = $_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/archivos/Manuales/Administrador.pdf';
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=documento.pdf");
            readfile($filePath);

            break;

        case 'es':
            $filePath = $_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/archivos/Manuales/Estudiante.pdf';
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=documento.pdf");
            readfile($filePath);

            break;
    }
}
?>