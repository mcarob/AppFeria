<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4)) {
    header("location: index.php");
}
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/AdministradorDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Administrador.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');

$user = new Usuario();
$user->setUser($_SESSION['user']);
$codigo= $user->darCodigo();

$administrador_dao = new AdministradorDAO();
$administrador = $administrador_dao->devolverAdministrador($codigo);
$objeto = new ControladorEmpresa();
$lista = $objeto->darListaEmpresasInscritas();
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
            <h1>Empresas inscritas</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="IndexAdmi.php">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Empresas
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Autorizar registros</li>
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
                                        <th>NIT</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Camara Comercio</th>
                                        <th>Acción</th>
                                        <th>Acción</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($lista as $key) {
                                        echo ("<tr>");
                                        echo ("<td>" . $key[2] . "</td>");
                                        echo ("<td>" . $key[1] . "</td>");
                                        echo ("<td>" . $key[3] . "</td>");
                                        echo ("<td>" . $key[4] . "</td>");
                                        echo ("<td> <button type='button' class='mb-1 btn btn-success' onclick='abrirPDF(" . '"' . $key[0] . '"' . ")'>PDF</button>
                                                </td>");
                                        echo ("<td> <button type='button' class='mb-1 btn btn-success' onclick='aceptar(" . '"' . $key[0] . '"' . ")'>Aceptar</button>
                                        <button type='submit' class='mb-1 btn btn-danger' id='boton1'" . "onclick='mostrarModal1(" . '"' . $key[0] . '"' . ")'" . ">Rechazar</button></td>");
                                        echo ("<td><button type='submit' class='mb-1 btn btn-success' id='boton2'" . "onclick='mostrarModal23(" . '"' . $key[0] . '"' . ")'" . ">Contactar</button></td>");
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
                            <label for="exampleInputEmail1">Motivo de la decisión: </label>
                            <textarea type="text" class="form-control" name="motivo" id="motivo" aria-describedby="emailHelp"></textarea>
                        </div>


                        

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Cerar</button>
                    <button type="button" class="btn btn-primary btn-pill" onclick="rechazar()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalForm1" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Notificar</h5>

                </div>
                <div class="modal-body">
                    <form method="POST" id='contacto'>

                        <input type="hidden" id="desde" name="desde" value="<?php echo $administrador->getCodAdministrador() ?>">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mensaje: </label>
                            <textarea type="text" class="form-control" name="mensaje" id="mensaje" aria-describedby="emailHelp"></textarea>
                        </div>


                        

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Cerar</button>
                    <button type="button" class="btn btn-primary btn-pill" onclick="notificar()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var variableCod;

        function mostrarModal1(valor) {
            $('#exampleModalForm').modal('show');
            variableCod = valor;
        }


        function mostrarModal23(valor) {
            $('#exampleModalForm1').modal('show');
            variableCod = valor;
        }


        function rechazar() {
            datos = $('#rechazo').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: 'gestionarEmpresas.php?action=' + "rechazar&" + "codigo=" + variableCod,
                success: function(r) {
                    console.log(r);
                    if (r == 1) {
                        window.location.href = "ValidarEmpresa.php";
                    } else {

                    }
                }
            });

        }


        function notificar() {
            datos = $('#contacto').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: 'gestionarEmpresas.php?action=' + "notificar&" + "codigo=" + variableCod,
                success: function(r) {
                    console.log(r); 
                    if (r == 1) {
                        window.location.href = "ValidarEmpresa.php";
                    } else {

                    }
                }
            });

        }

    </script>


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
    function aceptar(cod) {
        console.log(cod);
        window.location.href = 'aceptarEmpresa.php?action=' + cod;
    }


    function abrirPDF(cod) {
        var win = window.open('abrirCamaraComercioPDF.php?action=' + cod, '_blank');
        win.focus();
    
    }
    </script>



    <?php


    include('Footer.php')

    ?>