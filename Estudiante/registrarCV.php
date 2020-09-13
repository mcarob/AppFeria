<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EstudianteDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 2) {
    header("location: ../index.php");
}

$user = new Usuario();
$estudiante_dao = new EstudianteDAO();
$user->setUser($_SESSION['user']);
$codigo = $user->darCodigo();
$estudiante = $estudiante_dao->devolverEstudiante($codigo);


include('menuEstudiante.php');
include('Header.php');
?>

<link href="../assets/plugins/toastr/toastr.min.css" rel="stylesheet" />

<body>
    <div class="content-wrapper">
        <div class="content">
            <form id="datosHoja" name="datosHoja">
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-8 col-sm-offset-1">
                        <div class="card card-default">
                            <div class="card-header card-header  d-flex justify-content-center">
                                <center> <img src="../assets/img/logo.png" style="width:180px ;" alt=""></center>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills nav-justified nav-style-fill" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home3-tab" data-toggle="tab" href="#home3"
                                            role="tab" aria-controls="home3" aria-selected="true">Datos Personales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile3-tab" data-toggle="tab" href="#profile3"
                                            role="tab" aria-controls="profile3" aria-selected="false">Formaciones</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile3-tab" data-toggle="tab" href="#profile4"
                                            role="tab" aria-controls="profile4" aria-selected="false">Experiencias</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent4">

                                    <div class="tab-pane pt-3 fade show active" id="home3" role="tabpanel"
                                        aria-labelledby="home3-tab">

                                        <?php include_once 'datosPersonalesCV.php'; ?>

                                        <!--  fin del primer tab-->
                                    </div>
                                    <div class="tab-pane pt-3 fade" id="profile3" role="tabpanel"
                                        aria-labelledby="profile3-tab">
                                        <?php include_once 'FormacionesCV.php'; ?>
                                    </div>
                                    <div class="tab-pane pt-3 fade" id="profile4" role="tabpanel"
                                        aria-labelledby="profile3-tab">
                                        <?php include_once 'ExperienciasCV.php'; ?>
                                    </div>

                                </div>
                                <button type="button" class="btn btn-warning "
                                    style="background-color: #0B7984; border-color: #0B7984;" onclick="cargarHoja()">
                                    <font color="White">Guardar</font>
                                </button>
                            </div>
                        </div>


                    </div>
                </div>
            </form>

        </div>
    </div>

    <script src="../assets/plugins/toastr/toastr.min.js"></script>
    <script>
    function cargarHoja() {

        datos = $('#datosHoja').serialize();



        $.ajax({
            type: "POST",
            data: datos,
            url: "registrar_CV.php",
            success: function(r) {

                console.log(r);
                if (r == 11) {
                    window.location.href = "index.php";
                } else if (r == 3) {
                    toastr["success"](r, "ERROR");
                } else {

                    toastr["success"](r, "ERROR");

                }
            }
        });

    }
    </script>
    <?php

include('Footer.php')

?>