<?php
require '../../Model/modelo_animales.php';

$MU = new Modelo_Animal();



/* datos finca */
$raza = htmlspecialchars($_POST['raza'], ENT_QUOTES, 'utf-8');
$tipoAnimal = htmlspecialchars($_POST['tipoAnimal'], ENT_QUOTES, 'utf-8');
$cantidad = $_POST['cantidadAnimal'];
$idFinca = $_POST['idFinca'];
$informacion = htmlspecialchars($_POST['informacion'], ENT_QUOTES, 'utf-8');
$vacuna = htmlspecialchars($_POST['nombreVacunas'], ENT_QUOTES, 'utf-8');

$registrar = $MU->registrarAnimales($raza, $tipoAnimal, $cantidad, $informacion, $vacuna, $idFinca);
echo $registrar;
