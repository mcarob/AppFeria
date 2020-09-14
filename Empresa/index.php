<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 3)) {
    header("location: ../index.php");
}

?>


<?php
    
    include ('menuEmpresa.php');
    include ('Header.php');
?>





<?php
    include ('Footer.php')
?>