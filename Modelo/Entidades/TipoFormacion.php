<?php


class TipoFormacion{
  private $codTipoFormacion;
  private $nomTipoFormacion;


  public function __construct($codTipoFormacion, $nomTipoFormacion)
  {
    $this->codTipoFormacion=$codTipoFormacion;
    $this->nomTipoFormacion=$nomTipoFormacion;
  }
  

  

	function getCodTipoFormacion() { 
 		return $this->codTipoFormacion; 
	} 

	function setCodTipoFormacion($codTipoFormacion) {  
		$this->codTipoFormacion = $codTipoFormacion; 
	} 

	function getNomTipoFormacion() { 
 		return $this->nomTipoFormacion; 
	} 

	function setNomTipoFormacion($nomTipoFormacion) {  
		$this->nomTipoFormacion = $nomTipoFormacion; 
	} 
}
?>