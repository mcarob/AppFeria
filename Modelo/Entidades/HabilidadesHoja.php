<?php


class HabilidadesHoja{
  private $codHabilidad;
  private $codHojaDeVida;
  private $nomHabilidad;
  private $nivelRango;

    public function __construct($codHabilidad,$codHojaDeVida,$nomHabilidad,$nivelRango)
    {
        $this->codHabilidad = $codHabilidad;
        $this->codHojaDeVida = $codHojaDeVida;
        $this->nomHabilidad = $nomHabilidad;
        $this->nivelRango = $nivelRango;

    }



	function getCodHabilidad() { 
 		return $this->codHabilidad; 
	} 

	function setCodHabilidad($codHabilidad) {  
		$this->codHabilidad = $codHabilidad; 
	} 

	function getCodHojaDeVida() { 
 		return $this->codHojaDeVida; 
	} 

	function setCodHojaDeVida($codHojaDeVida) {  
		$this->codHojaDeVida = $codHojaDeVida; 
	} 

	function getNomHabilidad() { 
 		return $this->nomHabilidad; 
	} 

	function setNomHabilidad($nomHabilidad) {  
		$this->nomHabilidad = $nomHabilidad; 
	} 

	function getNivelRango() { 
 		return $this->nivelRango; 
	} 

	function setNivelRango($nivelRango) {  
		$this->nivelRango = $nivelRango; 
    } 
}
?>
  