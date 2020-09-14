<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/AcademicaHojaDAO.php');

class ControladorAcademicaHoja{




public function insertarHojaAcademica(AcademicaHoja $academica)
{
<<<<<<< Updated upstream
	$hojaAcademica=new AcademicaHojaDAO();
	return $hojaAcademica->agregarHojaAcademica($academica);
=======
	$this->hojaAcademica=new AcademicaHojaDAO();
	return $this->hojaAcademica->agregarHojaAcademica($academica);
>>>>>>> Stashed changes
}



}

?>