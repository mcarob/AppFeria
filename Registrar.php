<?php  
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');

echo("entra 2 ");
print_r($_POST);
print_r($_FILES);
if(isset($_POST["REM"])){
    echo("entra 5");
    echo("Chale :(");
    if(isset($_FILES['camaracomercioE'])){
        print_r($_FILES['camaracomercioE']);
        $filecontent=file_get_contents($_FILES['camaracomercioE']['tmp_name']);
        if(preg_match("/^%PDF-1.5/", $filecontent)){
            echo "Valid pdf";
        }else{
           echo "Invalid pdf";
        }
        echo("  holaaaa ");
        $imgData = ($_FILES['camaracomercioE']['tmp_name']);
        $file_size = $_FILES['camaracomercioE']['size'];
        echo($file_size);
        echo(mime_content_type ($_FILES['camaracomercioE']['tmp_name'] ));
        $archi=file_get_contents($imgData);
        $base= new DB();
        $query=$base->connect()->prepare('UPDATE empresa SET LOGO_EMPRESA=? WHERE COD_EMPRESA=1 ');
        $query->execute([$archi]);
    }
}





?>

