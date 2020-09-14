<?php


class FormacionComplementaria{


    private $codFormacion;
    private $codHojaVida;
    private $codTipoFormacion;
    private $tituloFormacion;
    private $fechaFormacion;
    private $intitucionFormacion;
    

    public function __construct($codFormacion,$codHojaVida,$codTipoFormacion,$tituloFormacion,$fechaFormacion,
    $intitucionFormacion)
    {
        $this->codFormacion = $codFormacion;
        $this->codHojaVida = $codHojaVida;
        $this->codTipoFormacion = $codTipoFormacion;
        $this->tituloFormacion = $tituloFormacion;
        $this->fechaFormacion = $fechaFormacion;
        $this->intitucionFormacion = $intitucionFormacion;
        
    }



	function getCodFormacion() { 
 		return $this->codFormacion; 
	} 

	function setCodFormacion($codFormacion) {  
		$this->codFormacion = $codFormacion; 
	} 

	function getCodHojaVida() { 
 		return $this->codHojaVida; 
	} 

	function setCodHojaVida($codHojaVida) {  
		$this->codHojaVida = $codHojaVida; 
	} 

	function getCodTipoFormacion() { 
 		return $this->codTipoFormacion; 
	} 

	function setCodTipoFormacion($codTipoFormacion) {  
		$this->codTipoFormacion = $codTipoFormacion; 
	} 

	function getTituloFormacion() { 
 		return $this->tituloFormacion; 
	} 

	function setTituloFormacion($tituloFormacion) {  
		$this->tituloFormacion = $tituloFormacion; 
	} 

	function getFechaFormacion() { 
 		return $this->fechaFormacion; 
	} 

	function setFechaFormacion($fechaFormacion) {  
		$this->fechaFormacion = $fechaFormacion; 
	} 

	function getIntitucionFormacion() { 
 		return $this->intitucionFormacion; 
	} 

	function setIntitucionFormacion($intitucionFormacion) {  
		$this->intitucionFormacion = $intitucionFormacion; 
    } 
}
?>