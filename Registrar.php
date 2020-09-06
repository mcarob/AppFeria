<?php  
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');
print_r($_FILES);
if(isset($_POST["REM"])){
    print_r(($_FILES['camaracomercioE']));
    if(isset($_FILES['camaracomercioE'])){
        if(($_FILES['camaracomercioE']['type'])=='application/pdf'){
            if(!((($_FILES['logo']['type'])=='image/png') ||(($_FILES['logo']['type'])=='image/jpeg')) ){
                echo("el logo tiene que ser extensión jpeg/jpg/png");
        }

        }else{
            echo("El archivo Ingresado en Camara de Comercio no es PDF");
        }
        $imgData = ($_FILES['camaracomercioE']['tmp_name']);
        $file_size = $_FILES['camaracomercioE']['size'];
        //echo($file_size);
        //echo(mime_content_type ($_FILES['camaracomercioE']['tmp_name'] ));
        $archi=file_get_contents($imgData);
       // $base= new DB();
       // $query=$base->connect()->prepare('UPDATE empresa SET LOGO_EMPRESA=? WHERE COD_EMPRESA=1 ');
       // $query->execute([$archi]);
    }
}



?>

