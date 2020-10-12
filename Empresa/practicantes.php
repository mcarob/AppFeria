<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 3)) {
    header("location: ../index.php");
}


include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPostulaciones.php');



$user = new Usuario();
$empresa_dao = new EmpresaDAO();
$user->setUser($_SESSION['user']);
$codigo = $user->darCodigo();
$empresa = $empresa_dao->devolverEmpresa($codigo);
$controlador = new ControladorPostulacion();


$lista = $controlador->practicantesXe($empresa->getCodEmpresa());
include('menuEmpresa.php');
include('Header.php');


?>
<link href="../assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
<link href="../assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/responsive.datatables.min.css" rel="stylesheet" />

<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Practicantes en la Empresa</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Practicantes
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Listar</li>
                </ol>
            </nav>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-default">


                    <div class="card-body">
                        <div class="responsive-data-table">
                            <table id="responsive-data-table" class="table dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Título Promoción</th>
                                        <th>Nombres</th>
                                        <th>Correo</th>
                                        <th>Cédula</th>
                                        <th>Fecha Legalización</th>
                                        <th>Ciudad</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($lista as $key) {
                                        echo ("<tr>");
                                        echo ("<td>" . $key[0] . "</td>");
                                        echo ("<td>" . $key[1] . "</td>");
                                        echo ("<td>" . $key[2] . "</td>");
                                        echo ("<td>" . $key[3] . "</td>");
                                        echo ("<td>" . $key[4] . "</td>");
                                        echo ("<td>" . $key[5] . "</td>");
                                    ?>


                                    <?php

                                        echo ("</tr>");
                                    }

                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="../assets/plugins/data-tables/jquery.datatables.min.js"></script>
    <script src="../assets/plugins/data-tables/datatables.bootstrap4.min.js"></script>



    <script src="../assets/plugins/data-tables/datatables.responsive.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#responsive-data-table').DataTable({
                "aLengthMenu": [
                    [20, 30, 50, 75, -1],
                    [20, 30, 50, 75, "All"]
                ],
                "pageLength": 20,
                "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
            });
        });
    </script>