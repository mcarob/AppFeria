<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 3)) {
    header("location: ../index.php");
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEstudiantes.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');



$user = new Usuario();
$empresa_dao = new EmpresaDAO();
$user->setUser($_SESSION['user']);
$codigo = $user->darCodigo();
$empresa = $empresa_dao->devolverEmpresa($codigo);
$controlador = new ControladorPromocion();


$for = $controlador->verOfertas2($empresa->getCodEmpresa());

$objeto = new ControladorEstudiantes();
$lista = $objeto->darListaEstudianteActivos();

?>

<link href="../assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
<link href="../assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/responsive.datatables.min.css" rel="stylesheet" />


<?php
include('Header.php');
include('menuEmpresa.php');
?>


<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Estudiantes en la plataforma</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Candidatos
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Buscar Candidatos</li>
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
                                        <th>Nombre estudiante</th>
                                        <th>Apellido estudiante</th>
                                        <th>Cédula</th>
                                        <th>Correo</th>
                                        <th>Carrera</th>
                                        <th>Semestre</th>
                                        <th>Acción </th>
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
                                        echo ("<td><button type='submit' class='mb-1 btn btn-danger' id='boton1'" . "onclick='mostrarModal1(" . '"' . $key[0] . '"' . ")'" . ">Contactar</button></td>");


                                    ?>

                                    <?php

                                        echo ("</tr>");
                                    }

                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
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








<div class="modal fade" id="modall" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFormTitle">Contactar</h5>

            </div>
            <div class="modal-body">
                <form method="POST" id='formAgregarOf'>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Seleccione una opción</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <?php
                                if(count($for)==0){
                                    echo ('<option value="">No hay ofertas</option>');
                                }else{
                                foreach ($for as $key) {
                                 echo ('<option value="">' . $key[13] . '</option>');
                             }
                            }
                            ?>
                        </select>
                    </div>
                    <label for="mensaje">Mensaje</label>
                    <textarea type="" class="form-control" id="mensaje" name="mensaje" cols="40" rows="9" placeholder="Ingrese el mensaje que desea eviar..." maxlength="1200" required></textarea>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Enviar</button>
            </div>
        </div>
    </div>
</div>



<script>
    function mostrarModal1(valor) {
        $('#modall').modal('show');
    }
</script>



<?php
include('Footer.php')
?>