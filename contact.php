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
    <link href="assets/srcindex/main.a3f694c01.css" rel="stylesheet"></head>
</head>

<body>

    <!-- Add your content of header -->
    <header>
        <nav1 class="navbar1  navbar1-fixed-top navbar1-default">
            <div class="container">
                <div class="navbar1-header">
                    <button type="button" class="navbar1-toggle uarr collapsed" data-toggle="collapse"
                        data-target="#navbar1-collapse-uarr">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    </a>
                </div>

                <div class="collapse navbar1-collapse" id="navbar1-collapse-uarr">
                    <ul class="nav1 navbar1-nav1 navbar1-right">
                        <li><a href="./index.php" title="" class="active">Inicio</a></li>
                        <li><a href="./about.php" title=""> About</a></li>
                        <li><a href="./pricing.php" title=""> Pricing </a></li>
                        <li><a href="./contact.php" title="">Contact</a></li>
                        <li>
                            
                        </li>

                    </ul>
                </div>
            </div>
        </nav1>
    </header>




    <div class="container d-flex flex-column justify-content-between vh-30">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8 col-sm-offset-1">
                <div class="card card-default">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-justified nav-style-fill" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home3-tab" data-toggle="tab" href="#home3" role="tab"
                                    aria-controls="home3" aria-selected="true">Registro Empresa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile3-tab" data-toggle="tab" href="#profile3" role="tab"
                                    aria-controls="profile3" aria-selected="false">Registro Estudiante</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent4">
                            <div class="tab-pane pt-3 fade show active" id="home3" role="tabpanel"
                                aria-labelledby="home3-tab">

                                <?php include_once 'registro_empresa.php'; ?>

                                <!--  fin del primer tab-->
                            </div>
                            <div class="tab-pane pt-3 fade" id="profile3" role="tabpanel"
                                aria-labelledby="profile3-tab">
                                <?php include_once 'registro_estudiante.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <footer>
        <div class="section-container footer-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>

                    <div class="col-md-4">
                        <h4>¡Conocenos!</h4>
                        <p>
                            <a href="https://www.facebook.com/universidadelbosque/" target="_blank" class="social-round-icon white-round-icon fa-icon" title="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="https://twitter.com/UElBosque" target="_blank" class="social-round-icon white-round-icon fa-icon" title="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.instagram.com/uelbosque/" target="_blank" class="social-round-icon white-round-icon fa-icon"
                                title="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </p>
                        <p><small>© Untitled | Website created with <a href="http://www.mashup-template.com/"
                                    class="link-like-text" title="Create website with free html template">Mashup
                                    Template</a>/<a href="http://www.unsplash.com/" class="link-like-text"
                                    title="Beautiful Free Images">Unsplash</a></small></p>
                    </div>

                    <div class="col-md-4">
                        <h4></h4>

                        <div class="form-group">
                            
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        navActivePage();
    });
    </script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID 

<script>
  (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date(); a = s.createElement(o),
      m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
  ga('create', 'UA-XXXXX-X', 'auto');
  ga('send', 'pageview');
</script>

-->
    <!-- Google maps  -->
    <!-- end Google Maps -->



    <script type="text/javascript" src="assets/srcindex/main.41beeca9.js"></script></body>
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
</body>

</html>