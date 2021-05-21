<?php
require '../../Model/modelo_personas.php';
require '../../Model/modelo_agricultor.php';
require '../../Model/modelo_tecnico.php';


$idPersona = htmlspecialchars($_POST['idPersona'], ENT_QUOTES, 'utf-8');
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
$idRol = htmlspecialchars($_POST['idRol'], ENT_QUOTES, 'utf-8');

if ($idRol == 2 || $idRol == 1) {
    $descripcion_estudio = htmlspecialchars($_POST['descripcion_estudio'], ENT_QUOTES, 'utf-8');
    $idTecnico = htmlspecialchars($_POST['idTecnico'], ENT_QUOTES, 'utf-8');
}
if ($idRol == 3) {
    $acargo = htmlspecialchars($_POST['acargo'], ENT_QUOTES, 'utf-8');
    $idAgricultor = htmlspecialchars($_POST['idAgricultor'], ENT_QUOTES, 'utf-8');
}

// $discapacidad = htmlspecialchars($_POST['discapacidad'], ENT_QUOTES, 'utf-8');

$MP = new Modelo_Persona();

$actualizarPer = $MP->actualizarPersona(
    $idPersona,
    $nombre1,
    $nombre2,
    $apellido1,
    $apellido2,
    $educacion,
    $tipo_identificacion,
    $numero_ide,
    $sexo,
    $etnia,
    $fecha_n,
    $correo,
    $telefono,
    $foto
);
// echo $actualizarPer;
if ($idRol == 2 || $idRol == 1) {
    $MT = new Modelo_Tecnico();
    $actualizarTec = $MT->actualizarTecnico(
        $idTecnico,
        $descripcion_estudio
    );
    echo $actualizarTec;
}
if ($idRol == 3) {
    $MA = new Modelo_Agricultor();
    $actualizarAgro = $MA->actualizarAgricultor($idAgricultor, $acargo);
    echo $actualizarAgro;
}
