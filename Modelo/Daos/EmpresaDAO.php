<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Conexion/db.php');


/**
 * Representa el DAO de la clase Usuario
 */
class EmpresaDAO extends DB
{

    private $con;


    public function __construct()
    {
        $claseCon = new DB();
        $this->con = $claseCon->connect();
    }





    // Lista de empresas con el usuario activo
    public function vistaEmpresas()
    {
        $sentencia = $this->con->prepare("SELECT * FROM listaEmpresas2 where estado_usuario=1");
        $sentencia->execute();
        $em = array();
        while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }

    public function buscarCorreo($variable)
    {
        $sentencia = $this->con->prepare("select * from usuario where USER_USUARIO=?");
        $sentencia->execute([$variable]);
        $nrows = $sentencia->fetchAll();

        return $nrows;
    }



    public function buscarEmpresaxNit($variable)
    {
        $sentencia = $this->con->prepare("select count(*) from empresa,usuario where nit_empresa=? and empresa.COD_USUARIO=usuario.COD_USUARIO and usuario.VALIDADO=1");
        $sentencia->execute([$variable]);
        $nrows = $sentencia->fetchAll()[0];

        return $nrows;
    }

    public function vistaEmpresasInscritas()
    {
        $sentencia = $this->con->prepare("SELECT * FROM vistaEmpresasInscritas ");
        $sentencia->execute();
        $em = array();
        while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }


    public function validar($cod)
    {
        $usu = $this->darEmpresa($cod);
        print($usu->getCodEmpresa());
        $sentencia = $this->con->prepare("UPDATE usuario SET VALIDADO=1 WHERE COD_USUARIO=" . $usu->getCodUsuario());
        $varr = $sentencia->execute();
    }


    public function darEmpresa($cod)
    {

        $sentencia = $this->con->prepare("SELECT * FROM empresa WHERE COD_EMPRESA=" . $cod);
        $sentencia->execute();
        while ($fila = $sentencia->fetch()) {
            $empresa = new Empresa(
                $fila[0],
                $fila[1],
                $fila[2],
                $fila[3],
                $fila[4],
                $fila[5],
                $fila[6],
                $fila[7],
                $fila[8],
                $fila[9]
            );
        }
        return $empresa;
    }

    public function devolverNombreContacto($codigo_usuario)
    {

        $query = $this->con->prepare('select concat(nom_contacto," ", apellido_contacto) as nom from contacto_empresa where cod_contacto=(select contacto_empresa from empresa where cod_usuario=:user)');
        $query->execute(['user' => $codigo_usuario]);
        if ($query->rowCount()) {
            foreach ($query as $kk) {
                return $kk['nom'];
            }
        }
    }

    public function devolverEmpresa($codigo_usuario)
    {
        $query = $this->con->prepare('SELECT * FROM empresa WHERE COD_USUARIO=:user');
        $query->execute(['user' => $codigo_usuario]);
        if ($query->rowCount()) {
            foreach ($query as $kk) {
                $empresa_devolver = new Empresa($kk['COD_EMPRESA'], $kk['NIT_EMPRESA'], $kk['RAZON_SOCIAL'], $kk['CAMARA_COMERCIO_PDF'], $kk['DESCRIPCCION_EMPRESA'], $kk['COD_USUARIO'], $kk['CONTACTO_EMPRESA'], $kk['LOGO_EMPRESA'], $kk['TELEFONO_EMPRESA'], $kk['CORREO_EMPRESA']);
                return $empresa_devolver;
            }
        }
    }


    public function darEmpresaXCodigo($cod)
    {

        $sentencia = $this->con->prepare("SELECT * FROM empresa WHERE COD_USUARIO=" . $cod);
        $sentencia->execute();
        while ($fila = $sentencia->fetch()) {
            $empresa = new Empresa(
                $fila[0],
                $fila[1],
                $fila[2],
                $fila[3],
                $fila[4],
                $fila[5],
                $fila[6],
                $fila[7],
                $fila[8],
                $fila[9]
            );
        }
        return $empresa;
    }

    public function editarPerfil(Empresa $empresa)
    {
        $sentencia = $this->con->prepare("UPDATE empresa SET 
        NIT_EMPRESA='" . $empresa->getNitEmpresa() . "',
        RAZON_SOCIAL='" . $empresa->getRazonSocial() . "',
        DESCRIPCCION_EMPRESA='" . $empresa->getDescripcionEmpresa() . "',
        COD_USUARIO=" . $empresa->getCodUsuario() . ",
        CONTACTO_EMPRESA=" . $empresa->getContactoEmpresa() . ",
        TELEFONO_EMPRESA='" . $empresa->getTelefonEmpresa() . "',      
        CORREO_EMPRESA='" . $empresa->getCorreoEmpresa() . "'      
        WHERE COD_EMPRESA =" . $empresa->getCodEmpresa());

        $res = $sentencia->execute();
        return $res;
    }
}
?>