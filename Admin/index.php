<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4 )) {
    header("location: ../index.php");
}

?>


<?php
    
    include ('menuAdmi.php');
    include ('Header.php');
?>