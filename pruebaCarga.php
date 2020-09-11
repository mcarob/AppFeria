<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
 
<form method="post" enctype="multipart/form-data">
    <label>Title</label>
    <input type="text" name="title">
    <label>File Upload</label>
    <input type="File" name="file">
    <input type="submit" name="submit">
 
 
</form>
 
</body>
</html>
 
<?php 
 $host     = 'feriadb.cwof09saidik.us-east-1.rds.amazonaws.com:3306';
 $db       = 'feria_db';
 $user     = 'usuarioferiadb';
 $password = "3057900368";
 $charset  = 'utf8mb4';
 $connection = "mysql:host=" . $host . ";dbname=" . $db . ";charset=" . $charset;
 $options = [
     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
     PDO::ATTR_EMULATE_PREPARES   => false,
 ];
 $pdo = new PDO($connection, $user, $password, $options);
 
if (isset($_POST["submit"]))
 {
     #retrieve file title
        $title = $_POST["title"];
     
    #file name with a random number so that similar dont get replaced
     $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
    $archivo = file_get_contents($tname);
     #upload directory path
    $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/archivos/camaraComercio';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    #sql query to insert into database
    $sentencia = $pdo->prepare("UPDATE empresa SET CAMARA_COMERCIO_PDF=?  WHERE COD_EMPRESA=?");
    $sentencia->execute([$tname,'24']);
 

}
 
 
?>