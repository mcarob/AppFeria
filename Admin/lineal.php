
<?php 

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');
$claseCon = new DB();
$con =$claseCon->connect();
$sentencia = $con->prepare("SELECT * from graficoEmpresasMasPostuladas");
$sentencia->execute();
$valoresY = array();
$valoresX = array();

while ($ver = $sentencia->fetch()) {
		$valoresY[] = $ver[1]; //conteo
		$valoresX[] = $ver[0]; //nombre


	}

	$datosX = json_encode($valoresX);
	$datosY = json_encode($valoresY);
	?>
	<div id="graficaLineal"></div>


	<script type="text/javascript">

		function crearCadenaLineal(json){
			var parsed = JSON.parse(json);
			var arr = [];
			for (var x in parsed) {
				arr.push(parsed[x]);
			}

			return arr;
		}

	</script>

	<script type="text/javascript">

		datosX = crearCadenaLineal('<?php echo $datosX; ?>');
		datosY = crearCadenaLineal('<?php echo $datosY; ?>');


		var trace1 = {
			x: datosX,
			y: datosY,
			type: 'scatter',
			line: {
				color: 'red',
				width: 2
			},
			marker: {
				color: 'red',
				size: 12
			}

		}
		var layout = {
		font: {
			family: 'Raleway, sans-serif'
		},
		xaxis: {
			tickangle: -30,
		},
		bargap: 0.05
	};


	
		var data = [trace1];

		Plotly.newPlot('graficaLineal', data, layout);
	</script>