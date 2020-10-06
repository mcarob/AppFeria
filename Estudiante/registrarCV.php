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
            <form id="datosHoja" name="datosHoja" onsubmit=cargarHoja() method="POST">
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
                                        <input type="hidden" id="codigoEstudiante" name="codigoEstudiante"
                                            value="<?php echo $estudiante->getCodEstudiante() ?>" />

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
                                <button type="submit" class="btn btn-warning "
                                    style="background-color: #0B7984; border-color: #0B7984;" id="enviar" name="enviar">
                                    <font color="White">Guardar</font>
                                </button>
                                <button type="submit" class="btn btn-warning "
                                    style="background-color: #0B7984; border-color: #0B7984;" onclick="mandarHoja()">
                                    <font color="White">Ver en pdf</font>
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
    //variables de formulario formaciones
    var i = 0; //Cant. fomarciones academicas
    var j = 0; //Cant. fomarciones laborales

    //variables de formulario experiencias
    var x = 0; //Cant. exp academicas
    var y = 0; //Cant. exp profesionales

    function cargarHoja() {

        //formulario formaciones
        acad = document.getElementById("numAcademica");
        acad.value = i;

        comp = document.getElementById("numComplementaria");
        comp.value = j;

        //formulario experiencias
        acad = document.getElementById("numExAcademicas");
        acad.value = x;

        comp = document.getElementById("numExProfesionales");
        comp.value = y;




        datos = $('#datosHoja').serialize();



        $.ajax({
            type: "POST",
            data: datos,
            url: "registrar_CV.php",
            success: function(r) {

                
                if (r == 1) {
                    toastr["success"]('Guardando hoja de vida...', "NOTIFICACIÓN");
                    window.location.href = "index.php";
                } else if (r == 3) {
                    toastr["success"](r, "ERROR");
                } else {
                    toastr["success"](r, "ERROR");
                }
            }
        });

    }

    $('#enviar').click(function() {
        var error = 0;
        $(':input[required]', '#datosHoja').each(function() {
            if ($(this).val() == '') {
                $(this).css('border', '2px solid red');
                if (error == 0) {
                    $(this).focus();
                    var tab = $(this).closest('.tab-pane').attr('id');
                    $('#myTab a[href="#' + tab + '"]').tab('show');
                }
                error = 1;
            } else {
                $(this).css('border', 'none');
            }

        });
        if (error == 1) {

            toastr["success"]("Por favor complete los campos solicitados", "ERROR");
            return false;
        } else {
            return true;
        }
    });



    function mandarHoja() {
        var win = window.open('mostrarPDF.php?cod=<?php echo($estudiante->getCodEstudiante()) ?>', '_blank');
        win.focus();
    }
    </script>
    <?php

include('Footer.php')

?>