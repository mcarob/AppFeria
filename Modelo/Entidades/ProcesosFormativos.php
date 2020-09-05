<?php


class ProcesosFormativos{
  private $codPFormativo;
  private $codHojaVida;
  private $pFormativoTitulo;
  private $pFormativoDescripcion;


  public function __construct($codPFormativo, $codHojaVida, 
  $pFormativoTitulo, $pFormativoDescripcion)
  {
    $this->codPFormativo=$codPFormativo;
    $this->codHojaVida=$codHojaVida;
    $this->pFormativoTitulo=$pFormativoTitulo;
    $this->pFormativoDescripcion=$pFormativoDescripcion;

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