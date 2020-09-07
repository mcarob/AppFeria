<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 2) {
    header("location: ../index.php");
}


include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');

if (isset($_GET["action"])) {
    $var = $_GET["action"];
    $conPromocion = new ControladorPromocion();
    $listaVacantes = $conPromocion->verOfertas2($var);
}
else{
    "No hay ofertas";
}


include('menuEstudiante.php');
include('Header.php');




?>


<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Ofertas laborales</h1>


        </div>





        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2></h2>
            </div>
            <?php
            foreach ($listaVacantes as $fila) {

            ?>

                <div class="card-body">
                    <div class="card-deck">
                        <div class="card">

                            <img class="card-img-top" src="../Imagenes/ecopetrol.jpg" width="150" height="200" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-primary"><?php echo $fila[13] ?></h5>
                                <p class="card-text pb-3" style="text-align:justify;"><?php echo $fila[1] ?>
                                </p>
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <!-- <a onclick="darInformacion()" href="DescripcionOferta.php" class="btn btn-outline-primary">Ver más</a> -->
                                <button type="button" class="btn btn-outline-primary" onclick="darInformacion(<?php echo $fila[0] ?>)">Ver mas</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

        </div>






    </div>
    <?php
    include('Footer.php')
    ?>

    <script>
        function darInformacion(cod_vacante) {
            console.log("entro " + cod_vacante);
            window.location.href = "DescripcionOferta.php?action=" + cod_vacante;
        }
    </script>