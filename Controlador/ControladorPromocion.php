<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/PromocionLaboralDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');


class ControladorPromocion{

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
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->verOfertas($codigo);
}


public function verOfertas($cod){
	$empresa_DAO=new EmpresaDAO();
	$this->promociones = new PromocionLaboralDAO();
	return $this->promociones->verOfertas($cod);

}

public function agregarPromocion($promocion)
{
	$this->promociones=new PromocionLaboralDAO();
	return $this->promociones->agregarOfertas($promocion);
}

public function darListaVacantesTotal()
{
	$this->postulados = new PromocionLaboralDAO();
	return $this->postulados->totalVacantesActivas();
}
public function actualizarPromocion($pPromocion)
{
	$this->promociones=new PromocionLaboralDAO();
	return $this->promociones->editarVacante($pPromocion);
}
public function darOferta($pCodigo)
{
	$oferta_DAO=new PromocionLaboralDAO();
	$promocion=$oferta_DAO->darPromocionXCodigo($pCodigo);
	return $promocion;
}
public function actualizarVacante(PromocionLaboral $promocion)
{
	$oferta_DAO=new PromocionLaboralDAO();
	$promocion=$oferta_DAO->editarVacante($promocion);
	return $promocion;
}

public function cambiarEstadoVacante($codigo)
{
	$oferta_DAO=new PromocionLaboralDAO();
	$promocion=$oferta_DAO->cambiarEstado($codigo);
	return $promocion;
}

public function eliminarVacante($codigo)
{
	$oferta_DAO=new PromocionLaboralDAO();
	$promocion=$oferta_DAO->eliminar($codigo);
	return $promocion;
}




}




?>