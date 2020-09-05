<?php


class Administrador{
  private $codAdministrador;
  private $codUsuario;
  private $nomAdministrador;
  private $apellidoAdministrador;
  private $correoAdministrador;

    public function __construct($codAdministrador,$codUsuario,$nomAdministrador,$apellidoAdministrador, $correoAdministrador)
    {
        $this->codAdministrador = $codAdministrador;
        $this->codUsuario = $codUsuario;
        $this->nomAdministrador = $nomAdministrador;
        $this->correoAdministrador = $correoAdministrador;
        $this->apellidoAdministrador = $apellidoAdministrador;
    }


	function getCodAdministrador() { 
 		return $this->codAdministrador; 
	} 

	function setCodAdministrador($codAdministrador) {  
		$this->codAdministrador = $codAdministrador; 
	} 

	function getCodUsuario() { 
 		return $this->codUsuario; 
	} 

	function setCodUsuario($codUsuario) {  
		$this->codUsuario = $codUsuario; 
	} 

	function getNomAdministrador() { 
 		return $this->nomAdministrador; 
	} 

	function setNomAdministrador($nomAdministrador) {  
		$this->nomAdministrador = $nomAdministrador; 
	} 

	function getCorreoAdministrador() { 
 		return $this->correoAdministrador; 
	} 

	function setCorreoAdministrador($correoAdministrador) {  
		$this->correoAdministrador = $correoAdministrador; 
    } 

	function getApellidoAdministrador() { 
		return $this->apellidoAdministrador; 
   } 

   function setApellidoAdministrador($apellidoAdministrador) {  
	   $this->apellidoAdministrador = $apellidoAdministrador; 
   } 
}

	
?>