<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/ReferenciaHojaDAO.php');

class ControladorReferenica{

private $referencia;


public function insertarReferencia(ReferenciaHoja $referencias)
{
	$this->referencia=new ReferenciaHojaDAO();
	return $this->referencia->agregarReferenciaHojaDeVida($referencias);
}

public function darReferencia($codigoHoja)
{
	$this->referencia=new ReferenciaHojaDAO();
	return $this->referencia->buscarReferenciaHojaDeVida($codigoHoja);
}



}

?>