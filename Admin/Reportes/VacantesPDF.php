<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Admin/FPDF/fpdf.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPromocion.php');
$objeto = new ControladorPromocion();
$lista = $objeto->darListaVacantesTotal();

class PDF extends FPDF
{
// Cabecera de página
function Header()
{


    // Logo
	$this->Image('../../Imagenes/logo.png', 150 , 10, 80 , 20, 'png');
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha    
    $this->Cell(60);
    // Título
	$this->Cell(215,65,utf8_decode('Vacantes disponibles'),0,0,'C');
    // Salto de línea
    $this->Ln(42);

   

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}


$pdf = new PDF('L','mm','Legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);


$pdf->Cell(15,10, utf8_decode("No°"), 1, 0, 'C', 0);
$pdf->Cell(53,10, utf8_decode("Titulo vacante"), 1, 0, 'C', 0);
$pdf->Cell(53,10, utf8_decode("Ciudad"), 1, 0, 'C', 0);
$pdf->Cell(53,10, utf8_decode("Fecha"), 1, 0, 'C', 0);
$pdf->Cell(53,10, utf8_decode("Limite de vacantes"), 1, 0, 'C', 0);
$pdf->Cell(53,10, utf8_decode("Compensación"), 1, 1, 'C', 0);

$no = 1;


foreach ($lista as $sql2) {
    $pdf->SetFont('Arial','B',7);
    $pdf->Cell(15,10, $no, 1, 0, 'C', 0);
    $pdf->Cell(53,10, utf8_decode($sql2['1']), 1, 0, 'C', 0);
    $pdf->Cell(53,10, utf8_decode($sql2['2']), 1, 0, 'C', 0);
    $pdf->Cell(53,10, utf8_decode($sql2['3']), 1, 0, 'C', 0);
    $pdf->Cell(53,10, utf8_decode($sql2['4']), 1, 0, 'C', 0);
    $pdf->Cell(53,10, $sql2['5'], 1, 1, 'C', 0);
    $no++;
    }
    $pdf->Output('D','TotalVacantes.pdf',false);
?>