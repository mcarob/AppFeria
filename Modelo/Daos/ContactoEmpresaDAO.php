<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/ContactoEmpresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/conexion/db.php');


/**
 * Representa el DAO de la clase Usuario
 */
class ContactoEmpresaDAO extends DB
{
    
    private $con;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
   


    public function devolverContactoEmpresa($codigo_usuario){

        $query=$this->con->prepare('select * from contacto_empresa where cod_contacto=(select contacto_empresa from empresa where cod_usuario=:user)');
        $query->execute(['user'=>$codigo_usuario]);
        if($query->rowCount()){
            foreach ($query as $kk) {
                $contactoEmpresa_devolver = new ContactoEmpresa($kk['COD_CONTACTO'],$kk['NOM_CONTACTO'],$kk['APELLIDO_CONTACTO'],$kk['TELEFONO_CONTACTO'],$kk['CARGO_CONTACTO'],$kk['CORREO_CONTACTO']);
                 return $contactoEmpresa_devolver;
            }
        }
    }

    public function devolverNombreContacto($codigo_usuario){


        $query=$this->con->prepare('select concat(nom_contacto," ", apellido_contacto) as nom from contacto_empresa where cod_contacto=(select contacto_empresa from empresa where cod_usuario=:user)');
        $query->execute(['user'=>$codigo_usuario]);
        if($query->rowCount()){
            foreach ($query as $kk) {
                return $kk['nom'];
            }
    }
}

    public function editarPerfil(ContactoEmpresa $ContactoEmpresa){
        $sentencia = $this->con->prepare("UPDATE contacto_empresa SET 
        NOM_CONTACTO='".$ContactoEmpresa->getNomContacto()."',
        APELLIDO_CONTACTO='".$ContactoEmpresa->getApellidoContacto()."',
        TELEFONO_CONTACTO='".$ContactoEmpresa->getTelefonoContacto()."',
        CARGO_CONTACTO='".$ContactoEmpresa->getCargoContacto()."',
        CORREO_CONTACTO='".$ContactoEmpresa->getCorreoContacto()."'            
        WHERE COD_CONTACTO =".$ContactoEmpresa->getCodContacto());
        
        $res=$sentencia->execute();
        return $res;
    }
    
    


}
?>