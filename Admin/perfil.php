<?php

//include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorAdministrador.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/AdministradorDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Administrador.php');

session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4 )) {
    header("location: index.php");
}
$user = new Usuario();
$administrador_dao = new AdministradorDAO();
$user->setUser($_SESSION['user']);
$codigo= $user->darCodigo();

$administrador = $administrador_dao->devolverAdministrador($codigo);


?>


<?php

include('menuAdmi.php');
include('Header.php');
?>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <script src="../assets/js/chart-master/Chart.js"></script>

</head>
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
                                <form   action="javascript: EditarPerfil();" method="POST" id="formEditar" name="formEditar">
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
                                                <input type="text" name="nomAdministrador" class="form-control" id="nomAdministrador" value="<?php echo($administrador->getNomAdministrador()) ?>">
                                                <input type="hidden" id="codAdministrador" name ="codAdministrador" value='<?php echo($administrador->getCodAdministrador()) ?>'>
                                                <input type="hidden" id="codUsuario" name ="codUsuario" value='<?php echo($administrador->getCodUsuario()) ?>'>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="lastName">Apellidos
                                                </label>
                                                <input type="text" name="apellidoAdministrador" class="form-control" id="apellidoAdministrador" value="<?php echo($administrador->getApellidoAdministrador()) ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="userName">Nombre de usuario</label>
                                        
                                        <input type="text" class="form-control" name="userName" id="userName" value=<?php echo ('"'.($_SESSION['user']).'"')  ?> readonly></input>
                                       
                                        <span class="d-block mt-1"></span>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="email">Correo</label>
                                        <input type="email" class="form-control" name="correoAdministrador" id="correoAdministrador" value="<?php echo($administrador->getCorreoAdministrador()) ?>" readonly>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label for="oldPassword">Contraseña anterior</label>
                                        <input type="password" class="form-control" name="oldPassword" id="oldPassword">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="newPassword">Contraseña nueva</label>
                                        <input type="password" class="form-control" name="newPassword" id="newPassword">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="conPassword">Confirmar contraseña</label>
                                        <input type="password" class="form-control" name="conPassword" id="conPassword">
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
                        url: "Editar_Perfil.php",
                        success: function(r) {

                            console.log(r);

                            if (r == 0) {
                                var unique_id = $.gritter.add({
                                    title: 'Perfil',
                                    text: 'Se ha registrado con exito.'
                                });
                                location.href="index.php"
                                
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
