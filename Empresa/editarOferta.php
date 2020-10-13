<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 3) {
    header("location: ../index.php");
}


include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');
include('menuEmpresa.php');
include('Header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/Ciudades.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ListasDesplegables.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
$empresa_dao = new EmpresaDAO();
$codigo = $user->darCodigo();
$empresa = $empresa_dao->devolverEmpresa($codigo);
$ciudadesCon = new Ciudades();
$departamentos = $ciudadesCon->darTodosDepartamentos();

$conPromocion = new ControladorPromocion();
$horarios = "";
if (isset($_GET["action"])) {
    $var = $_GET["action"];
    $informacion = $conPromocion->darOferta($var);
    $ciudadEd = $ciudadesCon->darciudadxcod(($informacion->getPromocionCiudad()));
    $deparxCiudad = $ciudadesCon->darDepartamentoXciudad($ciudadEd[2]);

    $horarios = explode(';', $informacion->getPromocionHorario());
}

?>




<div class="content-wrapper">

    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Editar Ofertas</h1>



        </div>
        <div class="bg-white border rounded">
            <div class="row no-gutters">
                <div class="col-lg-4 col-xl-3">
                    <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                        <div class="card text-center widget-profile px-0 border-0">
                            <?php
                            echo '<img style="max-width:100%;width:auto;height:auto;" src="data:image/jpeg;base64,' . base64_encode($empresa->getLogoEmpresa()) . '" />';
                            ?>

                            <div class="card-body">
                                <h4 class="py-2 text-dark"><?php echo ($empresa->getRazonSocial()) ?></h4>
                            </div>
                        </div>

                        <hr class="w-100">

                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="profile-content-right py-5">
                        <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                        </ul>
                        <div class="tab-content px-3 px-xl-5" id="myTabContent">
                            <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">




                            </div>

                            <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <div class="mt-5">
                                    <form id='editar_oferta' method='POST' action="javascript:agregarVac()">
                                        <input type="hidden" name="empresa" id="empresa" value="<?php echo $informacion->getCodEmpresa() ?>">

                                        <div class="row mb-2">
               
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="codigo" id="codigo" value="<?php echo ($informacion->getCodPromocion()) ?>">
                                                        <label for="firstName"> Ubicación (Departamento)</label>
                                                        <select class="form-control" name="departamento" id="depa-lista" onchange="getCity(this.value);">
                                                        <option value="">Seleccione un Departamento</option>
                                                        <option value="<?php echo $deparxCiudad[0]?>" selected><?php echo $deparxCiudad[1]?></option>
                                                        <?php
                                                        foreach ($departamentos as $depar) {
                                                        ?>
                                                            <option value="<?php echo ($depar[0]); ?>">
                                                                <?php echo $depar[1]; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="firstName"> Ubicación (Ciudad)</label>
                                                    <select name="ciudad" id="ciudad" class="form-control">
                                                        <option> <?php echo $ciudadEd[1] ?> </option>
                                                        <option>Seleccione una Ciudad</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Fecha de la publicación
                                                    </label>
                                                    <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo ($informacion->getPromocionFecha()) ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Fecha de inicio
                                                    </label>
                                                    <input type="date" class="form-control" id="inicio" name="inicio" value="<?php echo ($informacion->getPromocionInicio()) ?>">
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="firstName">Cargo</label>
                                                    <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo ($informacion->getPromocionCargoFuncion()) ?>"></input>
                                                    <input type="hidden" class="form-control" name="estado" id="estado" value="<?php echo ($informacion->getPromocionEstado()) ?>">
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Rango compensación
                                                    </label>
                                                    <!-- <input type="text" class="form-control" id="rango" name="rango" value="<?php echo ($informacion->getPromocionRangoCompensacion()) ?>"> -->
                                                    <select name="rango" id="rango" class="form-control">
                                                        <option value="">Seleccione una opción</option>
                                                        <?php if (strpos($informacion->getPromocionRangoCompensacion(), 'Sin remuneracion') !== false) {
                                                            echo '<option value="Sin remuneracion" selected="true" >Sin remuneracion</option>';
                                                            echo '<option value="1 Salario mínimo" >1 Salario mínimo</option>';
                                                            echo '<option value="1 - 2 Salarios mínimos" >1 - 2 Salarios mínimos</option>';
                                                            echo '<option value="2 o más Salarios mínimos" >2 o más Salarios mínimos</option>';
                                                            echo '<option value="Otro" >Otro</option>';
                                                        } else if (strpos($informacion->getPromocionRangoCompensacion(), '1 Salario mínimo') !== false) {
                                                            echo '<option value="Sin remuneracion"  >Sin remuneracion</option>';
                                                            echo '<option value="1 Salario mínimo" selected="true">1 Salario mínimo</option>';
                                                            echo '<option value="1 - 2 Salarios mínimos" >1 - 2 Salarios mínimos</option>';
                                                            echo '<option value="2 o más Salarios mínimos" >2 o más Salarios mínimos</option>';
                                                            echo '<option value="Otro" >Otro</option>';
                                                        } else if (strpos($informacion->getPromocionRangoCompensacion(), '1 - 2 Salarios mínimos') !== false) {
                                                            echo '<option value="Sin remuneracion"  >Sin remuneracion</option>';
                                                            echo '<option value="1 Salario mínimo" >1 Salario mínimo</option>';
                                                            echo '<option value="1 - 2 Salarios mínimos" selected="true" >1 - 2 Salarios mínimos</option>';
                                                            echo '<option value="2 o más Salarios mínimos" >2 o más Salarios mínimos</option>';
                                                            echo '<option value="Otro" >Otro</option>';
                                                        } else if (strpos($informacion->getPromocionRangoCompensacion(), '2 o más Salarios mínimos') !== false) {
                                                            echo '<option value="Sin remuneracion"  >Sin remuneracion</option>';
                                                            echo '<option value="1 Salario mínimo" >1 Salario mínimo</option>';
                                                            echo '<option value="1 - 2 Salarios mínimos" >1 - 2 Salarios mínimos</option>';
                                                            echo '<option value="2 o más Salarios mínimos" selected="true" >2 o más Salarios mínimos</option>';
                                                            echo '<option value="Otro" >Otro</option>';
                                                        } else if (strpos($informacion->getPromocionRangoCompensacion(), 'Otro') !== false) {
                                                            echo '<option value="Sin remuneracion"  >Sin remuneracion</option>';
                                                            echo '<option value="1 Salario mínimo" >1 Salario mínimo</option>';
                                                            echo '<option value="1 - 2 Salarios mínimos" >1 - 2 Salarios mínimos</option>';
                                                            echo '<option value="2 o más Salarios mínimos"  >2 o más Salarios mínimos</option>';
                                                            echo '<option value="Otro" selected="true" >Otro</option>';
                                                        }
                                                        ?>

                                                    </select>
                                                    <input type="hidden" name="compensacion" id="compensacion">
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="descripcion">Limite vacantes</label>
                                                    <input type="number" class="form-control" id="vacantes" name="vacantes" value="<?php echo ($informacion->getLimiteVacantes()) ?>" />
                                                </div>
                                            </div>


                                        </div>



                                        <div class="form-group mb-4">
                                            <label for="userName">Titulo</label>
                                            <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo ($informacion->getTituloPromocion()) ?>">
                                            <span class="d-block mt-1"></span>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="userName">Perfil</label>
                                            <textarea type="text" class="form-control" name="perfil" id="perfil" rows="5"><?php echo ($informacion->getPromocionPerfil()) ?></textarea>
                                            <span class="d-block mt-1"></span>
                                        </div>


                                        <div class="form-group mb-4">
                                            <label for="userName">Horarios</label>
                                        </div>

                                        <div class="row mb-2" row="2">
                                            <div class="col-lg-6">
                                                <label class="control control-checkbox checkbox-success">Lunes

                                                    <?php if (strpos($informacion->getPromocionHorario(), 'Lunes') !== false) {
                                                        echo '<input type="checkbox" checked="checked" id="lunes" name="lunes" value="Lunes"/>';
                                                    } else {
                                                        echo '<input type="checkbox"  id="lunes" name="lunes" value="Lunes"/>';
                                                    } ?>
                                                    <div class="control-indicator">
                                                    </div>
                                                </label>

                                            </div>


                                            <div class="col-lg-6">
                                                <label class="control control-checkbox checkbox-success">Martes
                                                    <?php
                                                    if (strpos($informacion->getPromocionHorario(), 'Martes') !== false) {
                                                        echo '<input type="checkbox" checked="checked" id="martes" name="martes" value="Martes"/>';
                                                    } else {
                                                        echo '<input type="checkbox"  id="martes" name="martes" value="Martes"/>';
                                                    } ?>
                                                    <div class="control-indicator"></div>
                                                </label>

                                            </div>

                                            <div class="col-lg-6">
                                                <label class="control control-checkbox checkbox-success">Miercoles
                                                    <?php if (strpos($informacion->getPromocionHorario(), 'Miercoles') !== false) {
                                                        echo '<input type="checkbox" checked="checked" id="miercoles" name="miercoles" value="Miercoles"/>';
                                                    } else {
                                                        echo '<input type="checkbox"  id="miercoles" name="miercoles" value="Miercoles"/>';
                                                    } ?>
                                                    <div class="control-indicator"></div>
                                                </label>

                                            </div>

                                            <div class="col-lg-6">
                                                <label class="control control-checkbox checkbox-success">Jueves
                                                    <?php if (strpos($informacion->getPromocionHorario(), 'Jueves') !== false) {
                                                        echo '<input type="checkbox" checked="checked" id="jueves" name="jueves" value="Jueves"/>';
                                                    } else {
                                                        echo '<input type="checkbox"  id="miercoles" name="jueves" value="jueves"/>';
                                                    } ?> <div class="control-indicator"></div>
                                                </label>

                                            </div>


                                            <div class="col-lg-6">
                                                <label class="control control-checkbox checkbox-success">Viernes
                                                    <?php if (strpos($informacion->getPromocionHorario(), 'Viernes') !== false) {
                                                        echo '<input type="checkbox" checked="checked" id="viernes" name="viernes" value="Viernes"/>';
                                                    } else {
                                                        echo '<input type="checkbox"  id="viernes" name="viernes" value="Viernes"/>';
                                                    } ?> <div class="control-indicator"></div>
                                                </label>

                                            </div>


                                            <div class="col-lg-6">
                                                <label class="control control-checkbox checkbox-success">Sabado
                                                    <?php if (strpos($informacion->getPromocionHorario(), 'Sabado') !== false) {
                                                        echo '<input type="checkbox" checked="checked" id="sabado" name="sabado" value="Sabado"/>';
                                                    } else {
                                                        echo '<input type="checkbox"  id="sabado" name="sabado" value="Sabado"/>';
                                                    } ?> <div class="control-indicator"></div>
                                                </label>

                                            </div>


                                            <div class="col-lg-6">
                                                <label class="control control-checkbox checkbox-success">Domingo
                                                    <?php if (strpos($informacion->getPromocionHorario(), 'Domingo') !== false) {
                                                        echo '<input type="checkbox" checked="checked" id="domingo" name="domingo" value="Domingo"/>';
                                                    } else {
                                                        echo '<input type="checkbox"  id="domingo" name="domingo" value="Domingo"/>';
                                                    } ?> <div class="control-indicator"></div>
                                                </label>
                                            </div>




                                        </div>


                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Seleccione la jornada</label>
                                            <select class="form-control" id="hora" name="hora">
                                                <?php if (strpos($informacion->getPromocionHorario(), '6:00 am - 3:00 pm') !== false) {
                                                    echo '<option value="6:00 am - 3:00 pm" selected="true" >6:00 am - 3:00 pm</option>';
                                                    echo '<option value="7:00 am - 4:00 pm" >7:00 am - 4:00 pm</option>';
                                                    echo '<option value="8:00 am - 5:00 pm" >8:00 am - 5:00 pm</option>';
                                                    echo '<option value="9:00 am - 6:00 pm" >9:00 am - 6:00 pm</option>';
                                                    echo '<option value="Otro" >Otro</option>';

                                                } else if (strpos($informacion->getPromocionHorario(), '7:00 am - 4:00 pm') !== false) {
                                                    echo '<option value="6:00 am - 3:00 pm"  >6:00 am - 3:00 pm</option>';
                                                    echo '<option value="7:00 am - 4:00 pm" selected="true">7:00 am - 4:00 pm</option>';
                                                    echo '<option value="8:00 am - 5:00 pm" >8:00 am - 5:00 pm</option>';
                                                    echo '<option value="9:00 am - 6:00 pm" >9:00 am - 6:00 pm</option>';
                                                    echo '<option value="Otro" >Otro</option>';

                                                } else if (strpos($informacion->getPromocionHorario(), '8:00 am - 5:00 pm') !== false) {
                                                    echo '<option value="6:00 am - 3:00 pm" >6:00 am - 3:00 pm</option>';
                                                    echo '<option value="7:00 am - 4:00 pm" >7:00 am - 4:00 pm</option>';
                                                    echo '<option value="8:00 am - 5:00 pm"  selected="true" >8:00 am - 5:00 pm</option>';
                                                    echo '<option value="9:00 am - 6:00 pm" >9:00 am - 6:00 pm</option>';
                                                    echo '<option value="Otro" >Otro</option>';

                                                } else if (strpos($informacion->getPromocionHorario(), '9:00 am - 6:00 pm') !== false) {
                                                    echo '<option value="6:00 am - 3:00 pm">6:00 am - 3:00 pm</option>';
                                                    echo '<option value="7:00 am - 4:00 pm" >7:00 am - 4:00 pm</option>';
                                                    echo '<option value="8:00 am - 5:00 pm" >8:00 am - 5:00 pm</option>';
                                                    echo '<option value="9:00 am - 6:00 pm" selected="true" >9:00 am - 6:00 pm</option>';
                                                    echo '<option value="Otro" >Otro</option>';
                                                

                                                } else {
                                                    echo '<option value="6:00 am - 3:00 pm">6:00 am - 3:00 pm</option>';
                                                    echo '<option value="7:00 am - 4:00 pm" >7:00 am - 4:00 pm</option>';
                                                    echo '<option value="8:00 am - 5:00 pm" >8:00 am - 5:00 pm</option>';
                                                    echo '<option value="9:00 am - 6:00 pm"  >9:00 am - 6:00 pm</option>';
                                                    echo '<option value="Otro" selected="true" >Otro</option>';

                                                }
                                                ?>


                                            </select>
                                        </div>



                                        <div class="form-group mb-4">
                                            <label for="descripcion">Beneficios</label>
                                            <input type="text" class="form-control" id="beneficios" name="beneficios" value="<?php echo ($informacion->getPromocionBeneficios()) ?>" />
                                        </div>



                                        <div class="form-group mb-4">
                                            <label for="descripcion">Descripción</label>
                                            <textArea type="text" class="form-control" id="descripcion" rows="5" name="descripcion"><?php echo ($informacion->getPromocionDescripcion()) ?></textArea>
                                        </div>

                                        <div class="d-flex justify-content-end mt-5">

                                            <input type='submit' value='EDITAR' class="btn btn-primary mb-2 btn-pill" />
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

    <script>
        function agregarVac() {

            datos = $('#editar_oferta').serialize();



            $.ajax({
                type: "POST",
                data: datos,
                url: "editar_vacante.php",
                success: function(r) {

                    console.log(r);

                    if (r == 1) {

                        window.location.href = "Ofertas.php";

                    } else {



                    }
                }
            });

        }

        function getCity(val) {
            $.ajax({
                type: "POST",
                url: "ajaxCiudad.php",
                data: 'departamento_id=' + val,
                beforeSend: function() {
                    $("#ciudad").addClass("loader");
                },
                success: function(data) {
                    $("#ciudad").html(data);
                    $("#ciudad").removeClass("loader");
                }
            });
        }
    </script>