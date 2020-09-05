<?php


class Usuario{
  private $codUsuario;
  private $nomUsuario;
  private $clave;
  private $validado;
  private $fechaCreacion;
  private $tipoUsuario;
  private $correoUsuario;
  private $estadoUsuario;
    

    public function __construct($codUsuario,$nomUsuario,$clave,$validado,$fechaCreacion,$tipoUsuario,$correoUsuario,$estadoUsuario)
    {
        $this->codUsuario = $codUsuario;
        $this->nomUsuario = $nomUsuario;
        $this->clave = $clave;
        $this->validado = $validado;
        $this->fechaCreacion = $fechaCreacion;
        $this->tipoUsuario = $tipoUsuario;
        $this->correoUsuario = $correoUsuario;
        $this->estadoUsuario = $estadoUsuario;

    }



  



	function getCodUsuario() { 
 		return $this->codUsuario; 
	} 

	function setCodUsuario($codUsuario) {  
		$this->codUsuario = $codUsuario; 
	} 

	function getNomUsuario() { 
 		return $this->nomUsuario; 
	} 

	function setNomUsuario($nomUsuario) {  
		$this->nomUsuario = $nomUsuario; 
	} 

	function getClave() { 
 		return $this->clave; 
	} 

	function setClave($clave) {  
		$this->clave = $clave; 
	} 

	function getValidado() { 
 		return $this->validado; 
	} 

	function setValidado($validado) {  
		$this->validado = $validado; 
	} 

	function getFechaCreacion() { 
 		return $this->fechaCreacion; 
	} 

	function setFechaCreacion($fechaCreacion) {  
		$this->fechaCreacion = $fechaCreacion; 
	} 

	

	function getTipoUsuario() { 
 		return $this->tipoUsuario; 
	} 

	function setTipoUsuario($tipoUsuario) {  
		$this->tipoUsuario = $tipoUsuario; 
	} 

	function getCorreoUsuario() { 
 		return $this->correoUsuario; 
	} 

	function setCorreoUsuario($correoUsuario) {  
		$this->correoUsuario = $correoUsuario; 
	} 

	function getEstadoUsuario() { 
 		return $this->estadoUsuario; 
	} 

	function setEstadoUsuario($estadoUsuario) {  
		$this->estadoUsuario = $estadoUsuario; 
    } 
}
?>