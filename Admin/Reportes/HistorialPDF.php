<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Admin/FPDF/fpdf.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorPostulaciones.php');

$objeto = new ControladorPostulacion();
$lista = $objeto->HistorialPost();

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    ob_end_clean();


    // Logo
	$this->Image('../../Imagenes/ecopetrol.jpg', 138 , 10, 80 , 20, 'JPG');
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha    
    $this->Cell(60);
    // Título
	$this->Cell(215,65,utf8_decode('Historial Postulaciones'),0,0,'C');
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
$pdf->Cell(53,10, utf8_decode("Nombre Empresa"), 1, 0, 'C', 0);
$pdf->Cell(53,10, utf8_decode("Nombre estudiante"), 1, 0, 'C', 0);
$pdf->Cell(53,10, utf8_decode("Cedula estudiante"), 1, 0, 'C', 0);
$pdf->Cell(53,10, utf8_decode("Carrera"), 1, 0, 'C', 0);
$pdf->Cell(53,10, "Titulo promocion", 1, 0, 'C', 0);
$pdf->Cell(53,10, "Estado", 1, 1, 'C', 0);

$no = 1;


foreach ($lista as $sql2) {
    $pdf->SetFont('Arial','B',7);
    $pdf->Cell(15,10, $no, 1, 0, 'C', 0);
    $pdf->Cell(53,10, utf8_decode($sql2['5']), 1, 0, 'C', 0);
    $pdf->Cell(53,10, utf8_decode($sql2['2']), 1, 0, 'C', 0);
    $pdf->Cell(53,10, utf8_decode($sql2['3']), 1, 0, 'C', 0);
    $pdf->Cell(53,10, utf8_decode($sql2['7']), 1, 0, 'C', 0);
    $pdf->Cell(53,10, $sql2['4'], 1, 0, 'C', 0);
    $pdf->Cell(53,10, $sql2['6'], 1, 1, 'C', 0);
    $no++;
    }
    $pdf->Output('D','Historial.pdf',false);
?>