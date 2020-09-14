<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/HojaDeVidaDAO.php');

class ControladorHojaDeVida{

private $hojaDeVida;


public function agregarHojaDeVida(HojaDeVida $hoja)
{
	$hojaDeVida=new HojaDeVidaDAO();
	return $this->hojaDeVida->agregarHojaDeVida($hoja);
}

}

?>