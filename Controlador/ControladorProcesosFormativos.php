<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/ProcesosFormativosDAO.php');

class ControladorProcesosFormativos{

private $procesos;


public function insertarProcesoFormativo( ProcesosFormativos $formativos)
{
	$procesos=new ProcesosFormativosDAO();
	return $this->procesos->agregarProcesosFormativos($formativos);
}



}

?>