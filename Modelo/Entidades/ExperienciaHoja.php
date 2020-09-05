<?php


class ExperienciaHoja{
  private $codExperiencia;
  private $codHojaVida;
  private $experienciaCargo;
  private $experienciaEmpresa;
  private $experienciaDesde;
  private $experienciaHasta;
  private $experienciaDescripcion;

    public function __construct($codExperiencia,$codHojaVida,$experienciaCargo,$experienciaEmpresa,
    $experienciaDesde,$experienciaHasta,$experienciaDescripcion)
    {
        $this->codExperiencia = $codExperiencia;
        $this->codHojaVida = $codHojaVida;
        $this->experienciaCargo = $experienciaCargo;
        $this->experienciaEmpresa = $experienciaEmpresa;
        $this->experienciaDesde = $experienciaDesde;
        $this->experienciaHasta = $experienciaHasta;
        $this->experienciaDescripcion = $experienciaDescripcion;

    }

	

	function getCodExperiencia() { 
 		return $this->codExperiencia; 
	} 

	function setCodExperiencia($codExperiencia) {  
		$this->codExperiencia = $codExperiencia; 
	} 

	function getCodHojaVida() { 
 		return $this->codHojaVida; 
	} 

	function setCodHojaVida($codHojaVida) {  
		$this->codHojaVida = $codHojaVida; 
	} 

	function getExperienciaCargo() { 
 		return $this->experienciaCargo; 
	} 

	function setExperienciaCargo($experienciaCargo) {  
		$this->experienciaCargo = $experienciaCargo; 
	} 

	function getExperienciaEmpresa() { 
 		return $this->experienciaEmpresa; 
	} 

	function setExperienciaEmpresa($experienciaEmpresa) {  
		$this->experienciaEmpresa = $experienciaEmpresa; 
	} 

	function getExperienciaDesde() { 
 		return $this->experienciaDesde; 
	} 

	function setExperienciaDesde($experienciaDesde) {  
		$this->experienciaDesde = $experienciaDesde; 
	} 

	function getExperienciaHasta() { 
 		return $this->experienciaHasta; 
	} 

	function setExperienciaHasta($experienciaHasta) {  
		$this->experienciaHasta = $experienciaHasta; 
	} 

	function getExperienciaDescripcion() { 
 		return $this->experienciaDescripcion; 
	} 

	function setExperienciaDescripcion($experienciaDescripcion) {  
		$this->experienciaDescripcion = $experienciaDescripcion; 
    }
}
?>
