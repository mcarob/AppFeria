<?php   
session_start();


include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');

$empresa = new Usuario();
$empresa->setUser($_SESSION['user']);
$cod_empresa = $empresa->darCodigo();
$listaVacantes = [];
$pase = "";
if (isset($_GET["pagina"])) {
    $conPromocion = new ControladorPromocion();
    $listaVacantes = $conPromocion->darVacantaseNueva($cod_empresa, ($_GET["pagina"] - 1) * 8, 8);
    $total = $conPromocion->cantidadOfertas3Empresa($cod_empresa);
    $pagina = $_GET["pagina"];
} else {
    $conPromocion = new ControladorPromocion();
    $listaVacantes = $conPromocion->darVacantaseNueva($cod_empresa, 0, 8);
    $total = $conPromocion->cantidadOfertas3Empresa($cod_empresa);
    $pagina = 1;
}
?>




<div class="card card-default">
            <div class="card-header card-header">
                <div class="col-8 ">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Ingrese Palabra Clave para filtro       " aria-label="Username" id="filtro" name="filtro">
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input type="submit" onclick="mandarFiltro()" class="btn btn-primary btn-default" value="Filtrar"></input>
                    </div>
                </div>
            </div>
            <?php

            if (count($listaVacantes) == 0) {
                echo ('<div class="card">
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

                    <div class="col-lg-4 col-md-6 col-sm-6  py-3 d-flex align-items-stretch">
                        <div class="card">

                            <?php
                            echo '<img  alt="Card image cap" class="card-img-top" width="150" height="150" src="../Imagenes/ecopetrol.jpg" lt="user image"/>';
                            ?>

                            <div class="card-body">
                                <h5 class="card-title text-primary"><?php echo $fila[13] ?></h5>
                                <p class="card-text pb-3" style="text-align:justify;"><?php echo $fila[1] ?>
                                </p>
                            </div>
                            <div class="card-footer text-muted px-3 ">
                                <div class="row no-gutters">
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

                                        <button type="button" class="btn btn-outline-primary" onclick="eliminar(<?php echo $fila[0] ?>)">Eliminar</button>
                                        <button type="button" class="btn btn-outline-primary" onclick="darInformacion(<?php echo $fila[0] ?>)">Editar</button>
                                    </div>

                                </div>
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
                            if ($total <= 8) {
                            ?>
                        <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . (1) . $pase . '"'); ?>><?php echo (1);  ?></a>
                        </li>
                    <?php
                            } elseif ($total <= 16) {
                    ?>
                        <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . (1) . $pase . '"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . (2) . $pase . '"'); ?>><?php echo (2);  ?></a>
                        </li>
                    <?php
                            } elseif ($total <= 24) {
                    ?>
                        <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . (1) . $pase . '"'); ?>><?php echo (1);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . (2) . $pase . '"'); ?>><?php echo (2);  ?></a>
                        </li>
                        <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . (3) . $pase . '"'); ?>><?php echo (3);  ?></a>
                        </li>
                        <?php
                            } else {
                                if ($pagina > 1) {
                        ?>
                            <li class="page-item">
                                <a class="page-link" <?php echo ('href="ofertas.php?pagina=' . ($pagina - 1) . $pase . '"'); ?> aria-disabled="true">Anterior</a>
                            </li>
                        <?php
                                }
                                if ($pagina <= 1) {

                        ?>
                            <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . (1) . $pase . '"'); ?>><?php echo (1);  ?></a>
                            </li>
                            <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . (2) . $pase . '"'); ?>><?php echo (2);  ?></a>
                            </li>
                            <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . (3) . $pase . '"'); ?>><?php echo (3);  ?></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" <?php echo ('href="ofertas.php?pagina=' . ($pagina + 1) . $pase . '"'); ?> aria-disabled="true">Siguiente</a>
                            </li>
                        <?php

                                } elseif (($pagina) >= ($total / 8)) {


                        ?>
                            <!--  href="ofertas.php?action?v&pagina=v" -->
                            <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . ($pagina - 2) . $pase . '"'); ?>><?php echo ($pagina - 2);  ?></a>
                            </li>
                            <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . ($pagina - 1) . $pase . '"'); ?>><?php echo ($pagina - 1);  ?></a>
                            </li>
                            <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . ($pagina) . $pase . '"'); ?>><?php echo ($pagina);  ?></a>
                            </li>
                        <?php
                                } else {
                        ?>
                            <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . ($pagina - 1) . $pase . '"'); ?>><?php echo ($pagina - 1);  ?></a>
                            </li>
                            <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . ($pagina) . $pase . '"'); ?>><?php echo ($pagina);  ?></a>
                            </li>
                            <li class="page-item"><a class="page-link" <?php echo ('href="ofertas.php?pagina=' . ($pagina + 1) . $pase . '"'); ?>><?php echo ($pagina + 1);  ?></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" <?php echo ('href="ofertas.php?pagina=' . ($pagina + 1) . $pase . '"'); ?> aria-disabled="true">Siguiente</a>
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