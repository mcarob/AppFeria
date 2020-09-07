<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 2) {
    header("location: ../index.php");
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EstudianteDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPostulaciones.php');

$user = new Usuario();
$estudiante_dao = new EstudianteDAO();
$user->setUser($_SESSION['user']);

$codigo = $user->darCodigo();
$estudiante = $estudiante_dao->devolverEstudiante($codigo);

$controlador = new ControladorPostulacion();
$lista = $controlador->darListaPostulacionesxEst($estudiante->getCodEstudiante());


?>


<link href="../assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
<link href="../assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/responsive.datatables.min.css" rel="stylesheet" />
<script src="../jsPDF/dist/jspdf.es.min.js"></script>
<script src="../autoTable/dist/jspdf.plugin.autotable.min.js"></script>
<?php
include('Header.php');
include('menuEstudiante.php')
?>


<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Postulaciones hechas</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Vacantes
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Mis Postulaciones</li>
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
                                        <th>Nombre empresa</th>
                                        <th>Titulo Oferta</th>
                                        <th>Telefono empresa</th>
                                        <th>Telefono contacto</th>
                                        <th>Correo contacto</th>
                                        <th>Compensación</th>
                                        <th>Estado</th>
                                        <th>Acción</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($lista as $key) {
                                        echo ("<tr>");
                                        echo ("<td>" . $key[0] . "</td>");
                                        echo ("<td>" . $key[1] . "</td>");
                                        echo ("<td>" . $key[3] . "</td>");
                                        echo ("<td>" . $key[5] . "</td>");
                                        echo ("<td>" . $key[4] . "</td>");
                                        echo ("<td>" . $key[2] . "</td>");
                                        echo ("<td><span class='mb-2 mr-2 badge badge-success'>" . $key[7] . "</span></td>");
                                        echo ("<td><button type='button' class='mb-1 btn btn-danger' id='boton1' data-toggle='modal' data-target='#exampleModalForm'>Motivo</button></td>");


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

<script>
$('#myModal').on('show.bs.modal', function (e) {
  console.log("ENTROOO");
})
</script>

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
                            <label  class="form-control" name="motivo" value="" id="motivoLista" aria-describedby="emailHelp">
                        </div>

                    </form> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Cerar</button>
                </div>
            </div>
        </div>
    </div>






    <?php


    include('Footer.php')

    ?>