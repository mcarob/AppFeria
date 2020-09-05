<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 2) {
    header("location: ../index.php");
}

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');

$conPromocion=new ControladorPromocion();


include('menuEstudiante.php');
include('Header.php');

if(isset($_GET["action"]))
{
    $var=$_GET["action"];
    $informacion=$conPromocion->darInformacion($var);
    
}

?>

<div class="content-wrapper">
    <div class="content">
        <div class="bg-white border rounded">

            <div class="row no-gutters">
                <div class="col-lg-4 col-xl-3">
                    <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                        <div class="card text-center widget-profile px-0 border-0">
                            <div class="card-img mx-auto rounded-circle">
                                <img src="../Imagenes/ecopetrol.jpg" width="100" alt="user image">
                            </div>
                            <div class="card-body">
                                <h4 class="py-2 text-dark"> <?php echo $informacion->getCodEmpresa() ?> </h4>

                            </div>
                        </div>

                        <hr class="w-100">

                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="profile-content-right py-5">
                        <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                            <h1> <?php echo $informacion->getTituloPromocion() ?></h1>
                        </ul>
                        <div class="tab-content px-3 px-xl-5" id="myTabContent">
                            <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">



                            </div>


                            <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <div class="mt-5">
                                    <form>


                                        <div class="form-group mb-4">
                                            <label for="userName">Descripcion</label>
                                            <span class="d-block mt-1">  <?php echo $informacion->getPromocionConocimientoBase() ?> </span>

                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="firstName">Salario</label>
                                                    <span class="d-block mt-1"> <?php echo $informacion->getPromocionCompensacion() ?></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Ciudad
                                                    </label>
                                                    <span class="d-block mt-1"> <?php echo $informacion->getPromocionCiudad() ?> </span>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group mb-4">
                                            <label for="userName">Horarios</label>

                                        </div>

                                        <div class="row mb-2" row="2">

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Lunes
                                                    </label>
                                                    <span class="d-block mt-1">  <?php echo $informacion->getPromocionHorario() ?> </span>
                                                </div>
                                            </div>

                                                                        
                                        </div>

                                        

                            

                                        <div class="d-flex justify-content-end mt-5">
                                            <button type="submit" class="btn btn-primary mb-2 btn-pill">Aceptar</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php

    include('Footer.php')

    ?>