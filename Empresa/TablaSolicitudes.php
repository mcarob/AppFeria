<?php
session_start();

if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 3)) {
    header("location: ../index.php");
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPostulaciones.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');

$user = new Usuario();
$empresa_dao = new EmpresaDAO();
$user->setUser($_SESSION['user']);
$codigo = $user->darCodigo();
$empresa = $empresa_dao->devolverEmpresa($codigo);

$objeto = new ControladorPostulacion;
$lista = $objeto->buscarPostulacionXempresa($empresa->getCodEmpresa());
$cod_postulacion = 0;


foreach ($lista as $key) {
    echo ("<tr>");
    echo ("<td>" . $key[5] . "</td>");
    echo ("<td>" . $key[1] . "</td>");
    echo ("<td>" . $key[2] . "</td>");
    echo ("<td>" . $key[3] . "</td>");
    echo ("<td><span class='mb-2 mr-2 badge badge-success'>" . $key[4] . "</span></td>");
    echo ("<td> <button type='button' class='mb-1 btn btn-primary'>
                                                 <i class='mdi mdi-star-outline mr-1'></i>Hoja de vida</button></td>");


    if ($key["COD_ESTADO_PROCESO"] == "1") {
        echo ("<td><button type='button' class='mb-1 btn btn-primary' onclick='hojaVerificada(" . '"' . $key[0] . '"' . ")'>
                                                 <i class='mdi mdi-star-outline mr-1'></i>Leido</button></td> ");
    }
    if ($key["COD_ESTADO_PROCESO"] == "2") {
        echo (" <td> <button type='button' class='mb-1 btn btn-success' onclick='aceptar(" . '"' . $key[0] . '"' . ")'>Aceptar</button>
                                            <button type='button' class='mb-1 btn btn-danger' data-toggle='modal' data-target='#exampleModalForm'>Rechazar</button></td>");
    }
    if ($key["COD_ESTADO_PROCESO"] == "3") {
        echo ("<td> <button type='button' class='mb-1 btn btn-success' onclick='formalizar(" . '"' . $key[0] . '"' . ")'>Formalizar</button>
                                            <button type='button' class='mb-1 btn btn-danger' data-toggle='modal' data-target='#exampleModalForm'>Rechazar</button></td>");
    }


    $cod_postulacion = $key[0];



?>
    <script src="../assets/plugins/data-tables/datatables.responsive.min.js"></script>


<?php

    echo ("</tr>");
}

?>
