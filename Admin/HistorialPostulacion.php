<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4)) {
    header("location: index.php");
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPostulaciones.php');

$objeto = new ControladorPostulacion();
$lista = $objeto->HistorialPost();
?>


<link href="../assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
<link href="../assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/responsive.datatables.min.css" rel="stylesheet" />
<?php

include('Header.php');
include('menuAdmi.php')


?>


<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Historial</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Informes
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Historial Postulaciones</li>
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
                                        <th>Nombre Empresa</th>
                                        <th>Nombre estudiante</th>
                                        <th>Cédula estudiante</th>
                                        <th>Carrera</th>
                                        <th>Titulo promoción</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($lista as $key) {
                                        echo ("<tr>");
                                        echo ("<td>" . $key[5] . "</td>");
                                        echo ("<td>" . $key[2] . "</td>");
                                        echo ("<td>" . $key[3] . "</td>");
                                        echo ("<td>" . $key[7] . "</td>");
                                        echo ("<td>" . $key[4] . "</td>");
                                        echo ("<td><span class='mb-2 mr-2 badge badge-success'>" . $key[6] . "</span></td>");
                                        echo ("<td><button type='submit' class='mb-1 btn btn-danger' id='boton1'"."onclick='mostrarModal1(".'"'.$key[9].'",'.'"'.$key[8].'"'.")'". ">Motivo</button></td>");

                                    ?>


                                    <?php

                                        echo ("</tr>");
                                    }

                                    ?>


                                </tbody>
                            </table>
                        </div>
                        <a hreF="Reportes/HistorialPDF.php" class="btn btn-outline-primary">PDF</a>
                        <a hreF="Reportes/HistorialExcel.php" class="btn btn-outline-primary">Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="../assets/plugins/data-tables/jquery.datatables.min.js"></script>
    <script src="../assets/plugins/data-tables/datatables.bootstrap4.min.js"></script>

    <div class="modal fade" id="exampleModalForm1" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Motivo</h5>

                </div>
                <div class="modal-body">
                    <form method="POST" id='formAgregarOf'>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Motivo de la decisión: </label>
                            <label  class="form-control" name="motivo" value="" id="motivoLista1"></label>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Descripción: </label>
                            <textarea  class="form-control" style="resize:none;" rows="6"  readonly="true" id="des1"></textarea>
                        </div>

                    </form> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Cerar</button>
                </div>
            </div>
        </div>
    </div>

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
    function mostrarModal1(valor, des1) {
        $('#exampleModalForm1').modal('show'); 
        elemento=document.getElementById("motivoLista1").innerHTML=valor ;
        elemento=document.getElementById("des1").innerHTML=des1;

    }
</script>







    <?php


    include('Footer.php')

    ?>