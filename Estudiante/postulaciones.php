<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 2)) {
    header("location: ../index.php");
}

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');




// $promocion= new PromocionLaboral();
// $cod_promocion=$promocion->getCodPromocion();

if (isset($_GET["pagina"])){
    $conPromocion = new ControladorPromocion();
    $listaPromociones=$conPromocion->darListaPromociones2(($_GET["pagina"]-1)*8,8);
    $total=$conPromocion->cantidadOfertas4();
    $pagina=$_GET["pagina"];
}else{
    $conPromocion = new ControladorPromocion();
    $listaPromociones=$conPromocion->darListaPromociones2(0,8);
    $total=$conPromocion->cantidadOfertas4();
    $pagina=1;
}



?>


<?php

include('menuEstudiante.php');
include('Header.php');
?>


<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Ofertas laborales</h1>
        </div>
        <div class="card card-default">

            <div class="card-header card-header">
                <div class="col-8 ">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Ingrese Palabra Clave para filtro       "
                            aria-label="Username" id="filtro" name="filtro">
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input type="submit" class="btn btn-primary btn-default" value="Filtrar"></input>
                    </div>
                </div>
            </div>

            <div class="card-group">

                <?php
                
                if(count($listaPromociones)==0){
                    echo('<div class="card">
                    <div class="card-body">
                    <p class="text-center"> No se encuentran ofertas laborales .</p>
                    </div>
                  </div>');

                }
                ?>
                <div class="row px-3 py-2">
                    <?php
            foreach ($listaPromociones as $fila) {

            ?>
                    <div class="col-lg-3 col-md-4 col-sm-6  py-3 d-flex align-items-stretch">
                        <div class="card">
                            <div class="card-header">
                                Cupos Disponibles: <?php echo $fila[16] ?>
                            </div>
                            <img class="card-img-top" src="../Imagenes/ecopetrol.jpg" width="130" height="130"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-primary"><?php echo $fila[13] ?></h5>
                                <p class="card-text "><?php echo $fila[1] ?>
                                </p>

                            </div>
                            <div class="card-footer text-muted px-3 ">
                                <div class="row no-gutters">
                                    <div class="col-5 no-gutters">
                                        <button type="button" class="btn btn-outline-primary"
                                            onclick="darInformacion(<?php echo $fila[0] ?>)">Ver mas</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn "><?php echo $fila[12] ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
            }
            ?>
                </div>
            </div>
            <div class="card-footer text-muted">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">

                            <?php                 
                            if($total<=8){
                            ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(1).'"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <?php   
                            }elseif ($total<=16){
                            ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(1).'"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(2).'"'); ?>><?php echo (2);  ?></a>
                        </li>
                        <?php   
                            }elseif($total<=24){
                            ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(1).'"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(2).'"'); ?>><?php echo (2);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(3).'"'); ?>><?php echo (3);  ?></a>
                        </li>
                        <?php   
                            }else{
                                if($pagina>1){
                                    ?>
                        <li class="page-item">
                            <a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina-1).'"'); ?>
                                aria-disabled="true">Anterior</a>
                        </li>
                        <?php
                                }if($pagina<=1){

                                    ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(1).'"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(2).'"'); ?>><?php echo (2);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(3).'"'); ?>><?php echo (3);  ?></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina+1).'"'); ?>
                                aria-disabled="true">Siguiente</a>
                        </li>
                        <?php

                                }elseif(($pagina)>=($total/8)){


                                    ?>
                        <!--  href="postulaciones.php?action?v&pagina=v" -->
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina-2).'"'); ?>><?php echo ($pagina-2);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina-1).'"'); ?>><?php echo ($pagina-1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina).'"'); ?>><?php echo ($pagina);  ?></a>
                        </li>
                        <?php
                                }else{
                                    ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina-1).'"'); ?>><?php echo ($pagina-1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina).'"'); ?>><?php echo ($pagina);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina+1).'"'); ?>><?php echo ($pagina+1);  ?></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina+1).'"'); ?>
                                aria-disabled="true">Siguiente</a>
                        </li>
                        <?php

                                }
                                ?>

                        <?php
                                        
 }
                            ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>






    </div>





    </div>
    <?php
    include('Footer.php')
    ?>

<script>
    function darInformacion(cod_vacante) {
       console.log("entro "+cod_vacante);
       window.location.href="DescripcionOferta.php?action="+cod_vacante;
    }
</script>