<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 3)) {
    header("location: ../index.php");
}

?>


<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/controladorPostulaciones.php');

$user = new Usuario();
$empresa_dao = new EmpresaDAO();

$user->setUser($_SESSION['user']);
$codigo= $user->darCodigo();
$empresa = $empresa_dao->devolverEmpresa($codigo);
$objeto = new ControladorPostulacion();

$posA = $objeto->darPostAXE($empresa->getCodEmpresa());
$posR = $objeto->darPostIXE($empresa->getCodEmpresa());
$posEP = $objeto->darPostEPXE($empresa->getCodEmpresa());
$posFOR = $objeto->darPostFORXE($empresa->getCodEmpresa());

include('menuEmpresa.php');
include('Header.php');
?>


<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-warning border">

                    <div class="card-block">
                    <i class="material-icons" style="color: white; font-size: 30px;">event</i>
                        <h4 class="text-white my-2"><?php foreach ($posA as $k) {
                                                        echo ($k[1]);
                                                    } ?></h4>
                        <p>Total de Aspirantes</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-danger border">
                    <div class="card-block">
                    <i class="material-icons" style="color: white; font-size: 30px;">event_busy</i>
                        <h4 class="text-white my-2"><?php foreach ($posR as $k) {
                                                        echo ($k[1]);
                                                    } ?></h4>
                        <p>Aspirantes Rechazadoss</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-primary border">
                    <div class="card-block">
                    <i class="material-icons" style="color: white; font-size: 30px;">event_note</i>
                        <h4 class="text-white my-2"><?php foreach ($posEP as $k) {
                                                        echo ($k[1]);
                                                    } ?></h4>
                        <p>Aspirantes En Proceso</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-success border">
                    <div class="card-block">
                    <i class="material-icons" style="color: white; font-size: 30px;">event_available</i>
                        <h4 class="text-white my-2"><?php foreach ($posFOR as $k) {
                                                        echo ($k[1]);
                                                    } ?></h4>
                        <p> Aspirantes Formalizados</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>