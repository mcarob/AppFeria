<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/Ciudades.php');

if (! empty($_POST["departamento_id"])) {
    
    $stateId = $_POST["departamento_id"];
    $controlCiudad = new Ciudades();
    $cityResult = $controlCiudad->darciudadesxEstado($stateId);
    ?>
<option>Select City</option>
<?php
foreach ($cityResult as $city) {
        ?>
<option value="<?php echo $city[0]; ?>"><?php echo $city[1]; ?></option>
<?php
    }
}
?>