<?php

require_once('mpdf/mpdf/vendor/autoload.php');
$mpdf=new \Mpdf\Mpdf();
$css=file_get_contents('styles.css');
$mpdf->writeHTML($css,1);
$html=file_get_contents("hojadevida.html");
$mpdf->writeHTML($html);
$mpdf->Output('reporte.pdf','I');


?>
