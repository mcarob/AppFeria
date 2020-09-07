<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/conexion/db.php');
if (isset($_POST["REM"])) {
    if (isset($_FILES['camaracomercioE'])) {
        if (($_FILES['camaracomercioE']['type']) == 'application/pdf') {
            if (((($_FILES['logo']['type']) == 'image/png') || (($_FILES['logo']['type']) == 'image/jpeg'))) {
                try {
                    $datacomercio = ($_FILES['camaracomercioE']['tmp_name']);
                    $datalogo = ($_FILES['logo']['tmp_name']);
                    if (($datacomercio == null)) {
                        echo ("Error al cargar el archivo Camara de comercio ");
                    } else {
                        $archicomercio = file_get_contents($datacomercio);
                    }
                    if (($datalogo == null)) {
                        echo ("Error al cargar el archivo");
                    } else {
                        $archilogo = file_get_contents($datalogo);
                    }
                } catch (Exception $e) {
                    echo ("Error en los archivos, verificar");
                }
                
                if (isset($archilogo) and isset($archicomercio)) {
                    echo ("archivos Correctos");
                }
            } else {
                echo ("el logo tiene que ser extensión jpeg/jpg/png");
            }
        } else {
            echo ("El archivo Ingresado en Camara de Comercio no es PDF");
        }

        //echo($file_size);
        //echo(mime_content_type ($_FILES['camaracomercioE']['tmp_name'] ));

        // $base= new DB();
        // $query=$base->connect()->prepare('UPDATE empresa SET LOGO_EMPRESA=? WHERE COD_EMPRESA=1 ');
        // $query->execute([$archi]);
    }
}
