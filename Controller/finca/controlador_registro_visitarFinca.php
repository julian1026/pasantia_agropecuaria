<?php
require '../../Model/modelo_visitaFinca.php';

$MU = new Modelo_VisitarFinca();

session_start();

/* datos finca */
$objectivoVisita = htmlspecialchars($_POST['visita'], ENT_QUOTES, 'utf-8');
$sistemaProduccion = htmlspecialchars($_POST['sistemas'], ENT_QUOTES, 'utf-8');
$situacionEncontrada = htmlspecialchars($_POST['situacion'], ENT_QUOTES, 'utf-8');
$actividadRealizada = htmlspecialchars($_POST['actividad1'], ENT_QUOTES, 'utf-8');
$actividadPendientes = htmlspecialchars($_POST['actividad2'], ENT_QUOTES, 'utf-8');
$fecha = $_POST['fecha'];
$registrador_cedula = $_SESSION['S_registrador'];
$idFinca = $_POST['idFinca'];

$registrar = $MU->registrarVisitaFinca(
    $objectivoVisita,
    $sistemaProduccion,
    $situacionEncontrada,
    $actividadRealizada,
    $actividadPendientes,
    $fecha,
    $registrador_cedula,
    $idFinca
);
$data = json_encode($registrar);
echo $data;
