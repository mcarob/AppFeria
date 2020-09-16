<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 3)) {
    header("location: ../index.php");
}


include('menuEmpresa.php');
include('Header.php');


include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');

$empresa = new Usuario();
$empresa->setUser($_SESSION['user']);
$cod_empresa = $empresa->darCodigo();

$listaVacantes=[];
$pase="";
if(isset($_GET["search"])){
    $pase='&search='.$_GET["search"];
    $conPromocion = new ControladorPromocion();
    if(isset($_GET["pagina"])){
        $pagina=$_GET["pagina"];
    }else{
        $pagina=1;
    }
    $listaVacantes = $conPromocion->darVacantaseNuevaBuscar($cod_empresa,($pagina-1)*8,8,$_GET["search"]);
    $total=$conPromocion->cantidadOfertas3EmpresaBuscar($cod_empresa,$_GET["search"]);
}elseif (isset($_GET["pagina"])){
    $conPromocion = new ControladorPromocion();
    $listaVacantes = $conPromocion->darVacantaseNueva($cod_empresa,($_GET["pagina"]-1)*8,8);
    $total=$conPromocion->cantidadOfertas3Empresa($cod_empresa);
    $pagina=$_GET["pagina"];
}
else{
    $conPromocion = new ControladorPromocion();
    $listaVacantes = $conPromocion->darVacantaseNueva($cod_empresa,0,8);
    $total=$conPromocion->cantidadOfertas3Empresa($cod_empresa);
    $pagina=1;
}

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
            <div class="card-header card-header">
                <div class="col-8 ">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Ingrese Palabra Clave para filtro       "
                            aria-label="Username" id="filtro" name="filtro">
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input type="submit" onclick="mandarFiltro()" class="btn btn-primary btn-default" value="Filtrar"></input>
                    </div>
                </div>
            </div>
            <?php
                
                if(count($listaVacantes)==0){
                    echo('<div class="card">
                    <div class="card-body">
                    <p class="text-center"> No se encuentran ofertas laborales .</p>
                    </div>
                  </div>');

                }
                ?>
            <div class="row px-3 py-2">
                <?php
            
            foreach ($listaVacantes as $fila) {
            ?>

                <div class="col-lg-3 col-md-4 col-sm-6  py-3 d-flex align-items-stretch">
                    <div class="card">
                        <img class="card-img-top" src="../Imagenes/ecopetrol.jpg" width="150" height="200"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-primary"><?php echo $fila[13] ?></h5>
                            <p class="card-text pb-3" style="text-align:justify;"><?php echo $fila[1] ?>
                            </p>
                        </div>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <?php
                                if ($fila[15] == 1) {
                                    echo ("<td><button type='button' class='btn btn-outline-primary' onclick='estado(" . '"' . $fila[0] . '"' . ")'>
                            Desactivar</button></td> ");
                                } else if ($fila[15] == 2) {

                                    echo ("<td><button type='button' class='btn btn-outline-primary' onclick='estado(" . '"' . $fila[0] . '"' . ")'>
                            Activar</button></td>");
                                }
                                ?>

                            <button type="button" class="btn btn-outline-primary"
                                onclick="eliminar(<?php echo $fila[0] ?>)">Eliminar</button>
                            <button type="button" class="btn btn-outline-primary"
                                onclick="darInformacion(<?php echo $fila[0] ?>)">Editar</button>
                        </div>
                    </div>
                </div>
                <?php
                }
                    ?>
            </div>
            <div class="card-footer text-muted">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">

                            <?php                 
                            if($total<=8){
                            ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.(1).$pase.'"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <?php   
                            }elseif ($total<=16){
                            ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.(1).$pase.'"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.(2).$pase.'"'); ?>><?php echo (2);  ?></a>
                        </li>
                        <?php   
                            }elseif($total<=24){
                            ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.(1).$pase.'"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.(2).$pase.'"'); ?>><?php echo (2);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.(3).$pase.'"'); ?>><?php echo (3);  ?></a>
                        </li>
                        <?php   
                            }else{
                                if($pagina>1){
                                    ?>
                        <li class="page-item">
                            <a class="page-link" <?php echo('href="ofertas.php?pagina='.($pagina-1).$pase.'"'); ?>
                                aria-disabled="true">Anterior</a>
                        </li>
                        <?php
                                }if($pagina<=1){

                                    ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.(1).$pase.'"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.(2).$pase.'"'); ?>><?php echo (2);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.(3).$pase.'"'); ?>><?php echo (3);  ?></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" <?php echo('href="ofertas.php?pagina='.($pagina+1).$pase.'"'); ?>
                                aria-disabled="true">Siguiente</a>
                        </li>
                        <?php

                                }elseif(($pagina)>=($total/8)){


                                    ?>
                        <!--  href="ofertas.php?action?v&pagina=v" -->
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.($pagina-2).$pase.'"'); ?>><?php echo ($pagina-2);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.($pagina-1).$pase.'"'); ?>><?php echo ($pagina-1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.($pagina).$pase.'"'); ?>><?php echo ($pagina);  ?></a>
                        </li>
                        <?php
                                }else{
                                    ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.($pagina-1).$pase.'"'); ?>><?php echo ($pagina-1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.($pagina).$pase.'"'); ?>><?php echo ($pagina);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="ofertas.php?pagina='.($pagina+1).$pase.'"'); ?>><?php echo ($pagina+1);  ?></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" <?php echo('href="ofertas.php?pagina='.($pagina+1).$pase.'"'); ?>
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






</div>
<?php
    include('Footer.php')
    ?>

<script>
function darInformacion(cod_vacante) {
    window.location.href = "editarOferta.php?action=" + cod_vacante;
}

function estado(cod) {
    window.location.href = 'gestionarOferta.php?action=' + "cambiar&" + "codigo=" + cod;
}

function eliminar(cod) {
    window.location.href = 'gestionarOferta.php?action=' + "eliminar&" + "codigo=" + cod;
}
function mandarFiltro(){
    x= document.getElementById("filtro").value;
    window.location.href = "ofertas.php?search=" + x;
}
</script>