<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4)) {
    header("location: ../index.php");
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPostulaciones.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEstudiantes.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');

$objeto = new ControladorPostulacion();
$conE = new ControladorEstudiantes();
$conP = new ControladorEmpresa();
$lista = $objeto->HistorialPost();

$totalEA = $conE->darEstA();
$totalEI = $conE->darEstI();
$totalE = $conE->darTotalEst();


$totalEmpA = $conP->darEmpresaA();
$totalEmpI = $conP->darEmpresaI();
$totalEmp = $conP->darEmpresa();


$totalPA = $objeto->darPostA();
$totalPI = $objeto->darPostI();
$totalPF = $objeto->darPostFor();
$totalP = $objeto->darPost();

include('menuAdmi.php');
include('Header.php');
?>


<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-white border">
                    <div class="card-block">
                    <i class="material-icons" style="color: #29cc97; font-size: 30px;">folder_shared</i>
                        <h4 class="text-primary my-2"><?php foreach ($totalP as $k) {
                                                            echo ($k[0]);
                                                        } ?></h4>
                        <p>Total Postulaciones</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-white border">
                    <div class="card-block">
                    <i class="material-icons" style="color: #0B7984; font-size: 30px;">folder_shared</i>
                        <h4 class="text-primary my-2"><?php foreach ($totalPI as $k) {
                                                            echo ($k[0]);
                                                        } ?></h4>
                        <p>P. Rechazadas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-white border">
                    <div class="card-block">
                    <i class="material-icons" style="color: #fe5461; font-size: 30px;">folder_shared</i>
                        <h4 class="text-primary my-2"><?php foreach ($totalPF as $k) {
                                                            echo ($k[0]);
                                                        } ?></h4>
                        <p>P. Formalizadas</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-white border">
                    <div class="card-block">
                    <i class="material-icons" style="color: #fec400; font-size: 30px;">folder_shared</i>
                        <h4 class="text-primary my-2"> <?php foreach ($totalPA as $k) {
                                                        echo ($k[0]);
                                                    } ?></h4>
                        <p>Postulaciones Activas</p>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-warning border">

                    <div class="card-block">
                    <i class="material-icons" style="color: white; font-size: 30px;">perm_identity</i>
                        <h4 class="text-white my-2"><?php foreach ($totalE as $k) {
                                                         ($k[0]);
                                                    } ?></h4>
                        <p>Estudiantes</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-danger border">
                    <div class="card-block">
                    <i class="material-icons" style="color: white; font-size: 30px;">perm_identity</i>
                        <h4 class="text-white my-2"><?php foreach ($totalE as $k) {
                                                        echo ($k[0]);
                                                    } ?></h4>
                        <p>Total</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-primary border">
                    <div class="card-block">
                    <i class="material-icons" style="color: white; font-size: 30px;">perm_identity</i>
                        <h4 class="text-white my-2"><?php foreach ($totalEA as $k) {
                                                        echo ($k[0]);
                                                    } ?></h4>
                        <p> Activos</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-success border">
                    <div class="card-block">
                    <i class="material-icons" style="color: white; font-size: 30px;">perm_identity</i>
                        <h4 class="text-white my-2"><?php foreach ($totalEI as $k) {
                                                        echo ($k[0]);
                                                    } ?></h4>
                        <p> Inactivos</p>
                    </div>
                </div>
            </div>


        </div>

        <br>


        <div class="row">


            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-warning border">
                    <div class="card-block">
                    <i class="material-icons" style="color: white; font-size: 30px;">business</i>
                        <h4 class="text-white my-2"><?php foreach ($totalEmp as $k) {
                                                         ($k[0]);
                                                    } ?></h4>
                        <p>Empresas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-danger border">
                    <div class="card-block">
                    <i class="material-icons" style="color: white; font-size: 30px;">business</i>
                        <h4 class="text-white my-2"><?php foreach ($totalEmp as $k) {
                                                        echo ($k[0]);
                                                    } ?></h4>
                        <p>Total </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-primary border">
                    <div class="card-block">
                    <i class="material-icons" style="color: white; font-size: 30px;">business</i>
                        <h4 class="text-white my-2"><?php foreach ($totalEmpI as $k) {
                                                        echo ($k[0]);
                                                    } ?></h4>
                        <p>Sin validar</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="card widget-block p-4 rounded bg-success border">
                    <div class="card-block">
                    <i class="material-icons" style="color: white; font-size: 30px;">business</i>
                        <h4 class="text-white my-2"><?php foreach ($totalEmpA as $k) {
                                                        echo ($k[0]);
                                                    } ?></h4>
                        <p>Validadas</p>
                    </div>
                </div>
            </div>


        </div>


        <br>





    </div>


</div>

<?php


include('Footer.php')

?>