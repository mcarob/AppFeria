<?php


class ProgramaAcademico{
  private $codProgramaAcademico;
  private $nomProgramaAcademico;
  private $codFacultadAcademica;


  public function __construct($codProgramaAcademico, $nomProgramaAcademico, $codFacultadAcademica)
  {
    $this->codProgramaAcademico=$codProgramaAcademico;
    $this->nomProgramaAcademico=$nomProgramaAcademico;
    $this->codFacultadAcademica=$codFacultadAcademica;
  
}

	function getCodProgramaAcademico() { 
 		return $this->codProgramaAcademico; 
	} 

	function setCodProgramaAcademico($codProgramaAcademico) {  
		$this->codProgramaAcademico = $codProgramaAcademico; 
	} 

	function getNomProgramaAcademico() { 
 		return $this->nomProgramaAcademico; 
	} 

	function setNomProgramaAcademico($nomProgramaAcademico) {  
		$this->nomProgramaAcademico = $nomProgramaAcademico; 
	} 

	function getCodFacultadAcademica() { 
 		return $this->codFacultadAcademica; 
	} 

	function setCodFacultadAcademica($codFacultadAcademica) {  
		$this->codFacultadAcademica = $codFacultadAcademica; 
    } 

}
?>
