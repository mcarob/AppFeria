<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorRegistros.php');


$variable = new ControladorRegistros();

if (isset($_POST["REM"])) {
    // validaciones de registro empresa y registro como tal 
    if (isset($_FILES['camaracomercioE'])) {
        if (($_FILES['camaracomercioE']['type']) == 'application/pdf') {
            if (((($_FILES['logo']['type']) == 'image/png') || (($_FILES['logo']['type']) == 'image/jpeg'))) {
                try {
                    $datacomercio = $_FILES['camaracomercioE']['tmp_name'];
                    $datalogo = ($_FILES['logo']['tmp_name']);
                    if (($datacomercio == null)) {
                        echo ("Error al cargar el archivo Camara de comercio ");
                    } else {
                        $archicomercio = file_get_contents($datacomercio);
                    }
                    if (($datalogo == null)) {
                        echo ("Error al cargar el archivo");
                    } else {
                        $archilogo = file_get_contents($datalogo);
                    }
                } catch (Exception $e) {
                    echo ("Error en los archivos, verificar");
                }

                if (isset($archilogo) and isset($archicomercio)) {
                    // ya se han realizado todas las validaciones
                    $respuestaNit = $variable->verificarNIT($_POST['nitE']);
                    $encontrar_correo = $variable->buscarCorreo($_POST['emailE']);

                    $error = 0;
                    if ($respuestaNit[0] > 0) {
                        echo ("Hay un error en los datos, ya se encuentra registrada una empresa con ese NIT");
                        $error=1;
                    }else if (count($encontrar_correo) > 0) {
                        echo("ya se registro una empresa con el correo principal");
                        $error=1;
                    }
                    if($error==0){
                       // registrar empresa, paso las validaciones
                       /* ni_empresa ,nombre ,ccmpdf ,descripccion,logo,telefono,correo ,nomc,apellc ,telc,cargoc,correoc ,userempresa , passw ) */
                        $comercio = ($_FILES['camaracomercioE']['tmp_name']);
                        $pname = rand(1000,10000)."-".$_FILES["camaracomercioE"]["name"];
                        $tname = $_FILES["camaracomercioE"]["tmp_name"];
                        $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/archivos/camaraComercio';
                        $seMovio=move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                        $logo = ($_FILES['logo']['tmp_name']);
                        $logoarchi=file_get_contents($logo);
                        $passmd5=md5($_POST['nitE']);
                       
                        $enviar=([   $_POST['nitE'],
                                    $_POST['nombreE'],
                                    $pname,
                                    $_POST['descE'],
                                    $logoarchi,
                                    $_POST['telE'],
                                    $_POST['emailE'],
                                    $_POST['nomC'],
                                    $_POST['apeC'],
                                    $_POST['cargoC'],
                                    $_POST['telC'],
                                    $_POST['emailC'],
                                    $_POST['emailE'],
                                    $passmd5
                       ]);
                       if($seMovio){
                           echo($variable->registrarEmpresa($enviar));
                       }else{
                           echo("error en la carga del archivo por favor vuelva a intentarlo");
                       }
                    }
                }
            } else {
                echo ("el logo tiene que ser extensión jpeg/jpg/png");
            }
        } else {
            echo ("El archivo Ingresado en Camara de Comercio no es PDF");
        }


        //echo($file_size);
        //echo(mime_content_type ($_FILES['camaracomercioE']['tmp_name'] ));

        // $base= new DB();
        // $query=$base->connect()->prepare('UPDATE empresa SET LOGO_EMPRESA=? WHERE COD_EMPRESA=1 ');
        // $query->execute([$archi]);
    }
}else if(isset($_POST["RES"])){
    $correoInstucional=strtolower($_POST['correoES'])."@unbosque.edu.co";
    $usuario=$variable->usuarioEstudianteExiste($correoInstucional);
    if(count($usuario)>0){
        echo("Ya se encuentra registrado un usuario con ese correo");
    }else{
        #cedula,correo,nombre,apellido,programa,semestre,contrasena,verificacion
        $passmd5=md5($_POST['contraES']);

            $enviar=([  
                        $_POST['cedulaES'],
                        $correoInstucional,
                        $_POST['nombreES'],
                        $_POST['apellidoES'],
                        $_POST['prog_academico'],
                        $_POST['semestre'],
                        $passmd5
                    ]);
            $variable->registrarEstudiante($enviar);
    }
}
?>