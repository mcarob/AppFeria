<?php
header('Content-type:application/vnd.ms-excel; charset=UTF-8"');
header('Content-Disposition: attachment; filename=Historial.xls');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');
header('Content-Type: text/html; charset=UTF-8');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPostulaciones.php');

$objeto = new ControladorPostulacion();
$lista = $objeto->HistorialPost();
?>

<?php


/*LEER TODOS LOS DATOS SIN LA PERDIDAD DE INFORMACIÓN EN CODIFICACIÓN*/
/*********************************************************************/

?>

<table>
    <caption>Estudiantes</caption>
    <tr>
        <th style="background-color: #7dbe4b">Nombre Empresa</th>
        <th style="background-color: #7dbe4b">Nombre estudiante</th>
        <th style="background-color: #7dbe4b">Cedula estudiante</th>
        <th style="background-color: #7dbe4b">Carrera</th>
        <th style="background-color: #7dbe4b">Titulo promocion</th>
        <th style="background-color: #7dbe4b">Estado</th>

    </tr>
    <?php
    foreach ($lista as $key) {


    ?>
        <tr>
            <td><?php echo utf8_decode ($key[5]); ?></td>
            <td><?php echo utf8_decode($key[2]); ?></td>
            <td><?php echo utf8_decode($key[3]); ?></td>
            <td><?php echo utf8_decode($key[7]); ?></td>
            <td><?php echo utf8_decode($key[4]); ?></td>
            <td><?php echo utf8_decode($key[6]); ?></td>

        </tr>

    <?php
    }

    ?>
</table>