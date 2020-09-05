<?php


class PromocionPostulacion{
  private $codPromoPost;
  private $codPromo;
  private $codEstudiante;
  private $codEstadoProceso;
  private $hojaVida;



  public function __construct($codPromoPost, $codPromo, $codEstudiante, $codEstadoProceso,$hojaVida)
  {
    $this->codPromoPost=$codPromoPost;
    $this->codPromo=$codPromo;
    $this->codEstudiante=$codEstudiante;
    $this->codEstadoProceso=$codEstadoProceso;
    $this->hojaVida=$hojaVida;

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
}
?>