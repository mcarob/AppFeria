  <?php
  include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/user.php');
  if (isset($_SESSION['user'])) {
    $user = new Usuario();
    $user->setUser($_SESSION['user']);
  }
  ?>

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

  <div class="page-wrapper">


    <!-- Header -->
    <header class="main-header " id="header">
      <nav class="navbar navbar-static-top navbar-expand-lg">
        <!-- Sidebar toggle button -->
        <!-- search form -->
        <button id="sidebar-toggler" class="sidebar-toggle">
          <span class="sr-only">Toggle navigation</span>
        </button>
        <div class="search-form d-none d-lg-inline-block">

        </div>

        <div class="navbar-right ">

          <ul class="nav navbar-nav">
            <li class="dropdown notifications-menu">
              <a class="dropdown-toggle" href="notificacion.php">
                <i class="mdi mdi-bell-outline"></i>
              </a>
            </li>
            <li class="right-sidebar-in right-sidebar-2-menu">
              <i class="mdi mdi-settings mdi-spin"></i>
            </li>
            <!-- User Account -->
            <li class="dropdown user-menu">
              <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="d-none d-lg-inline-block"><?php echo ($user->darNombreUsuario()) ?></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-right">
                <!-- User image -->
                <li class="dropdown-header">
                  <div class="d-inline-block">
                    <?php echo ($user->darnombreContactoE()) ?>
                    <small class="pt-1"><?php echo ($user->darCorreo()) ?></small>
                  </div>
                </li>

                <li>
                  <a href="perfil_contacto.php">
                    <i class="mdi mdi-account"></i> Mi perfil
                  </a>
                </li>



                <li class="dropdown-footer">
                  <a href="../cerrarSesion.php"> <i class="mdi mdi-logout"></i> Cerrar Sesion </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>


    </header>