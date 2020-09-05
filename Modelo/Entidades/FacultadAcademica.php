<?php


class FacultadAcademica{
  private $codFacultadAcademica;
  private $nomFacultadAcademica;


  public function __construct($codFacultadAcademica,$nomFacultadAcademica)
  {
    $this->codFacultadAcademica;$codFacultadAcademica;
    $this->nomFacultadAcademica;$nomFacultadAcademica;
  }
  

	function getCodFacultadAcademica() { 
 		return $this->codFacultadAcademica; 
	} 

	function setCodFacultadAcademica($codFacultadAcademica) {  
		$this->codFacultadAcademica = $codFacultadAcademica; 
	} 

	function getNomFacultadAcademica() { 
 		return $this->nomFacultadAcademica; 
	} 

	function setNomFacultadAcademica($nomFacultadAcademica) {  
		$this->nomFacultadAcademica = $nomFacultadAcademica; 
	} 
}