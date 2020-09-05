<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/AdministradorDAO.php');



class ControladorAdministrador{

private $administrador;

/*
public function darInformacion($pCodigo)
{
	$this->promociones=new PromocionLaboralDAO();
	return $this->promociones->detallesPostulacion($pCodigo);
}

public function darVacantase($pCodigo)
{
	$empresa_DAO=new EmpresaDAO();
	$codigo=$empresa_DAO->darEmpresaXCodigo($pCodigo)->getCodEmpresa();
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->verOfertas($codigo);
}
*/


public function actualizarPromocion($pPromocion)
{
	$this->promociones=new PromocionLaboralDAO();
	return $this->promociones->editarVacante($pPromocion);
}

public function darAdministrador($pCodigo)
{
	$administrador_DAO=new AdministradorDAO();
	$administrador=$administrador_DAO->darAdministradorXCodigo($pCodigo);
	return $administrador;
}

public function actualizarAdministrador(Administrador $administrador)
{
	$administrador_DAO=new AdministradorDAO();
	$resultado_administrador=$administrador_DAO->editarPerfil($administrador);
	return $resultado_administrador;
}

}




?>