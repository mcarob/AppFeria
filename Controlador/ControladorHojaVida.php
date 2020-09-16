<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/HojaDeVidaDAO.php');

class ControladorHojaDeVida{

private $hojaDeVida;


	public function agregarHojaDeVida(HojaDeVida $hoja)
	{
		$this->hojaDeVida=new HojaDeVidaDAO();
		return $this->hojaDeVida->agregarHojaDeVida($hoja);
	}

	public function darHojaDeVida($codigo)
	{
		$this->hojaDeVida=new HojaDeVidaDAO();
		return $this->hojaDeVida->buscarHojaDeVida($codigo);
	}

	public function darIdHoja($codigoEstudiante)
	{
		$this->hojaDeVida=new HojaDeVidaDAO();
		return $this->hojaDeVida->buscarIdHoja($codigoEstudiante);
	}


}

?>