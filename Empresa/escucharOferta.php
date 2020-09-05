<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');

    $cPromocionLab = new ControladorPromocion();
    

    if (isset($_GET['action'])){
        switch($_GET['action']){
            case 'agregar':
                $variable1=$_POST['perfil'];
                $variable2=$_POST['ciudad'];
                $variable3=$_POST['fechaPublicacion'];
                $variable4=$_POST['fechaInicio'];
                $variable5=$_POST['remuneracion'];
                $variable6=$_POST['beneficioExtra'];
                $variable7=$_POST['ranRemuneracion'];
                $variable8=$_POST['numVacantes'];
                $variable9=$_POST['titulo'];
                $horarios=array($_POST['lunes'],
                                $_POST['martes'],
                                $_POST['miercoles'],
                                $_POST['jueves'],
                                $_POST['viernes'],
                                $_POST['sabado'],
                                $_POST['domingo']);
                $variable11=$_POST['descripcion'];
                print_r($horarios);

                if ($horarios[1]==null) {
                    echo('vacio');
                }
                $estructura  = $horarios[0].';'.$horarios[1].';'.$horarios[2].';'.$horarios[3].';'.$horarios[4].';'.$horarios[5].';'.$horarios[6];
                $promocion=new PromocionLaboral(null,$datos[0],$datos[1],$datos[2],
                                $horarios,$datos[1],$datos[1],
                                $datos[1],$datos[1],$datos[1],
                                $datos[1],$datos[1],$datos[1],
                                $datos[1],$datos[1],$datos[1]);
                $cPromocionLab->agregarPromocion($promocion);
        }
    }
