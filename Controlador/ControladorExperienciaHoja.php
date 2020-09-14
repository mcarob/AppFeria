<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ExperienciaHoja.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/ExperienciaHojaDAO.php');

class ControladorExperiencia{

    private $experiencia;




    public function agregarExperiencia($experiencia)
    {
        $this->experiencia = new ExperienciaHojaDAO();
        return $this->experiencia->crearExperienciaHoja($experiencia);
    }


    public function editarExperiencia($experiencia)
    {
        $this->experiencia = new ExperienciaHojaDAO();
        return $this->experiencia->editarExperienciaHoja($experiencia);
    }


    public function darExperiencia($codH)
    {
        $this->experiencia = new ExperienciaHojaDAO();
        return $this->experiencia->darExperienciaXHoja($codH);
    }
    
}


?>