<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/FormacionComplementaria.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');

class FormacionCompDAO{

private $con;
private $formativos;


public function __construct()
{
    $claseCon = new DB();
    $this->con =$claseCon->connect();
}


public function agregarformacionCom(FormacionComplementaria $formacion){
        
    $sql="insert into FORMACION_COMPLEMENTARIA (COD_HOJA_VIDA,
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


    public function darFormacionCompxHoja($cod){
        $sentencia = $this->con->prepare("SELECT * FROM FORMACION_COMPLEMENTARIA WHERE cod_hoja_vida=?");
        $sentencia->execute([$cod]);
        $em = array();
        while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }

    public function pasarInformaciones($var){
        $sql="SELECT  * FROM complementaria_tipo_formacion where cod_hoja_vida=?";
        $respuesta=$this->con->prepare($sql);
        $respuesta->execute([$var]);
        return $respuesta->fetchall();

    }
}
