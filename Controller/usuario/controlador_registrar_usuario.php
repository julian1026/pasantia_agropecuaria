<?php
require '../../Model/modelo_usuario.php';
require '../../Model/modelo_personas.php';
require '../../Model/modelo_agricultor.php';
require '../../Model/modelo_tecnico.php';

$MU = new Modelo_Usuario();


$usuario = htmlspecialchars($_POST['user'], ENT_QUOTES, 'utf-8');
$rol = htmlspecialchars($_POST['rol'], ENT_QUOTES, 'utf-8');
$contra = md5($_POST['pass']);
$estado = 'activo';
/* datos Personales */
$nombre1 = htmlspecialchars($_POST['nombre1'], ENT_QUOTES, 'utf-8');
$nombre2 = htmlspecialchars($_POST['nombre2'], ENT_QUOTES, 'utf-8');
$apellido1 = htmlspecialchars($_POST['apellido1'], ENT_QUOTES, 'utf-8');
$apellido2 = htmlspecialchars($_POST['apellido2'], ENT_QUOTES, 'utf-8');
$educacion = htmlspecialchars($_POST['educacion'], ENT_QUOTES, 'utf-8');
$tipo_identificacion = htmlspecialchars($_POST['tipo_identificacion'], ENT_QUOTES, 'utf-8');
$numero_ide = htmlspecialchars($_POST['numero_ide'], ENT_QUOTES, 'utf-8');
$sexo = htmlspecialchars($_POST['sexo'], ENT_QUOTES, 'utf-8');
$fecha_n = htmlspecialchars($_POST['fecha_nacimiento'], ENT_QUOTES, 'utf-8');
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$foto = $_POST['foto'];
$etnia = htmlspecialchars($_POST['etnia'], ENT_QUOTES, 'utf-8');
$discapacidad = htmlspecialchars($_POST['discapacidad'], ENT_QUOTES, 'utf-8');
/* datos Agricultor*/



/* datos del supervisor*/
if ($rol == '2') {
    $des_estudio = htmlspecialchars($_POST['des_estudio'], ENT_QUOTES, 'utf-8');
}


if ($rol == '3') {
    $usuario = $numero_ide;
    $contra = md5($numero_ide);
    $numPersonas = htmlspecialchars($_POST['personas_acargo'], ENT_QUOTES, 'utf-8');
    $activad_agro = htmlspecialchars($_POST['actividad_agro'], ENT_QUOTES, 'utf-8');
}

$consultaUsu = $MU->registrarUsuario($usuario, $contra, $estado, $rol);
// $data=json_encode($consultaUsu);
// echo $data;
// dependiendo de que valor devuelva la consultaUsu, insertaria los demas datos o no */
if ($consultaUsu[0] == '0' || $consultaUsu[0] == '2') {
    $data = json_encode($consultaUsu);
    echo $data;
}


if ($consultaUsu[0] == '1') {
    $persona = new Modelo_Persona();
    $consultaPer = $persona->registrarPersonas(
        $nombre1,
        $nombre2,
        $apellido1,
        $apellido2,
        $educacion,
        $tipo_identificacion,
        $numero_ide,
        $sexo,
        $etnia,
        $discapacidad,
        $fecha_n,
        $correo,
        $telefono,
        $foto
    );

    if ($consultaPer[0] == '1') {
        switch ($rol) {
            case 1:
                $data1 = array();
                $data1 = [1];
                $data1 = json_encode($consultaPer);
                echo $data1;
                break;
            case 2:
                $tecnico = new Modelo_Tecnico();
                $consultarTec = $tecnico->registrarTecnico($des_estudio);
                $data = json_encode($consultarTec);
                echo $data;
                break;
            case 3:
                $agricultor = new Modelo_Agricultor();
                $consultarAgri = $agricultor->registrarAgricultor($numPersonas, $activad_agro);
                $data = json_encode($consultarAgri);
                echo $data;
                break;
            default:
                # code...
                break;
        }
    }
}
