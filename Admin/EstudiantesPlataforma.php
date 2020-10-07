<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4)) {
    header("location: index.php");
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEstudiantes.php');

$objeto = new ControladorEstudiantes();
$lista = $objeto->darListaEstudianteActivos();
?>


<link href="../assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
<link href="../assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/responsive.datatables.min.css" rel="stylesheet" />
<script src="../jsPDF/dist/jspdf.es.min.js"></script>
<script src="../autoTable/dist/jspdf.plugin.autotable.min.js"></script>
<?php
   include('Header.php');
    include('menuAdmi.php') 
?>


<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Estudiantes</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Informes
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Estudiantes en la plataforma</li>
                </ol>
            </nav>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="col-md-4">

                        <br>
                    </div>



                    <div class="card-body">
                        <div class="responsive-data-table">
                            <table id="responsive-data-table" class="table dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Cédula</th>
                                        <th>Correo</th>
                                        <th>Carrera</th>
                                        <th>Semestre</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($lista as $key) {
                                        echo ("<tr>");
                                        echo ("<td>" . $key[3] . "</td>");
                                        echo ("<td>" . $key[4] . "</td>");
                                        echo ("<td>" . $key[2] . "</td>");
                                        echo ("<td>" . $key[5] . "</td>");
                                        echo ("<td>" . $key[6] . "</td>");
                                        echo ("<td>" . $key[7] . "</td>");

                                    ?>


                                    <?php

                                        echo ("</tr>");
                                    }

                                    ?>


                                </tbody>
                            </table>
                        </div>
                        
                        
                        <a hreF="Reportes/EstudiantesPDF.php" class="btn btn-outline-primary">PDF</a>
                        <a hreF="Reportes/EstudiantesExcel.php" class="btn btn-outline-primary">Excel</a>
  
                    </div>
                </div>
            </div>
        </div>
    </div>




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

    <script>
            function exportar(){
                var pdf2 = new jsPDF();
                pdf2.text(20, 20, "Estudiantes en la aplicacion");

                var columns = ["Nombre", "Apellidos", "Cédula", "Correo", "Carrera", "Semestre"];
                var data = [
                    <?php foreach ($lista as $c) : ?>[<?php echo $n; ?>, "<?php echo $c[3]; ?>", "<?php echo $c[4]; ?>", "<?php echo $c[2]; ?>", "<?php $c[5] ?>", "<?php $c[6] ?>", "<?php $c[7] ?>"],
                    <?php endforeach; ?>
                ];

                pdf2.autoTable(columns, data, {
                    margin: {
                        top: 25
                    }
                });
                pdf2.save('Estudiantes.pdf');
          
            }
        
    </script>






    <?php


    include('Footer.php')

    ?>