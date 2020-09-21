<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Administrador.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ContactoEmpresa.php');
/*   
tipo 1 admin
tipo 2 estudiante
tipo 3 empresa
tipo 4 admin-auditor
*/
class ListasDesplegables extends DB{




    public function darListaCarrera(){
        $query=$this->connect()->prepare('SELECT * FROM programa_academico');
        $query->execute();
        return $query->fetchAll();
    }

}