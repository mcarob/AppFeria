<?php


class TipoUsuario{
  private $codTipoUsuario;
  private $nomTipoUsuario;


  public function __construct($codTipoUsuario, $nomTipoUsuario)
  {
    $this->codTipoUsuario=$codTipoUsuario;
    $this->nomTipoUsuario=$nomTipoUsuario;
  }
  

  


	function getCodTipoUsuario() { 
 		return $this->codTipoUsuario; 
	} 

	function setCodTipoUsuario($codTipoUsuario) {  
		$this->codTipoUsuario = $codTipoUsuario; 
	} 

	function getNomTipoUsuario() { 
 		return $this->nomTipoUsuario; 
	} 

	function setNomTipoUsuario($nomTipoUsuario) {  
		$this->nomTipoUsuario = $nomTipoUsuario; 
    } 
}
?>
