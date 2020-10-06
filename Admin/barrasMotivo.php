<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');
$claseCon = new DB();
$con = $claseCon->connect();
$sentencia = $con->prepare("SELECT * from gmotivosvotados WHERE COD_MOTIVO_RECHAZO!=9");
$sentencia->execute();

$valoresY = array();
$valoresX = array();
$valorT= array();

$valoresY = array();
$valoresX = array();


while ($ver = $sentencia->fetch()) {
	$valoresY[] = $ver[2]; //monto
	$valoresX[] = $ver[0]; //fecha
	$valorT[] = $ver[1];
}

$datosX = json_encode($valoresX);
$datosY = json_encode($valoresY);
$datosT = json_encode($valorT);
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
datosT = crearCadenaBarras('<?php echo $datosT; ?>')
var data = [{
    x: datosX,
    y: datosY,
    type: 'bar',
    text: datosT,
    marker: {
        color: 'rgb(158,202,225)',
        line: {
            color: 'rgb(8,48,107)',
            width: 1.5
        }
    }


}];


var layout = {
    showlegend: false,

    font: {
        family: 'Raleway, sans-serif'
    },
    bargap: 0.05
};

var config = {responsive: true};
Plotly.newPlot('graficaBarras', data, layout, config);
</script>