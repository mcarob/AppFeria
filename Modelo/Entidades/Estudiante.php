<?php


class Estudiante{
  private $codEstudiante;
  private $cedEstudiante;
  private $correoEstudiante;
  private $codUsuario;
  private $nombreEstudiante;
  private $apellidoEstudiante;
  private $semestreEstudiante;
  private $correoPersonal;
  private $codProgamaAcademico;
    

    public function __construct($codEstudiante,$cedEstudiante,$correoEstudiante,$codUsuario,$nombreEstudiante,
    $apellidoEstudiante,$codProgamaAcademico,$semestreEstudiante,$correoPersonal)
    {
        $this->codEstudiante = $codEstudiante;
        $this->cedEstudiante = $cedEstudiante;
        $this->correoEstudiante = $correoEstudiante;
        $this->codUsuario = $codUsuario;
        $this->nombreEstudiante = $nombreEstudiante;
        $this->apellidoEstudiante = $apellidoEstudiante;
        $this->codProgamaAcademico = $codProgamaAcademico;
        $this->semestreEstudiante = $semestreEstudiante;
        $this->correoPersonal = $correoPersonal;
       

    }


	function getCodEstudiante() { 
 		return $this->codEstudiante; 
	} 

	function setCodEstudiante($codEstudiante) {  
		$this->codEstudiante = $codEstudiante; 
	} 

	function getCedEstudiante() { 
 		return $this->cedEstudiante; 
	} 

	function setCedEstudiante($cedEstudiante) {  
		$this->cedEstudiante = $cedEstudiante; 
	} 

	function getCorreoEstudiante() { 
 		return $this->correoEstudiante; 
	} 

	function setCorreoEstudiante($correoEstudiante) {  
		$this->correoEstudiante = $correoEstudiante; 
	} 

	function getCodUsuario() { 
 		return $this->codUsuario; 
	} 

	function setCodUsuario($codUsuario) {  
		$this->codUsuario = $codUsuario; 
	} 

	function getNombreEstudiante() { 
 		return $this->nombreEstudiante; 
	} 

	function setNombreEstudiante($nombreEstudiante) {  
		$this->nombreEstudiante = $nombreEstudiante; 
	} 

	function getApellidoEstudiante() { 
 		return $this->apellidoEstudiante; 
	} 

	function setApellidoEstudiante($apellidoEstudiante) {  
		$this->apellidoEstudiante = $apellidoEstudiante; 
	} 


	function getSemestreEstudiante() { 
 		return $this->semestreEstudiante; 
	} 

	function setSemestreEstudiante($semestreEstudiante) {  
		$this->semestreEstudiante = $semestreEstudiante; 
	} 

	function getCorreoPersonal() { 
 		return $this->correoPersonal; 
	} 

	function setCorreoPersonal($correoPersonal) {  
		$this->correoPersonal = $correoPersonal; 
	}
	function getCodProgamaAcademico() { 
		return $this->codProgamaAcademico; 
   } 

   function setCodProgamaAcademico($codProgamaAcademico) {  
	   $this->codProgamaAcademico = $codProgamaAcademico; 
   } 
}

	
?>