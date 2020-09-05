<?php
header('Content-type:application/vnd.ms-excel; charset=UTF-8"');
header('Content-Disposition: attachment; filename=Vacantes.xls');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');
header('Content-Type: text/html; charset=UTF-8');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');
$objeto = new ControladorPromocion();
$lista = $objeto->darListaVacantesTotal();
?>

<?php


/*LEER TODOS LOS DATOS SIN LA PERDIDAD DE INFORMACIÓN EN CODIFICACIÓN*/
/*********************************************************************/

?>

<table>
    <caption>Vacantes Disponibles</caption>
    <tr>
        <th style="background-color: #7dbe4b">Titulo vacante</th>
        <th style="background-color: #7dbe4b">Ciudad</th>
        <th style="background-color: #7dbe4b">Fecha</th>
        <th style="background-color: #7dbe4b">Limite de vacantes</th>
        <th style="background-color: #7dbe4b">Compensacion</th>
    </tr>
    <?php
    foreach ($lista as $key) {


    ?>
        <tr>
            <td><?php echo utf8_decode ($key[1]); ?></td>
            <td><?php echo utf8_decode($key[2]); ?></td>
            <td><?php echo utf8_decode($key[3]); ?></td>
            <td><?php echo utf8_decode($key[4]); ?></td>
            <td><?php echo utf8_decode($key[5]); ?></td>
        </tr>

    <?php
    }

    ?>
</table>