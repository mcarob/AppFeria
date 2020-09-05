<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 2 ) {
    header("location: ../index.php");
}

?>


<?php
    
    include ('menuEstudiante.php');
    include ('Header.php');
?>




<?php

include('Footer.php')

?>