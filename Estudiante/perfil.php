<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EstudianteDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 2) {
    header("location: ../index.php");
}

$user = new Usuario();
$estudiante_dao = new EstudianteDAO();
$user->setUser($_SESSION['user']);
$codigo= $user->darCodigo();
$estudiante = $estudiante_dao->devolverEstudiante($codigo);


include('menuEstudiante.php');
include('Header.php');
?>
<link href="../assets/plugins/toastr/toastr.min.css" rel="stylesheet" />

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

                        <div class="tab-pane fade show active" id="settings" role="tabpanel"
                            aria-labelledby="settings-tab">
                            <div class="mt-5">
                                <form id="editarEs" method='POST' action="javascript:editarEstudiante()">
       
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="firstName">Nombres</label>
                                                <input type="text" class="form-control" id="nombres" name="nombres"
                                                    value="<?php echo($estudiante->getNombreEstudiante()) ?>">
                                                <input type="hidden" class="form-control" id="cod_usuario"
                                                    name="cod_usuario" value="<?php echo($codigo) ?>">
                                                <input type="hidden" class="form-control" id="cod_estudiante"
                                                    name="cod_estudiante"
                                                    value="<?php echo($estudiante->getCodEstudiante()) ?>">

                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Apellidos
                                                </label>
                                                <input type="text" class="form-control" id="apellidos" name="apellidos"
                                                    value="<?php echo($estudiante->getApellidoEstudiante()) ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="userName">Nombre de usuario</label>
                                        <input type="text" class="form-control" id="userName" name="userName"
                                            value="<?php echo (($_SESSION['user']))  ?>" readonly>

                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="userName">Cedula</label>
                                        <input type="text" class="form-control" id="cedula" name="cedula"
                                            value="<?php echo ($estudiante->getCedEstudiante())?>">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="email">Correo</label>
                                        <input type="email" class="form-control" id="correo" name="correo"
                                            value="<?php echo($estudiante->getCorreoEstudiante()) ?>" readonly>
                                        <input type="hidden" class="form-control" id="programa" name="programa"
                                            value="<?php echo($estudiante->getCodProgamaAcademico()) ?>">
                                        <input type="hidden" class="form-control" id="semestre" name="semestre"
                                            value="<?php echo($estudiante->getSemestreEstudiante()) ?>">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="conPassword1">Contraseña actual</label>
                                        <input type="password" class="form-control" id="conPassword1"
                                            name="conPassword1" value="">
                                    </div>


                                    <div class="form-group mb-4">
                                        <label for="newPassword">Contraseña nueva</label>
                                        <input type="password" class="form-control" id="newPassword" name="newPassword"
                                            value="">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="conPassword">Confirmar contraseña</label>
                                        <input type="password" class="form-control" id="conPassword" name="conPassword"
                                            value="">
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
<script src="../assets/plugins/toastr/toastr.min.js"></script>



<script>
function editarEstudiante() {

    datos = $('#editarEs').serialize();



    $.ajax({
        type: "POST",
        data: datos,
        url: "editar_perfil.php",
        success: function(r) {

            console.log(r);
            if (r == 11) {
                window.location.href = "index.php";
            }else if(r == 1)
            {
                window.location.href = "index.php";
            } else if(r==3)
            {
                toastr["success"](r, "ERROR");
            }else{
                
                toastr["success"](r, "ERROR");
                
            }
        }
    });

}
</script>