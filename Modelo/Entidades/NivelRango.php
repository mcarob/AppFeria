<?php


class NivelRango{
  private $codNivelRango;
  private $nomNivelRango;


  public function __construct($codNivelRango, $nomNivelRango)
  {
    $this->codNivelRango=$codNivelRango;
    $this->nomNivelRango=$nomNivelRango;
  }
  

  

	function getCodNivelRango() { 
 		return $this->codNivelRango; 
	} 

	function setCodNivelRango($codNivelRango) {  
		$this->codNivelRango = $codNivelRango; 
	} 

	function getNomNivelRango() { 
 		return $this->nomNivelRango; 
	} 

	function setNomNivelRango($nomNivelRango) {  
		$this->nomNivelRango = $nomNivelRango; 
    } 
}
?>
