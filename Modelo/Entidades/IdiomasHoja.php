<?php


class IdiomasHoja{
  private $codHabilidad;
  private $codHojaVida;
  private $nomIdioma;
  private $nivelRango;
  


  public function __construct($codHabilidad, $codHojaVida, $nomIdioma, $nivelRango)
  {
    $this->codHabilidad=$codHabilidad;
    $this->codHojaVida=$codHojaVida;
    $this->nomIdioma=$nomIdioma;
    $this->nivelRango=$nivelRango;

  }
 
	function getCodHabilidad() { 
 		return $this->codHabilidad; 
	} 

	function setCodHabilidad($codHabilidad) {  
		$this->codHabilidad = $codHabilidad; 
	} 

	

	function getCodHojaVida() { 
 		return $this->codHojaVida; 
	} 

	function setCodHojaVida($codHojaVida) {  
		$this->codHojaVida = $codHojaVida; 
	} 

	function getNomIdioma() { 
 		return $this->nomIdioma; 
	} 

	function setNomIdioma($nomIdioma) {  
		$this->nomIdioma = $nomIdioma; 
	} 

	function getNivelRango() { 
 		return $this->nivelRango; 
	} 

	function setNivelRango($nivelRango) {  
		$this->nivelRango = $nivelRango; 
	} 
}
?>