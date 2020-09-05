<!DOCTYPE html>
<html lang="en">

<head>

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">


    <title></title>

    <!-- GOOGLE FONTS -->



    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />
    <!-- FAVICON -->
    <link href="assets/img/favicon.png" rel="shortcut icon" />
    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="assets/plugins/nprogress/nprogress.js"></script>
  </head>

</head>
<style>
  body {
    background-color: #CCCCCC;
    background-image: url(assets/img/UEB.jpg);
  }
</style>

<body class="" id="body">
  <div class="container d-flex flex-column justify-content-between vh-100">
    <div class="row justify-content-center mt-5" >
      <div class="col-lg-8 col-sm-offset-1">
        <div class="card card-default" >
          <div class="card-header card-header-border-bottom" >
            <center> <img src="assets/img/logo.png" style="width:180px ;" alt=""></center>
          </div>
          <div class="card-body">
            <ul class="nav nav-pills nav-justified nav-style-fill" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home3-tab" data-toggle="tab" href="#home3" role="tab" aria-controls="home3" aria-selected="true">Registro Empresa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile3-tab" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile3" aria-selected="false">Registro Estudiante</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent4">
              <div class="tab-pane pt-3 fade show active" id="home3" role="tabpanel" aria-labelledby="home3-tab">
                <div class="wizard-card ct-wizard-green">
                  <div class="picture-container">
                    <div class="picture">
                      <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                      <input type="file" id="wizard-picture">
                    </div>
                    <h6>Elegir Logo</h6>
                  </div>
                </div>
                <br>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Nombre o Razon Social" aria-label="Username">
                </div>
                <div class="row no-gutters">
                  <div class="col-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">assignment_ind</i>
                        </span>
                      </div>
                      <input type="text" class="form-control" data-mask="999999999-9" placeholder="NIT" aria-label="Username">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">phone</i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="Teléfono Empresa" aria-label="Username">
                    </div>
                  </div>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">email</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Correo Electronico Empresa" aria-label="Username">
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Cargar</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Subir Camara de Comercio</label>
                  </div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripcción Empresa (max 1200)"></textarea>
                </div>

                <div class="card-header card-header-border-bottom">
                  <h2>Información Contacto </h2>
                </div>

                <div class="row no-gutters">
                  <div class="col-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">assignment_ind</i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="Nombres" aria-label="Username">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">face</i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="Apellidos " aria-label="Username">
                    </div>
                  </div>
                </div>
                <div class="row no-gutters">
                  <div class="col-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">group</i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="Cargo" aria-label="Username">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">phone</i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="Teléfono " aria-label="Username">
                    </div>
                  </div>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4" style="float: right;">
													<input type="submit" class="btn btn-primary btn-default" value="Registrar"></input>
													<input type="submit" class="btn btn-primary btn-default" value="Volver a Ingreso"></input>
                </div>


                <!--  fin del primer tab-->
              </div>
              <div class="tab-pane pt-3 fade" id="profile3" role="tabpanel" aria-labelledby="profile3-tab">
                rojo
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
  <p class="text-center">&copy; 2018 Copyright Sleek Dashboard Bootstrap Template by
    <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
  </p>
  </div>
  </div>




  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
  <script src="assets/plugins/jekyll-search.min.js"></script>
  <script src="assets/js/sleek.bundle.js"></script>
  <script src="assets/plugins/select2/js/select2.min.js"></script>
  <script src="assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#wizard-picture").change(function() {
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



</body>

</html>