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
?>


<link href="../assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
<link href="../assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/responsive.datatables.min.css" rel="stylesheet" />
<?php

include('Header.php');
include('menuEmpresa.php')


?>


<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Postulaciones de la empresa</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Ofertas
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Administrar solicitudes</li>
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
                                        <th>Titulo de oferta</th>
                                        <th>Nombre del postulado</th>
                                        <th>Correo</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                        <th>Descargar</th>
                                        <th>Acciones</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($lista as $key) {
                                        echo ("<tr>");
                                        echo ("<td>" . $key[5] . "</td>");
                                        echo ("<td>" . $key[1] . "</td>");
                                        echo ("<td>" . $key[2] . "</td>");
                                        echo ("<td>" . $key[3] . "</td>");
                                        echo ("<td><span class='mb-2 mr-2 badge badge-success'>" . $key[4] . "</span></td>");
                                        echo ("<td> <button type='button' class='mb-1 btn btn-success' onclick='abrirPDF(".$key[8].")'>Hoja de Vida</button>
                                        </td>");


                                        if ($key["COD_ESTADO_PROCESO"] == "1") {
                                            echo ("<td><button type='button' class='mb-1 btn btn-primary' onclick='hojaVerificada(" . '"' . $key[0] . '"' . ")'>
                                                 <i class='mdi mdi-star-outline mr-1'></i>Leido</button></td> ");
                                        }
                                        if ($key["COD_ESTADO_PROCESO"] == "2") {
                                            echo (" <td> <button type='button' class='mb-1 btn btn-success' onclick='aceptar(" . '"' . $key[0] . '"' . ")'>Aceptar</button>
                                            <button type='submit' class='mb-1 btn btn-danger' id='boton1'" . "onclick='mostrarModal1(" . '"' . $key[0] . '"' . ")'" . ">Rechazar</button></td>");
                                        }
                                        if ($key["COD_ESTADO_PROCESO"] == "3") {
                                            echo ("<td> <button type='button' class='mb-1 btn btn-success' onclick='formalizar(" . '"' . $key[0] . '"' . ")'>Formalizar</button>
                                            <button type='submit' class='mb-1 btn btn-danger' id='boton1'" . "onclick='mostrarModal1(" . '"' . $key[0] . '"' . ")'" . ">Rechazar</button></td>");
                                        }

                                        $cod_postulacion = $key[0];



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
                    <h5 class="modal-title" id="exampleModalFormTitle">Registrar Motivo</h5>

                </div>
                <div class="modal-body">
                    <form method="POST" id='formAgregarOf'>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Motivo</label>
                            <select class="form-control" id="select" name="select">
                                <option value="1">No cumple con el perfil</option>
                                <option value="2">Hoja de vida erronea</option>
                                <option value="3">Datos incorrectos</option>
                                <option value="4">Errores en la entrevista</option>
                                <option value="5">Otro</option>
                            </select> </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Motivo de la decisión: </label>
                            <textarea type="text" class="form-control" name="motivo" id="motivo" aria-describedby="emailHelp"></textarea>
                        </div>


                        <input type="hidden" id="escondido">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Cerar</button>
                    <button type="button" class="btn btn-primary btn-pill" onclick="rechazar()">Aceptar</button>
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
        var variableCod;

        function mostrarModal1(valor) {
            $('#exampleModalForm').modal('show');
            variableCod = valor;

        }
    </script>



    <script>
        function hojaVerificada(cod) {
            window.location.href = 'gestionarSolicitudes.php?action=' + "leer&" + "codigo=" + cod;
        }

        function aceptar(cod) {
            window.location.href = 'gestionarSolicitudes.php?action=' + "Aceptar&" + "codigo=" + cod;
        }

        function rechazar() {
            datos = $('#formAgregarOf').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: 'gestionarSolicitudes.php?action=' + "rechazar&" + "codigo=" + variableCod,
                success: function(r) {
                    console.log(r);
                    if (r == 1) {
                        window.location.href = "AdminSolicitudes.php";
                    } else {

                    }
                }
            });

        }

        function formalizar(cod) {
            window.location.href = 'gestionarSolicitudes.php?action=' + "formalizar&" + "codigo=" + cod;
        }
    </script>



    <?php


    include('Footer.php')

    ?>
     <script>


    function abrirPDF(cod) {
        var win = window.open('abrirHojaVida.php?idHoja='+cod, '_blank');
        win.focus();
    
    }
    </script>