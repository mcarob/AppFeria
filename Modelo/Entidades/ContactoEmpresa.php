<?php


class ContactoEmpresa{
  private $codContacto;
  private $nomContacto;
  private $apellidoContacto;
  private $telefonoContacto;
  private $cargoContacto;
  private $correoContacto;


  public function __construct($codContacto, $nomContacto, $apellidoContacto, $telefonoContacto, $cargoContacto
  , $correoContacto)
  {
    $this->codContacto=$codContacto;
    $this->nomContacto=$nomContacto;
    $this->apellidoContacto=$apellidoContacto;
    $this->telefonoContacto=$telefonoContacto;
    $this->cargoContacto=$cargoContacto;
    $this->correoContacto=$correoContacto;
   

  }
  


	function getCodContacto() { 
 		return $this->codContacto; 
	} 

	function setCodContacto($codContacto) {  
		$this->codContacto = $codContacto; 
	} 

	function getNomContacto() { 
 		return $this->nomContacto; 
	} 

	function setNomContacto($nomContacto) {  
		$this->nomContacto = $nomContacto; 
	} 

	function getApellidoContacto() { 
 		return $this->apellidoContacto; 
	} 

	function setApellidoContacto($apellidoContacto) {  
		$this->apellidoContacto = $apellidoContacto; 
	} 

	function getTelefonoContacto() { 
 		return $this->telefonoContacto; 
	} 

	function setTelefonoContacto($telefonoContacto) {  
		$this->telefonoContacto = $telefonoContacto; 
	} 

	function getCargoContacto() { 
 		return $this->cargoContacto; 
	} 

	function setCargoContacto($cargoContacto) {  
		$this->cargoContacto = $cargoContacto; 
	} 

	function getCorreoContacto() { 
 		return $this->correoContacto; 
	} 

	function setCorreoContacto($correoContacto) {  
		$this->correoContacto = $correoContacto; 
	} 

	

}
?>