<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');
$claseCon = new DB();
$con = $claseCon->connect();
$sentencia = $con->prepare("SELECT * from vacantes_legalizadas");
$sentencia->execute();
$valoresY = array();
$valoresX = array();

$valoresY = array();
$valoresX = array();

while ($ver = $sentencia->fetch()) {
	$valoresY[] = $ver[1]; //monto
	$valoresX[] = $ver[0]; //fecha
}

$datosX = json_encode($valoresX);
$datosY = json_encode($valoresY);
?>

<div id="graficaBarras"></div>

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
		textposition: 'auto',
		type: 'bar',
		marker: {
			color: 'rgb(158,202,225)',
			opacity: 0.6,
			line: {
				color: 'rgb(8,48,107)',
				width: 1.5
			}

		}
	}];
	

	var layout = {
		font: {
			family: 'Raleway, sans-serif'
		},
		bargap: 0.05
	};
	

	Plotly.newPlot('graficaBarras', data, layout);
</script>