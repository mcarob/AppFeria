<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 3) {
    header("location: ../index.php");
}




include('menuEmpresa.php');
include('Header.php');
?>

<?php
$fecha_actual = date("Y-m-d")

?>

<div class="content-wrapper">

    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Agregar Ofertas</h1>



        </div>
        <div class="bg-white border rounded">

            <div class="col-lg-8 col-xl-9">
                <div class="profile-content-right py-5">
                    <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                    </ul>
                    <div class="tab-content px-3 px-xl-5" id="myTabContent">
                        <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">




                        </div>

                        <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <div class="mt-5">
                                <form id="formAgregarOf" method="POST" action="javascript: agregarOfertaLab();">
                                    <!-- <div class="form-group row mb-6">
                                        <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">User Image</label>
                                        <div class="col-sm-8 col-lg-10">
                                            <div class="custom-file mb-1">
                                                <input type="file" class="custom-file-input" id="coverImage" required>
                                                <label class="custom-file-label" for="coverImage">Choose file...</label>
                                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="form-group mb-4">
                                        <label for="userName">Perfil buscado</label>
                                        <textarea type="text" class="form-control" id="perfil" value="" name="perfil"></textarea>
                                        <span class="d-block mt-1"></span>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="firstName">Ciudad</label>
                                                <input type="text" class="form-control" id="ciudad" name="ciudad" value="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Fecha de la publicación
                                                </label>
                                                <input type="date" class="form-control" id="fechaPublicacion" name="fechaPublicacion" value="<?= $fecha_actual ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Fecha de inicio
                                                </label>
                                                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="">
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Remuneración
                                                </label>
                                                <select name="remuneracion" id="remuneracion" class="form-control">
                                                <option value="r1">Seleccione una opcion</option>
                                                <option value="r1">Si</option>
                                                <option value="r2">No</option>
                                            </select>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="firstName">Cargo</label>
                                                <input type="text" class="form-control" id="cargo" name="cargo" value="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Beneficios extra
                                                </label>
                                                <input type="" class="form-control" id="beneficioExtra" name="beneficioExtra" value="">
                                                <br>

                                            </div>
                                        </div>

                                        
                                    </div>

                            </div>
                            <div class="form-group mb-4">
                                            <label for="des">Rango Remuneracion</label>
                                            <select name="ranRemuneracion" id="ranRemuneracion" class="form-control">
                                            <option value="r1">Seleccione una opcion</option>
                                                <option value="value1">0 - 1 Salarios mínimos</option>
                                                <option value="value2">1 - 2 Salarios mínimos</option>
                                                <option value="value3">2 o más Salarios mínimos</option>
                                            </select>
                                        </div>
                            <div class="form-group mb-4">
                                <label for="des">Numero de vacantes</label>
                                <input type="number" class="form-control" id="numVacantes" name="numVacantes" value=""></input>
                            </div>



                            <div class="form-group mb-4">
                                <label for="des">Titulo de la oferta</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" value=""></input>
                            </div>


                            <div class="form-group mb-4">
                                <label for="userName">Horarios</label>

                            </div>

                            <div class="row mb-2" row="2">
                                <div class="col-lg-6">
                                    <label class="control control-checkbox checkbox-success">Lunes
                                        <input type="checkbox" checked="checked" />
                                        <div class="control-indicator"></div>
                                    </label>
                                    <div class="form-group">
                                        </label>
                                        <input type="time" class="form-control" id="lunes" name="lunes" value="null">
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <label class="control control-checkbox checkbox-success">Martes
                                        <input type="checkbox" checked="checked" />
                                        <div class="control-indicator"></div>
                                    </label>
                                    <div class="form-group">
                                        </label>
                                        <input type="time" class="form-control" id="martes" name="martes" value="null">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label class="control control-checkbox checkbox-success">Miercoles
                                        <input type="checkbox" checked="checked" />
                                        <div class="control-indicator"></div>
                                    </label>
                                    <div class="form-group">
                                        </label>
                                        <input type="time" class="form-control" id="miercoles" name="miercoles" value="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label class="control control-checkbox checkbox-success">Jueves
                                        <input type="checkbox" checked="checked" />
                                        <div class="control-indicator"></div>
                                    </label>
                                    <div class="form-group">
                                        </label>
                                        <input type="time" class="form-control" id="jueves" name="jueves" value="">
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <label class="control control-checkbox checkbox-success">Viernes
                                        <input type="checkbox" checked="checked" />
                                        <div class="control-indicator"></div>
                                    </label>
                                    <div class="form-group">
                                        </label>
                                        <input type="time" class="form-control" id="viernes" name="viernes" value="">
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <label class="control control-checkbox checkbox-success">Sabado
                                        <input type="checkbox" checked="checked" />
                                        <div class="control-indicator"></div>
                                    </label>
                                    <div class="form-group">
                                        </label>
                                        <input type="time" class="form-control" id="sabado" name="sabado" value="">
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <label class="control control-checkbox checkbox-success">Domingo
                                        <input type="checkbox" checked="checked" />
                                        <div class="control-indicator"></div>
                                    </label>
                                    <div class="form-group">
                                        </label>
                                        <input type="time" class="form-control" id="domingo" name="domingo" value="">
                                    </div>
                                </div>





                            </div>


                            <div class="form-group mb-4">
                                <label for="des">Descripción</label>
                                <textarea type="" class="form-control" id="descripcion" name="descripcion" value=""></textarea>
                                <input type="hidden" class="form-control" id="codEmpresa" name="codEmpresa" value="">
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

<script>
    function agregarOfertaLab() {
        datos = $('#formAgregarOf').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            url: "./escucharOferta.php?action=agregar",
            success: function(r) {

                console.log(r);
            }
        });
    }
</script>

<?php
include('Footer.php')
?>