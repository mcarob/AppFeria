<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 2 ) {
    header("location: ../index.php");
}

?>

<?php
include('Header.php');
include('menuEstudiante.php');

?>

<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Vacantes</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="IndexAdmi.php">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Mis postulaciones
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Listar</li>
                </ol>
            </nav>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-default">


                    <div class="card-body">
                        <div class="responsive-data-table">
                            <table id="responsive-data-table" class="table dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Titulo</th>
                                        <th>Dirección</th>
                                        <th>Celular</th>
                                        <th>Telefono</th>
                                        <th>Salario</th>
                                        <th>Correo</th>
                                        <th>Estado</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Ecopetrol</td>
                                        <td>Ingeniero de sistemas</td>
                                        <td>Calle 134</td>
                                        <td>3214571224</td>
                                        <td>4021402</td>
                                        <td>1'200.000</td>
                                        <td>ecopetrol@gmail.com</td>
                                        <td><span class="badge badge-primary">Hoja enviada</span></td>

                                    </tr>

                                    

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script src="../assets/plugins/jquery/jquery.min.js"></script>
        <script src="../assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/jekyll-search.min.js"></script>



        <script src="../assets/plugins/daterangepicker/moment.min.js"></script>
        <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>




        <script src="../assets/plugins/data-tables/jquery.datatables.min.js"></script>
        <script src="../assets/plugins/data-tables/datatables.bootstrap4.min.js"></script>



        <script src="../assets/plugins/data-tables/datatables.responsive.min.js"></script>
        <script>
            jQuery(document).ready(function() {
                jQuery('#responsive-data-table').DataTable({
                    "aLengthMenu": [
                        [20, 30, 50, 75, -1],
                        [20, 30, 50, 75, "All"]
                    ],
                    "pageLength": 20,
                    "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
                });
            });
        </script>
        <?php
        include('Footer.php');
        ?>