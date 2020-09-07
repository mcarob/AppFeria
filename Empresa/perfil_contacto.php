<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/ContactoEmpresaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ContactoEmpresa.php');
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 3) {
    header("location: ../index.php");
}

$user = new Usuario();
$contactoEmpresa_dao = new ContactoEmpresaDAO();
$user->setUser($_SESSION['user']);
$codigo= $user->darCodigo();
$contactoEmpresa = $contactoEmpresa_dao->devolverContactoEmpresa($codigo);
$nombreContacto = $contactoEmpresa_dao->devolverNombreContacto($codigo);


?>


<?php

include('menuEmpresa.php');
include('Header.php');
?>
<body>
<div class="content-wrapper">
    <div class="content">
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
                                <form  action="javascript: EditarPerfil()" method="POST" id="formEditar" name="formEditar">
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
                                                <label for="firstName">Nombres</label>
                                                <input type="text" class="form-control" name="nomContacto" id="nomContacto" value="<?php echo($contactoEmpresa->getNomContacto()) ?>">
                                                <input type="hidden" id="codContacto" name ="codContacto" value='<?php echo($contactoEmpresa->getCodContacto()) ?>'>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Apellidos
                                                </label>
                                                <input type="text" class="form-control" name="apellidoContacto" id="apellidoContacto" value="<?php echo($contactoEmpresa->getApellidoContacto()) ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="userName">Nombre de usuario</label>
                                        
                                        <input type="text" class="form-control" id="userName" value="<?php echo (($_SESSION['user']))  ?>" readonly></input>
                                       
                                        <span class="d-block mt-1"></span>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="email">Correo</label>
                                        <input type="email" class="form-control" name="correoContacto" id="correoContacto" value="<?php echo($contactoEmpresa->getCorreoContacto()) ?>" readonly>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" class="form-control" name="telefonoContacto" id="telefonoContacto" value="<?php echo($contactoEmpresa->getTelefonoContacto()) ?>">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="cargo">Cargo</label>
                                        <input type="text" class="form-control" name="cargoContacto" id="cargoContacto" value="<?php echo($contactoEmpresa->getCargoContacto()) ?>" readonly>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label for="oldPassword">Contraseña anterior</label>
                                        <input type="password" class="form-control"  id="oldPassword">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="newPassword">Contraseña nueva</label>
                                        <input type="password" class="form-control" id="newPassword">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="conPassword">Confirmar contraseña</label>
                                        <input type="password" class="form-control" id="conPassword">
                                    </div>

                                    <div class="d-flex justify-content-end mt-5">
                                        <button type="submit" class="btn btn-primary mb-2 btn-pill">Actualizar</button>
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
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/jquery-1.8.3.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>
        <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="../assets/js/jquery.sparkline.js"></script>


        <!--common script for all pages-->
        <script src="../assets/js/common-scripts.js"></script>

        <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>

        <!--script for this page-->
        <script src="../assets/js/sparkline-chart.js"></script>
        <script src="../assets/js/zabuto_calendar.js"></script>

        <script>
        function EditarPerfil(){
            datos = $('#formEditar').serialize();
        
                    $.ajax({
                        type: "POST",
                        data: datos,
                        url: "Editar_Perfil_Contacto.php",
                        success: function(r) {

                            console.log(r);

                            if (r == 0) {
                              
                                
                            } else {

                            }
                        }
                    });
        }

    </script>
</body>

    <?php

    include('Footer.php')

    ?>