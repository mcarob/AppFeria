<?php
header('Content-type:application/vnd.ms-excel; charset=UTF-8"');
header('Content-Disposition: attachment; filename=Estudiantes.xls');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEstudiantes.php');
header('Content-Type: text/html; charset=UTF-8');
$objeto = new ControladorEstudiantes();
$lista = $objeto->darListaEstudianteActivos();
?>

<?php


/*LEER TODOS LOS DATOS SIN LA PERDIDAD DE INFORMACIÓN EN CODIFICACIÓN*/
/*********************************************************************/

?>

<table>
    <caption>Estudiantes</caption>
    <tr>
        <th style="background-color: #7dbe4b">Nombre</th>
        <th style="background-color: #7dbe4b">Apellido</th>
        <th style="background-color: #7dbe4b">Cedula</th>
        <th style="background-color: #7dbe4b">Correo</th>
        <th style="background-color: #7dbe4b">Carrera</th>
        <th style="background-color: #7dbe4b">Semestre</th>

    </tr>
    <?php
    foreach ($lista as $key) {


    ?>
        <tr>
            <td><?php echo utf8_decode ($key[3]); ?></td>
            <td><?php echo utf8_decode($key[4]); ?></td>
            <td><?php echo utf8_decode($key[2]); ?></td>
            <td><?php echo utf8_decode($key[5]); ?></td>
            <td><?php echo utf8_decode($key[6]); ?></td>
            <td><?php echo utf8_decode($key[7]); ?></td>

        </tr>

    <?php
    }

    ?>
</table>