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
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');



$user = new Usuario();
$empresa_dao = new EmpresaDAO();
$user->setUser($_SESSION['user']);
$codigo = $user->darCodigo();
$empresa = $empresa_dao->devolverEmpresa($codigo);
$controlador = new ControladorPromocion();


$lista = $controlador->OfertasXempresaAI($empresa->getCodEmpresa());
include('menuEmpresa.php');
include('Header.php');


?>



<link href="../assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
<link href="../assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/responsive.datatables.min.css" rel="stylesheet" />
<script src="../jsPDF/dist/jspdf.es.min.js"></script>
<script src="../autoTable/dist/jspdf.plugin.autotable.min.js"></script>


<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Ofertas</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Tabla de ofertas
                    </li>
                </ol>
            </nav>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="col-md-4">

                        <br>
                    </div>



                    <div class="card-body">
                        <div class="responsive-data-table">
                            <table id="responsive-data-table" class="table dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Titulo de oferta</th>
                                        <th>Fecha de oferta</th>
                                        <th>Fecha de inicio</th>
                                        <th>Rango de Compensación</th>
                                        <th>Vacantes</th>
                                        <th>Ciudad</th>
                                        <th>Estado</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($lista as $key) {
                                        echo ("<tr>");
                                        echo ("<td>" . $key[13] . "</td>");
                                        echo ("<td>" . $key[11] . "</td>");
                                        echo ("<td>" . $key[8] . "</td>");
                                        echo ("<td>" . $key[5] . "</td>");
                                        echo ("<td>" . $key[14] . "</td>");
                                        echo ("<td>" . $key[12] . "</td>");
                                        echo ("<td><span class='mb-2 mr-2 badge badge-success'>" . $key[15] . "</span></td>");
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

    <div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Motivo</h5>

                </div>
                <div class="modal-body">
                    <form method="POST" id='formAgregarOf'>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Motivo de la decisión: </label>
                            <label class="form-control" name="motivo" value="" id="motivoLista"></label>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Cerar</button>
                </div>
            </div>
        </div>
    </div>




    <script src="../assets/plugins/data-tables/jquery.datatables.min.js"></script>
    <script src="../assets/plugins/data-tables/datatables.bootstrap4.min.js"></script>


    <script>
        function name(params) {

        }
    </script>

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

    <script>
        function mostrarModal(valor) {
            $('#exampleModalForm').modal('show');
            elemento = document.getElementById("motivoLista").innerHTML = valor;
        }
    </script>





    <?php


    include('Footer.php')

    ?>