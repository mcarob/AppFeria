<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 3)) {
    header("location: ../index.php");
}

?>


<?php

include('menuEmpresa.php');
include('Header.php');
?>


<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Ofertas laborales</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="index.PHP">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Administrar Ofertas
                    </li>
                </ol>
            </nav>

        </div>





        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Ecopetrol </h2>
            </div>
            <div class="card-body">
                <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" src="../Imagenes/ecopetrol.jpg" width="150" height="200" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Ingeniero de sistemas</h5>
                            <p class="card-text pb-3" style="text-align:justify;">Se solicita un ingeniero de sistemas con dos vidas pasadas de 
                                experiencia laboral, se pagan dos horas
                            </p>


                        </div>
                        
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-primary">Eliminar</button>
                            <a href="editarOferta.php" class="btn btn-outline-primary">Editar</a>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="../Imagenes/ecopetrol.jpg" width="150" height="200" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Card Title</h5>
                            <p class="card-text pb-3">This card has supporting text below as a natural lead-in to additional content.</p>

                        </div>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-primary">Eliminar</button>
                            <a href="editarOferta.php" class="btn btn-outline-primary">Editar</a>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="../Imagenes/ecopetrol.jpg" width="150" height="200" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Card Title</h5>
                            <p class="card-text pb-3">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer
                                content than the first to show that equal height action.</p>
                        </div>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-primary">Eliminar</button>
                            <a href="editarOferta.php" class="btn btn-outline-primary">Editar</a>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>






    </div>
    <?php
    include('Footer.php')
    ?>