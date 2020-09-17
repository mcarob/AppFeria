<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 2) {
    header("location: ../index.php");
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EstudianteDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');

$conPromocion = new ControladorPromocion();
$user = new Usuario();
$estudiante_dao = new EstudianteDAO();
$user->setUser($_SESSION['user']);
$codigo = $user->darCodigo();
$estudiante = $estudiante_dao->devolverEstudiante($codigo);
$empresa_dao = new EmpresaDAO();






include('menuEstudiante.php');
include('Header.php');


if (isset($_GET["action"])) {
    $var = $_GET["action"];
    $informacion = $conPromocion->darInformacion($var);
}


$horarios = explode(';', $informacion[3]);
?>



<div class="content-wrapper">
    <div class="content">
        <div class="bg-white border rounded">

            <div class="row no-gutters">
                <div class="col-lg-4 col-xl-3">
                    <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                        <div class="card text-center widget-profile px-0 border-0">
                            <?php   
                                echo '<img  alt="Card image cap" class="card-img-top" width="150" height="150"  src="data:image/jpeg;base64,'.base64_encode( $empresa_dao->devolverEmpresa2($informacion[17])->getLogoEmpresa() ).'" />';
                                ?>
                           
                            <div class="card-body">
                                <h4 class="py-2 text-dark"> <?php echo $informacion[10] ?> </h4>

                            </div>
                        </div>

                        <hr class="w-100">

                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="profile-content-right py-5">
                        <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                            <h1> <?php echo $informacion[13] ?></h1>
                        </ul>
                        <div class="tab-content px-3 px-xl-5" id="myTabContent">
                            <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">



                            </div>


                            <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <div class="mt-5">
                                    <form id="postulados" method="POST" action="javascript: agregarPostulacion()">
                                        <input type="hidden" id="codigooo" name="codigooo" value="<?php echo $estudiante->getCodEstudiante() ?>" />
                                        <input type="hidden" id="ofertaa" name="ofertaa" value="<?php echo $informacion[0] ?>" />

                                        <div class="form-group mb-4">
                                            <label for="userName">Descripción:</label>
                                            <span class="d-block mt-1"> <?php echo $informacion[9] ?> </span>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="userName">Perfil buscado:</label>
                                            <span class="d-block mt-1"> <?php echo $informacion[1] ?> </span>

                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="firstName">Remuneración</label>
                                                    <span class="d-block mt-1"> <?php if ($informacion[5] == "Sin remuneracion") {
                                                                                    echo "Sin remuneración";
                                                                                } else {
                                                                                    echo $informacion[5];
                                                                                }
                                                                                ?></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Ciudad
                                                    </label>
                                                    <span class="d-block mt-1"> <?php echo $informacion[12] ?> </span>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Beneficios
                                                    </label>
                                                    <span class="d-block mt-1"> <?php echo $informacion[6] ?> </span>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Cargo
                                                    </label>
                                                    <span class="d-block mt-1"> <?php echo $informacion[7] ?> </span>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Fecha de inicio
                                                    </label>
                                                    <span class="d-block mt-1"> <?php echo $informacion[8] ?> </span>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Total de vacantes
                                                    </label>
                                                    <span class="d-block mt-1"> <?php echo $informacion[14] ?> </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="userName">Horarios</label>

                                        </div>

                                        <div class="row mb-2">
                                            <?php
                                            foreach ($horarios as $kk) {
                                            ?>
                                                <div class="col-lg-6">
                                                    <label class="control control-checkbox checkbox-success"><?php echo $kk ?>
                                                        <input type="checkbox" checked="checked" onclick="return false;" id="martes" name="martes" value="Martes" />
                                                        <div class="control-indicator"></div>
                                                    </label>

                                                </div>
                                            <?php
                                            }
                                            ?>


                                        </div>







                                        <div class="d-flex justify-content-end mt-5">
                                            <button type="submit" class="btn btn-primary mb-2 btn-pill">Postularse</button>
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


    <script>
        function agregarPostulacion() {
            datos = $('#postulados').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "agregar_postulacion.php",
                success: function(r) {

                    console.log(r);
                    if (r == 1) {
                        window.location.href = "postulaciones.php";

                    } else {

                    }
                }
            });
        }
    </script>

    <?php

    include('Footer.php')

    ?>