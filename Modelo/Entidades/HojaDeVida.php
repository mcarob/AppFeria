<?php


class HojaDeVida{
  private $codHojaVida;
  private $codEstudiante;
  private $hojaCelular;
  private $hojaDireccion;
  private $hojaCiudad;
  private $perfil;
    
    public function __construct($codHojaVida,$codEstudiante,$hojaCelular,$hojaDireccion,$hojaCiudad,$perfil)
    {
		$this->codHojaVida = $codHojaVida;
		$this->codEstudiante = $codEstudiante;
        $this->hojaCelular = $hojaCelular;
        $this->hojaDireccion = $hojaDireccion;
		$this->hojaCiudad = $hojaCiudad;
		$this->perfil=$perfil;
    }



	function getPerfil() { 
		return $this->perfil; 
   } 

   function setPerfil($perfil) {  
	   $this->perfil = $perfil; 
   } 

	function getCodHojaVida() { 
 		return $this->codHojaVida; 
	} 

	function setCodHojaVida($codHojaVida) {  
		$this->codHojaVida = $codHojaVida; 
	} 

	function getCodEstudiante() { 
 		return $this->codEstudiante; 
	} 

	function setCodEstudiante($codEstudiante) {  
		$this->codEstudiante = $codEstudiante; 
	} 
 

	function getHojaCelular() { 
 		return $this->hojaCelular; 
	} 

	function setHojaCelular($hojaCelular) {  
		$this->hojaCelular = $hojaCelular; 
	} 

	function getHojaDireccion() { 
 		return $this->hojaDireccion; 
	} 

	function setHojaDireccion($hojaDireccion) {  
		$this->hojaDireccion = $hojaDireccion; 
	} 

	function getHojaCiudad() { 
 		return $this->hojaCiudad; 
	} 

	function setHojaCiudad($hojaCiudad) {  
		$this->hojaCiudad = $hojaCiudad; 
	} 

}
?>
  