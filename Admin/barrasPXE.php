<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');
$claseCon = new DB();
$con = $claseCon->connect();
$sentencia = $con->prepare("SELECT * from GEmpresasPracticantes");
$sentencia->execute();
$valoresY = array();
$valoresX = array();

$valoresY = array();
$valoresX = array();

while ($ver = $sentencia->fetch()) {
	$valoresY[] = $ver[1]; //monto
	$valoresX[] = $ver[0]; //empresa
}

$datosX = json_encode($valoresX);
$datosY = json_encode($valoresY);
?>

<div id="graficaEmpresas"></div>

<script type="text/javascript">
	function crearCadenaBarras(json) {
		var parsed = JSON.parse(json);
		var arr = [];
		for (var x in parsed) {
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">
	datosX = crearCadenaBarras('<?php echo $datosX; ?>');
	datosY = crearCadenaBarras('<?php echo $datosY; ?>');
	var data = [{
		x: datosX,
		y: datosY,
		type: 'bar',
		marker: {
			color: 'blue'
		}
	}];
	

	var layout = {
		font: {
			family: 'Raleway, sans-serif'
		},
		xaxis: {
			tickangle: -30,
		},
		bargap: 0.05
	};

	Plotly.newPlot('graficaEmpresas', data, layout);
</script>