<?php


class Empresa{
  
    private $codEmpresa;
    private $nitEmpresa;
    private $razonSocial;
    private $camaraComercio;
    private $descripcionEmpresa;
    private $codUsuario;
    private $contactoEmpresa;
    private $logoEmpresa;
	private $telefonEmpresa;
	private $correoEmpresa;


    public function __construct($codEmpresa,$nitEmpresa,$razonSocial,$camaraComercio,$descripcionEmpresa,$codUsuario,$contactoEmpresa,$logoEmpresa,$telefonEmpresa, $correoEmpresa)
    {
        $this->codEmpresa = $codEmpresa;
        $this->nitEmpresa = $nitEmpresa;
        $this->razonSocial = $razonSocial;
        $this->camaraComercio = $camaraComercio;
        $this->descripcionEmpresa = $descripcionEmpresa;
        $this->codUsuario = $codUsuario;
        $this->contactoEmpresa = $contactoEmpresa;
        $this->logoEmpresa = $logoEmpresa;
		$this->telefonEmpresa = $telefonEmpresa;
		$this->correoEmpresa = $correoEmpresa;

    }

	function getCodEmpresa() { 
 		return $this->codEmpresa; 
	} 

	function setCodEmpresa($codEmpresa) {  
		$this->codEmpresa = $codEmpresa; 
	} 

	function getNitEmpresa() { 
 		return $this->nitEmpresa; 
	} 

	function setNitEmpresa($nitEmpresa) {  
		$this->nitEmpresa = $nitEmpresa; 
	} 

	function getRazonSocial() { 
 		return $this->razonSocial; 
	} 

	function setRazonSocial($razonSocial) {  
		$this->razonSocial = $razonSocial; 
	} 

	function getCamaraComercio() { 
 		return $this->camaraComercio; 
	} 

	function setCamaraComercio($camaraComercio) {  
		$this->camaraComercio = $camaraComercio; 
	} 

	function getDescripcionEmpresa() { 
 		return $this->descripcionEmpresa; 
	} 

	function setDescripcionEmpresa($descripcionEmpresa) {  
		$this->descripcionEmpresa = $descripcionEmpresa; 
	} 

	function getCodUsuario() { 
 		return $this->codUsuario; 
	} 

	function setCodUsuario($codUsuario) {  
		$this->codUsuario = $codUsuario; 
	} 

	function getContactoEmpresa() { 
 		return $this->contactoEmpresa; 
	} 

	function setContactoEmpresa($contactoEmpresa) {  
		$this->contactoEmpresa = $contactoEmpresa; 
	} 

	function getLogoEmpresa() { 
 		return $this->logoEmpresa; 
	} 

	function setLogoEmpresa($logoEmpresa) {  
		$this->logoEmpresa = $logoEmpresa; 
	} 

	function getTelefonEmpresa() { 
 		return $this->telefonEmpresa; 
	} 

	function setTelefonEmpresa($telefonEmpresa) {  
		$this->telefonEmpresa = $telefonEmpresa; 
	}
	
	
	function getCorreoEmpresa() { 
		return $this->correoEmpresa; 
   } 

   function setCorreoEmpresa($correoEmpresa) {  
	   $this->correoEmpresa = $correoEmpresa; 
   } 
}

	
?>