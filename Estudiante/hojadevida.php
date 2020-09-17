<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/pdf/mpdf/mpdf/vendor/autoload.php');

include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EstudianteDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorHojaVida.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/HojaDeVida.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorReferencia.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ReferenciaHoja.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/AcademicaHojaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/AcademicaHoja.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/FormacionCompDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/FormacionComplementaria.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorProcesosFormativos.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ProcesosFormativos.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/referenciaHojaDAO.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorExperienciaHoja.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ExperienciaHoja.php');

session_start();
if (!isset($_SESSION['user'])) {
    
    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 2) {
    header("location: ../index.php");
}



 $esdao= new estudianteDAO();
$usercontrol= new Usuario();
$usercontrol->setUser($_SESSION['user']);
$controlHoja= new ControladorHojaDeVida();
$codigoEst=$esdao->devolverEstudiante($usercontrol->darCodigo());
$idHoja=$controlHoja->darIdHoja($codigoEst->getCodEstudiante());
$hojaDeVida=$controlHoja->darHojaDeVida($idHoja);

function pasarformacion($var){
    $cacade= new AcademicaHojaDAO();
    $cantidad=$cacade->pasarInformaciones($var);
    $base="";
    foreach ($cantidad as $f){
        $orgDate = $f[4];  
        $newDate1 = date("m/Y", strtotime($orgDate));  
        $orgDate = $f[5];  
        $newDate2 = date("m/Y", strtotime($orgDate));  

        $base=$base.'<tr>
        <td width="215" rowspan="3"><b>'.$newDate1." - ".$newDate2.'</b></td>
        <td width="555"><b>'.$f[7].'</b></td>
    </tr>
    <tr>
        <td><b>'.$f[2].'</b></td>
    </tr>
    <tr>
        <td>'.$f[3].'</td>
    </tr>
    
    <tr>
        <td>
            <br>
        </td>
    </tr>';
    }
return $base;

}
function pasarComplementaria($var){

$cacade= new FormacionCompDAO();
$cantidad=$cacade->pasarInformaciones($var);
$base="";
foreach ($cantidad as $f){
    $base= $base.'<tr>
    <td width="215" rowspan="3"><b>'.$f[4].' Horas </b></td>
    <td width="555"><b>'.$f[3].'</b></td>
    </tr>
    <tr>
    <td><b>'.$f[6].'</b></td>
    </tr>
    <tr>
    <td>'.$f[5].'</td>
    </tr>
    <tr>
    <td>
        <br>
    </td>
    </tr>
    ';
}
return $base;

}
function pasarExAcademica($var){
    $cacade= new ProcesosFormativosDAO();
    $cantidad=$cacade->pasarInformaciones($var);
    $base="";
    foreach ($cantidad as $f){
        $base= $base.'<tr>
        <td width="215" rowspan="3"><b>'.$f[4].'</b></td>
        <td width="555"><b>'.$f[2].'</b></td>
    </tr>
    <tr>
        <td><b>'.$f[5].'</b></td>
    </tr>
    <tr>
        <td>'.$f[3].'</td>
    </tr>
    <tr>
    <td>
        <br>
    </td>
    </tr>
        ';
    }
    return $base;
}
function pasarExLabora($var){

    $cacade= new ExperienciaHojaDAO();
    $cantidad=$cacade->pasarInformaciones($var);
    $base="";
    foreach ($cantidad as $f){
        $orgDate = $f[4];  
        $newDate1 = date("m/Y", strtotime($orgDate));  
        $orgDate = $f[5];  
        $newDate2 = date("m/Y", strtotime($orgDate));  
        $base=$base.'
        <tr>
    <td width="215" rowspan="3"><b>'.$newDate1." - ".$newDate2.'</b></td>
    <td width="555"><b>'.$f[2].'</b></td>
    </tr>
    <tr>
    <td><b>'.$f[3].'</b></td>
    </tr>
    <tr>
    <td>'.$f[6].'</td>
    </tr>';
    }
    return $base;
    }

function pasarReferencias($var){
    $cacade= new ReferenciaHojaDAO();
    $cantidad=$cacade->pasarInformaciones($var);
    $base="";
    foreach ($cantidad as $f){

    }
    return $base;
$base='<tr>
<td width="215" rowspan="4"><b>Claro</b></td>
<td width="555"><b>Ingeniero Senior</b></td>
</tr>
<tr>
<td><b>Sebastian Guevara R</b></td>
</tr>

<tr>
<td>Correo: sebastian@gmail.com</td>
</tr>
<tr>
<td>Tel: 3057631226</td>
</tr>

<tr>
<td><br></td>
<td></td>
</tr>';
}


$valor='
<!doctype html>
<html>

<head>
<meta charset="utf-8">
<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="contendp">
    <div id="titulohv">Hoja de vida</div>
    <br><br>
    <div id="informacion">
        <div id="contorno">Datos Personales</div>
        <br>
        <div id="datos">

            <table width="100%">
                <tr>
                    <td width="50%"><b>Nombres y Apellidos</b></td>
                    <td>'. $codigoEst->getNombreEstudiante() .'</td>
                </tr>
                <tr>
                    <td width="50%"><b>Dirección</b></td>
                    <td>'.$hojaDeVida->getHojaDireccion().",".$hojaDeVida->getHojaCiudad().' </td>
                </tr>
                <tr>
                    <td width="50%"><b>Teléfono</b></td>
                    <td>'.$hojaDeVida->getHojaCelular().'</td>
                </tr>
                <tr>
                    <td width="50%"><b>Correo Electronico</b></td>
                    <td>'.$codigoEst->getCorreoEstudiante().'</td>
                </tr>

                <tr>
                    <td width="50%"><b>Documento de Identidad</b></td>
                    <td>'.$codigoEst->getCedEstudiante().'</td>
                </tr>


            </table>
            <br>
        </div>

    </div>

    <br>
    <div id="informacion2">
        <div id="contorno2">
            Perfil Profesional
        </div>
        <div id="datos2">
            <p>
            '.$hojaDeVida->getPerfil().'    
            </p>
        </div>
    </div>
    <br>

    <br>
    <div id="informacion3">
        <div id="contorno3">
            Formacion academica
        </div>
        <div id="datos3">
            <br>
            <table width="785">
                '.pasarformacion($idHoja).'
            </table>
            <br>
        </div>
    </div>
    <br>
    <div id="informacion4">
        <div id="contorno4">
            Educacion Complementaria
        </div>
        <div id="datos4">
            <br>
            <table width="785">
                '.pasarComplementaria($idHoja).'

            </table>
            <br>
        </div>
    </div>
    <br>
    <div id="informacion5">
        <div id="contorno5">
            Experiencia academica
        </div>
        <div id="datos5">
            <br>
            <table width="785">
                '.pasarExAcademica($idHoja).'
            </table>
            <br>
        </div>
    </div>
    <br>
    <div id="informacion6">
        <div id="contorno6">
            Experiencia laboral
        </div>
        <div id="datos6">
            <br>
            <table width="785">
                '.pasarExLabora($idHoja).'

            </table>
            <br>
        </div>
    </div>
    <br>
    <div id="informacion7">
        <div id="contorno7">
            Referencias
        </div>
        <div id="datos7">
            <br>
            <table width="785">
            <tr>
            <td  rowspan="5" width="215" ><b>Sebastian Guevara R</b></td></tr>
            <td ><b>Claro</b></td>
            </tr>
            <tr>
            <td><b>Ingeniero Senior</b></td>
            </tr>
            
            <tr>
            <td>Correo: sebastian@gmail.com</td>
            </tr>
            <tr>
            <td>Tel: 3057631226</td>
            </tr>
            
            <tr>
            <td><br></td>
            <td></td>
            </tr>
            </table>
            <br>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div id="firma">
        <div id="datos8">
            <p><b>_______________________________________________</b></p>
            <p><b>C.C: 2102010299</b></p>
            <p><b>Fecha de actualizacion: 11/09/2020</b></p>
        </div>

    </div>


</div>
</body>

</html>
';



echo($valor);
?>