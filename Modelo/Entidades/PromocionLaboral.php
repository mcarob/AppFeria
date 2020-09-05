<?php


class PromocionLaboral{

private $codPromocion;
private $promocionPerfil;
private $promocionConocimientoBase;
private $promocionHorario;
private $promocionCompensacion;
private $promocionRangoCompensacion;
private $promocionBeneficios;
private $promocionCargoFuncion;
private $promocionInicio;
private $promocionDescripcion;
private $codEmpresa;

private $promocionFecha;
private $promocionCiudad;
private $tituloPromocion;
private $limiteVacantes;
private $promocionEstado;




  public function __construct($codPromocion, $promocionPerfil, $promocionConocimientoBase, 
  $promocionHorario,$promocionCompensacion, $promocionRangoCompensacion, $promocionBeneficios, 
  $promocionCargoFuncion, $promocionInicio, $promocionDescripcion, $codEmpresa, $promocionFecha, 
  $promocionCiudad,$tituloPromocion,$limiteVacantes,$promocionEstado)
  {
    $this->codPromocion=$codPromocion;
    $this->promocionPerfil=$promocionPerfil;
    $this->promocionConocimientoBase=$promocionConocimientoBase;
    $this->promocionHorario=$promocionHorario;
    $this->promocionCompensacion=$promocionCompensacion;
    $this->promocionRangoCompensacion=$promocionRangoCompensacion;
    $this->promocionBeneficios=$promocionBeneficios;
    $this->promocionCargoFuncion=$promocionCargoFuncion;
    $this->promocionInicio=$promocionInicio;
	$this->promocionDescripcion=$promocionDescripcion;
	$this->codEmpresa=$codEmpresa;

	$this->promocionFecha=$promocionFecha;
	$this->promocionCiudad=$promocionCiudad;
	$this->tituloPromocion=$tituloPromocion;
	$this->limiteVacantes=$limiteVacantes;
	$this->promocionEstado=$promocionEstado;

  }

  
	function getCodPromocion() { 
		return $this->codPromocion; 
   } 

   function setCodPromocion($codPromocion) {  
	   $this->codPromocion = $codPromocion; 
   } 

   function getPromocionPerfil() { 
		return $this->promocionPerfil; 
   } 

   function setPromocionPerfil($promocionPerfil) {  
	   $this->promocionPerfil = $promocionPerfil; 
   } 

   function getPromocionConocimientoBase() { 
		return $this->promocionConocimientoBase; 
   } 

   function setPromocionConocimientoBase($promocionConocimientoBase) {  
	   $this->promocionConocimientoBase = $promocionConocimientoBase; 
   } 

   function getPromocionHorario() { 
		return $this->promocionHorario; 
   } 

   function setPromocionHorario($promocionHorario) {  
	   $this->promocionHorario = $promocionHorario; 
   } 

   function getPromocionCompensacion() { 
		return $this->promocionCompensacion; 
   } 

   function setPromocionCompensacion($promocionCompensacion) {  
	   $this->promocionCompensacion = $promocionCompensacion; 
   } 

   function getPromocionRangoCompensacion() { 
		return $this->promocionRangoCompensacion; 
   } 

   function setPromocionRangoCompensacion($promocionRangoCompensacion) {  
	   $this->promocionRangoCompensacion = $promocionRangoCompensacion; 
   } 

   function getPromocionBeneficios() { 
		return $this->promocionBeneficios; 
   } 

   function setPromocionBeneficios($promocionBeneficios) {  
	   $this->promocionBeneficios = $promocionBeneficios; 
   } 

   function getPromocionCargoFuncion() { 
		return $this->promocionCargoFuncion; 
   } 

   function setPromocionCargoFuncion($promocionCargoFuncion) {  
	   $this->promocionCargoFuncion = $promocionCargoFuncion; 
   } 

   function getPromocionInicio() { 
		return $this->promocionInicio; 
   } 

   function setPromocionInicio($promocionInicio) {  
	   $this->promocionInicio = $promocionInicio; 
   } 

   function getPromocionDescripcion() { 
		return $this->promocionDescripcion; 
   } 

   function setPromocionDescripcion($promocionDescripcion) {  
	   $this->promocionDescripcion = $promocionDescripcion; 
   }

   function getCodEmpresa() { 
	   return $this->codEmpresa; 
  } 

  function setCodEmpresa($codEmpresa) {  
	$this->codEmpresa = $codEmpresa; 
}



	function getPromocionFecha() { 
		return $this->promocionFecha; 
	} 
	function setPromocionFecha($promocionFecha) {  
		$this->promocionFecha = $promocionFecha; 
	}
  
  
  
	function getPromocionCiudad() { 
		return $this->promocionCiudad; 
	} 
	function setPromocionCiudad($promocionCiudad) {  
	$this->promocionCiudad = $promocionCiudad; 
	}  
  

	function getTituloPromocion() { 
		return $this->tituloPromocion; 
	} 
	function setTituloPromocion($tituloPromocion) {  
		$this->tituloPromocion = $tituloPromocion; 
	}


	function getLimiteVacantes() { 
		return $this->limiteVacantes; 
	} 
	function setLimiteVacantes($limiteVacantes) {  
		$this->limiteVacantes = $limiteVacantes; 
	}
  
	function getPromocionEstado() { 
		return $this->promocionEstado; 
	} 
	function setPromocionEstado($promocionEstado) {  
		$this->promocionEstado = $promocionEstado; 
	}
  

}

	
?>