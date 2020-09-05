<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/PromocionLaboralDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');


class ControladorPromocionesLaboral{

private $promociones;

public function darListaPromociones()
{
	$this->promociones=new PromocionLaboralDAO();
	return $this->promociones->vistaPromocionLaboral();
}

public function darInformacion($pCodigo)
{
	$this->promociones=new PromocionLaboralDAO();
	return $this->promociones->detallesPostulacion($pCodigo);
}

public function darVacantase($pCodigo)
{
	$empresa_DAO=new EmpresaDAO();
	$codigo=$empresa_DAO->darEmpresaXCodigo($pCodigo)->getCodEmpresa();
	$this->promociones = new promocionLaboralDAO();
	return $this->promociones->verOfertas($codigo);
}

public function agregarOferta($promocion){
	$this->promociones = new promocionLaboralDAO();
	$this->promociones->agregarOfertas($promocion);
}



}




?>