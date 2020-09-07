<?php


class PromocionPostulacion{
  private $codPromoPost;
  private $codPromo;
  private $codEstudiante;
  private $codEstadoProceso;
  private $hojaVida;
  private $fecha;
  private $motivo;


  public function __construct($codPromoPost, $codPromo, $codEstudiante, $codEstadoProceso,$hojaVida, $fecha_postulacion, $resultado)
  {
    $this->codPromoPost=$codPromoPost;
    $this->codPromo=$codPromo;
    $this->codEstudiante=$codEstudiante;
    $this->codEstadoProceso=$codEstadoProceso;
	$this->hojaVida=$hojaVida;
	$this->fecha=$fecha_postulacion;
	$this->motivo=$resultado;
	

  }
  

	function getCodPromoPost() { 
 		return $this->codPromoPost; 
	} 

	function setCodPromoPost($codPromoPost) {  
		$this->codPromoPost = $codPromoPost; 
	} 

	function getCodPromo() { 
 		return $this->codPromo; 
	} 

	function setCodPromo($codPromo) {  
		$this->codPromo = $codPromo; 
	} 

	function getCodEstudiante() { 
 		return $this->codEstudiante; 
	} 

	function setCodEstudiante($codEstudiante) {  
		$this->codEstudiante = $codEstudiante; 
	} 

	function getCodEstadoProceso() { 
 		return $this->codEstadoProceso; 
	} 

	function setCodEstadoProceso($codEstadoProceso) {  
		$this->codEstadoProceso = $codEstadoProceso; 
	} 

	function getHojaVida() { 
 		return $this->hojaVida; 
	} 

	function setHojaVida($hojaVida) {  
		$this->hojaVida = $hojaVida; 
	} 

	function getMotivo() { 
 		return $this->motivo; 
	} 

	function setMotivo($motivo) {  
		$this->motivo = $motivo; 
	} 

	function getFecha() { 
 		return $this->fecha; 
	} 

	function setFecha($fecha) {  
		$this->fecha = $fecha; 
	} 
}