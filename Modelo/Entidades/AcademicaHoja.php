<?php


class AcademicaHoja{
  private $codFormacion;
  private $codHojaVida;
  private $formacionTitulo;
  private $formacionInstitucion;
  private $formacionDesde;
  private $formacionHasta;
  private $tipoFormacion;

  public function __construct($codFormacion, $codHojaVida,$formacionTitulo,$formacionInstitucion,$formacionDesde,
  $formacionHasta, $tipoFormacion)
  {
    $this->codFormacion=$codFormacion;
    $this->codHojaVida=$codHojaVida;
    $this->formacionTitulo=$formacionTitulo;
    $this->formacionInstitucion=$formacionInstitucion;
    $this->formacionDesde=$formacionDesde;
    $this->formacionHasta=$formacionHasta;
    $this->tipoFormacion=$tipoFormacion;

  }
  

  



	function getCodFormacion() { 
 		return $this->codFormacion; 
	} 

	function setCodFormacion($codFormacion) {  
		$this->codFormacion = $codFormacion; 
	} 

	function getCodHojaVida() { 
 		return $this->codHojaVida; 
	} 

	function setCodHojaVida($codHojaVida) {  
		$this->codHojaVida = $codHojaVida; 
	} 

	function getFormacionTitulo() { 
 		return $this->formacionTitulo; 
	} 

	function setFormacionTitulo($formacionTitulo) {  
		$this->formacionTitulo = $formacionTitulo; 
	} 

	function getFormacionInstitucion() { 
 		return $this->formacionInstitucion; 
	} 

	function setFormacionInstitucion($formacionInstitucion) {  
		$this->formacionInstitucion = $formacionInstitucion; 
	} 

	function getFormacionDesde() { 
 		return $this->formacionDesde; 
	} 

	function setFormacionDesde($formacionDesde) {  
		$this->formacionDesde = $formacionDesde; 
	} 

	function getFormacionHasta() { 
 		return $this->formacionHasta; 
	} 

	function setFormacionHasta($formacionHasta) {  
		$this->formacionHasta = $formacionHasta; 
	} 

	function getTipoFormacion() { 
 		return $this->tipoFormacion; 
	} 

	function setTipoFormacion($tipoFormacion) {  
		$this->tipoFormacion = $tipoFormacion; 
    } 
}
?>
	