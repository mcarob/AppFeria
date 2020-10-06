<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4)) {
    header("location: index.php");
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');
$claseCon = new DB();
$con = $claseCon->connect();
$sentencia = $con->prepare("SELECT * from gmotivosvotados WHERE COD_MOTIVO_RECHAZO!=9");
$sentencia->execute();

?>
<script src="librerias/jquery-3.3.1.min.js"></script>
<script src="librerias/plotly-latest.min.js"></script>


<?php
include('Header.php');
include('menuAdmi.php');

?>


<div class="content-wrapper">
    <div class="content">



        <div class="row">


           
            <div class="col-sm-12">
                <div class="card card-default">
                <div class="card-body" >
                <div class="responsive-data-table">
                    <table id="responsive-data-table" align="center" class="table dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($sentencia as $key) {
                                echo ("<tr>");
                                echo ("<td>" . $key[0] . "</td>");
                                echo ("<td>" . $key[1] . "</td>");


                            ?>


                            <?php

                                echo ("</tr>");
                            }

                            ?>


                        </tbody>
                    </table>
                </div>
                
            </div>

                    <div class="card-header justify-content-center">
                        <h2 class="text-center">Motivos más seleccionados</h2>
                    </div>
                    <div class="card-body">
                        <div id="motivosG"></div>
                    </div>
                </div>
            </div>


        </div>




        <script src="../assets/plugins/jquery/jquery.min.js"></script>
        <script src="../assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/jekyll-search.min.js"></script>



        <script src="../assets/plugins/charts/Chart.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#motivosG').load('barrasMotivo.php');
            });
        </script>

        <script src="../assets/js/sleek.bundle.js"></script>

        <?php

        include('Footer.php')

        ?>