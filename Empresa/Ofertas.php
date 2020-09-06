<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 3)) {
    header("location: ../index.php");
}


include('menuEmpresa.php');
include('Header.php');


include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');

$empresa = new Usuario();
$empresa->setUser($_SESSION['user']);
$cod_empresa= $empresa->darCodigo();

$conPromocion=new ControladorPromocion();
$listaVacantes=$conPromocion->darVacantase($cod_empresa);



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
            </div>
            <?php
            foreach ($listaVacantes as $fila) {
                
            ?>
            <div class="card-body" >
                <div class="card-deck">
                
                    <div class="card">
                        <img class="card-img-top" src="../Imagenes/ecopetrol.jpg" width="150" height="200" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-primary"><?php echo $fila[13] ?></h5>
                            <p class="card-text pb-3" style="text-align:justify;"><?php echo $fila[1] ?>
                            </p>


                        </div>
                        
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-primary">Eliminar</button>
                            <?php 
                            if($fila[15]==1)
                            {?>
                                <button type="button" class="btn btn-outline-primary">Desactivar</button>
                            <?php }else if($fila[15]==2){?>
                                <button type="button" class="btn btn-outline-primary">Activar</button>
                            <?php
                            }
                            ?>
                            <button type="button" class="btn btn-outline-primary" onclick="darInformacion(<?php echo $fila[0]?>)" >Editar</button>
                        </div>
                    </div>
            <?php
            }
            ?>    
                    
                </div>
            </div>
        </div>






    </div>
    <?php
    include('Footer.php')
    ?>

    <script>
    function darInformacion(cod_vacante) {
      
       window.location.href="editarOferta.php?action="+cod_vacante;
       }
    </script>