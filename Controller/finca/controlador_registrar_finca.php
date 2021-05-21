<?php
require '../../Model/modelo_finca.php';

$MU = new Modelo_Finca();

session_start();

/* datos finca */
$longitud = htmlspecialchars($_POST['longitud'], ENT_QUOTES, 'utf-8');
$latitud = htmlspecialchars($_POST['latitud'], ENT_QUOTES, 'utf-8');
$altitud = htmlspecialchars($_POST['altitud'], ENT_QUOTES, 'utf-8');
$nombre_finca = htmlspecialchars($_POST['nombre_finca'], ENT_QUOTES, 'utf-8');
$hectareas = htmlspecialchars($_POST['hetareas'], ENT_QUOTES, 'utf-8');
$linea_productiva1 = htmlspecialchars($_POST['linea_productiva1'], ENT_QUOTES, 'utf-8');
$linea_productiva2 = htmlspecialchars($_POST['linea_productiva2'], ENT_QUOTES, 'utf-8');
$linea_productiva3 = htmlspecialchars($_POST['linea_productiva3'], ENT_QUOTES, 'utf-8');
$agua = $_POST['agua'];
$energiaElectrica = $_POST['energiaElectrica'];
$energiaAlternativas = $_POST['energiaAlternativas'];
$servicioSanitario = $_POST['servicioSanitario'];
$vereda = $_POST['Vereda'];
$idAgricultor = $_POST['idAgricultor'];
$fecha = $_POST['fecha'];
$R_idPersona = $_SESSION['S_idPersona'];

$registrar = $MU->registrarFinca(
    $longitud,
    $latitud,
    $altitud,
    $fecha,
    $nombre_finca,
    $hectareas,
    $linea_productiva1,
    $linea_productiva2,
    $linea_productiva3,
    $agua,
    $energiaElectrica,
    $energiaAlternativas,
    $servicioSanitario,
    $vereda,
    $idAgricultor,
    $R_idPersona
);
$data = json_encode($registrar);
echo $data;
