<?php
require '../../Model/modelo_finca.php';

$MU = new Modelo_Finca();



/* datos finca */
$longitud = htmlspecialchars($_POST['longitud'], ENT_QUOTES, 'utf-8');
$latitud = htmlspecialchars($_POST['latitud'], ENT_QUOTES, 'utf-8');
$nombre_finca = htmlspecialchars($_POST['nombre_finca'], ENT_QUOTES, 'utf-8');
$hectareas = htmlspecialchars($_POST['hetareas'], ENT_QUOTES, 'utf-8');
$actividad_Agropecuaria = htmlspecialchars($_POST['actividad_Agropecuaria'], ENT_QUOTES, 'utf-8');
$linea_productiva = htmlspecialchars($_POST['linea_productiva'], ENT_QUOTES, 'utf-8');
$vereda = htmlspecialchars($_POST['vereda'], ENT_QUOTES, 'utf-8');
$idFinca = htmlspecialchars($_POST['idFinca'], ENT_QUOTES, 'utf-8');

$actualizar = $MU->actualizarFinca(
    $longitud,
    $latitud,
    $nombre_finca,
    $hectareas,
    $actividad_Agropecuaria,
    $linea_productiva,
    $vereda,
    $idFinca
);

echo $actualizar;