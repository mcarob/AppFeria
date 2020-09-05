<?php


class HojaDeVida{
  private $codHojaVida;
  private $codEstudiante;
  private $hojaCelular;
  private $hojaDireccion;
  private $hojaCiudad;
  private $hojaNacimiento;
  private $hojaFoto;
  private $hojaEstadoCivil;
    
    public function __construct($codHojaVida,$codEstudiante,$hojaEstudiante,$hojaCelular,$hojaDireccion,$hojaCiudad,
    $hojaNacimiento,$hojaFoto,$hojaEstadoCivil)
    {
		$this->codHojaVida = $codHojaVida;
		$this->codEstudiante = $codEstudiante;
        $this->hojaEstudiante = $hojaEstudiante;
        $this->hojaCelular = $hojaCelular;
        $this->hojaDireccion = $hojaDireccion;
        $this->hojaCiudad = $hojaCiudad;
        $this->hojaNacimiento = $hojaNacimiento;
        $this->hojaFoto = $hojaFoto;
        $this->hojaEstadoCivil = $hojaEstadoCivil;

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

	function getHojaNacimiento() { 
 		return $this->hojaNacimiento; 
	} 

	function setHojaNacimiento($hojaNacimiento) {  
		$this->hojaNacimiento = $hojaNacimiento; 
	} 

	function getHojaFoto() { 
 		return $this->hojaFoto; 
	} 

	function setHojaFoto($hojaFoto) {  
		$this->hojaFoto = $hojaFoto; 
	} 

	function getHojaEstadoCivil() { 
 		return $this->hojaEstadoCivil; 
	} 

	function setHojaEstadoCivil($hojaEstadoCivil) {  
		$this->hojaEstadoCivil = $hojaEstadoCivil; 
    } 
}
?>
  