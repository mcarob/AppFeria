<?php


class ReferenciaHoja{
  private $codReferencia;
  private $codHojaVida;
  private $nombreReferencia;
  private $cargoReferencia;
  private $empresaReferencia;
  private $telefonoReferencia;
  private $correoferencia;

    public function __construct($codReferencia,$codHojaVida,$nombreReferencia,$cargoReferencia,$empresaReferencia,
    $telefonoReferencia,$correoferencia)
    {
        $this->codReferencia = $codReferencia;
        $this->codHojaVida = $codHojaVida;
        $this->nombreReferencia = $nombreReferencia;
        $this->cargoReferencia = $cargoReferencia;
        $this->empresaReferencia = $empresaReferencia;
        $this->telefonoReferencia = $telefonoReferencia;
        $this->correoferencia = $correoferencia;

    }



	function getCodReferencia() { 
 		return $this->codReferencia; 
	} 

	function setCodReferencia($codReferencia) {  
		$this->codReferencia = $codReferencia; 
	} 

	function getCodHojaVida() { 
 		return $this->codHojaVida; 
	} 

	function setCodHojaVida($codHojaVida) {  
		$this->codHojaVida = $codHojaVida; 
	} 

	function getNombreReferencia() { 
 		return $this->nombreReferencia; 
	} 

	function setNombreReferencia($nombreReferencia) {  
		$this->nombreReferencia = $nombreReferencia; 
	} 

	function getCargoReferencia() { 
 		return $this->cargoReferencia; 
	} 

	function setCargoReferencia($cargoReferencia) {  
		$this->cargoReferencia = $cargoReferencia; 
	} 

	function getEmpresaReferencia() { 
 		return $this->empresaReferencia; 
	} 

	function setEmpresaReferencia($empresaReferencia) {  
		$this->empresaReferencia = $empresaReferencia; 
	} 

	function getTelefonoReferencia() { 
 		return $this->telefonoReferencia; 
	} 

	function setTelefonoReferencia($telefonoReferencia) {  
		$this->telefonoReferencia = $telefonoReferencia; 
	} 

	function getCorreoReferencia() { 
 		return $this->correoferencia; 
	} 

	function setCorreoReferencia($correoferencia) {  
		$this->correoferencia = $correoferencia; 
    } 
}
?>