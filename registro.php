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
    <link href="assets/plugins/toastr/toastr.min.css" rel="stylesheet" />
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
  <div id="445toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="mr-auto">Bootstrap</strong>
      <small class="text-muted">just now</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      See? Just like this.
    </div>
  </div>

  <div class="container d-flex flex-column justify-content-between vh-100">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-8 col-sm-offset-1">
        <div class="card card-default">
          <div class="card-header card-header  d-flex justify-content-center">
            <img src="assets/img/logo.png" style="width:180px ;" alt="">
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

                <?php include_once 'registro_empresa.php'; ?>

                <!--  fin del primer tab-->
              </div>
              <div class="tab-pane pt-3 fade" id="profile3" role="tabpanel" aria-labelledby="profile3-tab">
                <?php include_once 'registro_estudiante.php'; ?>
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


</body>

</html>