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
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/Ciudades.php');



$user = new Usuario();
$empresa_dao = new EmpresaDAO();
$user->setUser($_SESSION['user']);
$codigo = $user->darCodigo();
$empresa = $empresa_dao->devolverEmpresa($codigo);
$controlador = new ControladorPromocion();
$ciudadesCon = new Ciudades();
$departamentos = $ciudadesCon->darTodosDepartamentos();

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
                                        echo ("<td><button type='submit' class='mb-1 btn btn-danger' id='boton1'" . "onclick='mostrarModal1(" . '"' . $key[1] . '"' . ")'" . ">Contactar</button>
                                        <button type='submit' class='mb-1 btn btn-success' id='boton2'" . "onclick='mostrarModal2(" . '"' . $key[0] . '"' . ")'" . ">Legalizar</button></td>");


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
                <form method="POST" id='not'>
                    <input type="hidden" id="desde" name="desde" value="<?php echo $empresa->getCodUsuario() ?>">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Seleccione una opción</label>
                        <select class="form-control" id="select" name="select">
                            <option value="0">No quiero especificar una oferta</option>
                            <option value="1">Otro</option>
                            <?php
                            if (count($for) == 0) {
                                echo ('<option value="">No hay ofertas</option>');
                            } else {
                                foreach ($for as $key) {
                                    echo ('<option value="' . $key[0] . '">' . $key[13] . '</option>');
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
                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal" onclick="notificar()">Enviar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body">
                <form method="POST" id='legalizar'>

                    <input type="hidden" value="<?php echo $empresa->getCodEmpresa()?>" name="cod_empresa" id="cod_empresa">
                    <div class="form-group" style="text-align: center;width:90%">
                        <label for="exampleFormControlSelect1">
                            <h3>¿Estas seguro de la legalización?</h3>
                        </label>
                    </div>
                    <div class="form-group" style="text-align: center;width:90%">
                        <label for="trolSelect1">
                            <label for="mensaje">Seleccione la ciudad</label>
                        </label>
                    </div>
                    <div class="form-group" >
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName"> Ubicación (Departamento)</label>
                                    <select class="form-control" name="depa" id="depa" onchange="getCity(this.value);">
                                        <option value="">Seleccione un Departamento</option>
                                        <?php
                                        foreach ($departamentos as $depar) {
                                        ?>
                                            <option value="<?php echo ($depar[0]); ?>">
                                                <?php echo $depar[1]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName"> Ubicación (Ciudad)</label>
                                    <select name="ciudad" id="ciudad" class="form-control">
                                        <option>Seleccione una Ciudad</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center;width:90%">
                        <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success btn-pill" data-dismiss="modal" onclick="legalizar()">Aceptar</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>


<script>
    function mostrarModal1(valor) {
        $('#modall').modal('show');
        variableCod = valor;
    }

    function mostrarModal2(valor) {
        $('#modal2').modal('show');
        variableCod = valor;
    }



    function notificar() {
        datos = $('#not').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            url: 'gestionarCandidatos.php?action=' + "notificar&" + "codigo=" + variableCod,
            success: function(r) {
                console.log(r);
                if (r == 1) {
                    window.location.href = "BuscarCandidatos.php";
                } else {

                }
            }
        });

    }

    function getCity(val) {
        $.ajax({
            type: "POST",
            url: "ajaxCiudad.php",
            data: 'departamento_id=' + val,
            beforeSend: function() {
                $("#ciudad").addClass("loader");
            },
            success: function(data) {
                $("#ciudad").html(data);
                $("#ciudad").removeClass("loader");
            }
        });
    }


    function legalizar() {
        datos = $('#legalizar').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            url: 'legalizar.php?action=' + variableCod,
            success: function(r) {
                console.log(r);
                if (r == 1) {
                    // window.location.href = "BuscarCandidatos.php";
                } else {

                }
            }
        });

    }
</script>



<?php
include('Footer.php')
?>