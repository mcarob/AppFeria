<?php


class ProcesosFormativos{
  private $codPFormativo;
  private $codHojaVida;
  private $pFormativoTitulo;
  private $pFormativoDescripcion;
  private $periodo;
  private $materia;

  public function __construct($codPFormativo, $codHojaVida, 
  $pFormativoTitulo, $pFormativoDescripcion,$periodo,$materia)
  {
    $this->codPFormativo=$codPFormativo;
    $this->codHojaVida=$codHojaVida;
    $this->pFormativoTitulo=$pFormativoTitulo;
	$this->pFormativoDescripcion=$pFormativoDescripcion;
	$this->$periodo=$periodo;
	$this->$materia=$materia;

  }
  

	function getPeriodo() { 
		return $this->periodo; 
	} 

	function setPeriodo($periodo) {  
	$this->periodo =$periodo; 
	} 


	function getMateria() { 
		return $this->materia; 
	} 

	function setMateria($materia) {  
	$this->materia =$materia; 
	} 

	function getCodPFormativo() { 
 		return $this->codPFormativo; 
	} 

	function setCodPFormativo($codPFormativo) {  
		$this->codPFormativo = $codPFormativo; 
	} 

	function getCodHojaVida() { 
 		return $this->codHojaVida; 
	} 

	function setCodHojaVida($codHojaVida) {  
		$this->codHojaVida = $codHojaVida; 
	} 

	function getPFormativoTitulo() { 
 		return $this->pFormativoTitulo; 
	} 

	function setPFormativoTitulo($pFormativoTitulo) {  
		$this->pFormativoTitulo = $pFormativoTitulo; 
	} 

	function getPFormativoDescripcion() { 
 		return $this->pFormativoDescripcion; 
	} 

	function setPFormativoDescripcion($pFormativoDescripcion) {  
		$this->pFormativoDescripcion = $pFormativoDescripcion; 
	} 
}