<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 2)) {
    header("location: ../index.php");
}
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ListasDesplegables.php');

$empresa_dao = new EmpresaDAO();

$controladorListas = new ListasDesplegables();



// $promocion= new PromocionLaboral();
// $cod_promocion=$promocion->getCodPromocion();
$pase="";
$empresab=false;
$paginab=false;
$palabrasb=false;
$ciudadb=false;
$conPromocion = new ControladorPromocion();

if(isset($_GET["search"])){
    $palabrasb=true;
}
if(isset($_GET["city"])){
    $ciudadb=true;
}
if (isset($_GET["pagina"])){
    $pagina=$_GET["pagina"];
}else{
    // si no tiene pagina 
    $pagina=1;
}


if(isset($_GET["action"])){
    // entra cuando esta buscando por empresa
    if($palabrasb && $ciudadb){
        //si esta buscnado ciudad y palabras claves 
        $pase = '&search=' . $_GET["search"].'&city=' . $_GET["city"];
        $listaPromociones=$conPromocion->ofertasFiltroCiudadPalabraConEmpresaEstudiante($_GET["action"],($pagina-1)*8,8,$_GET["search"],$_GET["city"]);
        $total=$conPromocion->cantidadofertasFiltroCiudadPalabraConEmpresaEstudiante($_GET["action"],$_GET["search"],$_GET["city"]);
    }elseif($ciudadb){
        // si esta buscando solo ciudad 
        $pase = '&city=' . $_GET["city"];
        $listaPromociones=$conPromocion->ofertasFiltroCiudadConEmpresaEstudiante($_GET["action"],($pagina-1)*8,8,$_GET["city"]);
        $total=$conPromocion->cantidadofertasFiltroCiudadConEmpresaEstudiante($_GET["action"],$_GET["city"]);

    }elseif($palabrasb){
        // si esta buscando solo palabras claves 
        $pase = '&search=' . $_GET["search"];
        $listaPromociones=$conPromocion->ofertasFiltroPalabraConEmpresaEstudiante($_GET["action"],($pagina-1)*8,8,$_GET["search"]);
        $total=$conPromocion->cantidadofertasFiltroPalabraConEmpresaEstudiante($_GET["action"],$_GET["search"]);

    }else{
        // si tiene solo pagina 
        $listaPromociones=$conPromocion->ofertasConFiltroEstudiante($_GET["action"],($pagina-1)*8,8);
        $total=$conPromocion->cantidadofertasConFiltro($_GET["action"]);
    }

}else{
    //entra cuando se buscan todas las vacantes
    if($palabrasb && $ciudadb){
        //si esta buscnado ciudad y palabras claves 
        $pase = '&search=' . $_GET["search"].'&city=' . $_GET["city"];
        $listaPromociones=$conPromocion->ofertasFiltroCiudadPalabraSinEmpresaEstudiante(($pagina-1)*8,8,$_GET["search"],$_GET["city"]);
        $total=$conPromocion->cantidadofertasFiltroCiudadPalabraSinEmpresaEstudiante($_GET["search"],$_GET["city"]);
    }elseif($ciudadb){
        // si esta buscando solo ciudad 
        $pase = '&city=' . $_GET["city"];
        $listaPromociones=$conPromocion->ofertasFiltroCiudadSinEmpresaEstudiante(($pagina-1)*8,8,$_GET["city"]);
        $total=$conPromocion->cantidadofertasFiltroCiudadSinEmpresaEstudiante($_GET["city"]);

    }elseif($palabrasb){
        // si esta buscando solo palabras claves 
        $pase = '&search=' . $_GET["search"];
        $listaPromociones=$conPromocion->ofertasFiltroPalabraSinEmpresaEstudiante(($pagina-1)*8,8,$_GET["search"]);
        $total=$conPromocion->cantidadofertasFiltroPalabraSinEmpresaEstudiante($_GET["search"]);

    }else{
        // si tiene solo pagina 
        $listaPromociones=$conPromocion->ofertassinFiltroEstudiante(($pagina-1)*8,8);
        $total=$conPromocion->cantidadofertasSinFiltro();
    }

}


    $listaCiudad=$controladorListas->darCiudadesActivasPromocion();



?>


<?php

include('menuEstudiante.php');
include('Header.php');
?>


<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Ofertas Laborales</h1>
        </div>
        <div class="card card-default">

            <div class="card-header card-header">
                <div class="col-6 ">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Ingrese Palabra Clave para filtro       "
                             <?php if(isset($_GET['search'])){echo('value="'.$_GET['search'].'"');}?> aria-label="Username" id="filtro" name="filtro">
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <select name="ciudades" id="ciudades" class="form-control">
                            <option value="todas">Todas las Ciudades</option>
                            <?php
                    foreach ($listaCiudad as $city) {

                        if($city[0]==$_GET["city"]){
                            ?>
                   <option  selected value="<?php echo $city[0]; ?>"><?php echo ($city[1]."-".$city[3]); ?></option>

                            <?php

                        }else{

                        
                    ?>
                            <option value="<?php echo $city[0]; ?>"><?php echo ($city[1]."-".$city[3]);?></option>
                            <?php
                }    
                }
                    
                    ?>

                        </select>

                    </div>
                </div>
                <div class="col-2">
                    <div class="input-group">
                        <input type="submit" onclick="mandarFiltro()" class="btn btn-primary btn-default" value="Filtrar"></input>
                    </div>
                </div>
            </div>

            <div class="card-group">

                <?php
                
                if(count($listaPromociones)==0){
                    echo('<div class="card">
                    <div class="card-body">
                    <p class="text-center"> No se encuentran ofertas laborales con los filtros elegidos .</p>
                    </div>
                  </div>');

                }
                ?>
                <div class="row">
                    <?php
            foreach ($listaPromociones as $fila) {

            ?>
                    <div class="col-lg-3 col-md-4 col-sm-6  py-3 d-flex align-items-stretch">
                        <div class="card">
                            <div class="card-header">
                                Cupos Disponibles: <?php echo $fila[16] ?>
                            </div>
                            <?php   
                                echo '<img  alt="Card image cap" class="card-img-top"  width="150" height="150" src="data:image/jpeg;base64,'.base64_encode( $empresa_dao->devolverEmpresa2($fila[10])->getLogoEmpresa()).'" lt="user image"/>';
                                ?>
                            <div class="card-body">
                                <h5 class="card-title text-primary"><?php echo $fila[13] ?></h5>
                                <p class="card-text "><?php echo $fila[1] ?>
                                </p>

                            </div>
                            <div class="card-footer text-muted px-3 ">
                                <div class="row no-gutters">
                                    <div class="col-5 no-gutters">
                                        <button type="button" class="btn btn-outline-primary"
                                            onclick="darInformacion(<?php echo $fila[0] ?>)">Ver más</button>
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
            <div class="card-footer text" style="background-color: white;" >
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">

                            <?php                 
                            if($total<=8){
                            ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(1).$pase.'"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <?php   
                            }elseif ($total<=16){
                            ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(1).$pase.'"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(2).$pase.'"'); ?>><?php echo (2);  ?></a>
                        </li>
                        <?php   
                            }elseif($total<=24){
                            ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(1).$pase.'"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(2).$pase.'"'); ?>><?php echo (2);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(3).$pase.'"'); ?>><?php echo (3);  ?></a>
                        </li>
                        <?php   
                            }else{
                                if($pagina>1){
                                    ?>
                        <li class="page-item">
                            <a class="page-link" <?php echo('href="postulaciones.php?pagina='.($pagina-1).$pase.'"'); ?>
                                aria-disabled="true">Anterior</a>
                        </li>
                        <?php
                                }if($pagina<=1){

                                    ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(1).$pase.'"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(2).$pase.'"'); ?>><?php echo (2);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.(3).$pase.'"'); ?>><?php echo (3);  ?></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" <?php echo('href="postulaciones.php?pagina='.($pagina+1).$pase.'"'); ?>
                                aria-disabled="true">Siguiente</a>
                        </li>
                        <?php

                                }elseif(($pagina)>=($total/8)){


                                    ?>
                        <!--  href="postulaciones.php?action?v&pagina=v" -->
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina-2).$pase.'"'); ?>><?php echo ($pagina-2);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina-1).$pase.'"'); ?>><?php echo ($pagina-1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina).$pase.'"'); ?>><?php echo ($pagina);  ?></a>
                        </li>
                        <?php
                                }else{
                                    ?>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina-1).$pase.'"'); ?>><?php echo ($pagina-1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina).$pase.'"'); ?>><?php echo ($pagina);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                <?php echo('href="postulaciones.php?pagina='.($pagina+1).$pase.'"'); ?>><?php echo ($pagina+1);  ?></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" <?php echo('href="postulaciones.php?pagina='.($pagina+1).$pase.'"'); ?>
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
    console.log("entro " + cod_vacante);
    window.location.href = "DescripcionOferta.php?action=" + cod_vacante;
}

function mandarFiltro() {
        x = document.getElementById("filtro").value;
        y = document.getElementById("ciudades").value;
        if(y=="todas"){
            window.location.href = "postulaciones.php?search=" + x;
        }else if (x==""){
            window.location.href = "postulaciones.php?city=" + y;
        }else{
            window.location.href = "postulaciones.php?search=" + x+"&city="+y;
        }
    }
</script>