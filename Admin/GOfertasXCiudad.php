<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4)) {
    header("location: index.php");
}


?>
<script src="librerias/jquery-3.3.1.min.js"></script>
<script src="librerias/plotly-latest1.min.js"></script>


<?php
include('Header.php');
include('menuAdmi.php');

?>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-default">
                    <div class="card-header justify-content-center">
                        <h2 class="text-center">Ofertas Por Ciudad</h2>
                    </div>
                    <div class="card-body">
                        <div id="cargaC"></div>
                    </div>
                </div>
            </div>


            <div class="col-sm-12">
                <div class="card card-default">
                    <div class="card-header justify-content-center">
                        <h2 class="text-center">Ofertas Por Departamento</h2>
                    </div>
                    <div class="card-body">
                        <div id="cargaD"></div>
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
                $('#cargaC').load('CargaOC.php');
                $('#cargaD').load('CargaOF.php');
            });
        </script>

        <script src="../    assets/js/sleek.bundle.js"></script>

        <?php

        include('Footer.php')

        ?>