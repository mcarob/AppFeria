<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/ProcesosFormativosDAO.php');

class ControladorProcesosFormativos{

private $procesos;


	public function insertarProcesoFormativo(ProcesosFormativos $formativos)
	{
		$this->procesos=new ProcesosFormativosDAO();
		return $this->procesos->agregarProcesosFormativos($formativos);
	}


	public function EditarProcesoFormativo(ProcesosFormativos $formativos)
	{
		$this->procesos=new ProcesosFormativosDAO();
		return $this->procesos->editarProcesos($formativos);
	}

public function darProcesos($codigoHoja)
{
	$this->procesos=new ReferenciaHojaDAO();
	return $this->procesos->buscarProcesos($codigoHoja);
}

}

?>