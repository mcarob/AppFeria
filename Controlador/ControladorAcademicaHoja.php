<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/AcademicaHojaDAO.php');

class ControladorAcademicaHoja{

private $hojaAcademica;


public function insertarHojaAcademica(AcademicaHoja $academica)
{
	$hojaAcademica=new AcademicaHojaDAO();
	return $this->hojaAcademica->agregarHojaAcademica($academica);
}

}

?>