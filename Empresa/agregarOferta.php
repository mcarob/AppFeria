<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 3) {
    header("location: ../index.php");
}




include('menuEmpresa.php');
include('Header.php');

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
$empresa_dao = new EmpresaDAO();
$codigo = $user->darCodigo();
$empresa = $empresa_dao->devolverEmpresa($codigo);


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
                                <form id="formAgregarOf" method="POST" action="javascript: agregarOferta()">

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
                                                <input type="date" class="form-control" id="fechaPublicacion" name="fechaPublicacion" value="<?php echo ($fecha_actual) ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Fecha de inicio
                                                </label>
                                                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="">
                                            </div>
                                        </div>


                                        <input type="hidden"  id="remuneracion" name="remuneracion" value="">



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
                                    <option value="">Seleccione una opcion</option>
                                    <option value="sin remuneracion">Sin remuneracion</option>
                                    <option value="0 - 1 Salarios mínimos">1 Salario mínimos</option>
                                    <option value="1 - 2 Salarios mínimos">1 - 2 Salarios mínimos</option>
                                    <option value="2 o más Salarios mínimos">2 o más Salarios mínimos</option>

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
                                        <input type="checkbox" checked="checked" id="lunes" name="lunes" value="Lunes" />
                                        <div class="control-indicator">
                                        </div>
                                    </label>

                                </div>


                                <div class="col-lg-6">
                                    <label class="control control-checkbox checkbox-success">Martes

                                        <input type="checkbox" checked="checked" id="martes" name="martes" value="Martes" />
                                        <div class="control-indicator"></div>
                                    </label>

                                </div>

                                <div class="col-lg-6">
                                    <label class="control control-checkbox checkbox-success">Miercoles
                                        <input type="checkbox" checked="checked" id="miercoles" name="miercoles" value="Miercoles" />
                                        <div class="control-indicator"></div>
                                    </label>

                                </div>

                                <div class="col-lg-6">
                                    <label class="control control-checkbox checkbox-success">Jueves
                                        <input type="checkbox" checked="checked" id="jueves" name="jueves" value="Jueves" />
                                        <div class="control-indicator"></div>
                                    </label>

                                </div>


                                <div class="col-lg-6">
                                    <label class="control control-checkbox checkbox-success">Viernes
                                        <input type="checkbox" checked="checked" id="viernes" name="viernes" value="Viernes" />
                                        <div class="control-indicator"></div>
                                    </label>

                                </div>


                                <div class="col-lg-6">
                                    <label class="control control-checkbox checkbox-success">Sabado
                                        <input type="checkbox" checked="checked" id="sabado" name="sabado" value="Sabado" />
                                        <div class="control-indicator"></div>
                                    </label>

                                </div>


                                <div class="col-lg-6">
                                    <label class="control control-checkbox checkbox-success">Domingo
                                        <input type="checkbox" checked="checked" id="domingo" name="domingo" value="Domingo" />
                                        <div class="control-indicator"></div>
                                    </label>

                                </div>




                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Seleccione la jornada</label>
                                <select class="form-control" id="hora" name="hora">
                                    <option value="6:00 am - 3:00 pm">6:00 am - 3:00 pm</option>
                                    <option value="7:00 am - 4:00 pm">7:00 am - 4:00 pm</option>
                                    <option value="8:00 am - 5:00 pm">8:00 am - 5:00 pm</option>
                                    <option value="9:00 am - 6:00 pm">9:00 am - 6:00 pm</option>

                                </select>
                            </div>


                            <div class="form-group mb-4">
                                <label for="des">Descripción</label>
                                <textarea type="" class="form-control" id="descripcion" name="descripcion" value=""></textarea>
                                <input type="hidden" class="form-control" id="codEmpresa" name="codEmpresa" value=<?php echo ($empresa->getCodEmpresa()) ?>>
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
    function agregarOferta() {
        datos = $('#formAgregarOf').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            url: "agregar_vacante.php",
            success: function(r) {

                console.log(r);
                if (r == 1) {

                    window.location.href = "Ofertas.php";
                } else {

                }
            }
        });
    }
</script>

<?php
include('Footer.php')
?>