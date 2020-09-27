<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">


  <title>Plantilla</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
  <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
  <!-- PLUGINS CSS STYLE -->
  <link href="../assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="../assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="../assets/css/sleek.css" />
  <!-- FAVICON -->
  <link href="../assets/img/favicon.png" rel="shortcut icon" />


  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="../assets/plugins/nprogress/nprogress.js"></script>
</head>


<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">




  <!--
          ====================================
          â€”â€”â€” LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
  <aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="index.php" title="Sleek Dashboard">
          <span class="brand-name text-truncate">Universidad El Bosque</span>
        </a>
      </div>
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-scrollbar">

        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
              <i class="mdi mdi-view-dashboard-outline"></i>
              <span class="nav-text">Empresas</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="dashboard" data-parent="#sidebar-menu">
              <div class="sub-menu">

                <?php
                if ($_SESSION['tipo'] == 1) {

                ?>
                  <li>
                    <a class="sidenav-item-link" href="ValidarEmpresa.php">
                      <span class="nav-text">Autorizar Registros</span>

                    </a>
                  </li>
                <?php
                }
                ?>

                <li>
                  <a class="sidenav-item-link" href="ListaEmpresas.php">
                    <span class="nav-text">Listar Empresas</span>
                  </a>
                </li>

              </div>
            </ul>
          </li>









          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#icons" aria-expanded="false" aria-controls="icons">
              <i class="mdi mdi-diamond-stone"></i>
              <span class="nav-text">Informes</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="icons" data-parent="#sidebar-menu">
              <div class="sub-menu">
                <li>
                  <a class="sidenav-item-link" href="EstudiantesPlataforma.php">
                    <span class="nav-text">Estudiantes en Plataforma</span>

                  </a>
                </li>
                <li>
                  <a class="sidenav-item-link" href="VacantesDisponibles.php">
                    <span class="nav-text">Vacantes Disponibles</span>

                  </a>
                </li>
                <li>
                  <a class="sidenav-item-link" href="TotalPostulaciones.php">
                    <span class="nav-text">Postulaciones Activas</span>

                  </a>
                </li>
                <li>
                  <a class="sidenav-item-link" href="HistorialPostulacion.php">
                    <span class="nav-text">Historial Postulaciones</span>

                  </a>
                </li>
              </div>
            </ul>
          </li>

          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#tables" aria-expanded="false" aria-controls="tables">
              <i class="mdi mdi-table"></i>
              <span class="nav-text">Estadísticas</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="tables" data-parent="#sidebar-menu">
              <div class="sub-menu">
                <li>
                  <a class="sidenav-item-link" href="GMotivos.php">
                    <span class="nav-text">Mótivos más seleccionados</span>

                  </a>
                </li>
                <li>
                  <a class="sidenav-item-link" href="GEmpresasPostuladas.php">
                    <span class="nav-text">Empresas Más Postuladas</span>

                  </a>
                </li>
                <li>
                  <a class="sidenav-item-link" href="GPracticantesXempresa.php">
                    <span class="nav-text">Practicantes por Empresa</span>

                  </a>
                </li>
                <li>
                  <a class="sidenav-item-link" href="GVacantesEstado.php">
                    <span class="nav-text">Estado de las vacantes</span>

                  </a>
                </li>
                <li>
                  <a class="sidenav-item-link" href="GPerfilMasBuscado.php">
                    <span class="nav-text">Perfil más buscado</span>

                  </a>
                </li>

                <li>
                  <a class="sidenav-item-link" href="GOfertasXCiudad.php">
                    <span class="nav-text">Ofertas por ubicación</span>

                  </a>
                </li>
              </div>
            </ul>
          </li>


          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#sidebar-navs" aria-expanded="false" aria-controls="sidebar-navs">
            <i class="mdi mdi-book"></i>  
            <span class="nav-text">Manuales</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="sidebar-navs" data-parent="#sidebar-menu">
              <div class="sub-menu">
                <li>
                  <a class="sidenav-item-link" onclick="abrirPDF()">
                    <span class="nav-text">Módulo Empresa</span>
                  </a>
                </li>
                <li>
                  <a class="sidenav-item-link" onclick="abrirPDFes()">
                    <span class="nav-text">Módulo Estudiante</span>

                  </a>
                </li>
                <li>
                  <a class="sidenav-item-link" onclick="abrirPDFad()">
                    <span class="nav-text">Módulo Administrador</span>

                  </a>
                </li>
              </div>
            </ul>
          </li>
        </ul>
      </div>
      <!-- <div class="sidebar-footer">
        <hr class="separator mb-0" />
        <div class="sidebar-footer-content">
          <h6 class="text-uppercase">
            Manual Empresa
          </h6>
          <div>
            <a class="sidenav-item-link" onclick="abrirPDF()">
              <span class="nav-text">Descargar</span>

            </a>
          </div>
          <h6 class="text-uppercase">
            Manual Estudiante
          </h6>
          <div>
            <a class="sidenav-item-link" onclick="abrirPDFes()">
              <span class="nav-text">Descargar</span>

            </a>
          </div>

          <h6 class="text-uppercase">
            Manual Administrador
          </h6>
          <div>
            <a class="sidenav-item-link" onclick="abrirPDFad()">
              <span class="nav-text">Descargar</span>

            </a>
          </div>
        </div>
      </div> -->

    </div>
  </aside>








  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <script src="../assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
  <script src="../assets/plugins/jekyll-search.min.js"></script>
  <script src="../assets/plugins/daterangepicker/moment.min.js"></script>
  <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
  <script>
    jQuery(document).ready(function() {
      jQuery('input[name="dateRange"]').daterangepicker({
        autoUpdateInput: false,
        singleDatePicker: true,
        locale: {
          cancelLabel: 'Clear'
        }
      });
      jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
        jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
      });
      jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
        jQuery(this).val('');
      });
    });
  </script>


  <script>
    function abrirPDF() {
      var win = window.open('AbrirManual.php?action=empresa');
      win.focus();

    }


    function abrirPDFes() {
      var win = window.open('AbrirManual.php?action=es');
      win.focus();

    }


    function abrirPDFad() {
      var win = window.open('AbrirManual.php?action=admi');
      win.focus();

    }
  </script>


  <script src="../assets/js/sleek.bundle.js"></script>
</body>

</html>