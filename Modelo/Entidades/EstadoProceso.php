<?php


class EstadoProceso{
  private $codEstadoProceso;
  private $nomEstadoProceso;


  public function __construct($codEstadoProceso, $nomEstadoProceso)
  {
    $this->codEstadoProceso=$codEstadoProceso;
    $this->nomEstadoProceso=$nomEstadoProceso;
  }
  

  



	function getCodEstadoProceso() { 
 		return $this->codEstadoProceso; 
	} 

	function setCodEstadoProceso($codEstadoProceso) {  
		$this->codEstadoProceso = $codEstadoProceso; 
	} 

	function getNomEstadoProceso() { 
 		return $this->nomEstadoProceso; 
	} 

	function setNomEstadoProceso($nomEstadoProceso) {  
		$this->nomEstadoProceso = $nomEstadoProceso; 
	} 
}
?>