<?php


class Legalizar{
  private $codLegalizacion;
  private $codEmpresa;
  private $codEstudiante;
  private $fechaLegalizacion;
  private $codCiudad;
  


  public function __construct($codLegalizacion, $codEmpresa, $codEstudiante, $fechaLegalizacion, $codCiudad)
  {
    $this->codLegalizacion=$codLegalizacion;
    $this->codEmpresa=$codEmpresa;
    $this->codEstudiante=$codEstudiante;
    $this->fechaLegalizacion=$fechaLegalizacion;
    $this->codCiudad=$codCiudad;
  }
  

  

	

	function getCodLegalizacion() { 
 		return $this->codLegalizacion; 
	} 

	function setCodLegalizacion($codLegalizacion) {  
		$this->codLegalizacion = $codLegalizacion; 
	} 

	function getCodEmpresa() { 
 		return $this->codEmpresa; 
	} 

	function setCodEmpresa($codEmpresa) {  
		$this->codEmpresa = $codEmpresa; 
	} 

	function getCodEstudiante() { 
 		return $this->codEstudiante; 
	} 

	function setCodEstudiante($codEstudiante) {  
		$this->codEstudiante = $codEstudiante; 
	} 

	function getFechaLegalizacion() { 
 		return $this->fechaLegalizacion; 
	} 

	function setFechaLegalizacion($fechaLegalizacion) {  
		$this->fechaLegalizacion = $fechaLegalizacion; 
	} 

	function getCodCiudad() { 
 		return $this->codCiudad; 
	} 

	function setCodCiudad($codCiudad) {  
		$this->codCiudad = $codCiudad; 
    } 
}
?>