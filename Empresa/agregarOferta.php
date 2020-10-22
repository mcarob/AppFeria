<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 3) {
    header("location: ../index.php");
}



include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/Ciudades.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ListasDesplegables.php');

include('menuEmpresa.php');
include('Header.php');

$empresa_dao = new EmpresaDAO();
$codigo = $user->darCodigo();
$empresa = $empresa_dao->devolverEmpresa($codigo);
$ciudadesCon=new Ciudades();
$departamentos=$ciudadesCon->darTodosDepartamentos();
$listas= new ListasDesplegables();
$listaCarreras=$listas->darListaCarrera();



$fecha_actual = date("Y-m-d")

?>

<div class="content-wrapper">

    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Agregar Ofertas</h1>



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

                    <!-- <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2> Información</h2>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn mb-1 btn-primary btn-pill" data-toggle="popover" title="Popover Title" data-content="Lorem ipsum dolor sit amet consectetur elit sed do.">P. Buscado</button>
                            <button type="button" class="btn mb-1 btn-primary btn-pill" data-toggle="popover" title="Popover Title" data-content="Lorem ipsum dolor sit amet consectetur elit sed do.">Beneficios</button>
                            <button type="button" class="btn mb-1 btn-primary btn-pill" data-toggle="popover" title="Popover Title" data-content="Lorem ipsum dolor sit amet consectetur elit sed do.">T. Oferta</button>
                            <button type="button" class="btn mb-1 btn-primary btn-pill" data-toggle="popover" title="Popover Title" data-content="Lorem ipsum dolor sit amet consectetur elit sed do.">Descripción</button>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-8 col-xl-9">

                    <div class="profile-content-right py-5">
                        <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                        </ul>
                        <div class="tab-content px-3 px-xl-5" id="myTabContent">
                            <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">




                            </div>

                            <div class="tab-pane fade show active" id="settings" role="tabpanel"
                                aria-labelledby="settings-tab">
                                <div class="mt-5">
                                    <form id="formAgregarOf" method="POST" action="javascript: agregarOferta()">

                                        <div class="form-group mb-4">
                                            <label for="userName">Perfil Buscado</label>

                                            <textarea maxlength="100" type="text"
                                                placeholder="Describa el perfil buscado (Max. 100 caracteres)"
                                                class="form-control" id="perfil" value="" name="perfil" required maxlength="100"></textarea>
                                            <span class="d-block mt-1"></span>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label for="firstName">Perfil Estudiante</label>
                                                    <select class="form-control"id="perfilest"
                                                        name="perfilest"
                                                        onchange="getCity(this.value);" required>
                                                        <option value="6">Indiferente Al Perfil</option>
                                                        <?php
                                                        foreach ($listaCarreras as $carre) {
                                                      ?>
                                                        <option value="<?php echo ($carre[0] ); ?>">
                                                            <?php echo $carre[1]; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Fecha de la Publicación
                                                    </label>
                                                    <input type="date" class="form-control" id="fechaPublicacion"
                                                        name="fechaPublicacion" value="<?php echo ($fecha_actual) ?>"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Fecha de Inicio
                                                    </label>
                                                    <input type="date" class="form-control" id="fechaInicio"
                                                        name="fechaInicio" value="" required> 
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="firstName">Cargo</label>
                                                    <input type="text" class="form-control" id="cargo"
                                                        name="cargo" value="" required  maxlength="20">
                                                </div>
                                            </div>
                                            <input type="hidden" id="remuneracion" name="remuneracion" value="">
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="firstName"> Ubicación (Departamento)</label>
                                                    <select class="form-control" name="departamento" id="depa-lista"
                                                        onchange="getCity(this.value);" required>
                                                        <option value="">Seleccione un Departamento</option>
                                                        <?php
                                                        foreach ($departamentos as $depar) {
                                                      ?>
                                                        <option value="<?php echo ($depar[0] ); ?>">
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
                                                    <select name="ciudad" id="ciudad" class="form-control" required>
                                                        <option>Seleccione una Ciudad</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                                <div class="form-group">
                                                    <label for="lastName">Beneficios Extras
                                                    </label>
                                                    <textarea type="" class="form-control"
                                                        placeholder="Describa los beneficios que tendran sus practicantes"
                                                        id="beneficioExtra" name="beneficioExtra" required maxlength="20"
                                                    
                                                        value=""></textarea>
                                                    <br>

                                                </div>

                                        </div>

                                </div>
                                <div class="form-group mb-4">
                                    <label for="des">Rango Remuneración</label>
                                    <select name="ranRemuneracion" id="ranRemuneracion" class="form-control" required>
                                        <option value="Sin remuneracion">Sin Remuneración</option>
                                        <option value="0 - 1 Salarios mínimos">1 Salario Mínimos</option>
                                        <option value="1 - 2 Salarios mínimos">1 - 2 Salarios Mínimos</option>
                                        <option value="2 o más Salarios mínimos">2 o Más Salarios Mínimos</option>

                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="des">Numero de Vacantes</label>
                                    <input type="number" class="form-control" id="numVacantes" name="numVacantes"
                                        min="1" pattern="^[0-9]+" value="" required></input>
                                </div>



                                <div class="form-group mb-4">
                                    <label for="des">Título de la Oferta</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" value="" required maxlength="15"></input>
                                </div>


                                <div class="form-group mb-4">
                                    <label for="userName">Horarios</label>

                                </div>

                                <div class="row mb-2" row="2">
                                    <div class="col-lg-6">
                                        <label class="control control-checkbox checkbox-success">Lunes
                                            <input type="checkbox" checked="" id="lunes" name="lunes" value="Lunes" />
                                            <div class="control-indicator">
                                            </div>
                                        </label>

                                    </div>


                                    <div class="col-lg-6">
                                        <label class="control control-checkbox checkbox-success">Martes

                                            <input type="checkbox" checked="" id="martes" name="martes"
                                                value="Martes" />
                                            <div class="control-indicator"></div>
                                        </label>

                                    </div>

                                    <div class="col-lg-6">
                                        <label class="control control-checkbox checkbox-success">Miércoles
                                            <input type="checkbox" checked="" id="miercoles" name="miercoles"
                                                value="Miercoles" />
                                            <div class="control-indicator"></div>
                                        </label>

                                    </div>

                                    <div class="col-lg-6">
                                        <label class="control control-checkbox checkbox-success">Jueves
                                            <input type="checkbox" checked="" id="jueves" name="jueves"
                                                value="Jueves" />
                                            <div class="control-indicator"></div>
                                        </label>

                                    </div>


                                    <div class="col-lg-6">
                                        <label class="control control-checkbox checkbox-success">Viernes
                                            <input type="checkbox" checked="" id="viernes" name="viernes"
                                                value="Viernes" />
                                            <div class="control-indicator"></div>
                                        </label>

                                    </div>


                                    <div class="col-lg-6">
                                        <label class="control control-checkbox checkbox-success">Sábado
                                            <input type="checkbox" checked="" id="sabado" name="sabado"
                                                value="Sabado" />
                                            <div class="control-indicator"></div>
                                        </label>

                                    </div>


                                    <div class="col-lg-6">
                                        <label class="control control-checkbox checkbox-success">Domingo
                                            <input type="checkbox" checked="" id="domingo" name="domingo"
                                                value="Domingo" />
                                            <div class="control-indicator"></div>
                                        </label>

                                    </div>




                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Seleccione la Jornada</label>
                                    <select class="form-control" id="hora" name="hora" required>
                                        <option value="6:00 am - 3:00 pm">6:00 am - 3:00 pm</option>
                                        <option value="7:00 am - 4:00 pm">7:00 am - 4:00 pm</option>
                                        <option value="8:00 am - 5:00 pm">8:00 am - 5:00 pm</option>
                                        <option value="9:00 am - 6:00 pm">9:00 am - 6:00 pm</option>
                                        <option value="Otro">Otro</option>

                                    </select>
                                </div>


                                <div class="form-group mb-4">
                                    <label for="des">Descripción</label>
                                    <textarea type="" class="form-control"
                                        placeholder="Describa la oferta (Max. 1200 caracteres)" id="descripcion"
                                        name="descripcion" value="" required maxlength="1200"></textarea>
                                    <input  type="hidden" class="form-control" id="codEmpresa"
                                        name="codEmpresa" value=<?php echo ($empresa->getCodEmpresa()) ?>>
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

function soloLetras(e) {
    var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        especiales = [8, 37, 39, 46],
        tecla_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}
</script>

<?php
include('Footer.php')
?>