<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="description" name="description">
    <meta name="google" content="notranslate" />
    <meta content="Mashup templates have been developped by Orson.io team" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">




    <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />
    <link href="assets/plugins/toastr/toastr.min.css" rel="stylesheet" />
    <script src="assets/plugins/nprogress/nprogress.js"></script>
    <link href="./assets/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="./assets/favicon.ico" rel="icon">



    <title>Registro</title>
    <link href="assets/srcindex/main.a3f694c01.css" rel="stylesheet">
</head>
</head>

<body
    style="background-image: url(assets/img/UEB.jpg); background-repeat: no-repeat; display: block; margin-left: auto; margin-right: auto; width: 100%; background-size: cover;">

    <!-- Add your content of header -->
    <header>
        <nav1 class="navbar1  navbar1-fixed-top navbar1-default">
            <div class="container1">
                <div class="navbar1-header">
                    <button type="button" class="navbar1-toggle uarr collapsed" data-toggle="collapse"
                        data-target="#navbar1-collapse-uarr">
                        <span class="sr-only">toggle1 navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar1-brand1" href="./index.php" title="">
                        <img src="./assets/images/logoU.svg" class="navbar1-logo-img" alt="">
                    </a>

                    </a>
                </div>

                <div class="collapse navbar1-collapse" id="navbar1-collapse-uarr">
                    <ul class="nav1 navbar1-nav1 navbar1-right">
                        <li><a href="./index.php" title="" class="active">Inicio</a></li>
                        <li><a href="./about.php" title=""> Información</a></li>
                        <li><a href="./Registrar.php" title="">Registrarme</a></li>
                        <li>
                            <p>
                                <a href="paginaIngreso.php" class="btn btn-primary navbar1-btn" title="">Iniciar
                                    sesion</a>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </nav1>
    </header>




    <div class="container d-flex flex-column justify-content-between vh-100">
        <div class="row justify-content-center mt-10">
            <div class="col-xl-5 col-lg-6 col-md-10">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="app-brand" style="text-align: center; color: whithe!important;">
                            <br>

                            <a style="font-size: 150%!important;">FERIA DE OPORTUNIDADES </a>
                            <br>


                        </div>
                    </div>
                    <div class="card-body p-5">

                        <h4 class="text-dark mb-5">Iniciar Sesi&oacute;n</h4>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">

                                    <input type="text" class="form-control input-lg" id="username" required
                                        autocomplete="new-user"
                                        <?php
                                                                                                                                    if (isset($userForm)) {
                                                                                                                                        echo ("value='" . $userForm . "'");
                                                                                                                                    }
                                                                                                                                    ?>
                                        name="username" placeholder="Usuario">
                                </div>
                                <div class="form-group col-md-12 ">
                                    <input type="password" class="form-control input-lg" id="password" required
                                        autocomplete="new-password"
                                        <?php
                                                                                                                                            if (isset($passForm)) {
                                                                                                                                                echo ("value='" . $passForm . "'");
                                                                                                                                            }
                                                                                                                                            ?>
                                        name="password" placeholder="Contrase&ntilde;a">
                                </div>

                                <?php
                                if (isset($mostrarCodigo)) {

                                ?>
                                <div class="form-group col-md-12 ">
                                    <input type="password" class="form-control input-lg" id="verifi" name="verifi"
                                        placeholder="Codigo Verificación" required>
                                </div>
                                <?php

                                }
                                ?>


                                <div class="col-md-12">
                                    <div class="d-flex my-2 justify-content-between">
                                        <div class="d-inline-block mr-3">
                                            <p><button type="button" class="btn btn-light" data-toggle="modal"
                                                    data-target="#exampleModalCenter"
                                                    style="background-color: #ffffff;">
                                                    ¿Olvidaste tu contraseña?
                                                </button>

                                        </div>
                                    </div>
                                    </p>
                                </div>
                                <?php

                                    if (isset($errorEntrada)) {
                                        echo  $errorEntrada;
                                    }
                                    ?>
                                <button type="submit" class="btn btn-lg btn-primary btn-block mb-4"
                                    name="submit">Ingresar</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div>
        <footer style="background-color: white;">
            <div class="section1-container1 footer-container1">
                <div class="container1">
                    <div class="row">
                        <div class="col-md-4">
                        </div>

                        <div class="col-md-4">
                            <h4>¡Conocenos!</h4>
                            <p>
                                <a href="https://www.facebook.com/universidadelbosque/" target="_blank"
                                    class="social-round-icon white-round-icon fa-icon" title="">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a href="https://twitter.com/UElBosque" target="_blank"
                                    class="social-round-icon white-round-icon fa-icon" title="">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a href="https://www.instagram.com/uelbosque/" target="_blank"
                                    class="social-round-icon white-round-icon fa-icon" title="">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </p>
                            <p><small>© Untitled | Website created with <a href="http://www.mashup-template.com/"
                                        class="link-like-text" title="Create website with free html template">Mashup
                                        Template</a>/<a href="http://www.unsplash.com/" class="link-like-text"
                                        title="Beautiful Free Images">Unsplash</a></small></p>
                        </div>

                    </div>
                </div>
            </div>

        </footer>
    </div>
  
  
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cambiar
                        contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div id="cambiarContenido">

                            <?php  if(!(isset($codigoEnviado) or  isset($ingresarNuevaContra))){
                                ?>
                                <?php if((isset($errorCorreo))){
                                    echo("<label >".$errorCorreo."</label>");
                                }  ?>
                            <label for="">Ingresa El correo de Registro:</label>
                            <br>
                            <input class="form-control input-lg" type="text" placeholder="ejemplo@unbosque.edu.co"
                                pattern="^[_A-Za-z0-9-+]+(.[_A-Za-z0-9-]+)@[A-Za-z0-9-]+(.[A-Za-z0-9]+)(.[A-Za-z]{2,})$"
                                title="No Cumple con el Formato de Correo Electrónico" id="correoOlvidar" name="correoOlvidar"  required>
                            <br>
                            <button type="submit" class="btn btn-primary" >Enviar codigo de
                                Confirmación</button>
                            <?php
                            } ?>
                            <?php  if(isset($codigoEnviado)){
                                ?>
                                <?php if((isset($errorCodigoConf))){
                                    echo("<label >".$errorCodigoConf."</label>");
                                }else{
                                    ?>
                                     <label for=""> <?php echo($codigoEnviado); ?></label>
                                    <?php
                                }  ?>
                            <label for="">Ingrese el codigo de confirmacion:</label>
                            <br>
                            <input class="form-control input-lg" type="hidden" id="correoConf" name="correoConf" value="<?php echo ($correoE); ?>">
                            <input class="form-control input-lg" type="number" id="confirmacionCambio" name="confirmacionCambio" required>
                            <br>
                            <button type="submit" class="btn btn-primary">Validar
                                Codigo</button>
                            <?php
                            } ?>
                            <?php  if(isset($ingresarNuevaContra)){
                                ?>
                            <br>
                            <?php if((isset($errorContraconfir))){
                                    echo("<label >".$errorContraconfir."</label>");
                                }  ?>
                            <label for="">Ingrese su nueva contraseña:</label>
                            <br>
                            <input class="form-control input-lg" type="hidden" id="correoConf" name="correoConf" value="<?php echo ($correoE); ?>">
                            <input class="form-control input-lg" type="password" id="contrasena1con" name="contrasena1con" required>
                            <br>
                            <label for="">Confirme su nueva contraseña:</label>
                            <br>
                            <input class="form-control input-lg" type="password" id="contrasena2con" name="contrasena2con" required>
                            <button type="submit" class="btn btn-primary" >Cambiar
                                Contraseña</button>
                            <?php
                            } ?>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>


                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        navActivePage();
    });
    </script>

    <script type="text/javascript" src="assets/srcindex/main.41beeca9.js"></script>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"> </script>
<script src="https://cdn.emailjs.com/dist/email.min.js" type="text/javascript"> </script>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/jekyll-search.min.js"></script>
<script src="assets/js/sleek.bundle.js"></script>
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script src="assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>

<script src="assets/plugins/toastr/toastr.min.js"></script>

<script>
$(document).ready(function() {
    $("#logo").change(function() {
        readURL(this);
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script>
function mostrar() {
    $("#exampleModalCenter").modal("show")
};
</script>


<?php  if((isset($mostrarDialogo))){
                                ?>
<!-- // php cuadno este ready -->
<script>
$(document).ready(function() {
    mostrar();
});
</script>
<?php 
 }
?>
<?php  if((isset($errorCorreoRecuperacion))){
                                ?>
<!-- // php cuadno este ready -->
<script>
$(document).ready(function() {
    toastr["alert"](<?php echo($errorCorreoRecuperacion) ?>, "Disculpas");
});
</script>
<?php 
 }
?>
</body>

</html>