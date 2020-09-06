<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 3) {
    header("location: ../index.php");
}


include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');
include('menuEmpresa.php');
include('Header.php');

$conPromocion=new ControladorPromocion();
$horarios="";
if(isset($_GET["action"]))
{
    $var=$_GET["action"];
    $informacion=$conPromocion->darOferta($var);
    $horarios=explode(';',$informacion->getPromocionHorario());
    
}

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
                                <form id='editar_oferta' method='POST' action="javascript:agregarVac()">
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
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="firstName">Ciudad</label>
                                                <input type="hidden" class="form-control"  name="codigo" id="codigo" value="<?php echo ($informacion->getCodPromocion())?>">
                                                <input type="text" class="form-control"  name="ciudad" id="ciudad" value="<?php echo ($informacion->getPromocionCiudad())?>">
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Fecha de la publicación
                                                </label>
                                                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo ($informacion->getPromocionFecha())?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Fecha de inicio
                                                </label>
                                                <input type="date" class="form-control" id="inicio" name="inicio" value="<?php echo ($informacion->getPromocionInicio())?>">
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Remuneración
                                                </label>
                                                <input type="text" class="form-control" id="compensacion" name="compensacion" value="<?php echo ($informacion->getPromocionCompensacion())?>">
                                                <input type="hidden" class="form-control" id="empresa" name="empresa" value="<?php echo ($informacion->getCodEmpresa())?>">
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Rango compensacion
                                                </label>
                                                <input type="text" class="form-control" id="rango" name="rango" value="<?php echo ($informacion->getPromocionRangoCompensacion())?>">
                                            </div>
                                        </div>


                                    </div>

                                    

                                    <div class="form-group mb-4">
                                        <label for="userName">Titulo</label>
                                        <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo ($informacion->getTituloPromocion())?>">
                                        <span class="d-block mt-1"></span>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="userName">Perfil</label>
                                        <input type="text" class="form-control" name="perfil" id="perfil" value="<?php echo ($informacion->getPromocionPerfil())?>">
                                        <span class="d-block mt-1"></span>
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
                                                <input type="time" class="form-control" id="lunes" name="lunes" value="<?php $date = date("H:i", strtotime($horarios[0])); echo "$date"; ?>">
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <label class="control control-checkbox checkbox-success">Martes
                                                <input type="checkbox" checked="checked" />
                                                <div class="control-indicator"></div>
                                            </label>
                                            <div class="form-group">
                                                </label>
                                                <input type="time" class="form-control" name="martes" id="martes" value="<?php $date = date("H:i", strtotime($horarios[1])); echo "$date"; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="control control-checkbox checkbox-success">Miercoles
                                                <input type="checkbox" checked="checked" />
                                                <div class="control-indicator"></div>
                                            </label>
                                            <div class="form-group">
                                                </label>
                                                <input type="time" class="form-control" id="miercoles" name="miercoles" value="<?php $date = date("H:i", strtotime($horarios[2])); echo "$date"; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="control control-checkbox checkbox-success">Jueves
                                                <input type="checkbox" checked="checked" />
                                                <div class="control-indicator"></div>
                                            </label>
                                            <div class="form-group">
                                                </label>
                                                <input type="time" class="form-control" name="jueves" id="jueves" value="<?php $date = date("H:i", strtotime($horarios[3])); echo "$date"; ?>">
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <label class="control control-checkbox checkbox-success">Viernes
                                                <input type="checkbox" checked="checked" />
                                                <div class="control-indicator"></div>
                                            </label>
                                            <div class="form-group">
                                                </label>
                                                <input type="time" class="form-control" id="viernes" name="viernes" value="<?php $date = date("H:i", strtotime($horarios[4])); echo "$date"; ?>">
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <label class="control control-checkbox checkbox-success">Sabado
                                                <input type="checkbox" checked="checked" />
                                                <div class="control-indicator"></div>
                                            </label>
                                            <div class="form-group">
                                                </label>
                                                <input type="time" class="form-control" id="sabado" name="sabado" value="<?php $date = date("H:i", strtotime($horarios[5])); echo "$date"; ?>">
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <label class="control control-checkbox checkbox-success">Domingo
                                                <input type="checkbox" checked="checked" />
                                                <div class="control-indicator"></div>
                                            </label>
                                            <div class="form-group">
                                                </label>
                                                <input type="time" class="form-control" id="domingo" name="domingo" value="<?php $date = date("H:i", strtotime($horarios[6])); echo "$date"; ?>">
                                            </div>
                                        </div>





                                    </div>


                                    <div class="form-group mb-4">
                                        <label for="cargo">Cargo</label>
                                        <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo ($informacion->getPromocionCargoFuncion())?>"></input>
                                        <input type="hidden" class="form-control"  name="estado" id="estado" value="<?php echo ($informacion->getPromocionEstado())?>">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="descripcion">Descripción</label>
                                        <textArea type="text" class="form-control" id="descripcion" name="descripcion" > <?php echo ($informacion->getPromocionDescripcion())?></textArea>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="descripcion">Beneficios</label>
                                        <textArea type="text" class="form-control" id="beneficios" name="beneficios" > <?php echo ($informacion->getPromocionBeneficios())?></textArea>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="descripcion">Limite vacantes</label>
                                        <textArea type="text" class="form-control" id="vacantes" name="vacantes" > <?php echo ($informacion->getLimiteVacantes())?></textArea>
                                    </div>

                                    <div class="d-flex justify-content-end mt-5">
                                        
                                        <input type='submit' value='ENVIAR'class="btn btn-primary mb-2 btn-pill"  />
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
                    console.log('entra funcion');
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
        </script>