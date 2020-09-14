<?php

require_once('../Entidades/FormacionComplementaria.php');
require_once('../conexion/db.php');

class FormacionCompDAO{

private $con;
private $formativos;


public function __construct()
{
    $claseCon = new DB();
    $this->con =$claseCon->connect();
}


public function agregarformacionCom(FormacionComplementaria $formacion){
        
    $sql="insert into procesos_formativos (COD_HOJA_VIDA,
    COD_TIPO_FORMACION_COMPLEMENTARIA,
    TITULO_FORMACION_COMPLEMENTARIA,
    FECHA_FORMACION_COMPLEMENTARIA,
    INSTITUCION_EDUCATIVA_COMPLEMENTARIA)
    values 
    (?,?,?,?,?)";
    $respuesta=$this->con->prepare($sql)->execute([$formacion->getCodHojaVida(),$formacion->getCodTipoFormacion(),
    $formacion->getTituloFormacion(), $formacion->getFechaFormacion(),$formacion->getIntitucionFormacion()]);
    
    return $respuesta;

}



public function EditarformacionCom(FormacionComplementaria $formacion){
        
    $sql="UPDATE procesos_formativos SET (COD_HOJA_VIDA,
    COD_TIPO_FORMACION_COMPLEMENTARIA,
    TITULO_FORMACION_COMPLEMENTARIA,
    FECHA_FORMACION_COMPLEMENTARIA,
    INSTITUCION_EDUCATIVA_COMPLEMENTARIA)
    values 
    (?,?,?,?,?)";
    $respuesta=$this->con->prepare($sql)->execute([$formacion->getCodHojaVida(),$formacion->getCodTipoFormacion(),
    $formacion->getTituloFormacion(), $formacion->getFechaFormacion(),$formacion->getIntitucionFormacion()]);
    
    return $respuesta;

}


}
?>